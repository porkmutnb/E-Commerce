<?php
    include('./controller/connectDB.php');

    $sql = "SELECT tbl_user.userID, tbl_user.username , tbl_user.email, tbl_user.telephone, tbl_user.genderID, tbl_gender.genderName, tbl_user.remember_token, tbl_user.status FROM tbl_user JOIN tbl_gender ON tbl_gender.genderID = tbl_user.genderID WHERE tbl_user.remember_token = '".$_SESSION['token']."'";

    if ($res = mysqli_query($conn, $sql)) { 
	    if (mysqli_num_rows($res) > 0) {
            $user = mysqli_fetch_array($res);
        }else{
            echo "No Matching records are found."; 
            //header('Location: ./login.php');
        }
    } else {
        echo "ERROR: Could not able to execute $sql. ". mysqli_error($conn); 
        //header('Location: ./login.php');    
    }

    mysqli_close($conn);