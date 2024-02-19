<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email address from the form
    $email = $_POST["email"];

    // Send a password reset email to the user
    $subject = "Password Reset";
    $message = "To reset your password, click on the following link: https://everydaychef.netlify.app/reset_password.php?email=" . urlencode($email);
    $headers = "From: obaejeoguabasilim@gmail.com";
    
    // Send the email
    if (mail($email, $subject, $message, $headers)) {
        echo "An email with instructions to reset your password has been sent to $email";
    } else {
        echo "Failed to send email. Please try again later.";
    }
}
?>
