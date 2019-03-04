<?php

include('../controller/backoffice/checkadmin.php');

include('../controller/backoffice/query_order.php');

include('header.php');

?>

    <style type="text/css">
        #block-main-menu-1{
            background-color: #6E6E6E;
            color: white;
        }
    </style>

    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col text-title pb-md-3" align="center">
                    <b>รายละเอียด</b>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?php
                    $savetext = $_POST['value'];
                    $textArr = explode("|",$savetext);

                    echo "<img class='w-100' src='../".$textArr[1]."'>";
                    ?>
                </div>
                <div class="col-md-8">
                    <?php
                        $savetext = $_POST['value'];
                        $textArr = explode("|",$savetext);

                        echo "<div class='col-md-12'>ชื่อ : ".$textArr[0]."</div>";
                        echo "<div class='col-md-12'>สินค้า : ".$textArr[2]."</div>";
                        echo "<div class='col-md-12'>วันที่ : ".$textArr[3]."</div>";
                        echo "<div class='col-md-12'>ที่อยู่ : ".$textArr[4]."</div>";

                    ?>
                </div>
            </div>
        </div>
    </div>

<?php include('footer.php') ?>