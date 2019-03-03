<?php
    include('../connectDB.php'); 

    session_start();

    if (!empty($_SESSION['token'])) {
        $sql = "SELECT * FROM tbl_user WHERE 'remember_token' = '".$_SESSION['token']."'";
        if ($res = mysqli_query($conn, $sql)) { 
            if (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_array($res);
                $token = RandomString();
    
                $sqlupdate = "UPDATE tbl_user SET remember_token = '".$token."' WHERE email = '".$row['email']."'";
    
                if (mysqli_query($conn, $sqlupdate) === TRUE) {
                    echo "Record updated successfully";
    
                    session_start();
                    $_SESSION["token"] = $token;
                    header('Location: ../../backoffice/datauser.php');
    
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
            }else{
                echo "No Matching records are found."; 
                header('Location: ../../backoffice/admin.php');
            }
        } else {
            echo "ERROR: Could not able to execute $sql. ". mysqli_error($conn); 
            header('Location: ../../backoffice/admin.php');
        }
    }
