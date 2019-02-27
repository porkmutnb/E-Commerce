<?php 
	include('header.php');
	include('./controller/query_gender.php');
?>

<link rel="stylesheet" type="text/css" href="public/css/layout-register.css">

<div class="container mh-100 bg-white bg-shadow pb-md-5">
	<div class="pt-md-5 pt-4 mb-md-4 mb-2 font-lg-22 font-sm-18 font-weight-bold" align="center">
		<b> สมัครสมาชิก </b>
	</div>
	<div class="row justify-content-center">
		<div class="col-lg-6 col-md-7 col-sm-9">
			<form action="controller/register.php" method="POST">
			  	<div class="form-group">
			    	<label class="mb-sm-1 mb-0 font-md-14" for="exampleInputEmail1">เบอร์โทร</label>
			    	<input type="tel" minlength="10" maxlength="10" class="form-control font-md-14" id="phone" placeholder="กรอกเบอร์โทร" name="phone" required>
			  	</div>
			  	<div class="form-group mb-sm-2 mb-1">
			    	<label class="mb-sm-1 mb-0 font-md-14" for="exampleInputPassword1">เพศ</label>
			    	<div class="col-sm-6 col-8">
			    		<div class="row">
							<?php
								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
										echo	"<div class='col'>".
												"<label class='label-radio font-lg-16'>".$row["genderName"].
												"<input type='radio' value='".$row["genderID"]."' name='gender' required>".
												"<span class='checkmark'></span>".
												"</label>".
												"</div>";
									}
								}
							?>
			    		</div>
			    	</div>
			  	</div>
<!--			  	<div class="form-group mb-sm-2 mb-1">-->
<!--			    	<label class="mb-sm-1 mb-0 font-md-14" for="exampleInputPassword1">วัน/เดือน/ปีเกิด</label>-->
<!--			    	<input type="text" class="form-control font-md-14 datepicker" value="" id="age" data-provide="datepicker" name="age" placeholder="ระบุ วัน/เดือน/ปีเกิด" required>-->
<!--			  	</div>-->
				<div class="form-group mb-sm-2 mb-1">
			    	<label class="mb-sm-1 mb-0 font-md-14" for="exampleInputPassword1">ชื่อผู้ใช้</label>
			    	<input type="text" class="form-control font-md-14" name="username" id="username" maxlength="255" placeholder="กรอกชื่อผู้ใช้" required>
			  	</div>
			  	<div class="form-group mb-sm-2 mb-1">
			    	<label class="mb-sm-1 mb-0 font-md-14" for="exampleInputPassword1">อีเมล์</label>
			    	<input type="text" class="form-control font-md-14" name="email" id="email" maxlength="255" placeholder="กรอกอีเมล์" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
			  	</div>
			  	<div class="form-group mb-sm-2 mb-1">
			    	<label class="mb-sm-1 mb-0 font-md-14" for="exampleInputPassword2">รหัสผ่าน</label>
			    	<input type="password" class="form-control font-md-14" name="password" id="password" maxlength="255" placeholder="กรอกรหัสผ่าน" required>
			  	</div>
			  	<div class="mt-lg-5 mt-5">
<!--			  		<div class="form-check">-->
<!--					  	<label class="form-check-label font-sm-14">-->
<!--					    	<input type="checkbox" class="form-check-input" value="1" name="policy" required>ฉันได้อ่านและยอมรับ-->
<!--					    	<b class="font-weight-bold"><a class="font-lg-18 font-sm-14" data-toggle="modal" data-target="#policy">นโยบายความเป็นส่วนตัว</a></b> -->
<!--					    	ของ Novembor แล้ว.-->
<!--					  	</label>-->
<!--					</div>-->
			  	</div>
			  	<div class="mb-5 mb-sm-5">
			  		<a class="btn btn-orange w-100 mt-md-2 mt-2 mb-md-2" id="btn-register">
			  			สมัครสมาชิก
			  		</a>
			  	</div>
			  	<input type="submit" id="submit" hidden>
			</form>
		</div>
	</div>

	<div class="modal fade" id="policy">
	    <div class="modal-dialog">
	      	<div class="modal-content">

	        	<!-- Modal Header -->
	        	<div class="modal-header relative border-none pt-md-4 pt-4 pb-md-4 pl-md-4 pr-md-4" align="center">
	        		<b class="font-weight-bold text-title">นโยบายความเป็นส่วนตัว</b>
	        		<div class="row">
	        			<div class="col-12 mt-md-3 mt-2 text-indent" align="left">

	        				Novembor รับทราบและเคารพความเป็นส่วนตัวของบุคคล นโยบายนี้จะครอบคลุมข้อมูลส่วนบุคคลที่เNovemborเก็บรักษาไว้และกำหนดวิธีการที่เรารวบรวม ใช้ และเปิดเผยข้อมูลส่วนบุคคลของท่านเมื่อท่านเช้าชมเว็บไซต์ของเรา ในการใช้งานเว็บไซต์นี้ Novembor จะรวบรวมข้อมูลส่วนบุคคลที่ท่านให้ไว้กับเรา (เช่น การลงทะเบียนสมัครสมาชิก หรือกรอกแบบฟอร์มสั่งอาหาร) และรวบรวมข้อมูลเกี่ยวกับการใช้งานเว็บไซต์นี้ของท่าน (เช่น การสั่งซื้อ หรือการโพสต์เนื้อหาใดๆ บนเว็บไซต์ของเรา) เพื่อวัตถุประสงค์ของทาง Novembor
	        				<br>
	        				<br>

	        				เมื่อท่านใช้เว็บไซต์ของเราถือว่าท่านยอมรับ ให้ความยินยอม และตกลงตามเงื่อนไขและข้อกำหนดของนโยบายนี้แล้ว
	        			</div>
	 
	        		</div>
	          		<button type="button" class="close absolute btn-close-modal" data-dismiss="modal"><i class="fas fa-times"></i></button>
	        	</div>
	      	</div>
	    </div>
	</div>
	<input type="hidden" id="statusUser" value="" name="">
</div>

<script type="text/javascript" src="js/register.js"></script>

<?php include('footer.php') ?>




