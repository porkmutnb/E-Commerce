
	<div class="modal fade" id="modalProduct">
	    <div class="modal-dialog w-lg-700">
	      	<div class="modal-content">
	        	<div class="modal-header relative border-none pt-md-5 pt-4 pb-md-4 pl-md-4 pr-md-4">
	        		<div class="row">
	        			<div class="col-md-6 col-sm-6 col-12 pr-md-0 pt-sm-0 pt-4">
	        				<img src="public/image/pd-1.jpeg" id="productImage" class="w-100">
	        				<div class="col-md-6 col-sm-6 col-12 d-sm-none pl-sm-0 pl-3 pr-0 pt-sm-0 pt-2">
	        					<strong class="font-weight-bold font-lg-20 font-sm-18" id="pdn1">เสื้อแขนยาว</strong>
	        				</div>
	        				<div class="row pt-md-3 pt-1 pt-sm-3 pb-3">
	        					<div class="col">
	        						<div class="block-add-number">
	        							<div class="row ml-md-0 mr-md-0 ml-0" align="center">
	        								<div class="col-md-4 col-4 plr-md-0">
	        									<button class="btn-circle rounded-circle" onclick="increment()">
	        										<i class="fas fa-plus"></i>
	        									</button>
	        								</div>
	        								<div class="col-md-4 col-4 pt-md-1 pt-1 pl-md-0 pr-md-0 font-lg-18" id='productQualtity'>
	        									1
	        								</div>
	        								<div class="col-md-4 col-4 plr-md-0">
	        									<button class="btn-circle rounded-circle" onclick="decrement()">
	        										<i class="fas fa-minus"></i>
	        									</button>
	        								</div>
	        							</div>
	        						</div>
	        					</div>
	        					<div class="col font-weight-bold font-lg-24" align="right">
	        						<span id="productPrice">199</span> บาท
	        					</div>
	        				</div>
	        			</div>
	        			<div class="col-md-6 col-sm-6 col-12 d-none d-sm-block pl-sm-0 pl-md-3 pl-3 pt-sm-0 pt-4">
	        				<strong class="font-weight-bold font-lg-20 font-sm-20" id="pdn2">เสื้อแขนยาว</strong>
	        				<ul class="pt-md-2 pl-4 font-sm-16">
	        					<li id="productDetail">เสื้อแขนยาว</li>
	        				</ul>
	        			</div>
	        			<div class="col-md-12 mt-md-3 mt-3" onclick="sendBasket()">
	        				<a class="btn btn-orange w-100">สั่งซื้อ</a>
	        			</div>
	        		</div>
	          		<button type="button" class="close absolute btn-close-modal" data-dismiss="modal"><i class="fas fa-times"></i></button>
	        	</div>
	      	</div>
	    </div>
	</div>

	<script>
		let productOneID;
		let productOnePrice;
		function showProductDetail(index, productID) {
			var productName = document.getElementById('productName'+index).innerHTML;
			var productDetail = document.getElementById('productDetail'+index).innerHTML;
			var productPrice = document.getElementById('productPrice'+index).innerHTML;
			var productImage = document.getElementById('productImage'+index).src;
			productOnePrice = productPrice;
			productOneID = productID;
			document.getElementById('pdn1').textContent = productName;
			document.getElementById('pdn2').textContent = productName;
			document.getElementById('productDetail').innerHTML = productDetail;
			document.getElementById('productPrice').innerHTML = productPrice;
			document.getElementById('productImage').src = productImage;
			$('#modalProduct').modal('show')
			console.log(index, " ",productID, " ", productName, " ", productPrice, " ", productImage);
		}
		function increment() {
			var productQualtity = document.getElementById('productQualtity').innerHTML;
			if(parseInt(productQualtity)<50) {
				var newProductQualtity = parseInt(productQualtity) + 1;
				var newProductPrice = newProductQualtity * parseInt(productOnePrice);
				document.getElementById('productQualtity').innerHTML = newProductQualtity;
				document.getElementById('productPrice').innerHTML = newProductPrice;
			}
		}
		function decrement() {
			var productQualtity = document.getElementById('productQualtity').innerHTML;
			if(parseInt(productQualtity)>1) {
				var newProductQualtity = parseInt(productQualtity) - 1;
				var newProductPrice = newProductQualtity * parseInt(productOnePrice);
				document.getElementById('productQualtity').innerHTML = newProductQualtity;
				document.getElementById('productPrice').innerHTML = newProductPrice;
			}
		}
		function sendBasket() {
			var productQualtity = document.getElementById('productQualtity').innerHTML;
			console.log(productOneID, productQualtity.trim(), productOnePrice);
			window.location.href = "./myorder.php?id="+productOneID+"&qty="+productQualtity.trim()+"&price="+productOnePrice;
		}
	</script>



