<?php 
	include('../connectDB.php');

	header("Content-Type: application/json; charset=UTF-8");

	$obj = json_decode($_GET["x"], false);

	if ($obj->name == "backofficecontroller"){
		$a = array();
		$stmt = $conn->prepare("SELECT tbl_product.productID, tbl_product_detail.detail, tbl_product.name, 						tbl_product.image, tbl_product.price, tbl_product_type.nameTH
								FROM tbl_product
								INNER JOIN tbl_product_detail ON tbl_product_detail.productID = tbl_product.productID
								INNER JOIN tbl_product_type ON tbl_product_type.productTypeID = tbl_product.productTypeID
								GROUP BY tbl_product_detail.productID");
		$stmt->execute();
		$result = $stmt->get_result();
		$outp = $result->fetch_all(MYSQLI_ASSOC);

		foreach ($outp as $key => $value) {
			$sql = "SELECT detail FROM tbl_product_detail
				   WHERE productID = ".$outp[$key]["productID"]."";
			$query = mysqli_query($conn, $sql);

			while($row = $query->fetch_assoc()) {
				 array_push($a, $row["detail"]);
			}
			array_push($outp[$key], $a);
			$a = [];
		}
		echo json_encode($outp);
	}

	if ($obj->name == "backoffice_detailproduct"){
		$id = $obj->id;
		$detail = array();
		$stmt = $conn->prepare("SELECT tbl_product.productID, tbl_product.name, tbl_product.image,
									tbl_product.price, tbl_product_type.nameTH
								FROM tbl_product
								INNER JOIN tbl_product_type ON tbl_product_type.productTypeID = tbl_product.productTypeID
								WHERE tbl_product.productID = ".$id."");

		$stmt->execute();
		$result = $stmt->get_result();
		$outp = $result->fetch_all(MYSQLI_ASSOC);

		$sqlDetail = "SELECT detail FROM tbl_product_detail
				   WHERE productID = ".$id."";
		$queryDetail = mysqli_query($conn, $sqlDetail);
		while($row = $queryDetail->fetch_assoc()) {
			array_push($detail, $row["detail"]);
		}
		array_push($outp[0], $detail);
		echo json_encode($outp);
	}

	if ($obj->name == "backoffice_deleteproduct"){
		$id = $obj->id;

		$sqlDelete = "DELETE FROM tbl_product WHERE productID = ".$id."";
		mysqli_query($conn, $sqlDelete);
		if(mysqli_query($conn, $sqlDelete)){
			echo json_encode(true);
		}else{
			echo json_encode(false);
		}
	}

	if ($obj->name == "backoffice_editproduct"){
		$id = $obj->id;
		$detail = array();
		$stmt = $conn->prepare("SELECT * FROM tbl_product
								WHERE productID = ".$id."");

		$stmt->execute();
		$result = $stmt->get_result();
		$outp = $result->fetch_all(MYSQLI_ASSOC);

		$sqlDetail = "SELECT detail FROM tbl_product_detail
				   WHERE productID = ".$id."";
		$queryDetail = mysqli_query($conn, $sqlDetail);
		while($row = $queryDetail->fetch_assoc()) {
			array_push($detail, $row["detail"]);
		}
		array_push($outp[0], $detail);
		echo json_encode($outp);
	}

	if ($obj->name == "backoffice_adminlogin"){
		$username = $obj->u;
		$password = md5($obj->p);

		$count = array();
		$pass = "";

		$sql = "SELECT email, password FROM tbl_user 
				WHERE email = '".$username."'";
		$result = mysqli_query($conn, $sql);
		while($row = $result->fetch_assoc()) {
			array_push($count, $row["email"]);
			$pass = $row["password"];
		}
		if (count($count) > 0) {
			if ($password != $pass){
				echo json_encode("password fail");
			}else{
				echo json_encode("true");
			}
		}else{
			echo json_encode("false");
		}
	}

	if ($obj->name == "backoffice_logout"){
		echo json_encode(true);
	}



 ?>







