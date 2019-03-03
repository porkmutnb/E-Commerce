<?php 

	include('../connectDB.php');

	$name = $_POST["name"];
	$detail = $_POST["detail"];
	$cate = $_POST["cate"];
	$price = $_POST["price"];
	$qualtity = $_POST['qualtity'];

	$filename = "public/data-image/product/".basename($_FILES["file"]["name"]);
	$target_path = "../../public/data-image/product/";
	$target_path = $target_path.basename($_FILES["file"]["name"]);

	$sqlproductID = "SELECT `productID` FROM `tbl_product` ORDER BY `productID` DESC LIMIT 1";
	$queryproductID = mysqli_query($conn, $sqlproductID);
	$productID = mysqli_fetch_array($queryproductID); 

	$sqlproductimageID = "SELECT `productImageID` FROM `tbl_product_image` ORDER BY `productImageID` DESC LIMIT 1";
	$queryproductimageID = mysqli_query($conn, $sqlproductimageID);
	$productimageID = mysqli_fetch_array($queryproductimageID); 

	if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_path)) {
		
		$sqlInsertProduct = "INSERT INTO `tbl_product`(`productImageID`, `productName`, `productDetail`, `categoryID`, `price`, `qualtity`) VALUES ('".($productimageID['productImageID']+1)."','".$name."','".$detail."','".$cate."','".$price."','".$qualtity."')";
		if (mysqli_query($conn, $sqlInsertProduct)===true) {
			$sqlInsertProductImage = "INSERT INTO `tbl_product_image`(`productID`, `image`) VALUES ('".($productID['productID']+1)."','".$filename."')";
			if (mysqli_query($conn, $sqlInsertProductImage)===true) {
				echo "New record created successfully";
				header('Location: ../../backoffice/manageproducts.php');
			}else {
				$deleteProduct = "DELETE FROM `tbl_product` WHERE `productID` = ".$productID['productID'];
				mysqli_query($conn, $deleteProduct);
				echo "Error: " . $sqlInsertProductImage . "<br>" . $conn->error;
			}
		}else {
			echo "Error: " . $sqlInsertProduct . "<br>" . $conn->error;
		}
	}else{
		echo "Error file upload to failed or no permission";
	}

	mysqli_close($conn);
 ?>