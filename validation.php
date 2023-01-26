<?php
include 'conn.php';
if (isset($_POST['email'])) {
$email = $_POST['email'];
$query = $conn->prepare("SELECT * FROM emails WHERE email = '".$email."' AND  is_verified = 1 ");
$query->execute();
if ($query->rowCount()>0) {
echo "verified";
} else {
echo "unverified";
}
}

if (isset($_POST['phone'])) {
$phone = $_POST['phone'];
$query = $conn->prepare("SELECT * FROM phone_numbers WHERE phone = '".$phone."' AND  is_verified = 1 ");
$query->execute();
if ($query->rowCount()>0) {
echo "verified";
} else {
echo "unverified";
}
}


?>