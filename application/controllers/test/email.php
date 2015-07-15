<?php defined('SYSPATH') OR die('No direct access allowed.');
class Email_Controller extends Controller {

public function send_promotions($_subject, $_message, $_recipient) {
$swift = email::connect();
 
// From, subject and HTML message
$from    = kohana::config('email.options.username');
 
// Build recipient lists
$recipients = new Swift_RecipientList;
$recipients->addTo('$_recipient');

 
// Build the HTML message
$message = new Swift_Message($_subject, $_message, "text/html");

if ($swift->send($message, $recipients, $from))
{
 echo "<script>alert('Message Sent')</script>"; // Success
}
else
{
 echo "<script>alert('Unable to Send Email')</script>";
  // Failure
}
 
// Disconnect
$swift->disconnect();	}
}
