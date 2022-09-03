<?php
session_start();
require '../_database/database.php';
$sql="SELECT user_email FROM user";
$result=mysqli_query($database,$sql) or die(mysqli_error($database));
$num_row = mysqli_num_rows($result);
if ($result->num_rows > 0) {
	$numero=0;
	while($row = $result -> fetch_assoc()) {
		$arrayJS[]=$row;
		$email[]=$row["user_email"];
		echo($email[$numero]);
		/*
		$to = $email[$numero];
		$subject = "Shareconnected";
		
		$message = "
		<html>
		<head>
		<title>Shareconnected</title>
		</head>
		<body>
		<div><img src='http://www.shareconnected.com/community/email/e-mail.png' alt='' style='margin: 0 auto; width: 100% !important; height: auto;'></div>
		</body>
		</html>
		";
		
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		// More headers
		$headers .= 'From: <info@shareconnected.com>' . "\r\n";
		$headers .= 'Cc: info@shareconnected.com' . "\r\n";
		
		mail($to,$subject,$message,$headers);
		$numero++;
		*/
	}
}
?>