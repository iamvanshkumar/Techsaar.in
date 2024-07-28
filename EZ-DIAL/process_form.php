<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $company = $_POST['company'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Recipient email address
    $to = 'vanshkumar.mail@gmail.com'; // Replace with your email address

    // Email subject
    $email_subject = "New Form Submission: $subject";

    // Email body
    $email_body = "You have a demo request From:\n\n".
                  "Name: $name\n".
                  "Company: $company\n".
                  "Phone: $number\n".
                  "Email: $email\n".
                  "Subject: $subject\n".
                  "Message:\n$message";

    // Email headers
    $headers = "From: demo@techsaar.co.in\n"; // Replace with your domain
    $headers .= "Reply-To: $email";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        $response = ['status' => 'success', 'message' => 'Form submitted successfully!'];
    } else {
        $response = ['status' => 'error', 'message' => 'Form submission failed!'];
    }

    echo json_encode($response);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method!']);
}
?>
