<?php include('header.php') ?>

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
								<th>จำนวนการสั่งซื้อ</th>
								<th> </th>
							</tr>
						</thead>
						<tbody id="list-product">
							
						</tbody>
						<!-- <tr class="tr">
							<td align="center">2</td>
							<td align="center">
								<img src="../public/image/testFood.jpeg" class="border-1-ddd" width="100">
							</td>
							<td align="center">ข้าวผัดกระเพรา</td>
							<td>- ข้าวผัดหมู <br>- น้ำอัดลม 1 ขวด</td>
							<td align="center">ทานกลุ่ม</td>
							<td align="center">239 บาท</td>
							<td align="center">67 ครั้ง</td>
							<td align="center">
								<a href="productdetail.php"><u>ดูรายละเอียด</u></a>
							</td>
						</tr> -->
					</table>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../js/manageproducts.js"></script>

<?php include('footer.php') ?>
