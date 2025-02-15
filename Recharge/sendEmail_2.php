<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $companyName = $_POST['companyName'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $usersCount = $_POST['usersCount'];
    $transactionID = $_POST['transactionID'];

    // Calculate 2% tax
    $taxRate = 0.02;  // 2%
    $taxAmount = number_format($amount * $taxRate, 2);  // Calculate tax
    $totalAmount = number_format($amount + $taxAmount, 2);  // Total amount including tax

    $to = $email;
    $subject = 'Payment Invoice';
    $cc = 'business@techsaar.in';

    // Generate today's date
    $invoiceDate = date('l, F j, Y g:i:s A');

    // Inline CSS
    $message = "<!DOCTYPE html>
    <html lang=\"en\">
    
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>Invoice #TSINV0235</title>
    </head>
    
    <body style=\"font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f8f9fa;\">
        <div style=\"max-width: 800px; margin: 0 auto; padding: 20px; background: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);\">
            <img src=\"https://ezdial.techsaar.in/Recharge/invoice_banner.png\" style=\"height: 200px;\" alt=\"\">
    
            <div style=\"display: flex; align-items: center; margin-bottom: 20px; margin-top: 20px;\">
                <div>
                    <h1 style=\"font-size: 24px; margin: 0; color: rgba(0, 0, 0, 0.838);\">Bill To</h1>
                    <span style=\"display: block; margin: 10px 0; border-top: 1px solid #dee2e6;\"></span>
                    <h2 style=\"font-size: 20px; margin: 0;\">$companyName</h2>
                    <p style=\"margin: 5px 0;\">$address</p>
                    <p style=\"margin: 5px 0;\">$email</p>
                    <p style=\"font-weight: 700; margin: 5px 0;\"> <span style=\"font-weight: 700;\">Invoice No:</span>&nbsp;#$transactionID</p>
                    <p style=\"font-weight: 700; margin: 5px 0;\"><span style=\"font-weight: 700;\">Invoice Date:</span>&nbsp;$invoiceDate</p>
                </div>
                <div style=\"gap: 4px;\">
                    <img src=\"https://ezdial.techsaar.in/Recharge/ts_logo.png\" style=\"display:flex;justify-content:flex-end\" width=\"300px\" alt=\"Techsaar Logo\">
                    <p style=\"text-align: end; margin: 0;\">www.techsaar.in</p>
                    <p style=\"text-align: end; margin: 0;\">Sahastradhara Road, Dehradun - 248008, Uttarakhand, India</p>
                    <p style=\"text-align: end; margin: 0;\">business@techsaar.in, kumarvansh@techsaar.in</p>
                    <p style=\"text-align: end; margin: 0;\">7536001034</p>
                </div>
            </div>
    
            <table style=\"width: 100%; border-collapse: collapse; margin-bottom: 20px;\">
                <thead>
                    <tr>
                        <th style=\"border: 1px solid #dee2e6; padding: 10px; text-align: left; background-color: #000000; color: white;\">Description</th>
                        <th style=\"border: 1px solid #dee2e6; padding: 10px; text-align: center; background-color: #000000; color: white;\">Total Users</th>
                        <th style=\"border: 1px solid #dee2e6; padding: 10px; text-align: center; background-color: #000000; color: white;\">Price</th>
                        <th style=\"border: 1px solid #dee2e6; padding: 10px; text-align: center; background-color: #000000; color: white;\">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style=\"border: 1px solid #dee2e6; padding: 10px; text-align: left;\">Ez Dial - Outbound Auto Dialler Users</td>
                        <td style=\"border: 1px solid #dee2e6; padding: 10px; text-align: center;\">$usersCount</td>
                        <td style=\"border: 1px solid #dee2e6; padding: 10px; text-align: center;\">300.00</td>
                        <td style=\"border: 1px solid #dee2e6; padding: 10px; text-align: center;\">$amount</td>
                    </tr>
                    <tr>
                        <td colspan=\"3\" style=\"border: 1px solid #dee2e6; padding: 10px; text-align: left;\"><strong>SUBTOTAL</strong></td>
                        <td style=\"border: 1px solid #dee2e6; padding: 10px; text-align: center;\">$amount</td>
                    </tr>
                    <tr>
                        <td colspan=\"3\" style=\"border: 1px solid #dee2e6; padding: 10px; text-align: left;\"><strong>TAX RATE</strong></td>
                        <td style=\"border: 1px solid #dee2e6; padding: 10px; text-align: center;\">2.00%</td>
                    </tr>
                    <tr>
                        <td colspan=\"3\" style=\"border: 1px solid #dee2e6; padding: 10px; text-align: left;\"><strong>TOTAL TAX</strong></td>
                        <td style=\"border: 1px solid #dee2e6; padding: 10px; text-align: center;\">$taxAmount</td>
                    </tr>
                    <tr>
                        <td colspan=\"3\" style=\"border: 1px solid #dee2e6; padding: 10px; text-align: left;\"><strong>Balance Due</strong></td>
                        <td style=\"border: 1px solid #dee2e6; padding: 10px; text-align: center;\">$totalAmount</td>
                    </tr>
                </tbody>
            </table>
    
            <div style=\"margin-bottom: 20px;\">
                <h2 style=\"font-size: 20px; margin: 0;\">Terms & Instructions</h2>
                <p style=\"margin: 5px 0;\">1. Subscription Renewal: The EZ Dial subscription will automatically renew at the end of each billing cycle unless cancelled prior to the renewal date.</p>
                <p style=\"margin: 5px 0;\">2. User Limit: The subscription grants access for up to 10 users. Additional users may require an upgrade in the subscription plan.</p>
                <p style=\"margin: 5px 0;\">3. Billing Cycle: Invoices are generated on a monthly basis, with payment due within 7 days of invoice receipt.</p>
                <p style=\"margin: 5px 0;\">4. Cancellation Policy: Cancellations must be requested at least 7 days before the next billing cycle.</p>
            </div>
        </div>
    </body>
    
    </html>";

    // To send HTML mail, the Content-type header must be set
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "Cc: $cc" . "\r\n";  // Add CC header here
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
?>
