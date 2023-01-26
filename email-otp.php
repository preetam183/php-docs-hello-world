<?php
include 'conn.php';
include 'functions.php';
include 'smtp.php';
if (isset($_POST['email'])) {
$email = $_POST['email'];
$created_at = date('Y-m-d H:i:s');
$otp = generateNumericOTP(6);
$query = $conn->prepare("SELECT * FROM emails WHERE email = '".$email."'");
$query->execute();
if ($query->rowCount()>0) {
$sql = "UPDATE emails SET otp = '".$otp."',created_at = '".$created_at."' WHERE email = '".$email."'  ";
} else {
$sql = "INSERT INTO emails (email,otp,created_at) VALUES ('".$email."','".$otp."','".$created_at."')";

}
if ($conn->query($sql)) {
$mail->addAddress($email); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = 'OTP to verify your email address for TOFAS test'; 
 
// Mail body content 
$bodyContent = '<h3>Hi '.$email.'</h3><br><br>'; 
$bodyContent .= '<p>Thankyou for registering for the TOFAS test.</p>'; 
$bodyContent .= '<p>Please use the OTP: <'.$otp.'> to verify your email.</p><br><br>'; 
$bodyContent .= '<p>Thanks,</p>';
$bodyContent .= '<p>Kaigen IT.</p>';
// if ($is_holiday == 1) {
// $bodyContent .= '<p>Holiday?: <b>Yes</b></p>'; 
// }
// if ($is_overdue == 1) {
// $bodyContent .= '<p>Overtime?: <b>Yes</b></p>'; 
// } 

$mail->Body    = $bodyContent; 

if(!$mail->send()) { 
	$messages = array("message"=> 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo, "messageType"=>"error");
    echo json_encode($messages); 
} else { 
	$messages = array("message"=> 'An OTP has been sent to your email. Please check and verify.', "messageType"=>"success");
    echo json_encode($messages);
}

}

}



?>