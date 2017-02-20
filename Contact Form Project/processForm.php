<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2/15/2017
 * Time: 1:46 PM
 */

$name = $_POST['name'];
$email = $_POST['email'];
$reason = $_POST['reason'];
$comment = $_POST['comment'];
$mailList = $_POST['maillist'];
$moreInfo = $_POST['moreinfo'];

function formatHTMLMessage()
{
    global $name, $email;

    $confirmationMessage = "<p>Thank you for your message, $name.  We will contact you at $email within 48 hours.</p>";

    return $confirmationMessage;
}

function formatEmailMessage()
{
    global $name, $email, $reason, $comment, $mailList, $moreInfo ;
    $emailMessage = "Thank you for contacting us.  The details of your submission are below:\n\r";
    $emailMessage .= "Message From: $name\n";
    $emailMessage .= "Email: $email\n";
    $emailMessage .= "Reason: $reason\n";
    $emailMessage .= "Comment: $comment\n";

    if(isset($mailList)){
        $emailMessage .= "Additional request: $mailList\n";
    }
    if(isset($moreInfo)) {
        $emailMessage .= "Additional request: $moreInfo\n";
    }
    return $emailMessage;
}

function sendEmailMessage()
{
    global $email;

    $to = $email;
    $from = "hello@williambarber.info";
    $subject = "Form Submission";
    $message = wordwrap(formatEmailMessage());
    $header = "From: ".$from;

    if (mail($to, $subject, $message, $header))
    {
        echo formatHTMLMessage();
    }
    else
    {
        echo "You're message was not sent successfully.  Please try again at a later time";
    }
}
?>

<!DOCTYPE html>
<html>
<title>Form submission</title>
<link rel="stylesheet" href="style/contactCSS.css">
<body>
<div>
    <p><?php sendEmailMessage(); ?></p>
</div>
</body>
</html>



