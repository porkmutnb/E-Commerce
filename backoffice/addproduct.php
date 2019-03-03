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
					<b>เพิ่มเมนู</b>
				</div>
			</div>
			<div class="row mx-md-0">
				<div class="col bg-f0f0f0 py-md-3 mb-md-5">
					<form action="../controller/backoffice/addproduct.php" method="POST" enctype="multipart/form-data">
			  			<div class="form-group">
			    			<label class="mb-sm-1 mb-0 font-md-14" for="">ชื่อสินค้า</label>
			    			<input type="text" class="form-control font-md-14" id="name" name="name" placeholder="กรอกชื่อสินค้า" required>
			  			</div>
			  			<div class="row">
			  				<div class="col-6">
			  					<div class="form-group">
			    					<label class="mb-sm-1 mb-0 font-md-14" for="">อัพโหลดรูปภาพ</label>
			    					<a id="actionUpload">
			    						<img src="../public/image/addImage.jpg" id="output" class="w-100 border-1-ddd">
			    					</a>
			    					<input type="file" name="file" id="inputFile" accept="image/*" onchange="loadFile(event)" hidden>
			  					</div>
			  				</div>
			  			</div>
			  			<div class="row">
			  				<div class="col-6 pr-md-2">
			  					<div class="form-group">
			    					<label class="mb-sm-1 mb-0 font-md-14" for="">รายละเอียดสินค้า</label>
			    					<input type="text" class="form-control font-md-14" id="detail1" name="detail1" placeholder="รายละเอียดสินค้า 1" required>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="row">
			  				<div class="col-6 pr-md-2">
			  					<div class="form-group">
			    					<input type="text" class="form-control font-md-14" id="detail2" name="detail2" placeholder="รายละเอียดสินค้า 2">
			    				</div>
			    			</div>
			    		</div>
			    		<div class="row">
			  				<div class="col-6 pr-md-2">
			  					<div class="form-group">			    					<input type="text" class="form-control font-md-14" id="detail3" name="detail3" placeholder="รายละเอียดสินค้า 3">
			    				</div>
			    			</div>
			    		</div>
			    		<div class="row">
			  				<div class="col-6 pr-md-2">
			  					<div class="form-group">
			    					<input type="text" class="form-control font-md-14" id="detail4" name="detail4" placeholder="รายละเอียดสินค้า 4">
			    				</div>
			    			</div>
			    		</div>
			    		<div class="row">
			  				<div class="col-6 pr-md-2">
			  					<div class="form-group">
			    					<input type="text" class="form-control font-md-14" id="detail5" name="detail5" placeholder="รายละเอียดสินค้า 5">
			    				</div>
			    			</div>
			    		</div>
			  			<!-- <div class="form-group">
			    			<label class="mb-sm-1 mb-0 font-md-14" for="">รายละเอียดเมนู 1</label>
			    			<textarea class="form-control" rows="5" id="detail" name="detail" placeholder="กรอกรายละเอียด" required></textarea>
			  			</div> -->
			  			<div class="row">
			  				<div class="col-4 pr-md-2">
			  					<div class="form-group">
			    					<label class="mb-sm-1 mb-0 font-md-14" for="">หมวดหมู่</label>
			    					<select class="form-control" id="cate" name="cate">
			    						<option value=" " selected="selected" disabled>----- เลือกหมวดหมู่  -----</option>
			    						<option value="1">สำหรับผู้หญิง</option>
			    						<option value="2">สำหรับผู้ชาย</option>
			    						<option value="3">สำหรับแฟชั่น</option>
			    					</select>
			  					</div>
			  				</div>
			  				<div class="col-4 pl-md-2 pr-md-2">
			  					<div class="form-group">
			  						<label class="mb-sm-1 mb-0 font-md-14" for="">ราคา</label>
			    					<input type="number" class="form-control font-md-14" id="price" name="price" placeholder="กรอกราคา" required>
			  					</div>
			  				</div>
                            <div class="col-4 pl-md-2">
                                <div class="form-group">
                                    <label class="mb-sm-1 mb-0 font-md-14" for=""> จำนวนสินค้า</label>
                                    <input type="number" class="form-control font-md-14" id="amount" name="price" placeholder="กรอกจำนวนสินค้า" required>
                                </div>
                            </div>
			  			</div>
			  			<div class="row mt-md-5 mb-md-3">
			  				<div class="col-3 offset-md-6">
			  					<a class="btn btn-success text-white w-100 px-md-0" id="btnSave">
									<!-- <i class="fas fa-plus-circle fa-md"></i> -->
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
			  			<input type="submit" name="" id="submit" value="OK" hidden>
			  		</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../js/addproduct.js"></script>
	<script type="text/javascript">
		function loadFile(event) {
			var reader = new FileReader();
    		reader.onload = function(){
      			var output = document.getElementById('output');
      			output.src = reader.result;
    		};
    		reader.readAsDataURL(event.target.files[0]);
		}
	</script>

<?php include('footer.php') ?>


