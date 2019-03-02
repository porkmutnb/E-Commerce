<?php

include('./controller/connectDB.php');

    $str = "";
    $array = explode(',', $_SESSION['basket']);
    for ($i=0; $i < count($array); $i++) { 
        $e = explode(":", $array[$i]);
        $str .= $e[0].",";
    }
    $str = substr($str, 0, strlen($str)-1);

    $sql = "SELECT tbl_product.productID, tbl_product.productName, tbl_product_image.image, tbl_product.price FROM tbl_product JOIN tbl_product_image ON tbl_product_image.productID = tbl_product.productID WHERE tbl_product.productID IN (".$str.")";

    $product = mysqli_query($conn, $sql);

    mysqli_close($conn);