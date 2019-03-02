<?php

    include('../controller/connectDB.php');

    $sqluserdetail = "SELECT tbl_order_detail.qualtity, tbl_product.price FROM `tbl_order` JOIN tbl_order_detail ON tbl_order_detail.orderID = tbl_order.orderID JOIN tbl_product ON tbl_product.productID = tbl_order_detail.productID WHERE tbl_order.userID = '".$row['userID']."'";

    $queryuserdetail = mysqli_query($conn, $sqluserdetail);

    mysqli_close($conn);