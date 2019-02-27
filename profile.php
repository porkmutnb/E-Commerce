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

                    <a href="./logout.php" class="btn btn-default w-100">ลงชื่อออก</a>
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
                        </tr>
                        <tr>
                            <?php
                                if (mysqli_num_rows($order) > 0) {
                                    while($row = $order->fetch_assoc()) {
                                        if($row['status']>=3) {
                                            $remark = "<td><a href='#'>เปิด</a></td>";
                                        }else{
                                            $remark = "<td><a href='#' onclick='updateOrder(".$row['orderID'].")'>ลบ</a></td>";
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
                                            echo "<td align='center'>".$row['orderID']."</td>";
                                            echo "<td>".$row['productName']."</td>";
                                            echo "<td>".$row['address']."</td>";
                                            echo "<td align='center'>".$row['created_at']."</td>";
                                            echo "<td align='center'>".$row['status']."</td>";
                                            echo $remark;
                                        }
                                    }
                                }else{
                                    echo "<td colspan='5' align='center'>ไม่มีข้อมูล</td>";
                                }
                            ?>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateOrder(order) {
        if(confirm('Are you sure? delete this order')) {
            window.location.href = "./controller/update_order.php?orderID="+order;
        }
    }
</script>

<?php include('footer.php') ?>




