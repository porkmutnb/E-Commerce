<?php include('header.php') ?>

    <style type="text/css">
        #block-main-menu-2{
            background-color: #6E6E6E;
            color: white;
        }
    </style>

    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col text-title pb-md-3" align="center">
                    <b>รายละเอียดออเดอร์</b>
                </div>
            </div>
            <div class="row mt-md-4 mx-md-0">
                <div class="col-md-2 offset-md-10">
                    <a onclick="printorder()" class="btn btn-primary text-white w-100">พิมพ์</a>
                </div>
            </div>
            <div class="row mt-md-4 mx-md-0">
                <div class="col-md-8">
                    <div>
                        <b>ชื่อผู้ใช้ : </b>
                        <span id="username">xxxxxx</span>
                    </div>
                    <div>
                        <b>รายการสั่งซื้อ : </b>
                        <span id="detail">xxxxxx</span>
                    </div>
                    <div>
                        <b>วันที่ : </b>
                        <span id="date">xxxxxx</span>
                    </div>
                    <div>
                        <b>ที่อยู่จัดส่ง : </b>
                        <span id="address">xxxxxx</span>
                    </div>
                    <div>
                        <b>เบอร์โทร : </b>
                        <span id="phone">xxxxxx</span>
                    </div>
                    <div>
                        <b>ราคา : </b>
                        <span id="price">xxxxxx</span>
                    </div>
                </div>
                <div class="col-md-4" align="center">
                    <img src="../public/image/KBANK-1.png" class="w-100">
                    <div>หลักฐานการโอนเงิน</div>
                </div>
            </div>
        </div>
    </div>
    <form action="orderPDF.php" method="post" target="_blank" id="formdata">
        <input type="text" id="sendvalue" name="sendvalue" hidden>
        <input type="submit" hidden>
    </form>

    <script src="../js/checkorder.js"></script>

<?php include('footer.php') ?>