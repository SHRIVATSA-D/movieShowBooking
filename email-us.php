<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Email Us</title>
</head>
<body>
<div class="wrapper centered">
<form action="" method="post">
<article class="letter">
<div class="side">
<h1>Email Us</h1> <br> <br>

<p>
<input type="text" style="text-align: left;" name="sub" id="sub"
placeholder="Your Subject">
<br>
<textarea placeholder="Your message" id="msg" name="msg"></textarea>
</p>
</div>
<div class="side">
<br><br><br>
<p>
<input type="text" placeholder="receiver name" name="sname">
</p>
<p>
<input type="email" placeholder="receiver mail" name="email">
</p>
<p>
<button id="sendLetter" name="send" style="height:
30px;"><span>Send</span></button>
</p>
</div>
</article>
</form>

<div class="envelope front"></div>
<div class="envelope back"></div>
</div>
</body>
<script>
function addClass() {
document.body.classList.add("sent");
}
sendLetter.addEventListener("click", addClass);
</script>
</html>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if (isset($_POST['send']))
{

$sub = $_POST['sub'];
$msg = $_POST['msg'];
$sname = $_POST['sname'];
$email = $_POST['email'];
//Load Composer's autoloader
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);
try {
//Server settings
$mail->isSMTP(); //Send using SMTP
$mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
$mail->SMTPAuth = true; //Enable SMTP authentication
$mail->Username = 'twisha.ahuja@somaiya.edu'; //SMTP username
$mail->Password = 'vcoj kmfc bwee hixv'; //SMTP password

$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
$mail->Port = 465; 
//Recipients
$mail->setFrom('twisha.ahuja@somaiya.edu', 'email');
$mail->addAddress($email, $sname); 
//Content
$mail->isHTML(true); //Set email format to HTML
$mail->Subject = $sub;
$mail->Body = $msg;
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
$mail->send();
echo 'Message has been sent';
} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>