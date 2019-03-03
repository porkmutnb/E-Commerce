<?php 

	include('../connectDB.php');

	$id = $_POST['id'];
	$name = $_POST["name"];
	$detail = $_POST["detail"];
	$cate = $_POST["cate"];
	//$price = $_POST["price"];
	$qualtity = $_POST['amount'];

	if (basename($_FILES["file"]["name"])!="") {
		$filename = "public/data-image/product/".basename($_FILES["file"]["name"]);
		$target_path = "../../public/data-image/product/";
		$target_path = $target_path.basename($_FILES["file"]["name"]);

		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_path)) {
			echo "upload image success <br>";
		}else{
			echo "Error file upload to failed or no permission <br>";
		}

		$sqlupdateimage = "UPDATE `tbl_product_image` SET `image`= '".$filename."' WHERE `productID` = ".$id;
		if (mysqli_query($conn, $sqlupdateimage)===true) {
			echo "Edit record update successfully <br>";
		}else{
			echo "Error update: " . $sqlupdateimage . "<br>" . $conn->error."<br>";
		}
	}

	$sqlupdateproduct = "UPDATE `tbl_product` SET `productName`= '".$name."',`productDetail`= '".$detail."',`categoryID`= '".$cate."',`qualtity`= '".$qualtity."' WHERE `productID` = ".$id;

	if (mysqli_query($conn, $sqlupdateproduct)===true) {
		echo "Edit record update successfully <br>";
		header('Location: ../../backoffice/productdetail.php?id='.$id);
	}else{
		echo "Error update: " . $sqlupdateproduct . "<br>" . $conn->error."<br>";
	}

	mysqli_close($conn);

?>






