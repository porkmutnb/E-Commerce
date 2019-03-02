<?php 
    include('header.php');

    if(empty($_SESSION['basket'])) {
        header('Location: ./home.php');
    }
    
?>
<form action="./controller/insert_order.php" method="POST"  enctype="multipart/form-data">
    <div class="container mh-100 bg-shadow bg-white pb-md-5">
        <div class="row mb-md-4 mb-lg-5 mb-3" align="center">
            <div class="col mt-lg-5 mt-sm-4 mt-4 font-weight-bold text-title">
                <b>ชำระเงิน</b>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="row">
                    <div class="col-md-2">
                        <img src="public/image/KBANK-1.png" alt="" class="w-100">
                    </div>
                    <div class="col-md-6">
                        <div>
                            <b>ธนาคาร : </b>กสิกรไทย
                        </div>
                        <div>
                            <b>เลขบัญชี : </b>2658732256
                        </div>
                        <div>
                            <b>ชื่อบัญชี : </b>นางสาวชลทิชา แฝงกระโทก
                        </div>
                    </div>
                </div>
                <div class="row mt-md-2">
                    <div class="col-md-2">
                        <img src="public/image/scb_logo.jpg" alt="" class="w-100">
                    </div>
                    <div class="col-md-6">
                        <div>
                            <b>ธนาคาร : </b>ธนาคารไทยพาณิชย์
                        </div>
                        <div>
                            <b>เลขบัญชี : </b>8665740013
                        </div>
                        <div>
                            <b>ชื่อบัญชี : </b>นางสาววันวิสา ศรียางนอก
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <strong class="font-weight-bold">อัพโหลดหลักฐานการโอนเงิน</strong><br>
                        <input type="file" multiple="true" id="customFile" name="customFile">
                        <!-- <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="customFile">
                            <label class="custom-file-label" for="customFile">เลือกไฟล์</label>
                        </div> -->
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-4 offset-md-4">
                        <a  data-toggle="modal" class="btn btn-orange w-100" data-target="#myModal">เรียบร้อย</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header relative border-none pt-md-4 pt-4 pb-md-4 pl-md-4 pr-md-4" align="center">
                    <b class="font-weight-bold text-title">กรอกที่อยู่จัดส่ง</b>
                    <div class="row mx-0">

                        <div class="form-group w-100">
                            <textarea type="text" class="form-control font-md-14" rows="5" name="address" placeholder="กรอกที่อยู่จัดส่ง" required></textarea>
                        </div>
                        <div class="col-12 mt-md-2 mt-2 mb-md-2 mb-2">
                            <button type="submit" class="btn btn-orange w-100">ยืนยัน</button>
                        </div>

                    </div>
                    <a class="close absolute btn-close-modal" data-dismiss="modal"><i class="fas fa-times"></i></a>
                </div>
            </div>
        </div>
    </div>
</form>
<?php include('footer.php') ?>




