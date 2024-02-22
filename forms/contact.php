<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
        // Set recipient email address
        $to = 'recipient@example.com'; // Replace with your email address

        // Extract form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        // Construct email headers
        $headers = "From: $name <$email>" . "\r\n";
        $headers .= "Reply-To: $email" . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8" . "\r\n";

        // Send email
        if (mail($to, $subject, $message, $headers)) {
            echo "OK"; // Email sent successfully
        } else {
            echo "Error: Failed to send email."; // Error message if email failed to send
        }
    } else {
        echo "Error: All fields are required."; // Error message if not all fields are set
    }
} else {
    echo "Error: Invalid request."; // Error message for invalid request method
}
?>
