<?php 
    include('header.php'); 

    if(empty($_SESSION['token'])) {
        header('Location: ./login.php');
    }

    include('./controller/query_profile.php');

    include('./controller/query_gender.php');
?>

<div class="container mh-100 bg-shadow bg-white pb-md-5">
    <div class="row mb-md-4 mb-lg-5 mb-3" align="center">
        <div class="col mt-lg-5 mt-sm-4 mt-4 font-weight-bold text-title">
            <b>โปรไฟล์</b>
        </div>
    </div>
    <form action="./controller/update_profile.php" method="POST">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="form-group">
                            <label class="mb-sm-1 mb-0 font-md-14">ชื่อผู้ใช้</label>
                            <input type="text" class="form-control font-md-14" id="" placeholder="กรอกชื่อผู้ใช้" value="<?php echo $user['username']; ?>" name="username" required>
                        </div>
                        <div class="form-group">
                            <label class="mb-sm-1 mb-0 font-md-14">อีเมล?</label>
                            <input type="text" class="form-control font-md-14" id="" placeholder="กรอกอีเมล์" value="<?php echo $user['email']; ?>" name="email" required>
                        </div>
                        <div class="form-group">
                            <label class="mb-sm-1 mb-0 font-md-14">เบอร์โทร</label>
                            <input type="text" class="form-control font-md-14" id="" placeholder="กรอกเบอร์โทร" value="<?php echo $user['telephone']; ?>" name="telephone" required>
                        </div>
                        <div class="form-group mb-sm-2 mb-1">
                            <label class="mb-sm-1 mb-0 font-md-14" for="exampleInputPassword1">เพศ</label>
                            <div class="col-sm-6 col-8">
                                <div class="row">
                                    <?php
	    						    	if ($result->num_rows > 0) {
	    						    		// output data of each row
	    						    		while($row = $result->fetch_assoc()) {
                                                if ($row['genderID']==$user['genderID']) {
                                                    echo	"<div class='col'>".
	    						    					"<label class='label-radio font-lg-16'>".$row["genderName"].
	    						    					"<input type='radio' value='".$row["genderID"]."' name='gender' checked required>".
	    						    					"<span class='checkmark'></span>".
	    						    					"</label>".
	    						    					"</div>";
                                                }else {
                                                    echo	"<div class='col'>".
	    						    					"<label class='label-radio font-lg-16'>".$row["genderName"].
	    						    					"<input type='radio' value='".$row["genderID"]."' name='gender' required>".
	    						    					"<span class='checkmark'></span>".
	    						    					"</label>".
	    						    					"</div>";
                                                }
	    						    		}
	    						    	}
	    						    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-orange w-100 mt-md-2 mt-2 mb-md-2"> Save </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>                                    
</div>

<?php include('footer.php') ?>




