<?php
/**
 * Truptyum Foods - Mail & Lead Diagnostic Tool
 * Access via: https://www.truptyumfoods.com/mail_test.php
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

$recipient = isset($_GET['to']) ? trim($_GET['to']) : 'sales@truptyumfoods.com';
$sendTest = isset($_GET['send']) && $_GET['send'] === '1';

$testResult = null;
if ($sendTest && filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
    $subject = "Truptyum Foods - Test Email (" . date('H:i:s') . ")";
    $body = "<h2>Test Email from Truptyum Foods Web Server</h2><p>This is a test email sent from the server at " . date('Y-m-d H:i:s T') . ".</p><p>If you see this in your inbox, server mail delivery is functioning properly!</p>";
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "From: Truptyum Website <inquiry@truptyumfoods.com>\r\n";
    $headers .= "Reply-To: sales@truptyumfoods.com\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

    $params = "-finquiry@truptyumfoods.com";
    $success = @mail($recipient, $subject, $body, $headers, $params);
    if (!$success) {
        $success = @mail($recipient, $subject, $body, $headers);
    }
    $testResult = $success ? "SUCCESS: mail() accepted the message for delivery to {$recipient}." : "FAILED: mail() returned false.";
}

// Read inquiries backup log
$logFile = __DIR__ . '/inquiries_backup.log';
$leads = [];
if (file_exists($logFile)) {
    $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines) {
        foreach (array_reverse($lines) as $line) {
            $decoded = json_decode($line, true);
            if ($decoded) {
                $leads[] = $decoded;
            }
        }
    }
}

// MX check
$mxRecords = [];
if (function_exists('getmxrr')) {
    getmxrr('truptyumfoods.com', $mxRecords);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Truptyum Foods - Mail Diagnostics & Leads</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #0b1a13; color: #f0f0f0; padding: 24px; margin: 0; }
        .container { max-width: 900px; margin: 0 auto; background: #13241b; border: 1px solid #1f3d2c; border-radius: 12px; padding: 24px; }
        h1 { color: #0ba43c; margin-top: 0; }
        h2 { color: #f79c00; border-bottom: 1px solid #1f3d2c; padding-bottom: 8px; margin-top: 24px; }
        .card { background: #0c1811; border: 1px solid #1f3d2c; border-radius: 8px; padding: 16px; margin-bottom: 16px; }
        .badge { display: inline-block; padding: 4px 10px; border-radius: 6px; font-weight: bold; font-size: 13px; }
        .badge-success { background: #0ba43c; color: #fff; }
        .badge-error { background: #d32f2f; color: #fff; }
        .badge-info { background: #0288d1; color: #fff; }
        table { width: 100%; border-collapse: collapse; margin-top: 12px; }
        th, td { text-align: left; padding: 10px; border-bottom: 1px solid #1f3d2c; font-size: 14px; }
        th { color: #0ba43c; background: #0a160f; }
        input[type="text"], input[type="email"] { background: #0a160f; border: 1px solid #1f3d2c; color: #fff; padding: 8px 12px; border-radius: 6px; width: 280px; }
        button, a.btn { background: #0ba43c; color: #fff; border: 0; padding: 8px 16px; border-radius: 6px; cursor: pointer; text-decoration: none; display: inline-block; font-weight: bold; }
        button:hover, a.btn:hover { background: #098631; }
        .note { background: #1a2c1f; border-left: 4px solid #f79c00; padding: 12px 16px; border-radius: 4px; margin: 16px 0; }
    </style>
</head>
<body>
<div class="container">
    <h1>Truptyum Foods - Mail System Diagnostics</h1>

    <div class="card">
        <h3>Server Configuration</h3>
        <p><strong>Server Hostname / IP:</strong> <?php echo htmlspecialchars($_SERVER['SERVER_NAME'] . ' (' . $_SERVER['SERVER_ADDR'] . ')'); ?></p>
        <p><strong>PHP mail() Status:</strong> <?php echo function_exists('mail') ? '<span class="badge badge-success">Enabled</span>' : '<span class="badge badge-error">Disabled</span>'; ?></p>
        <p><strong>truptyumfoods.com Public MX:</strong> <?php echo !empty($mxRecords) ? implode(', ', $mxRecords) : 'Google Workspace (smtp.google.com)'; ?></p>
    </div>

    <div class="note">
        <strong>Important for cPanel + Google Workspace:</strong>
        <p>Since your domain emails are hosted on <strong>Google Workspace</strong>, cPanel MUST be set to <strong>Remote Mail Exchanger</strong> in cPanel &rarr; <em>Email Routing</em>. Otherwise, cPanel intercepts sent emails and puts them into cPanel's local Webmail inbox instead of forwarding to Google!</p>
    </div>

    <h2>Send Test Email</h2>
    <div class="card">
        <form method="GET">
            <input type="hidden" name="send" value="1">
            <label for="to">Recipient Email:</label>
            <input type="email" id="to" name="to" value="<?php echo htmlspecialchars($recipient); ?>" required>
            <button type="submit">Send Test Email</button>
        </form>

        <?php if ($testResult): ?>
            <div style="margin-top: 16px; padding: 12px; border-radius: 6px; background: <?php echo strpos($testResult, 'SUCCESS') !== false ? '#0f3d1f' : '#3d0f0f'; ?>;">
                <strong><?php echo htmlspecialchars($testResult); ?></strong>
            </div>
        <?php endif; ?>
    </div>

    <h2>Saved Inquiry Leads (Total: <?php echo count($leads); ?>)</h2>
    <p style="font-size: 13px; color: #a0a0a0;">Every inquiry submitted on the website is safely logged here in real-time, even if mail delivery has a delay.</p>
    <?php if (empty($leads)): ?>
        <p>No leads recorded yet.</p>
    <?php else: ?>
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Service</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (array_slice($leads, 0, 20) as $lead): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($lead['timestamp'] ?? '-'); ?></td>
                            <td><strong><?php echo htmlspecialchars($lead['name'] ?? '-'); ?></strong></td>
                            <td><a href="mailto:<?php echo htmlspecialchars($lead['email'] ?? ''); ?>" style="color: #0ba43c;"><?php echo htmlspecialchars($lead['email'] ?? '-'); ?></a></td>
                            <td><?php echo htmlspecialchars($lead['phone'] ?? '-'); ?></td>
                            <td><?php echo htmlspecialchars($lead['service'] ?? '-'); ?></td>
                            <td><?php echo nl2br(htmlspecialchars($lead['message'] ?? '-')); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
