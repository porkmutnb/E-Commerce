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
					<b>การแจ้งเตือน</b>
				</div>
			</div>
			<div class="row">
				<?php
					if (mysqli_num_rows($queryorder) > 0) {
						while($row = mysqli_fetch_assoc($queryorder)) {
							if ($row['notification']==1) {
								echo "<div class='col-12 pb-md-2'>";
								echo "<a href='#''>";
								echo "<div class='block-new-notification relative'>";
								echo "<b>ใหม่ มีการสั่งออเดอร์ ".$row['orderDetail']." รายการ</b>";
								echo "<div class='text-secondary font-lg-14 pt-md-1'>";
								echo "เบอร์โทร : ".$row['telephone']."";
								echo "</div>";
								echo "<div class='text-secondary font-lg-14 pt-md-1'>";
								echo $row['address'];
								echo "</div>";
								echo "<div class='label-time-notification'>";
								echo $row['created_at'];
								echo "</div>";
								echo "</div>";
								echo "</a>";
								echo "</div>";
							}else {
								echo "<div class='col-12 pb-md-2'>";
								echo "<a href='#''>";
								echo "<div class='block-default-notification relative'>";
								echo "<b>มีการสั่งออเดอร์ ".$row['orderDetail']." รายการ</b>";
								echo "<div class='text-secondary font-lg-14 pt-md-1'>";
								echo "เบอร์โทร : ".$row['telephone']."";
								echo "</div>";
								echo "<div class='text-secondary font-lg-14 pt-md-1'>";
								echo $row['address'];
								echo "</div>";
								echo "<div class='label-time-notification'>";
								echo $row['created_at'];
								echo "</div>";
								echo "</div>";
								echo "</a>";
								echo "</div>";
							}
						}
					}
				?>
			</div>
		</div>
	</div>

<?php include('footer.php') ?>