<?php 
	include('header.php'); 

	include('./controller/query_product.php');
?>

<!-- <script type="text/javascript" src="{{ URL('js/bootstrap.min.js') }}"></script> -->
<link rel="stylesheet" type="text/css" href="public/css/layout-home.css">

<div class="container mh-100 bg-white bg-shadow pb-md-5">
	<div class="row">
		<div class="col plr-md-0">
			<div class="block-slide-image">
				<img src="public/image/banner-cover.png" class="w-100 h-100 fit-cover">
			</div>
		</div>
	</div>
	<div class="row text-dark">
		<div class="col-md-12 col-sm-12 col-12 pt-md-4 pt-3 pb-3 font-lg-22 font-sm-18 pb-md-4" align="center">
			แนะนำสินค้า
		</div>
		<?php
			if (mysqli_num_rows($product) > 0) {
				$i = 1;
				while($row = $product->fetch_assoc()) {
					echo "<div class='col-md-4 col-sm-4 col-4 pr-md-2 pr-1 pl-md-3 pl-2 mb-2 mb-md-3'>";
					echo "<div class='col block-product pl-0 pr-0 pointer' onclick='showProductDetail(".$i.",".$row['productID'].")'>";
					echo "<div class='label-nameproduct w-100 font-lg-26 font-md-22 font-12 pt-md-2 pt-lg-2 pt-2 font-sm-16 pl-md-4 pl-2' id='productName".$i."'>";
					echo $row['productName'];
					echo "</div>";
					echo "<div style='display:none;' id='productDetail".$i."'>".$row['productDetail']."</div>";
					echo "<div class='label-priceproduct font-lg-22 font-md-18 font-sm-14 font-12 b-2 r-2'>";
					echo "<p id='productPrice".$i."'>".$row['price']."</p>"."<div class='inline font-lg-18 font-md-14 font-sm-12 font-10'>บาท.</div>";
					echo "</div>";
					echo "<img src='".$row['image']."' class='w-100 h-100 fit-cover' id='productImage".$i."'>";
					echo "</div>";
					echo "</div>";
					$i++;
				}
			}else{

			}
		?>
	<?php 
		include('modalProduct.php');
	?>
</div>
<div class="row">
		<div class="col pt-md-5 mb-lg-5 mb-sm-5 mb-5 pt-3 pb-md-1 pb-4 pl-5 pr-5" align="center">
			<a href="myorder.php" class="btn btn-orange w-100" style="">รายการที่สั่งซื้อ</a>
		</div>
	</div>
<?php 
	include('footer.php');
?>


























