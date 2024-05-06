<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form fields
    $fullName = isset($_POST['fullName']) ? $_POST['fullName'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    if (empty($fullName) || empty($email)) {
        // Handle missing fields
        echo "Please fill out all required fields.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email
        echo "Invalid email address.";
        exit;
    }

    // Prepare email content
    $to = 'jerby52153@gmail.com';
    $subject = 'New Gym Membership Registration';
    $message = 'Name: ' . $fullName . "\r\n" .
               'Email: ' . $email;

    // Send email
    if (mail($to, $subject, $message)) {
        // Redirect to thank you page if email sent successfully
        header('Location: thank_you.html');
        exit;
    } else {
        // Handle email sending failure
        echo "Failed to send email. Please try again later.";
        exit;
    }
}
?>
