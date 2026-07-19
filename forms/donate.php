<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone"]));
    $country = strip_tags(trim($_POST["country"]));
    $amount = strip_tags(trim($_POST["amount"]));
    $payment_method = strip_tags(trim($_POST["payment_method"]));
    $frequency = strip_tags(trim($_POST["frequency"]));
    $message = strip_tags(trim($_POST["message"]));

    $recipient = "walkerfoot3@gmail.com";
    $subject = "New Donation Request from SL Mariners FC Website";

    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n";
    $email_content .= "Country: $country\n";
    $email_content .= "Donation Amount: \$$amount USD\n";
    $email_content .= "Payment Method: $payment_method\n";
    $email_content .= "Frequency: $frequency\n";
    $email_content .= "\nMessage:\n$message\n";

    $email_headers = "From: $name <$email>\r\n";
    $email_headers .= "Reply-To: $email\r\n";

    if (mail($recipient, $subject, $email_content, $email_headers)) {
        http_response_code(200);
        echo "Thank you! Your donation request has been sent. We will contact you soon.";
    } else {
        http_response_code(500);
        echo "Oops! Something went wrong. Please try again later.";
    }
} else {
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>
