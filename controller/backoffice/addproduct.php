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

	$detail = array($detail1, $detail2, $detail3, $detail4, $detail5);

	$target_path = "data-images/";
	$target_path = $target_path.basename($_FILES["file"]["name"]);

	if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_path)) {
		$path = "http://192.168.64.2/arefriend/controller/backoffice/";
		$sqlInsert = "insert into tbl_product (productTypeID, name, price, image) 
				values('".$cate."','".$name."','".$price."','".$path.$target_path."')";
		mysqli_query($conn, $sqlInsert);

		$sqlID = "select * from tbl_product where name = '".$name."'";
		$queryID = mysqli_query($conn, $sqlID);

		$id = "";

		if ($queryID->num_rows > 0) {
			while($row = $queryID->fetch_assoc()) {
				$id = $row["productID"]."<br>";
				echo $row["productID"]."<br>";
			}
		}

		foreach ($detail as $key => $value) {
			if ($value != "") {
				$sqlInsertDetail = "insert into tbl_product_detail (productID,detail)
				values ('".$id."','".$value."')";
				if ($conn->query($sqlInsertDetail) === TRUE) {
				    echo "New record created successfully";
				} else {
				    echo "Error: " . $sqlInsertDetail . "<br>" . $conn->error;
				}
			}
		}
		header('Location: ../../backoffice/manageproducts.php');
	}
 ?>