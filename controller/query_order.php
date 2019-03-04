<?php
    if (empty($_SESSION['token'])) {
        header('Location: ./login.php');
    }
    include('./controller/connectDB.php');

    $sql = "SELECT tbl_order.orderID, tbl_order.address, tbl_order.evidence, tbl_order.status, tbl_order.created_at FROM tbl_order WHERE `userID` = '".$user['userID']."' AND `status` != 0";

    $order = mysqli_query($conn, $sql);

    mysqli_close($conn);