<?php 

	include('connectDB.php');

	$phone = $_POST["phone"];
	$gender =  $_POST["gender"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$password = md5($_POST["password"]);

	echo $phone, $gender, $email, $password, $username."<br>";

	$sql = "SELECT * FROM tbl_user WHERE email = '".$email."'";
	$sqlInsert = "INSERT INTO tbl_user (username, email, password, telephone, genderID) VALUES ('".$username."','".$email."','".$password."','".$phone."','".$gender."')";
	
	if ($res = mysqli_query($conn, $sql)) { 
	    if (mysqli_num_rows($res) > 0) {
			//$row = mysqli_fetch_array($res);
			//echo  $row['email'];
	        header('Location: ../login.php');
	    } else { 
			if ($conn->query($sqlInsert) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error1: " . $sqlInsert . "<br>" . $conn->error;
			}
			header('Location: ../home.php');
	    } 
	} else { 
		if ($conn->query($sqlInsert) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error2: " . $sqlInsert . "<br>" . $conn->error;
		}
		header('Location: ../home.php');
	} 

	mysqli_close($conn);

 ?>