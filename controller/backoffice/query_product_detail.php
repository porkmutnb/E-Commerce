<?php

    include('../controller/connectDB.php');

    $sqlproductdetail = "SELECT SUM(tbl_order_detail.qualtity) AS totalQty FROM tbl_order_detail WHERE tbl_order_detail.productID = 3";

    $queryproductdetail = mysqli_query($conn, $sqlproductdetail);

    $fetchproductdetail = mysqli_fetch_array($queryproductdetail);

    mysqli_close($conn);