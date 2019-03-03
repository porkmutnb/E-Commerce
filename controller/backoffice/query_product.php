<?php

include('../controller/connectDB.php');

$sqlproduct = "SELECT tbl_product.productID, tbl_product.productName, tbl_product.productDetail, tbl_product.categoryID, tbl_category.categoryName, tbl_product.price, tbl_product.qualtity, tbl_product_image.image FROM `tbl_product` JOIN tbl_product_image ON tbl_product_image.productID = tbl_product.productID JOIN tbl_category ON tbl_category.categoryID = tbl_product.categoryID WHERE tbl_product.productID = ".$id;

$sqlproductorder = "SELECT SUM(qualtity) AS qualtity FROM `tbl_order_detail` WHERE `productID` = ".$id;

$queryproduct = mysqli_query($conn, $sqlproduct);

$queryproductorder = mysqli_query($conn, $sqlproductorder);

$fetchproduct = mysqli_fetch_array($queryproduct);

$fetchproductorder = mysqli_fetch_array($queryproductorder);

mysqli_close($conn);