<?php 

    function RandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 30; $i++) {
            $randstring .= $characters[rand(0, strlen($characters))-1];
        }
        return $randstring;
    }

    include('connectDB.php');

	$email = $_POST["email"];
    $password = md5($_POST["password"]);
    
    echo "Loading....<br>";

    $sql = "SELECT * FROM `tbl_user` WHERE `email` = '".$email."' AND `password` = '".$password."'";

    echo $sql."<br>";

    if ($res = mysqli_query($conn, $sql)) { 
	    if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            $token = RandomString();

            $sqlupdate = "UPDATE tbl_user SET remember_token = '".$token."' WHERE email = '".$row['email']."'";

            if (mysqli_query($conn, $sqlupdate) === TRUE) {
                echo "Record updated successfully";

                session_start();
                $_SESSION["token"] = $token;
                if($row['status']=="admin") {
                    header('Location: ../backoffice/orderinformation.php');
                }else{
                    header('Location: ../home.php');
                }
                
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }else{
            echo "No Matching records are found."; 
            header('Location: ../login.php');
        }
    } else {
        echo "ERROR: Could not able to execute $sql. ". mysqli_error($conn); 
        header('Location: ../login.php');
    }

    mysqli_close($conn);

    // if ($result->num_rows > 0) {
    //     $row = $result->fetch_assoc();
    //     echo $row[0]['username'];
    // }else{
    //     header('Location: ../login.php');
    // }