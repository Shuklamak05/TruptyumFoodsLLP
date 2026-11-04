<?php
/**
 * Truptyum Foods - Contact Form Handler with Authenticated cPanel SMTP & Local Lead Logging
 */
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Method not allowed. Use POST request."]);
    exit();
}

// =========================================================================
// 1. CONFIGURATION
// =========================================================================
// Primary & secondary notification recipients (comma-separated)
$toRecipients = "sales@truptyumfoods.com, makshukla05@gmail.com";

// cPanel SMTP Credentials
// Set $useSmtp = true and enter the password you set in cPanel for alerts@truptyumfoods.com
$useSmtp       = true;
$smtpHost      = "mail.truptyumfoods.com"; // Or "localhost"
$smtpPort      = 465;                      // 465 (SSL)
$smtpSecurity  = "ssl";                    // "ssl"
$smtpUser      = "alerts@truptyumfoods.com";
$smtpPass      = "CHANGE_THIS_TO_YOUR_PASSWORD"; // <-- Enter your cPanel email password here

// =========================================================================
// 2. INPUT VALIDATION & SANITIZATION
// =========================================================================
$rawInput = file_get_contents("php://input");
$data = json_decode($rawInput, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    $data = $_POST;
}

$name    = isset($data['name']) ? strip_tags(trim($data['name'])) : '';
$email   = isset($data['email']) ? filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL) : '';
$phone   = isset($data['phone']) ? strip_tags(trim($data['phone'])) : '';
$service = isset($data['service']) ? strip_tags(trim($data['service'])) : '';
$message = isset($data['message']) ? strip_tags(trim($data['message'])) : '';

if (empty($name) || empty($email) || empty($message)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Please complete all required fields."]);
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Please enter a valid email address."]);
    exit();
}

// =========================================================================
// 3. SECURE LOCAL LEAD BACKUP (Never lose a single inquiry)
// =========================================================================
$leadData = [
    'timestamp' => date('Y-m-d H:i:s T'),
    'name'      => $name,
    'email'     => $email,
    'phone'     => $phone,
    'service'   => $service,
    'message'   => $message,
    'ip'        => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
];
@file_put_contents(__DIR__ . '/inquiries_backup.log', json_encode($leadData) . PHP_EOL, FILE_APPEND | LOCK_EX);

// =========================================================================
// 4. EMAIL CONTENT
// =========================================================================
$subject = "New Inquiry from Truptyum Foods: " . $name;
$emailContent = "
<html>
<head>
    <title>New Inquiry from Truptyum Foods Contact Form</title>
</head>
<body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
    <div style='max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;'>
        <h2 style='color: #0ba43c; border-bottom: 2px solid #0ba43c; padding-bottom: 10px;'>New Web Inquiry</h2>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> <a href='mailto:{$email}'>{$email}</a></p>
        <p><strong>Phone:</strong> " . (!empty($phone) ? "<a href='tel:{$phone}'>{$phone}</a>" : "Not specified") . "</p>
        <p><strong>Inquiry Sector:</strong> " . ucwords(str_replace('-', ' ', $service)) . "</p>
        <p><strong>Message:</strong></p>
        <div style='background-color: #fff; padding: 15px; border-left: 4px solid #0ba43c; border-radius: 4px;'>
            " . nl2br($message) . "
        </div>
        <hr style='border: 0; border-top: 1px solid #ddd; margin-top: 30px;' />
        <p style='font-size: 0.8rem; color: #888;'>Sent automatically from the Truptyum Foods website contact form.</p>
    </div>
</body>
</html>
";

// =========================================================================
// 5. SIMPLE SMTP CLIENT IMPLEMENTATION
// =========================================================================
class SimpleSmtpMailer {
    private $host;
    private $port;
    private $username;
    private $password;
    private $security;
    private $timeout = 15;
    public  $error   = '';

    public function __construct($host, $port, $username, $password, $security = 'ssl') {
        $this->host     = $host;
        $this->port     = $port;
        $this->username = $username;
        $this->password = $password;
        $this->security = strtolower($security);
    }

    private function getResponse($socket) {
        $data = '';
        while ($str = fgets($socket, 515)) {
            $data .= $str;
            if (strlen($str) >= 4 && substr($str, 3, 1) === ' ') {
                break;
            }
        }
        return $data;
    }

    private function sendCommand($socket, $cmd, $expectedCode) {
        fputs($socket, $cmd . "\r\n");
        $response = $this->getResponse($socket);
        $code = substr($response, 0, 3);
        if ($code != $expectedCode) {
            $this->error = "SMTP Command '{$cmd}' failed. Response: {$response}";
            return false;
        }
        return true;
    }

