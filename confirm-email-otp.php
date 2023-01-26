<?php
include 'conn.php';
if (!empty($_POST)) {
$email = $_POST['email'];
$otp = $_POST['email_otp'];
$query = $conn->prepare("SELECT * FROM emails WHERE email = '".$email."' AND otp = '".$otp."'  ");
$query->execute();
if ($query->rowCount()>0) {
$sql = "UPDATE emails SET is_verified = 1 WHERE email = '".$email."'  ";
if ($conn->query($sql)) {
$messages = array("message"=> 'The email has been verified.', "messageType"=>"success");
}
} else {
$messages = array("message"=> 'You have entered incorrect OTP. Try Again', "messageType"=>"error");	
}
echo json_encode($messages);

}




?>