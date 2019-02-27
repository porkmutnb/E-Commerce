<?php 
	include('./controller/query_category.php'); 

	session_start();

	if(!empty($_SESSION['token'])) {
		echo $_SESSION['token'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title> E-commerce </title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="public/css/font-awesome/css/all.css">
	<!-- <link rel="stylesheet" type="text/css" href="{{ URL('css/app.css') }}"> -->
	<link rel="stylesheet" type="text/css" href="public/fonts/fonts.css">
	<link rel="stylesheet" type="text/css" href="public/css/novembor.css">

	<!-- <script type="text/javascript" src="{{ URL('js/bootstrap.min.js') }}"></script> -->

	<script type="text/javascript" src="public/js/jquery-3.3.1.min.js"></script>

	<script type="text/javascript" src="public/js/main.js"></script>

</head>
<link rel="stylesheet" type="text/css" href="public/lib/bootstrap-datepicker.css">
	<script type="text/javascript" src="public/lib/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="public/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="public/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="public/js/bootstrap.min.js"></script>
<body>
	<div class="">
		<div class="headerMain" id="headerMain">
			<div class="container font-white">
				<div class="row mlr-sx-0">
					<div class="col-md-6 col-sm-6 col-6 pl-0 pl-sm-2">
						<a href="home.php">
							<img src="public/image/logo-novembor-white.png" class="logo-banner">
						</a>
					</div>
					<div class="col-md-6 col-sm-6 col-6 plr-xs-0 plr-xs-0" align="right">
						<div class="block-right-main" align="center">
							<div class="row align-middle">
								<div class="col">
									<a href="home.php" class="font-white">
										หน้าหลัก
									</a>
								</div>
								<?php  
									if(empty($_SESSION['token'])) {
										?>
											<div class="col">
												<a href="login.php" class="font-white">
													เข้าสู่ระบบ
												</a>
											</div>
										<?php
									}else{
										?>
											<div class="col">
												<a href="logout.php" class="font-white">
													ลงชื่อออก
												</a>
											</div>
										<?php
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="block-top-menu">
			<div class="tapTopMain shadow-sm" id="tapTopMain">
				<div class="container font-white">
					<div class="row">
						<div class="col-md-4 col-sm-5 col-7 block-top-menu font-lg-14 font-xs-12">
							<div class="row" align="center">
								<?php
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											echo "<div class='col plr-md-0'>".
												 "<a href='listmenu.php'>".
												 $row['categoryName'].
												 "</a>".
												 "<div class='line-top-menu'>|</div>".
												 "</div>";
										}
									}else{
										echo 	"<div class='col plr-md-0'>".
												"<a href='#'>".
                                			    "ไม่มีข้อมูล".
												"</a>".
												"<div class='line-top-menu'>|</div>".
												"</div>";
									}
								?>
							</div>
						</div>
						<div class="col-md-4 col-sm-7 col-5 offset-md-4 block-top-menu" align="right">
							<div class="dropdown">
								<a href="myorder.php" >
									<div class="relative block-list-order">รายการที่สั่ง
                                        <i class="fa fa-shopping-cart font-lg-24"></i>
										<div class="noti-count">
											3
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		