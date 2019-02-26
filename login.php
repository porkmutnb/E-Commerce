
<?php 
	include('header.php'); 
?>

<div class="container mh-100 bg-white bg-shadow pb-md-5">
	<div class="pt-md-5 pt-4 mb-md-4 mb-2 text-title font-weight-bold" align="center">
		<b> เข้าสู่ระบบ </b>
	</div>
	<div class="row justify-content-center">
		<div class="col-lg-6 col-md-7 col-sm-9">
			<form action="register.php" method="GET">
			  	<div class="form-group">
			    	<label class="mb-sm-1 mb-0 font-md-14" for="exampleInputEmail1">อีเมล์</label>
			    	<input type="email" class="form-control font-md-14" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="กรอกอีเมล์" required>
			  	</div>
			  	<div class="form-group mb-sm-2 mb-1">
			    	<label class="mb-sm-1 mb-0 font-md-14" for="exampleInputPassword1">รหัสผ่าน</label>
			    	<input type="password" class="form-control font-md-14" id="exampleInputPassword1" placeholder="กรอกรหัสผ่าน">
			  	</div>
<!--			  	<div class="" align="right">-->
<!--			    	<a class="pointer font-md-14" data-toggle="modal" data-target="#myModal"><u>ลืมรหัสผ่าน?</u></a>-->
<!--			  	</div>-->
			  	<div>
			  		<a href="home.php" class="btn btn-orange w-100 mt-md-4 mt-4 mb-md-2">
			  			เข้าสู่ระบบ
			  		</a>
			  	</div>
			  	<div class="mt-md-5 mt-4 relative" align="center">
			  		<div class="bg-white absolute absolute-center label-notRegister font-md-14 font-14">
			  			ยังไม่เป็นสมาชิก
			  		</div>
			  		<hr>
			  	</div>
			  	<div class="mb-5">
			  		<a href="register.php" class="btn btn-default w-100 mt-md-3 mt-2">
			  			สมัครสมาชิก
			  		</a>
			  	</div>
			</form>
		</div>
	</div>

	<div class="modal fade" id="myModal">
	    <div class="modal-dialog">
	      	<div class="modal-content">

	        	<!-- Modal Header -->
	        	<div class="modal-header relative border-none pt-md-4 pt-4 pb-md-4 pl-md-4 pr-md-4" align="center">
	        		<b class="font-weight-bold text-title">ลืมรหัสผ่าน?</b>
	        		<div class="pt-md-2 pt-2 font-14">
	        			กรุณากรอกอีเมลที่ได้ลงทะเบียนไว้ เราจะส่งวิธีตั้งรหัสผ่านใหม่ให้ในอีเมล์ของคุณ
	        		</div>
	        		<div class="row">
	        			<div class="col-12 mt-md-3 mt-2" align="left">
	        				<div class="form-group">
	        					<label class="mb-sm-1 mb-0 font-md-14 font-weight-bold" for="exampleInputEmail1">อีเมล์</label>
			    				<input type="email" class="form-control font-md-14" id="" aria-describedby="emailHelp" placeholder="กรอกอีเมล์">
	        				</div>
	        			</div>
	        			<div class="col-12 mt-md-2 mt-2 mb-md-2 mb-2">
	        				<a href="" class="btn btn-danger w-100">ยืนยัน</a>
	        			</div>
	        		</div>
	          		<button type="button" class="close absolute btn-close-modal" data-dismiss="modal"><i class="fas fa-times"></i></button>
	        	</div>
	      	</div>
	    </div>
	</div>
</div>

<?php include('footer.php') ?>

