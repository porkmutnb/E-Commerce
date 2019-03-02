<?php

    include('../controller/connectDB.php');

    $sqlorderdetail = "SELECT tbl_product.productName, SUM(tbl_product.price) AS totalPrice, SUM(tbl_order_detail.qualtity) AS totalQty FROM tbl_order_detail JOIN tbl_product ON tbl_product.productID = tbl_order_detail.productID WHERE tbl_order_detail.orderID = '".$row['orderID']."'";

    $queryorderdetail = mysqli_query($conn, $sqlorderdetail);

    mysqli_close($conn);