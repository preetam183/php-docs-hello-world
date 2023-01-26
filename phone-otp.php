<?php
include 'conn.php';
include 'functions.php';
if (isset($_POST['phone'])) {
$phone = $_POST['phone'];
$created_at = date('Y-m-d H:i:s');
$otp = generateNumericOTP(4);
$query = $conn->prepare("SELECT * FROM phone_numbers WHERE phone = '".$phone."'");
$query->execute();
if ($query->rowCount()>0) {
$sql = "UPDATE phone_numbers SET otp = '".$otp."',created_at = '".$created_at."' WHERE phone = '".$phone."'  ";
} else {
$sql = "INSERT INTO phone_numbers (phone,otp,created_at) VALUES ('".$phone."','".$otp."','".$created_at."')";

}
if ($conn->query($sql)) {
$json = file_get_contents('https://api.textlocal.in/send/?apiKey=NTM1NTMzNzUzNjY0Mzc0MTUzNzgzMzM5NzE1YTRlNmI=&sender=KAIGEN&numbers='.$phone.'&message=Hi,%20Thankyou%20for%20registering%20for%20TOFAS.%20The%20OTP%20is%20'.$otp.'.%n%20%nWhiterain');

echo $json;


}

}



?>