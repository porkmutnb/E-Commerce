<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "admin_arefriend";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $db);

	// Check connection
	if ($conn) {
		// echo "Connected successfully",  "<br>";
	}else{
		// echo "Connection failed: " . mysqli_connect_error(), "<br>";
	}

	mysqli_query($conn,"SET NAMES UTF8");

 ?>