    public function send($fromEmail, $fromName, $toAddresses, $subject, $htmlBody, $replyToEmail = '', $replyToName = '') {
        $remoteHost = ($this->security === 'ssl' ? 'ssl://' : '') . $this->host;
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ]);

        $errno = 0; $errstr = '';
        $socket = @stream_socket_client($remoteHost . ':' . $this->port, $errno, $errstr, $this->timeout, STREAM_CLIENT_CONNECT, $context);
        if (!$socket) {
            $this->error = "Failed to connect to SMTP server: {$errstr} ({$errno})";
            return false;
        }

        $welcome = $this->getResponse($socket);
        if (substr($welcome, 0, 3) !== '220') {
            $this->error = "Invalid SMTP welcome banner: {$welcome}";
            fclose($socket);
            return false;
        }

        $helloCmd = 'EHLO ' . ($_SERVER['SERVER_NAME'] ?? 'localhost');
        if (!$this->sendCommand($socket, $helloCmd, 250)) {
            $this->sendCommand($socket, 'HELO ' . ($_SERVER['SERVER_NAME'] ?? 'localhost'), 250);
        }

        if (!empty($this->username) && !empty($this->password)) {
            if (!$this->sendCommand($socket, 'AUTH LOGIN', 334)) {
                fclose($socket);
                return false;
            }
            if (!$this->sendCommand($socket, base64_encode($this->username), 334)) {
                fclose($socket);
                return false;
            }
            if (!$this->sendCommand($socket, base64_encode($this->password), 235)) {
                fclose($socket);
                return false;
            }
        }

        if (!$this->sendCommand($socket, 'MAIL FROM:<' . $fromEmail . '>', 250)) {
            fclose($socket);
            return false;
        }

        $recipients = is_array($toAddresses) ? $toAddresses : array_map('trim', explode(',', $toAddresses));
        foreach ($recipients as $rcpt) {
            if (empty($rcpt)) continue;
            if (!$this->sendCommand($socket, 'RCPT TO:<' . $rcpt . '>', 250)) {
                fclose($socket);
                return false;
            }
        }

        if (!$this->sendCommand($socket, 'DATA', 354)) {
            fclose($socket);
            return false;
        }

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= "From: {$fromName} <{$fromEmail}>\r\n";
        $headers .= "To: " . implode(', ', $recipients) . "\r\n";
        if (!empty($replyToEmail)) {
            $headers .= "Reply-To: {$replyToName} <{$replyToEmail}>\r\n";
        }
        $headers .= "Subject: =?UTF-8?B?" . base64_encode($subject) . "?=\r\n";
        $headers .= "Date: " . date('r') . "\r\n";
        $headers .= "X-Mailer: Truptyum-SMTP-Mailer\r\n";

        $messageData = $headers . "\r\n" . preg_replace('/^\./m', '..', $htmlBody) . "\r\n.\r\n";
        fputs($socket, $messageData);

        $dataResp = $this->getResponse($socket);
        if (substr($dataResp, 0, 3) !== '250') {
            $this->error = "DATA submission failed: {$dataResp}";
            fclose($socket);
            return false;
        }

        $this->sendCommand($socket, 'QUIT', 221);
        fclose($socket);
        return true;
    }
}

// =========================================================================
// 6. DISPATCH EMAIL (SMTP with fallback to native mail())
// =========================================================================
$sent = false;

if ($useSmtp && $smtpPass !== "CHANGE_THIS_TO_YOUR_PASSWORD") {
    $mailer = new SimpleSmtpMailer($smtpHost, $smtpPort, $smtpUser, $smtpPass, $smtpSecurity);
    $sent = $mailer->send($smtpUser, "Truptyum Website", $toRecipients, $subject, $emailContent, $email, $name);
}

// Fallback to PHP mail() if SMTP disabled, password not yet filled, or SMTP failed
if (!$sent) {
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "From: Truptyum Website <inquiry@truptyumfoods.com>\r\n";
    $headers .= "Reply-To: {$name} <{$email}>\r\n";
    $headers .= "Return-Path: inquiry@truptyumfoods.com\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    $params = "-finquiry@truptyumfoods.com";

    $sent = @mail($toRecipients, $subject, $emailContent, $headers, $params);
    if (!$sent) {
        $sent = @mail($toRecipients, $subject, $emailContent, $headers);
    }
}

// Return JSON response to frontend
if ($sent) {
    http_response_code(200);
    echo json_encode(["status" => "success", "message" => "Thank you for contacting us. Your message has been sent successfully."]);
} else {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Apologies, something went wrong and we couldn't send your message."]);
}
?>
