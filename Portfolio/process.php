<?php

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Get form data
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
  $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
  $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

  // Basic validation (optional, improve as needed)
  if (empty($name) || empty($email) || empty($message)) {
    $error_message = "Please fill out all required fields.";
  } else if (!$email) {
    $error_message = "Please enter a valid email address.";
  } else {

    // Send email (replace with your details and preferred method)
    $to = 'satyaadd22@example.com'; // Replace with your recipient email
    $subject = 'Website Contact Form: ' . $subject;
    $body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message";
    $headers = 'From: ' . $email . "\r\n";

    if (mail($to, $subject, $body, $headers)) {
      $success_message = "Thank you for contacting us! We will get back to you soon.";
    } else {
      $error_message = "There was an error sending your message. Please try again later.";
    }
  }
}

?>
