<?php

	include('../controller/backoffice/checkadmin.php');

	include('../controller/backoffice/query_order.php');

	include('header.php');
	
?>

	<style type="text/css">
		#block-main-menu-3{
			background-color: #6E6E6E;
			color: white;
		}
	</style>

	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col text-title pb-md-3" align="center">
					<b>จัดการสินค้า</b>
				</div>
			</div>
			<div class="row mb-md-2">
				<div class="col-6 offset-md-6 align-self-end" align="right">
					<div class="row">
						<div class="col-4 offset-md-8">
							<a href="addproduct.php" class="btn btn-primary text-white w-100 px-md-0">
								<i class="fas fa-plus-circle fa-md"></i>
								เพิ่มเมนู
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<table class="tbl-backoffice mb-md-5">
						<thead>
							<tr>
								<th>ลำดับ</th>
								<th>รูปภาพ</th>
								<th>ชื่อสินค้า</th>
								<th>รายละเอียด</th>
								<th>ประเภท</th>
								<th>ราคา</th>
								<th>จำนวนคงเหลือ</th>
								<th> </th>
							</tr>
						</thead>
						<tbody id="list-product">
							
						</tbody>
							<?php
								if (mysqli_num_rows($queryproduct) > 0) {
									$i = 1;
									while($row = mysqli_fetch_assoc($queryproduct)) {
										echo "<tr class='tr'>";
										echo "<td align='center'>".$i."</td>";
										echo "<td align='center'>";
											if(file_exists("../".$row['image'])==1) {
												echo "<img src='../".$row['image']."' class='border-1-ddd' width='100'>";
											}else{
												echo "<img src='".$row['image']."' class='border-1-ddd' width='100'>";
											}
										echo "</td>";
										echo "<td align='center'>".$row['productName']."</td>";
										echo "<td>".$row['productDetail']."</td>";
										echo "<td align='center'>".$row['categoryName']."</td>";
										echo "<td align='center'>".$row['price']." บาท</td>";
										echo "<td align='center'>";
											include('../controller/backoffice/query_product_detail.php');
											echo ($row['qualtity'] - $fetchproductdetail['totalQty']);
										echo " ครั้ง</td>";
										echo "<td align='center'>";
										echo "<a href='./productdetail.php'><u>ดูรายละเอียด</u></a>";
										echo "</td>";
										echo "</tr>";
										$i++;
									}
								}else{
									echo "<tr class='tr'>";
									echo "<td clospan='8' align='center'> ไม่มีข้อมูล </td>";
									echo "</tr>";
								}
							?>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../js/manageproducts.js"></script>

<?php include('footer.php') ?>
