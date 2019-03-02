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
					<table class="tbl-backoffice">
						<tr>
							<th>ลำดับ</th>
							<th>E-mail</th>
							<th>รายการสั่งซื้อ</th>
							<th>เวลา</th>
							<th>เบอร์โทร</th>
							<th>ที่อยู่จัดส่ง</th>
							<th>ราคา</th>
						</tr>
						<?php
							if (mysqli_num_rows($queryorderinfo) > 0) {
								$i = 1;
								while($row = mysqli_fetch_assoc($queryorderinfo)) {
									echo "<tr class='tr'>";
									echo "<td align='center'>".$i."</td>";
									echo "<td>".$row['email']."</td>";
									echo "<td>";
										include('../controller/backoffice/query_order_detail.php');
										$totalAll = 0;
										if (mysqli_num_rows($queryorderdetail) > 0) {
											while($rowdetail = mysqli_fetch_assoc($queryorderdetail)) {
												echo "<div>".$rowdetail['productName']."</div>";
												if($totalAll==0) {
													$totalAll = ($rowdetail['totalPrice']*$rowdetail['totalQty']);
												}
											}
										}
									echo "</td>";
									echo "<td align='center'>".$row['created_at']."</td>";
									echo "<td align='center'>".$row['telephone']."</td>";
									echo "<td>".$row['address']."</td>";
									echo "<td align='center'>".$totalAll."</td>";
									echo "</tr>";
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

<?php include('footer.php') ?>