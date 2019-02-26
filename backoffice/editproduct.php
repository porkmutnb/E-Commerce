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
					<b>แก้ไขเมนู</b>
				</div>
			</div>
			<div class="row mx-md-0">
				<div class="col bg-f0f0f0 py-md-3 mb-md-5">
					<form action="../controller/backoffice/editproduct.php" method="POST" enctype="multipart/form-data">
			  			<div class="form-group">
			    			<label class="mb-sm-1 mb-0 font-md-14" for="">ชื่อเมนู</label>
			    			<input type="text" class="form-control font-md-14" name="name" id="name" placeholder="กรอกชื่อเมนู">
			  			</div>
			  			<div class="row">
			  				<div class="col-6">
			  					<div class="form-group">
			    					<label class="mb-sm-1 mb-0 font-md-14" for="">อัพโหลดรูปภาพ</label>
			    					<a id="actionUpload">
			    						<img src="../public/image/testFood.jpeg" id="output" class="w-100 border-1-ddd">
			    					</a>
			    					<input type="file" name="file" id="inputFile" accept="image/*" onchange="loadFile(event)" hidden>
			  					</div>
			  				</div>
			  			</div>
			  			<div class="row">
			  				<div class="col-6 pr-md-2">
			  					<div class="form-group">
			    					<label class="mb-sm-1 mb-0 font-md-14" for="">รายละเอียดเมนู</label>
			    					<input type="text" class="form-control font-md-14 detail1" id="detail1" name="detail1" placeholder="รายละเอียดเมนู 1" required>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="row">
			  				<div class="col-6 pr-md-2">
			  					<div class="form-group">
			    					<input type="text" class="form-control font-md-14" id="detail2" name="detail2" placeholder="รายละเอียดเมนู 2">
			    				</div>
			    			</div>
			    		</div>
			    		<div class="row">
			  				<div class="col-6 pr-md-2">
			  					<div class="form-group">			    					
			  						<input type="text" class="form-control font-md-14" id="detail3" name="detail3" placeholder="รายละเอียดเมนู 3">
			    				</div>
			    			</div>
			    		</div>
			    		<div class="row">
			  				<div class="col-6 pr-md-2">
			  					<div class="form-group">
			    					<input type="text" class="form-control font-md-14" id="detail4" name="detail4" placeholder="รายละเอียดเมนู 4">
			    				</div>
			    			</div>
			    		</div>
			    		<div class="row">
			  				<div class="col-6 pr-md-2">
			  					<div class="form-group">
			    					<input type="text" class="form-control font-md-14" id="detail5" name="detail5" placeholder="รายละเอียดเมนู 5">
			    				</div>
			    			</div>
			    		</div>
			  			<!-- <div class="form-group">
			    			<label class="mb-sm-1 mb-0 font-md-14" for="">รายละเอียดเมนู</label>
			    			<textarea class="form-control" rows="5" placeholder="กรอกรายละเอียด">- ผัดผักรวมมิตร</textarea>
			  			</div> -->
			  			<div class="row">
			  				<div class="col-6 pr-md-2">
			  					<div class="form-group">
			    					<label class="mb-sm-1 mb-0 font-md-14" for="">หมวดหมู่</label>
			    					<select id="cate" name="cate" class="form-control">
			    						<option>----- เลือกหมวดหมู่  -----</option>
			    						<option value="1">ทานเดี่ยว</option>
			    						<option value="2">ทานคู่</option>
			    						<option value="3">ทานกลุ่ม</option>
			    					</select>
			  					</div>
			  				</div>
			  				<div class="col-6 pl-md-2">
			  					<div class="form-group">
			  						<label class="mb-sm-1 mb-0 font-md-14" for="">ราคา (บาท)</label>
			    					<input type="number" name="price" class="form-control font-md-14" id="price" placeholder="กรอกราคา">
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
								<a href="#" class="btn btn-secondary text-white w-100 px-md-0">
									ยกเลิก
								</a>
			  				</div>
			  			</div>
			  			<input type="" id="updateDetail" name="updateDetail" value="0" hidden>
			  			<input type="" name="statusImage" id="statusImage" hidden>
			  			<input type="" name="id" id="id" hidden>
			  			<input type="submit" id="submit" hidden>
			  		</form>
				</div>
			</div>
		</div>
	</div>
	<script src="../js/editproduct.js"></script>

<?php include('footer.php') ?>





