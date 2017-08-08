<?php
require 'PHPMailerAutoload.php';
require("class.PHPMailer.php");

$mail = new PHPMailer();
$mail->Port = 587;
$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "smtp.google.com";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "thebiggestplayboy@gmail.com";  // SMTP username
$mail->Password = "upendrajitendra"; // SMTP password

$mail->From = "thebiggestplayboy@gmail.com";
$mail->FromName = "UmcMills";
$mail->AddAddress("upendrasingh370@gmail.com", "upendra singh");//recipient
$mail->AddAddress("ellen@example.com");                  // name is optional
$mail->AddReplyTo("thebiggestplayboy@gmail.com", "Information");

$mail->WordWrap = 50;                                 // set word wrap to 50 characters
$mail->AddAttachment("");         // add attachments
$mail->AddAttachment("");    // optional name
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Here is the subject";
$mail->Body    = "This is the HTML message body <b>in bold!</b>";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";
?>