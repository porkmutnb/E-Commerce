<?php 

	include('../connectDB.php');

	$name = $_POST["name"];
	$detail1 = $_POST["detail1"];
	$detail2 = $_POST["detail2"];
	$detail3 = $_POST["detail3"];
	$detail4 = $_POST["detail4"];
	$detail5 = $_POST["detail5"];
	$cate = $_POST["cate"];
	$price = $_POST["price"];
	$statusImage = $_POST["statusImage"];
	$id = $_POST["id"];
	$updateDetail = $_POST["updateDetail"];

	$detail = array($detail1, $detail2, $detail3, $detail4, $detail5);

	if ($statusImage == "true") {
		$target_path = "data-images/";
		$target_path = $target_path.basename($_FILES["file"]["name"]);

		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_path)) {
			$path = "http://192.168.64.2/arefriend/controller/backoffice/";
			$sqlInsert = "UPDATE tbl_product 
						  SET image = '".$path.$target_path."' 
						  WHERE productID = ".$id."";
			mysqli_query($conn, $sqlInsert);
			echo $sqlInsert;
		}
	}
	$sql = "SELECT * FROM tbl_product WHERE productID = ".$id."";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if ($row["name"] != $name) {
				$sqlInsertName = "UPDATE tbl_product SET name = '".$name."' WHERE productID = ".$id."";
				$insertName = mysqli_query($conn, $sqlInsertName);
			}
			if ($row["productTypeID"] != $cate) {
				$sqlInsertType = "UPDATE tbl_product SET productTypeID = '".$cate."' WHERE productID = ".$id."";
				$insertName = mysqli_query($conn, $sqlInsertType);
			}
			if ($row["price"] != $price) {
				$sqlInsertPrice = "UPDATE tbl_product SET price = '".$price."' WHERE productID = ".$id."";
				$insertPrice = mysqli_query($conn, $sqlInsertPrice);
			}
		}
	}
	if ($updateDetail == 0) {
		echo "updateDetail = 0";
	}else{
		$sqlDelete = "DELETE FROM tbl_product_detail WHERE productID = ".$id."";
		mysqli_query($conn, $sqlDelete);
		echo "<br>".$sqlDelete."<br>";

		foreach ($detail as $key => $value) {
			if ($value != "") {
				$sqlInsertDetail = "INSERT INTO tbl_product_detail (productID,detail)
									VALUES ('".$id."','".$value."')";
				if ($conn->query($sqlInsertDetail) === TRUE) {
				    echo "New record created successfully";
				} else {
				    echo "Error: " . $sqlInsertDetail . "<br>" . $conn->error;
				}
			}
		}
	}
	header('Location: ../../backoffice/productdetail.php?id='.$id.'');

?>






