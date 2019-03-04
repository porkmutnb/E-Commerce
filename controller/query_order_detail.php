<?php

    include('./controller/connectDB.php');

    $sql = "SELECT tbl_product.productName, tbl_product.price FROM `tbl_order_detail` JOIN tbl_product ON tbl_product.productID = tbl_order_detail.productID WHERE tbl_order_detail.orderID = ".$row['orderID'];

    $orderdetail = mysqli_query($conn, $sql);