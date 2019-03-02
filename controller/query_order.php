<?php
    if (empty($_SESSION['token'])) {
        header('Location: ./login.php');
    }
    include('./controller/connectDB.php');

    $sql = "SELECT tbl_order.orderID, tbl_order.address, tbl_order.evidence, tbl_order.status, tbl_order.created_at, tbl_product.productName FROM tbl_order JOIN tbl_order_detail ON tbl_order_detail.orderID = tbl_order.orderID JOIN tbl_product ON tbl_product.productID = tbl_order_detail.productID WHERE `userID` = '".$user['userID']."' AND `status` != 0";

    $order = mysqli_query($conn, $sql);

    mysqli_close($conn);