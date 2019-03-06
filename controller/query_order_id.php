<?php
//if (empty($_SESSION['token'])) {
//    header('Location: ./login.php');
//}
include('./controller/connectDB.php');

$sql1 = "SELECT tbl_order.orderID, tbl_order.address, tbl_order.evidence, tbl_order.status, tbl_order.created_at 
          FROM tbl_order 
          WHERE `userID` = '".$user['userID']."' AND `status` != 0 AND `orderID` = ".$saveID."";

$order = mysqli_query($conn, $sql1);

mysqli_close($conn);