<?php

    include('../controller/connectDB.php');

    $sqlorderdetail1 = "SELECT SUM(tbl_product.price) AS totalPrice, SUM(tbl_order_detail.qualtity) AS totalQty FROM tbl_order_detail JOIN tbl_product ON tbl_product.productID = tbl_order_detail.productID WHERE tbl_order_detail.orderID = '".$row['orderID']."'";

    $sqlorderdetail2 = "SELECT tbl_product.productName FROM tbl_order_detail JOIN tbl_product ON tbl_product.productID = tbl_order_detail.productID WHERE tbl_order_detail.orderID = '".$row['orderID']."'";

    $queryorderdetail1 = mysqli_query($conn, $sqlorderdetail1);

    $queryorderdetail2 = mysqli_query($conn, $sqlorderdetail2);

    $data = mysqli_fetch_array($queryorderdetail1);

    mysqli_close($conn);