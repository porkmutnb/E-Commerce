<?php

session_start();
if(!empty($_SESSION['token'])) {
    include('./controller/query_profile.php');
}
require_once __DIR__ . '/vendor/autoload.php';

$saveID = $_POST['value'];

include('./controller/query_order_id.php');


$mpdf = new \Mpdf\Mpdf(['format' => 'A4-L']);



$textArr = explode("|",$savetext);

$detail = "";
$price = 0;
$id;
$username2;
$address;
$date;
$i = 1;
if (mysqli_num_rows($order) > 0) {
    while($row = $order->fetch_assoc()) {
        include('./controller/query_order_detail.php');
        while($row2 = $orderdetail->fetch_assoc()) {
            $detail = $detail."<br>".$i.". ".$row2['productName']."   ".$row2['price']." บาท";
            $price = $price + $row2['price'];
            $i++;
        }
        $id = $row['orderID'];
        $username2 = $user['username'];
        $address = $row['address'];
        $date = $row['created_at'];
    }
}


    $content = "
            <style>
                .body{
                    font-family: \"Garuda\";
                    font-size: 16pt;
                    text-align: left;
                }
                #detail{
                    padding-left: 30px;
                }
                .group{
                    position: absolute;
                    bottom: 100px;
                    left: 100px;
                }
                .groupShop{
                    position: absolute;
                    top: 100px;
                    left: 100px;
                }
                .bodyShop{
                    font-family: \"Garuda\";
                    font-size: 16pt;
                    text-align: left;
                }
            </style>
            
            <div class=\"row mt-md-4 mx-md-0 body\">
                <div class=\"col-md-8\">
                    <div>
                        <div style='font-size:30px;padding-bottom:30px;'><b>Fashion Shop</b></div>
                    </div>
                    <div>
                        <b>ชื่อผู้ใช้ : </b>
                        <span id=\"username\">".$username2."</span>
                    </div>
                    <div>
                        <b>รายการสั่งซื้อ : </b>
                        <span id=\"detail\" style='left:50px;'>".$detail."</span>
                    </div>
                    <div>
                        <b>วันที่ : </b>
                        <span id=\"date\">".$date."</span>
                    </div>
                    <div>
                        <b>ที่อยู่จัดส่ง : </b>
                        <span id=\"address\">".$address."</span>
                    </div>
                    <div>
                        <b>ราคารวม : </b>
                        <span id=\"price\">".$price."</span>
                    </div>
                </div>
            </div>
        ";
    $mpdf->WriteHTML($content);
    $mpdf->Output();

?>