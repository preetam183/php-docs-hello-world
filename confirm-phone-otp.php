<?php
include 'conn.php';
if (!empty($_POST)) {
$phone = $_POST['phone'];
$otp = $_POST['phone_otp'];
$query = $conn->prepare("SELECT * FROM phone_numbers WHERE phone = '".$phone."' AND otp = '".$otp."'  ");
$query->execute();
if ($query->rowCount()>0) {
$sql = "UPDATE phone_numbers SET is_verified = 1 WHERE phone = '".$phone."'  ";
if ($conn->query($sql)) {
$messages = array("message"=> 'The phone number has been verified.', "messageType"=>"success");
}
} else {
$messages = array("message"=> 'You have entered incorrect OTP. Try Again', "messageType"=>"error");	
}
 echo json_encode($messages); 

}




?>