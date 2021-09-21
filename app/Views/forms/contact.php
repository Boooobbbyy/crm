<?php
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $msg = $_POST['msg'];

  $to = 'pandiarianza2000@gmail.com'; // Receiver Email ID, Replace with your email ID
  $subject = 'Kepada PT.ARSI ENARCON' . $subject;
  $message = "Name :" . $name . "\n" . "Wrote the following :" . "\n\n" . $msg;
  $headers = "From: " . $email;

  if (mail($to, $subject, $message, $headers)) {
    echo "<h1>Sent Successfully! Thank you" . " " . $name . ", We will contact you shortly!</h1>";
  } else {
    echo "Something went wrong!";
  }
}
