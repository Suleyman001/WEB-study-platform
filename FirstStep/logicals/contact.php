<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Server-side validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
    } else {
        // Process the form data (without database interaction)
        // For example, you could send an email, log the message, etc.

        // Redirect to a thank you page or display a message
        echo "Message sent successfully.";
    }
}
?>
