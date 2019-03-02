<?php

	include('../controller/backoffice/checkadmin.php');

	include('../controller/backoffice/query_order.php');

	include('header.php');
	
?>

	<style type="text/css">
		#block-main-menu-4{
			background-color: #6E6E6E;
			color: white;
		}
	</style>

	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col text-title pb-md-3" align="center">
					<b>ข้อมูลผู้ใช้</b>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<table class="tbl-backoffice">
						<tr>
							<th>ลำดับ</th>
							<th>E-mail</th>
							<th>เพศ</th>
							<!-- <th>อายุ</th> -->
							<th>เบอร์โทร</th>
							<!-- <th>ที่อยู่</th> -->
							<th>การสั่งซื้อ</th>
						</tr>
						<?php
							if (mysqli_num_rows($queryuser) > 0) {
								$i = 1;
								while($row = mysqli_fetch_assoc($queryuser)) {
									echo "<tr class='tr'>";
									echo "<td align='center'>".$i."</td>";
									echo "<td>".$row['email']."</td>";
									echo "<td align='center'>".$row['genderName']."</td>";
									// echo "<td align='center'></td>";
									echo "<td align='center'>".$row['telephone']."</td>";
									// echo "<td></td>";
									echo "<td align='center'>";
										include('../controller/backoffice/query_user_detail.php');
										if (mysqli_num_rows($queryuserdetail) > 0) {
											$total = 0;
											while($row = mysqli_fetch_assoc($queryuserdetail)) {
												$total += ($row['qualtity']*$row['price']);
											}
										}
									echo $total." บาท</td>";
									echo "</tr>";
									$i++;
								}
							}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>

<?php include('footer.php') ?>





