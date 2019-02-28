<?php
	include('../controller/backoffice/query_admin.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>  </title>
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../public/css/font-awesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="../public/fonts/fonts.css">
	<link rel="stylesheet" type="text/css" href="../public/css/novembor.css">
	<script type="text/javascript" src="../public/js/jquery-3.3.1.min.js"></script>

</head>
<script type="text/javascript" src="../public/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../public/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
<body>
	<div class="">
		<div class="headerMain" id="headerMain">
			<div class="container font-white">
				<div class="row">
					<div class="col" align="center">
						<a href="#">
							<!-- <img src="../public/image/logo-novembor-white.png" class="logo-banner"> -->
							<h3 style="padding-top: 15px;"> E-commerce Backoffice </h3>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="container mh-100">
			<div class="row mt-md-5">
				<div class="col-6 offset-md-3 bg-white bg-shadow px-md-4 py-md-4">
					<h3 align="center">เข้าสู่ระบบ</h3>
					<form action="../controller/backoffice/admin.php" method="POST">
						<div class="row px-md-4 pb-md-2">
							<div class="col-12">
			  					<div class="form-group">
			    					<label class="mb-sm-1 mb-0 font-md-14" for="">อีเมล์</label>
			    					<input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" class="form-control font-md-14" name="email" id="email" placeholder="กรอกอีเมล์" required>
			  					</div>
							</div>
							<div class="col-12 mb-md-4">
			  					<div class="form-group">
			    					<label class="mb-sm-1 mb-0 font-md-14" for="">รหัสผ่าน</label>
			    					<input type="password" class="form-control font-md-14" name="password" id="password" placeholder="กรอกรหัสผ่าน" required>
			  					</div>
							</div>
							<div class="col-6 pr-md-3">
			  					<!-- <a href="notification.php" class="btn btn-danger w-100">เข้าสู่ระบบ</a> -->
			  					<a class="btn btn-danger w-100" id="login">เข้าสู่ระบบ</a>
							</div>
							<div class="col-6 pl-md-3">
			  					<a href="../index.php" class="btn btn-default w-100">ยกเลิก</a>
							</div>
						</div>
						<input type="submit" id="submit" hidden>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="../js/admin.js"></script>

		<div class="footerMain-backoffice" align="center">
			<div class="blockFooter text-white font-sm-12">
				
			</div>
		</div>
	</div>
</body>
</html>