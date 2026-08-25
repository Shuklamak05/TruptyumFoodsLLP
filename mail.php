<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Method not allowed. Use POST request."]);
    exit();
}

// Get raw post data
$rawInput = file_get_contents("php://input");
$data = json_decode($rawInput, true);

// If json_decode failed, fallback to standard POST
if (json_last_error() !== JSON_ERROR_NONE) {
    $data = $_POST;
}

$name = isset($data['name']) ? strip_tags(trim($data['name'])) : '';
$email = isset($data['email']) ? filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL) : '';
$phone = isset($data['phone']) ? strip_tags(trim($data['phone'])) : '';
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

// Recipient email address
$to = "sales@truptyumfoods.com";

// Email subject
$subject = "New Inquiry from Truptyum Foods: " . $name;

// Email headers
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "From: Truptyum Foods Web <no-reply@truptyumfoods.com>\r\n";
$headers .= "Reply-To: $name <$email>\r\n";

// HTML Email Body
$emailContent = "
<html>
<head>
    <title>New Inquiry from Truptyum Foods Contact Form</title>
</head>
<body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
    <div style='max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;'>
        <h2 style='color: #0ba43c; border-bottom: 2px solid #0ba43c; padding-bottom: 10px;'>New Web Inquiry</h2>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Phone:</strong> " . (!empty($phone) ? $phone : "Not specified") . "</p>
        <p><strong>Inquiry Sector:</strong> " . ucwords(str_replace('-', ' ', $service)) . "</p>
        <p><strong>Message:</strong></p>
        <div style='background-color: #fff; padding: 15px; border-left: 4px solid #0ba43c; border-radius: 4px;'>
            " . nl2br($message) . "
        </div>
        <hr style='border: 0; border-top: 1px solid #ddd; margin-top: 30px;' />
        <p style='font-size: 0.8rem; color: #888;'>This mail was sent automatically from the Truptyum Foods website contact form backend service.</p>
    </div>
</body>
</html>
";

// Attempt to send email
if (mail($to, $subject, $emailContent, $headers)) {
    http_response_code(200);
    echo json_encode(["status" => "success", "message" => "Thank you for contacting us. Your message has been sent successfully."]);
} else {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Apologies, something went wrong and we couldn't send your message."]);
}
?>
