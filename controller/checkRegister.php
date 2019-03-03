<?php 

	include('connectDB.php');

	$checkEmail = false;

	$sql = "select email from tbl_user where email = '".$_POST["user"]."'";
	$result = mysqli_query($conn, $sql);

	// echo $sql;

	if (mysqli_num_rows($result) > 0) {
		$checkEmail = true;
		echo "true";
	}else{
		$checkEmail = false;
		echo "false";
	}
 ?>