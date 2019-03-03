<?php

    include('../controller/connectDB.php');

    $sqlorder = "SELECT (SELECT COUNT(tbl_order_detail.orderDetailID) FROM tbl_order_detail WHERE tbl_order_detail.orderID = tbl_order.orderID ) AS orderDetail, tbl_user.telephone, tbl_order.address, tbl_order.notification, tbl_order.created_at FROM `tbl_order` JOIN tbl_order_detail ON tbl_order_detail.orderID = tbl_order.orderID JOIN tbl_user ON tbl_user.userID = tbl_order.userID JOIN tbl_product ON tbl_product.productID = tbl_order_detail.productID ORDER BY tbl_order.notification DESC";

    $sqlorderinfo = "SELECT tbl_order.orderID, tbl_user.email, tbl_order.address, tbl_order.created_at, tbl_user.telephone FROM `tbl_order` JOIN tbl_user ON tbl_order.userID = tbl_user.userID ORDER BY tbl_order.created_at DESC";
    
    $sqlneworder = "SELECT COUNT(orderID) AS neworder FROM tbl_order WHERE `notification` = 1";

    $sqlproduct = "SELECT tbl_product.productID, tbl_product.productName, tbl_product.productDetail, tbl_category.categoryName, tbl_product.price, tbl_product.qualtity, tbl_product_image.image FROM `tbl_product` JOIN tbl_product_image ON tbl_product_image.productID = tbl_product.productID JOIN tbl_category ON tbl_category.categoryID = tbl_product.categoryID ORDER BY tbl_product.created_at DESC";
    
    $sqluser = "SELECT tbl_user.userID, tbl_user.email, tbl_gender.genderName, tbl_user.telephone FROM tbl_user JOIN tbl_gender ON tbl_gender.genderID = tbl_user.genderID WHERE tbl_user.status = 'member'";
    
    $queryorder = mysqli_query($conn, $sqlorder);

    $queryorderinfo = mysqli_query($conn, $sqlorderinfo);

    $queryneworder = mysqli_query($conn, $sqlneworder);

    $queryproduct = mysqli_query($conn, $sqlproduct);

    $queryuser = mysqli_query($conn, $sqluser);

    $fetchneworder = mysqli_fetch_array($queryneworder);

    $neworder = $fetchneworder['neworder']-1;

    mysqli_close($conn);