<?php
include 'conn.php';
include 'functions.php';
include 'smtp.php';
if (!empty($_POST)) {
$kids = $_POST['kids'];	
$email = $_POST['email'];	
$phone = $_POST['phone'];	
$phone = "+91".$phone;
$pinCode = $_POST['pinCode'];
$state = $_POST['state'];
$city = $_POST['city'];
$created_at = date('Y-m-d H:i:s');

$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$last_name = $_POST['last_name'];
$dob = $_POST['dob'];
$grade = $_POST['grade'];
$school = $_POST['school'];

$first_name_2 = $_POST['first_name_2'];
$middle_name_2 = $_POST['middle_name_2'];
$last_name_2 = $_POST['last_name_2'];
$dob_2 = $_POST['dob_2'];
$grade_2 = $_POST['grade_2'];
$school_2 = $_POST['school_2'];

$query = $conn->prepare("SELECT * FROM student_forms WHERE email = '".$email."' OR phone = '".$phone."' ");
$query->execute();
if ($query->rowCount()>0) {
$messages = array("message"=> 'You have been already registered by same email/phone number. Try Again!', "messageType"=>"error");
echo json_encode($messages);
} else {
$sql = "INSERT INTO student_forms (kids,email,phone,pinCode,state,city,created_at) VALUES ('".$kids."','".$email."','".$phone."','".$pinCode."','".$state."','".$city."','".$created_at."') ";

if ($conn->query($sql)) {
$LAST_ID = $conn->lastInsertId();
$sql2 = "INSERT INTO student_info (first_name,middle_name,last_name,dob,grade,school,student_form_id_fk) VALUES ('".ucwords($first_name)."','".ucwords($middle_name)."','".ucwords($last_name)."','".$dob."','".ucwords($grade)."','".ucwords($school)."','".$LAST_ID."') ";
$conn->query($sql2);

if ($kids == 2) {
$sql3 = "INSERT INTO student_info (first_name,middle_name,last_name,dob,grade,school,student_form_id_fk) VALUES ('".ucwords($first_name_2)."','".ucwords($middle_name_2)."','".ucwords($last_name_2)."','".$dob_2."','".ucwords($grade_2)."','".ucwords($school_2)."','".$LAST_ID."') ";
$conn->query($sql3);
}

$mail->addAddress($email); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = 'Acknowledgment of Registration for TOFAS test'; 
 
// Mail body content 
$bodyContent = '<h3>Hi,'.$email.'</h3><br><br>'; 
$bodyContent .= '<p>You have been successfully registered for the TOFAS test.</p><br><br>'; 
$bodyContent .= '<p>Thanks,</p>';
$bodyContent .= '<p>Kaigen IT.</p>';
// if ($is_holiday == 1) {
// $bodyContent .= '<p>Holiday?: <b>Yes</b></p>'; 
// }
// if ($is_overdue == 1) {
// $bodyContent .= '<p>Overtime?: <b>Yes</b></p>'; 
// } 

$mail->Body    = $bodyContent; 
$mail->send();
$messages = array("message"=> 'You have been successfully registered for the TOFAS test.', "messageType"=>"success");
    echo json_encode($messages);
}	


}

}

?>