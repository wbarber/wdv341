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

    $confirmationMessage = "<p>Thank you $name for your message.  We will contact you at $email within 48 hours.</p>";

    return $confirmationMessage;
}

function formatEmailMessage()
{
    global $name, $reason;
    $emailMessage = "Thank you for your message, $name, regarding $reason.";

    return $emailMessage;
}

function sendEmailMessage()
{
    global $email;

    $to = $email;
    $from = "hello@williambarber.info";
    $subject = "Form Submission";
    $message = formatHTMLMessage();
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
<body>
    <?php sendEmailMessage(); ?>
</body>
</html>



