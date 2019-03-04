<?php

	include('../controller/backoffice/checkadmin.php');

	include('../controller/backoffice/query_order.php');

	include('header.php');
	
?>

	<style type="text/css">
		#block-main-menu-2{
			background-color: #6E6E6E;
			color: white;
		}
		/* The switch - the box around the slider */
	.switch {
	  position: relative;
	  display: inline-block;
	  width: 60px;
	  height: 34px;
	}

	/* Hide default HTML checkbox */
	.switch input {
	  opacity: 0;
	  width: 0;
	  height: 0;
	}

	/* The slider */
	.slider {
	  position: absolute;
	  cursor: pointer;
	  top: 0;
	  left: 0;
	  right: 0;
	  bottom: 0;
	  background-color: #ccc;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	.slider:before {
	  position: absolute;
	  content: "";
	  height: 26px;
	  width: 26px;
	  left: 4px;
	  bottom: 4px;
	  background-color: white;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	input:checked + .slider {
	  background-color: #2196F3;
	}

	input:focus + .slider {
	  box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
	  -webkit-transform: translateX(26px);
	  -ms-transform: translateX(26px);
	  transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
	  border-radius: 34px;
	}

	.slider.round:before {
	  border-radius: 50%;
	}
	</style>

	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col text-title pb-md-3" align="center">
					<b>ข้อมูลการสั่งซื้อ</b>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<table class="tbl-backoffice mb-5">
						<tr>
							<th>ที่</th>
							<th>ชื่อผู้ใช้</th>
							<th>รายการสั่งซื้อ</th>
							<th>วันที่</th>
<!--							<th>เบอร์โทร</th>-->
							<th>ที่อยู่จัดส่ง</th>
							<th>ราคา</th>
							<th>หลักฐานการโอน</th>
                            <th>สถานะ</th>
                            <th></th>
                            <th></th>
						</tr>
						<?php
							if (mysqli_num_rows($queryorderinfo) > 0) {
								$i = 1;
                                $savetext = array();

								while($row = mysqli_fetch_assoc($queryorderinfo)) {
                                    $detail = "";
									echo "<tr class='tr'>";
									echo "<td align='center'>".$i."</td>";
									echo "<td>".$row['email']."</td>";
									echo "<td>";
										include('../controller/backoffice/query_order_detail.php');
										if (mysqli_num_rows($queryorderdetail2) > 0) {
											while($rowdetail2 = mysqli_fetch_assoc($queryorderdetail2)) {
												echo "<li>".$rowdetail2['productName']."</li>";
											}
										}
									echo "</td>";
									echo "<td align='center'>".$row['created_at']."</td>";
//									echo "<td align='center'>".$row['telephone']."</td>";
									echo "<td>".$row['address']."</td>";
									echo "<td align='center'>".($data['totalPrice'] * $data['totalQty'])."</td>";
									echo "<td align='center'>";
									if($row['evidence']!=null||$row['evidence']!="") {
										echo "<img src='../".$row['evidence']."' class='border-1-ddd' width='100'>";
										if($row['status']<3) {
											echo "<div><a href='#' onclick='slipReturn(".$row['orderID'].")'>ตีกลับ</a></div>";
										}
									}else{
										echo "ยังไม่มีหลักฐาน";
									}
									echo "</td>";
									echo "<td align='center'>";
										switch ($row['status']) {
                                    	    case 0:
                                    	        $print = "ลบ";
                                    	        break;
                                    	    case 1:
                                    	        $print = "รอดำเนินการ";
                                    	        break;
                                    	    case 2:
                                    	        $print = "กำลังจัดส่ง";
                                    	        break;
                                    	    case 3:
                                    	        $print = "เรียบร้อย";
                                    	        break;
										}
										echo $print;
									echo"</td>";
									echo "<td>";
									if($row['status']>0&&$row['status']<3) {
										echo 	"<label class='switch'>";
										echo 	"<input type='checkbox' onclick='changeStatus(".$row['orderID'].",".$row['status'].")'>";
										echo	"<span class='slider round'></span>";
										echo	"</label>";
									}
									echo "</td>";
									echo "<td align='center'><a onclick='viewdetail(".($i-1).")' class='btn btn-default'>ดู</a></td>";
									echo "</tr>";

                  array_push($savetext, $row['email']."|".$row['evidence']."|".$detail."|".$row['created_at']."|".$row['address']."|".($data['totalPrice'] * $data['totalQty']));

                  echo "<input type='text' class='w-100' value='".$savetext[$i-1]."' name='' id='savetext".($i-1)."' hidden>";

									$i++;
								}
							} else {
								echo "<tr class='tr'>";
								echo "<td clospan='7' align='center'> ไม่มีข้อมูล </td>";
								echo "</tr>";
							}
							$queryorderinfo
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
    <form id="formdetail" method="POST" target="_bank" action="orderdetail.php">
        <input type="text" name="value" id="inputtext" hidden>
    </form>

	<script>
		function changeStatus(oid, status) {
			switch (status) {
				case 1:
					if(confirm("Are you sure verify this order?")) {
						window.location.href = "../controller/backoffice/change_status_order.php?id="+oid+"&type=verify";
					}
					break;
				case 2:
					if(confirm("Are you sure deliverly this order complete?")) {
						window.location.href = "../controller/backoffice/change_status_order.php?id="+oid+"&type=deliverly";
					}
					break;
			}
		}
		function slipReturn(oid) {
			if(confirm("Are you sure return this slip of this order?")) {
				window.location.href = "../controller/backoffice/return _slip_order.php?id="+oid;
			}
		}
        function viewdetail(index) {
            $('#inputtext').val($('#savetext'+index+'').val());
            console.log($('#inputtext').val());

            $('#formdetail').submit();
        }
	</script>

<?php include('footer.php') ?>