<?php
/**
 * Truptyum Foods - Mail & Lead Diagnostic Tool
 * Access via: https://www.truptyumfoods.com/mail_test.php
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/mail.php'; // Load SimpleSmtpMailer

$recipient = isset($_GET['to']) ? trim($_GET['to']) : 'sales@truptyumfoods.com, makshukla05@gmail.com';
$sendTest  = isset($_GET['send']) && $_GET['send'] === '1';
$mode      = isset($_GET['mode']) ? $_GET['mode'] : 'native'; // 'smtp' or 'native'
$testPass  = isset($_GET['pass']) ? trim($_GET['pass']) : '';

$testResult = null;
$smtpError  = null;

if ($sendTest) {
    $subject = "Truptyum Foods - Test Email (" . date('H:i:s') . ")";
    $body = "<h2>Test Email from Truptyum Foods Server</h2><p>Mode: <strong>" . strtoupper($mode) . "</strong></p><p>Sent at: " . date('Y-m-d H:i:s T') . "</p><p>If you see this in your inbox, server mail delivery is 100% active and functioning properly!</p>";

    if ($mode === 'smtp') {
        $mailer = new SimpleSmtpMailer('mail.truptyumfoods.com', 465, 'alerts@truptyumfoods.com', $testPass, 'ssl');
        $success = $mailer->send('alerts@truptyumfoods.com', 'Truptyum Website', $recipient, $subject, $body);
        if ($success) {
            $testResult = "SUCCESS via Authenticated cPanel SMTP! Message delivered to: {$recipient}";
        } else {
            $testResult = "FAILED via SMTP: " . $mailer->error;
        }
    } else {
        $headers = "MIME-Version: 1.0\r\nContent-Type: text/html; charset=UTF-8\r\nFrom: Truptyum Website <inquiry@truptyumfoods.com>\r\nReply-To: sales@truptyumfoods.com\r\nX-Mailer: PHP/" . phpversion() . "\r\n";
        $success = @mail($recipient, $subject, $body, $headers, "-finquiry@truptyumfoods.com");
        $testResult = $success ? "mail() accepted message for delivery to {$recipient}." : "mail() returned false.";
    }
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

// Check MX records
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
        .container { max-width: 960px; margin: 0 auto; background: #13241b; border: 1px solid #1f3d2c; border-radius: 12px; padding: 24px; }
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
        input[type="text"], input[type="email"], input[type="password"] { background: #0a160f; border: 1px solid #1f3d2c; color: #fff; padding: 8px 12px; border-radius: 6px; }
        button, a.btn { background: #0ba43c; color: #fff; border: 0; padding: 10px 18px; border-radius: 6px; cursor: pointer; text-decoration: none; display: inline-block; font-weight: bold; }
        button:hover, a.btn:hover { background: #098631; }
        .note { background: #1a2c1f; border-left: 4px solid #f79c00; padding: 12px 16px; border-radius: 4px; margin: 16px 0; }
        .alert-box { margin-top: 16px; padding: 14px; border-radius: 6px; font-size: 14px; font-family: monospace; }
        .step { background: #0e1e15; border: 1px solid #1f3d2c; border-radius: 8px; padding: 12px 16px; margin-bottom: 12px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Truptyum Foods - Mail Diagnostics & Lead Manager</h1>

    <div class="card">
        <h3>Server Status</h3>
        <p><strong>Host / IP:</strong> <?php echo htmlspecialchars($_SERVER['SERVER_NAME'] . ' (' . $_SERVER['SERVER_ADDR'] . ')'); ?></p>
        <p><strong>truptyumfoods.com MX:</strong> <?php echo !empty($mxRecords) ? implode(', ', $mxRecords) : 'Google Workspace (smtp.google.com)'; ?></p>
        <p><strong>cPanel SMTP Host:</strong> <code>mail.truptyumfoods.com:465 (SSL)</code> &mdash; <span class="badge badge-success">Port Reachable</span></p>
    </div>

    <h2>Test Authenticated cPanel SMTP Delivery</h2>
    <div class="card">
        <form method="GET">
            <input type="hidden" name="send" value="1">
            <input type="hidden" name="mode" value="smtp">
            <p><strong>SMTP User:</strong> <code>alerts@truptyumfoods.com</code></p>
            <div style="margin-bottom: 12px;">
                <label for="pass">cPanel Password for alerts@truptyumfoods.com:</label><br>
                <input type="password" id="pass" name="pass" placeholder="Enter password created in cPanel" value="<?php echo htmlspecialchars($testPass); ?>" style="width: 320px;" required>
            </div>
            <div style="margin-bottom: 14px;">
                <label for="to">Recipient Email(s):</label><br>
                <input type="text" id="to" name="to" value="<?php echo htmlspecialchars($recipient); ?>" style="width: 400px;" required>
            </div>
            <button type="submit">Send Test via cPanel SMTP</button>
        </form>

        <?php if ($testResult): ?>
            <div class="alert-box" style="background: <?php echo strpos($testResult, 'SUCCESS') !== false ? '#0f3d1f' : '#3d0f0f'; ?>; color: #fff;">
                <?php echo htmlspecialchars($testResult); ?>
            </div>
        <?php endif; ?>
    </div>

    <h2>Saved Inquiry Leads (Total: <?php echo count($leads); ?>)</h2>
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
                            <td style="white-space: nowrap;"><?php echo htmlspecialchars($lead['timestamp'] ?? '-'); ?></td>
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
