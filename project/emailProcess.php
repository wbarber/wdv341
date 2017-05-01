<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2/15/2017
 * Time: 1:46 PM
 */

$fName = $_POST['first_name'];
$lName = $_POST['last_name'];
$email = $_POST['email'];
$comment = $_POST['comment'];

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
<head>
<title>Form submission</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class ="container">
    <p><?php sendEmailMessage(); ?></p>

    <p>Return <a href="subjects.php">Home</a> </p>
</div>
</body>
</html>



