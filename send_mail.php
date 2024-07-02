<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["message" => "Invalid email format"]);
        exit;
    }

    // Set recipient email address
    $to = "vanshkumar.mail@gmail.com"; // Replace with your email address

    // Set email headers
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Format email message
    $fullMessage = "<html><body>";
    $fullMessage .= "<h2>Contact Form Submission</h2>";
    $fullMessage .= "<p><strong>Email:</strong> {$email}</p>";
    $fullMessage .= "<p><strong>Subject:</strong> {$subject}</p>";
    $fullMessage .= "<p><strong>Message:</strong></p>";
    $fullMessage .= "<p>{$message}</p>";
    $fullMessage .= "</body></html>";

    // Send email
    if (mail($to, $subject, $fullMessage, $headers)) {
        echo json_encode(["message" => "Message sent successfully!"]);
    } else {
        echo json_encode(["message" => "Failed to send message."]);
    }
} else {
    echo json_encode(["message" => "Invalid request method."]);
}
?>
