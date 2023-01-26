<?php 
// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP; 
use PHPMailer\PHPMailer\Exception; 
 
// Include library files 
require 'PHPMailer/Exception.php'; 
require 'PHPMailer/PHPMailer.php'; 
require 'PHPMailer/SMTP.php'; 
 
// Create an instance; Pass `true` to enable exceptions 
$mail = new PHPMailer; 
 
// Server settings 
//$mail->SMTPDebug = 1;    //Enable verbose debug output 
//$mail->isSMTP();                            // Set mailer to use SMTP 
$mail->Host = 'smtp.office365.com';
$mail->SMTPAuth = true;
$mail->Port = 587;
$mail->Username = 'verification@kaigenit.com';
$mail->Password = 'Kaigenit2022$';
$mail->SMTPSecure = 'ssl'; 

// Sender info 
$mail->setFrom('noreply@247kaigenit.com');  

?>