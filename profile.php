<?php 
    include('header.php');
    include('./controller/query_order.php');
?>
<div class="container mh-100 bg-shadow bg-white pb-md-5">
    <div class="row mb-md-4 mb-lg-5 mb-3" align="center">
        <div class="col mt-lg-5 mt-sm-4 mt-4 font-weight-bold text-title">
            <b>โปรไฟล์</b>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <b>Username :</b>
                                <span> <?php echo $user['username']; ?> </span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div>
                                <b>E-mail :</b>
                                <span><?php echo $user['email']; ?></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div>
                                <b>เบอร์โทร :</b>
                                <span><?php echo $user['telephone']; ?></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div>
                                <b>เพศ :</b>
                                <span><?php echo $user['genderName']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <a href="./editprofile.php" class="btn btn-default w-100">แก้ไขข้อมูลส่วนตัว</a>

                    <a href="./logout.php" class="btn btn-default w-100 mt-3">ลงชื่อออก</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-md-4 mb-lg-4 mb-3" align="center">
        <div class="col mt-lg-5 mt-sm-4 mt-4 font-weight-bold text-title">
            <b>ข้อมูลการสั่งซื้อ</b>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div class="col-md-12">
                    <table class="tbl-profile">
                        <tr>
                            <th>ที่</th>
                            <th>รายการ</th>
                            <th>ที่อยู่</th>
                            <th>วันที่</th>
                            <th>สถานะ</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                            if (mysqli_num_rows($order) > 0) {
                                $i = 1;
                                $savetext = array();
                                while($row = $order->fetch_assoc()) {
                                    if($row['status']>=3) {
                                        $remark = "<td><a href='#'>เปิด</a></td>";
                                    }else{
                                        if($row['evidence']==null||$row['evidence']=="") {
                                            $remark = "<td align='center'><a href='#' onclick='uploadEvidence(".$row['orderID'].")'>อัพโหลด</a></td>";
                                        }else{
                                            $remark = "<td align='center'><a href='#' onclick='updateOrder(".$row['orderID'].")'>ลบ</a></td>";
                                        }
                                    }
                                    switch ($row['status']) {
                                        case 0:
                                            $row['status'] = "ลบ";
                                            break;
                                        case 1:
                                            $row['status'] = "รอดำเนินการ";
                                            break;
                                        case 2:
                                            $row['status'] = "กำลังจัดส่ง";
                                            break;
                                        case 3:
                                            $row['status'] = "เรียบร้อย";
                                            break;
                                    }
                                    if($row['status']!="ลบ") {
                                        echo "<tr>";
                                        // echo "<td align='center'>".$row['orderID']."</td>";
                                        echo "<td align='center'>".$i."</td>";
                                        echo "<td>".$row['productName']."</td>";
                                        echo "<td>".$row['address']."</td>";
                                        echo "<td align='center'>".$row['created_at']."</td>";
                                        echo "<td align='center'>".$row['status']."</td>";
                                        echo $remark;
                                        echo "<td align='center'><a class='pointer' onclick='printorder(".($i-1).")'>พิมพ์</a></td>";
                                        echo "</tr>";
                                    }
                                    array_push($savetext, $user['username']."|".$row['productName']."|".$row['created_at']."|".$row['address']."|".$row['price']);

                                    echo "<input type='text' class='w-100' value='".$savetext[$i-1]."' name='' id='savetext".($i-1)."' hidden>";

                                    $i++;
                                }
                            }else{
                                echo "<td colspan='7' align='center'>ไม่มีข้อมูล</td>";
                            }
                        ?>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<form id="sendtopdf" method="POST" target="_bank" action="printorder.php">
    <input type="text" name="value" id="inputtext" hidden>
</form>

<form action="./controller/upload_order.php" method="POST"  enctype="multipart/form-data">
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header relative border-none pt-md-4 pt-4 pb-md-4 pl-md-4 pr-md-4" align="center">
                    <b class="font-weight-bold text-title">อัพโหลดหลักฐานการโอนเงิน</b>
                    <div class="row mx-0">
                        <div class="form-group w-100">
                            <input type="hidden" name="id" id="id">
                            <input type="file" multiple="true" id="customFile" name="customFile">
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

<script>
    function uploadEvidence(order) {
        document.getElementById('id').value = order;
        $('#myModal').modal('show');
    }
    function updateOrder(order) {
        if(confirm('Are you sure? delete this order')) {
            window.location.href = "./controller/update_order.php?orderID="+order;
        }
    }
    function printorder(index) {
        
        $('#inputtext').val($('#savetext'+index+'').val());
        console.log($('#inputtext').val());

        $('#sendtopdf').submit();
    }
</script>

<?php include('footer.php') ?>




