<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $companyName = $_POST['companyName'];
    $email = $_POST['email'];
    $activationKey = $_POST['activationKey'];

    $to = $email;
    $subject = 'Payment ';
    $cc = 'business@techsaar.in';

    // Inline CSS
    $message = "<html>
    <body style='font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0;'>
        <div style='display: flex;align-items: center; justify-content: center; padding: 3rem; height: 100%; height: 420px; margin: auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);'>
            <div>
                <h1 style='text-align: center; font-size: 54px; margin: 0;'>THANK YOU!!</h1>
                <h2 style='text-align: center; font-size: 24px; margin: 0;'>{$companyName}</h2>
                <img src='https://ezdial.techsaar.in/assets/img/icons/confetti.gif' alt='icon' style='display: flex; justify-content: center; width: 50%; margin: auto'>
                <h2 style='text-align: center; font-size: 24px; margin: 0;'>FOR CHOOSING EZDIAL </h2>
            </div>
            <div style='text-align: center;'>
                <h3 style='color: #10b981; font-size: 38px; font-weight: 600; text-align: center; margin: 1rem 0;'>
                    Payment Successfully Completed
                </h3>
                <h4 style='color: #374151; margin: 0.5rem 0;font-size:20px'>Here is your activation key</h4>
                <p id='key' style='font-size: xx-large;font-weight:600;padding: 4px;text-align: center; border: 2px solid yellow;background: #ffe600;'>
                    $activationKey</p>
                <p style='padding-top: 1rem; font-size: 0.75rem; text-align: center; color: #9ca3af;'>Note: Your invoice will be sent to you via email within 24 hours. If you have any questions or require assistance, please do not hesitate to contact us at +91 7536001034.</p>
                <a href='https://techsaar.in/' target='_blank' style='text-decoration: none; color: #000000;'>Team
                    techsaar.in</a>
            </div>
        </div>
    </body>
    </html>
    ";

    // To send HTML mail, the Content-type header must be set
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "Cc: $cc" . "\r\n";  // Add CC header here


    // Additional headers
    $headers .= 'From: no-reply@techsaar.in' . "\r\n";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send email']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
