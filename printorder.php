<?php


require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['format' => 'A4-L']);

$savetext = $_POST['value'];

$textArr = explode("|",$savetext);


    $content = "
            <style>
                .body{
                    font-family: \"Garuda\";
                    font-size: 16pt;
                    text-align: left;
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
                        <span id=\"username\">".$textArr[0]."</span>
                    </div>
                    <div>
                        <b>รายการสั่งซื้อ : </b>
                        <span id=\"detail\">".$textArr[1]."</span>
                    </div>
                    <div>
                        <b>วันที่ : </b>
                        <span id=\"date\">".$textArr[2]."</span>
                    </div>
                    <div>
                        <b>ที่อยู่จัดส่ง : </b>
                        <span id=\"address\">".$textArr[3]."</span>
                    </div>
                    <div>
                        <b>ราคา : </b>
                        <span id=\"price\">".$textArr[4]."</span>
                    </div>
                </div>
            </div>
        ";
    $mpdf->WriteHTML($content);
    $mpdf->Output();

?>