<!DOCTYPE html>
<html>
<head>
	<title> back office </title>

	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->

	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../public/css/font-awesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="../public/fonts/fonts.css">
	<link rel="stylesheet" type="text/css" href="../public/css/novembor.css">
	<script type="text/javascript" src="../public/js/jquery-3.3.1.min.js"></script>

	<!-- <script type="text/javascript" src="{{ URL('js/main.js') }}"></script> -->

</head>
<script type="text/javascript" src="../public/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../public/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
<body>
	<div class="">
		<div class="headerMain" id="headerMain">
			<div class="container font-white">
				<div class="row">
					<div class="col">
						<a href="#" class="font-lg-24 font-16">
							<!-- <img src="../public/image/logo-novembor-white.png" class="logo-banner"> -->
							Fashion Shop Backoffice
						</a>
					</div>
					<div class="col pt-md-4" align="right">
						<a href="./logout.php">ออกจากระบบ</a>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="../js/headerback.js"></script>

		<div class="container">
			<div class="row bg-shadow">
				<div class="col-md-3 bg-backoffice border-aaa mh-100">
					<div class="row">
						<div class="col-12 py-md-2 block-main-menu" id="block-main-menu-1">
							<a href="notification.php">
								<i class="fas fa-bell fa-lg pl-md-1"></i>
								แจ้งเตือน
							</a>
							<?php if($neworder>0) { ?>
								<div class="icon-notification-backoffice">
									<?php echo $neworder; ?>
								</div>
							<?php } ?>
						</div>
						<div class="col-12 py-md-2 block-main-menu" id="block-main-menu-2">
							<a href="orderinformation.php">
								<i class="fas fa-shopping-cart fa-lg"></i>
								ข้อมูลการสั่งซื้อ
							</a>
						</div>
						<div class="col-12 py-md-2 block-main-menu" id="block-main-menu-3">
							<a href="manageproducts.php">
								<i class="fas fa-list-alt fa-lg pl-md-1"></i>
								จัดการสินค้า
							</a>
						</div>
						<div class="col-12 py-md-2 block-main-menu" id="block-main-menu-4">
							<a href="datauser.php">
								<i class="fas fa-users fa-lg"></i>
								ข้อมูลผู้ใช้
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-9 bg-white pt-md-4">
			
			<!-- content -->
				
