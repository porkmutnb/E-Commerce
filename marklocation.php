<?php include('header.php') ?>

<div class="container mh-100 bg-white bg-shadow pb-md-5">
	<div class="row justify-content-center">
		<div class="col-lg-11 rounded mt-lg-5 mt-sm-4 mt-4 font-weight-bold text-title" align="center">
			<b>ลากแผนที่เพื่อเปลี่ยนตำแหน่ง</b>
		</div>
	</div>
	<div class="row pl-lg-5 pr-lg-5 pl-2 pr-2 mt-lg-5 mt-sm-3 mt-3">
		<div class="col-md-6 textoverflow align-self-start pl-lg-5 pr-lg-50 font-lg-16 font-md-14 font-12 relative">
			<i class="fas fa-map-marker-alt"></i>
			247 Suk Sawat 60 เขต ทุ่งครุ, แขวง บางมด, กรุงเทพมหานคร 10310
			<div class="btn-apply-location font-weight-bold">
				<a href="#">
					<u>นำไปใช้</u>
				</a>
			</div>
		</div>
	</div>
	<div class="row pl-lg-5 pr-lg-5 pl-2 pr-2 pt-lg-2 pt-1">
		<div class="col-md-6 textoverflow align-self-start pl-lg-5 pr-lg-50 font-lg-16 font-md-14 font-12 relative">
			<i class="fas fa-map-marker-alt"></i>
			สุขสวัสดิ์ 39 อำเภอ พระประแดง, ตำบล บางพึ่ง, สมุทรปราการ 30130
			<div class="btn-apply-location font-weight-bold">
				<a href="#">
					<u>นำไปใช้</u>
				</a>
			</div>
		</div>
	</div>
	<div class="row pl-lg-5 pr-lg-5 pl-md-3 pr-md-3 pl-2 pr-2 mt-md-3 mt-2">
		<div class="col-md-6 align-self-start pl-lg-5 pr-lg-3 font-lg-18">
			<div class="form-group">
		    	<input type="email" class="form-control textoverflow pr-lg-50 font-md-14 font-12 input-for-button" id="" placeholder="247 Suk Sawat 60 เขต ทุ่งครุ, แขวง บางมด, กรุงเทพมหาน..." disabled>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-6 pr-2 pr-md-3 d-none d-md-block">
			<a class="btn btn-danger w-100" data-toggle="modal" data-target="#myModal">ยืนยันที่อยู่</a>
		</div>
		<div class="col-md-3 col-sm-6 col-6 pl-2 pl-md-3 d-none d-md-block">
			<a href="" class="btn btn-default w-100">ยกเลิก</a>
		</div>
	</div>
	<div class="row justify-content-center pl-lg-5 pr-lg-5 pl-md-3 pr-md-3 pl-2 pr-2 mt-md-3 mt-2 pb-sm-4 pb-4">
		<div class="col-md-10 align-self-start pl-lg-5 pr-lg-3 font-lg-18">
			<div class="block-map w-100" id="block-map">

			</div>
		</div>
	</div>
	<div class="row pl-lg-5 pr-lg-5 pl-md-3 pr-md-3 pl-2 pr-2 mt-md-3 mt-2 pb-5 d-md-none">
		<div class="col-sm-6 col-6 pr-2 pr-md-3">
			<a class="btn btn-danger w-100" data-toggle="modal" data-target="#myModal">ยืนยันที่อยู่</a>
		</div>
		<div class="col-sm-6 col-6 pl-2 pl-md-3">
			<a href="" class="btn btn-default w-100">ยกเลิก</a>
		</div>
	</div>

	<div class="modal fade" id="myModal">
	    <div class="modal-dialog">
	      	<div class="modal-content">

	        	<!-- Modal Header -->
	        	<div class="modal-header relative border-none pt-md-4 pt-4 pb-md-4 pl-md-4 pr-md-4" align="center">
	        		<b class="font-weight-bold text-title">เบอร์โทรติดต่อ</b>
	        		<div class="row">
	        			<div class="col-12 mt-md-3 mt-2" align="left">
	        				<div class="form-group">
	        					<label class="mb-sm-1 mb-0 font-md-14 font-weight-bold" for="exampleInputEmail1">เบอร์โทร</label>
			    				<input type="tel" class="form-control font-md-14" id="" aria-describedby="emailHelp" placeholder="กรอกเบอร์โทร">
	        				</div>
	        			</div>
	        			<!-- <div class="col-6 mt-md-2 mt-2 mb-md-2 mb-2">
	        				<a href="{{ URL('myorder') }}" class="btn btn-danger w-100">ยืนยัน</a>
	        			</div>
	        			<div class="col-6 mt-md-2 mt-2 mb-md-2 mb-2">
	        				<a href="{{ URL('myorder') }}" class="btn btn-danger w-100">ยืนยัน</a>
	        			</div> -->
	        			<div class="modal-footer w-100 border-none pb-md-2 pb-2">
        					<button type="button" class="btn btn-default pl-md-4 pr-md-4 pl-3 pr-3" data-dismiss="modal">ยกเลิก</button>
        					<button type="button" class="btn btn-danger pl-md-4 pr-md-4 pl-4 pr-4">
        						<a href="myorder.php">ดำเนินการต่อ</a>
        					</button>
      					</div>
	        		</div>
	          		<button type="button" class="close absolute btn-close-modal" data-dismiss="modal"><i class="fas fa-times"></i></button>
	        	</div>
	      	</div>
	    </div>
	</div>

</div>

<?php include('footer.php') ?>






