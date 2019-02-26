<?php 

	include('connectDB.php');

	$phone = $_POST["phone"];
	$gender =  $_POST["gender"];
	$age = $_POST["age"];
	$email = $_POST["email"];
	$password = md5($_POST["password"]);
	$policy = $_POST["policy"];

	$date = new DateTime($age);
	$age = $date->format('Y-m-d');

	echo $phone, $gender, $age, $email, $password, $policy;

	$sql = "insert into tbl_user (genderID, email, password, age, status, phone)
			values ('".$gender."', '".$email."', '".$password."', '".$age."', 'user' '".$phone."' )";

	echo $sql;
	$result = mysqli_query($conn, $sql);

	header('Location: ../home.php');

	mysqli_close($conn);

 ?>