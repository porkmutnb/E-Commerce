<?php 
	include('header.php');		//header('Location: ./home.php');

	if(!empty($_GET)) {
		$id = $_GET['id'];
		$qty = $_GET['qty'];
		$price = $_GET['price'];
	}
	if(!empty($_SESSION['basket'])) {
		if(!empty($_GET)) {
			$check = explode(",", $_SESSION['basket']);
			if (!in_array($id.":".$qty, $check)) {
				$_SESSION['basket'] .= $id.":".$qty.",";
			}
			$_SESSION['basket'] = substr($_SESSION['basket'], 0, strlen($_SESSION['basket'])-1);
		}
		include('./controller/query_product_one.php');
	}else{
		if(!empty($_GET)) {
			$_SESSION['basket'] .= $id.":".$qty.",";
			$_SESSION['basket'] = substr($_SESSION['basket'], 0, strlen($_SESSION['basket'])-1);
			include('./controller/query_product_one.php');
		}
	}
?>

<div class="container mh-100 bg-shadow pb-md-5">
	<div class="row mb-md-4 mb-lg-5 mb-3" align="center">
		<div class="col mt-lg-5 mt-sm-4 mt-4 font-weight-bold text-title">
			<b>รายการที่สั่ง</b>
		</div>
	</div>

	<div class="row pl-lg-5 pr-lg-5">
		<div class="col-md-7 col-12 pr-md-2 d-none d-md-block"> <!-- block list order -->
			<div class="row">
				<div class="col-12">
					<div class='bg-white border-1-ddd mb-md-3 pt-md-3 pb-md-3 pl-md-3 pr-md-3'>
						<?php 
							$totalQty = 0; $totalPrice = 0;
							if(!empty($_SESSION['basket'])) {
								$array = explode(",", $_SESSION['basket']);
								if (mysqli_num_rows($product) > 0) {
									while($row = $product->fetch_assoc()) {
										$Qty = 0;
										for ($i=0; $i < count($array); $i++) { 
											$e = explode(":", $array[$i]);
											$totalQty += $e[1];
											if($e[0]==$row['productID']) {
												$Qty = $e[1];
												$totalPrice += ($e[1]*$row['price']);
											}else{
												$totalPrice += ($e[1]*$row['price']);
											}
										}
										echo	"<div class='row'>";
										echo	"<div class='col-md-4'>";
										echo	"<img src='".$row['image']."' class='w-100 border-1-ddd'>";
										echo	"</div>";
										echo	"<div class='col-md-5 pl-md-0 pr-md-0 font-weight-bold font-md-14'>";
										echo	$row['productName'];
										echo	"</div>";
										echo	"<div class='col-md-3 pl-md-0 font-weight-bold font-md-14' align='right'>";
										echo	$Qty." รายการ";
										echo	"<div class='absolute b-lg-0 r-lg-0 pr-md-3 font-weight-bold font-lg-20 font-md-16'>";
										echo	$row['price']*$Qty." บาท.";
										echo	"</div>";
										echo	"</div>";
										echo	"</div>";
									}
								}
							}
						?>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-5 col-12 pl-md-2"> <!-- block price order -->
			<div class="bg-white border-1-ddd pt-md-2 pt-lg-4 pb-md-3 pl-md-3 pr-md-3 pt-3 pb-3 pl-3 pr-3">
				<div class="row">
					<div class="col-md-6 col-6 pt-md-1 pt-lg-2px font-lg-16 font-md-14">
						<?php echo $totalQty; ?> รายการ
					</div>
					<div class="col-md-6 col-6 font-weight-bold font-lg-20 font-md-16" align="right">
						<?php echo $totalPrice; ?> บาท
					</div>
				</div>
				<div class="row pt-md-2 pt-2">
					<div class="col-md-6 col-6 font-md-14 pt-md-1 pt-lg-0">
						ค่าจัดส่ง
					</div>
					<div class="col-md-6 col-6 font-weight-bold font-lg-20 font-md-16" align="right">
						ฟรี
					</div>
					<div class="col-md-12 col-12 pt-md-3 pt-2">
						<div class="border-b-black-1"></div>
					</div>
				</div>
				<div class="row pt-md-3 pt-2">
					<div class="col-md-6 col-6 font-weight-bold pt-md-1 pt-1 font-lg-18 font-md-14">
						ยอดรวมทั้งหมด
					</div>
					<div class="col-md-6 col-6 font-weight-bold font-lg-22 font-md-18" align="right">
						<?php echo $totalPrice; ?> บาท
					</div>
				</div>
				<div class="row pt-md-5 pt-4">
					<div class="col-md-12 mb-md-3 mb-3">
						<a class="btn btn-orange w-100" href="./payment.php">
							ชำระเงิน
						</a>
					</div>
					<div class="col-md-12">
						<a href="./home.php" class="btn btn-default w-100 font-weight-bold">
							เพิ่มรายการสั่งซื้อ
						</a>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<?php include('footer.php') ?>
