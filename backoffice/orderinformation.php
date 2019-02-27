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
					<b>ข้อมูลการสั่งซื้อ</b>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<table class="tbl-backoffice">
						<tr>
							<th>ลำดับ</th>
							<th>ชื่อผู้ใช้</th>
							<th>รายการสั่งซื้อ</th>
							<th>วันที่</th>
							<th>เบอร์โทร</th>
							<th>ที่อยู่จัดส่ง</th>
							<th>ราคา</th>
                            <th>สถานะ</th>
                            <th></th>
						</tr>
						<tr class="tr">
							<td align="center">1</td>
							<td>xxxxxxxx</td>
							<td>
								<div>ข้าวผัดหมู 1</div>
								<div>ข้าวผัดกระเพรา 3</div>
								<div>ข้าวผัดกระเพรา  2</div>
							</td>
							<td align="center">12/11/10</td>
							<td align="center">0958888888</td>
							<td>247 Suk Sawat 60 เขต ทุ่งครุ, แขวง บางมด</td>
							<td align="center">180 บาท</td>
                            <td align="center">
                                <select name="" id="">
                                    <option value="">รอตรวจสอบ</option>
                                    <option value="">จัดส่ง</option>
                                    <option value="">เสร็จสิน</option>
                                    <option value="">ลบออเดอร์</option>
                                </select>
                            </td>
                            <td align="center">
                                <a href="checkorder.php" class="btn btn-default">ดู</a>
                            </td>
						</tr>
						<tr class="tr">
							<td align="center">2</td>
							<td>xxxxxx</td>
							<td>
								<div>ข้าวผัดหมู 3</div>
								<div>ข้าวผัดกระเพรา  6</div>
								<div>ข้าวผัดกระเพรา 1</div>
							</td>
							<td align="center">12/11/10</td>
							<td align="center">0958888888</td>
							<td>247 Suk Sawat 60 เขต ทุ่งครุ, แขวง บางมด</td>
							<td align="center">180 บาท</td>
                            <td align="center">
                                <select name="" id="">
                                    <option value="">รอตรวจสอบ</option>
                                    <option value="">จัดส่ง</option>
                                    <option value="">เสร็จสิน</option>
                                    <option value="">ลบออเดอร์</option>
                                </select>
                            </td>
                            <td align="center">
                                <a href="checkorder.php" class="btn btn-default">ดู</a>
                            </td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>

<?php include('footer.php') ?>