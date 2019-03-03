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
					<b>รายละเอียดสินค้า</b>
				</div>
			</div>
			<div class="row mb-md-2">
				<div class="col-6 offset-md-6 align-self-end" align="right">
					<div class="row">
						<div class="col-4 pr-md-2">
							<a href="./addproduct.php" class="btn btn-primary text-white w-100 px-md-0">
								<i class="fas fa-plus-circle fa-md"></i>
								เพิ่มเมนู
							</a>
						</div>
						<div class="col-4 px-md-2">
							<a href="./editproduct.php?id=<?php echo $id; ?>" id="btnEdit" class="btn btn-secondary text-white w-100 px-md-0">
								<i class='fas fa-pen'></i>
								แก้ไข
							</a>
						</div>
						<div class="col-4 pl-md-2">
							<a class="btn text-white w-100 px-md-0" data-toggle="modal" data-target="#modalDelete" style="background-color: #ff0000;">
								<i class="fas fa-trash-alt"></i>
								ลบ
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row mb-md-5">
				<div class="col">
					<div class="row mx-md-0 bg-f0f0f0 py-md-3">
						<div class="col-6">
							<?php
								if (file_exists("../".$fetchproduct['image'])) {
									?> <img src="../<?php echo $fetchproduct['image']; ?>" id="image" class="w-100"> <?php
								}else {
									?> <img src="<?php echo $fetchproduct['image']; ?>" id="image" class="w-100"> <?php
								}
							?>
						</div>
						<div class="col-6 pl-md-0">
							<div class="pb-md-2">
								<b>ชื่อเมนู : </b>
								<div class="inline" id="name"><?php echo $fetchproduct['productName']; ?></div>
							</div>
							<div class="pb-md-2">
								<b>รายละเอียด</b>
								<div class="pl-md-4" id="detail">
									<?php echo $fetchproduct['productDetail']; ?>
								</div>
							</div>
							<div class="pb-md-2">
								<b>ประเภท : </b>
								<div class="inline" id="type"><?php echo $fetchproduct['categoryName']; ?></div>
							</div>
							<div class="pb-md-2">
								<b>ราคา : </b>
								<div class="inline" id="price"><?php echo $fetchproduct['price']; ?> บาท</div>
							</div>
                            <div class="pb-md-2">
                                <b>คงเหลือ : </b>
                                <div class="inline" id="amount">
									<?php 
										if($fetchproductorder['qualtity']=="") {
											echo ($fetchproduct['qualtity']);
										}else{
											echo ($fetchproduct['qualtity'] - $fetchproductorder['qualtity']); 
										}
									?>
								ชิ้น</div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modalDelete">
	    <div class="modal-dialog">
	      	<div class="modal-content">

	        	<!-- Modal Header -->
	        	<div class="modal-header relative border-none pt-md-4 pt-4 pb-md-4 pl-md-4 pr-md-4" align="center">
	        		<b class="font-weight-bold text-title">แจ้งเตือน</b>
	        		<div class="row">
	        			<div class="col-12 mt-md-3 mt-1 font-lg-18" align="center">
	        				คุณต้องการลบสินค้านี้หรือไม่ ?
	        			</div>
	        			<div class="col">
	        				<div class="row mt-md-4 mb-md-0">
	        					<div class="col-6 pr-md-2">
	        						<a class="btn btn-danger w-100" onclick="deleteProduct(<?php echo $id; ?>)">ลบ</a>
	        					</div>
	        					<div class="col-6 pl-md-2">
	        						<a href="#" class="btn btn-default w-100" data-dismiss="modal">ยกเลิก</a>
	        					</div>
	        				</div>
	        			</div>
	 
	        		</div>
	          		<button type="button" class="close absolute btn-close-modal" data-dismiss="modal"><i class="fas fa-times"></i></button>
	        	</div>
	      	</div>
	    </div>
	</div>
	<script type="text/javascript" src="../js/productdetail.js"></script>
	<script>
		function deleteProduct(pid) {
			window.location.href = "../controller/backoffice/deleteproduct.php?id="+pid;
		}
	</script>

<?php include('footer.php') ?>





