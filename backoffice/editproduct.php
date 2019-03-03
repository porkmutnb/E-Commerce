<?php

	include('../controller/backoffice/checkadmin.php');

	include('../controller/backoffice/query_order.php');

	if(empty($_GET)) {
		header('Location: ./manageproducts.php');
	}

	$id = $_GET['id'];

	include('../controller/backoffice/query_product.php');

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
					<b>แก้ไขสินค้า</b>
				</div>
			</div>
			<div class="row mx-md-0">
				<div class="col bg-f0f0f0 py-md-3 mb-md-5">
					<form action="../controller/backoffice/editproduct.php" method="POST" enctype="multipart/form-data">
			  			<div class="form-group">
			    			<label class="mb-sm-1 mb-0 font-md-14" for="">ชื่อสินค้า</label>
			    			<input type="text" class="form-control font-md-14" name="name" id="name" value="<?php echo $fetchproduct['productName']; ?>" placeholder="กรอกชื่อสินค้า">
			  			</div>
			  			<div class="row">
			  				<div class="col-6">
			  					<div class="form-group">
			    					<label class="mb-sm-1 mb-0 font-md-14" for="">อัพโหลดรูปภาพ</label>
			    					<a id="actionUpload">
										<?php
											if (file_exists("../".$fetchproduct['image'])) {
												?> <img src="../<?php echo $fetchproduct['image']; ?>" id="output" class="w-100 border-1-ddd"> <?php
											}else {
												?> <img src="<?php echo $fetchproduct['image']; ?>" id="output" class="w-100 border-1-ddd"> <?php
											}
										?>
			    					</a>
			    					<input type="file" name="file" id="inputFile" accept="image/*" onchange="loadFile(event)" hidden>
			  					</div>
			  				</div>
			  			</div>
			  			<div class="row">
			  				<div class="col-6 pr-md-2">
			  					<div class="form-group">
			    					<label class="mb-sm-1 mb-0 font-md-14" for="">รายละเอียดสินค้า</label>
									<textarea class="form-control font-md-14" rows="5" name="detail" placeholder="รายละเอียดสินค้า" style="resize: none;"><?php echo $fetchproduct['productDetail']; ?></textarea>
			    				</div>
			    			</div>
			    		</div>
			  			<!-- <div class="form-group">
			    			<label class="mb-sm-1 mb-0 font-md-14" for="">รายละเอียดเมนู</label>
			    			<textarea class="form-control" rows="5" placeholder="กรอกรายละเอียด">- ผัดผักรวมมิตร</textarea>
			  			</div> -->
			  			<div class="row">
			  				<div class="col-4 pr-md-2">
			  					<div class="form-group">
			    					<label class="mb-sm-1 mb-0 font-md-14" for="">หมวดหมู่</label>
			    					<select id="cate" name="cate" class="form-control">
                                        <option value=" " selected="selected" disabled>----- เลือกหมวดหมู่  -----</option>
                                        <?php
											if ($querycategory->num_rows > 0) {
												while($row = $querycategory->fetch_assoc()) {
													if ($row['categoryID']==$fetchproduct['categoryID']) {
														echo "<option value='".$row['categoryID']."' selected='selected'>".$row['categoryName']."</option>";
													}else {
														echo "<option value='".$row['categoryID']."'>".$row['categoryName']."</option>";
													}
												}
											}
										?>
			    					</select>
			  					</div>
			  				</div>
			  				<div class="col-4 pl-md-2 pr-md-2">
			  					<div class="form-group">
			  						<label class="mb-sm-1 mb-0 font-md-14" for="">ราคา (บาท)</label>
			    					<input type="number" name="price" class="form-control font-md-14" id="price" value="<?php echo $fetchproduct['price']; ?>" placeholder="กรอกราคา" disabled>
			  					</div>
			  				</div>
                            <div class="col-4 pl-md-2">
                                <div class="form-group">
                                    <label class="mb-sm-1 mb-0 font-md-14" for="">จำนวนสินค้า</label>
									<?php 
										if($fetchproductorder['qualtity']=="") {
											?> <input type="number" name="amount" class="form-control font-md-14" id="price" value="<?php echo $fetchproduct['qualtity']; ?>" placeholder="กรอกจำนวนสินค้า"> <?php
										}else{
											?> <input type="number" name="amount" class="form-control font-md-14" id="price" value="<?php echo ($fetchproduct['qualtity'] - $fetchproductorder['qualtity']); ?>" placeholder="กรอกจำนวนสินค้า"> <?php
										}
									?>
                                </div>
                            </div>
			  			</div>
			  			<div class="row mt-md-5 mb-md-3">
			  				<div class="col-3 offset-md-6">
			  					<a id="btnSave" class="btn btn-success text-white w-100 px-md-0">
									<i class="fas fa-save"></i>
									บันทึก
								</a>
			  				</div>
			  				<div class="col-3">
								<a href="./productdetail.php?id=<?php echo $id; ?>" class="btn btn-secondary text-white w-100 px-md-0">
									ยกเลิก
								</a>
			  				</div>
			  			</div>
			  			<input type="" id="updateDetail" name="updateDetail" value="0" hidden>
			  			<input type="" name="statusImage" id="statusImage" hidden>
			  			<input type="" name="id" id="id" value="<?php echo $id; ?>" hidden>
			  			<input type="submit" id="submit" hidden>
			  		</form>
				</div>
			</div>
		</div>
	</div>
	<script src="../js/editproduct.js"></script>

<?php include('footer.php') ?>





