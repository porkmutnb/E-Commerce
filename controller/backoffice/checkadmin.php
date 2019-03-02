<?php

    session_start();

    include('../controller/connectDB.php');

    $token = $_SESSION['token'];

    $sql = "SELECT * FROM `tbl_user` WHERE `remember_token` ='".$token."'";

    $query = mysqli_query($conn, $sql);

    if($query==true) {

        $admin = mysqli_fetch_array($query);

        if($admin['status']=="admin") {

        }else{
            //header('Location: ./admin.php');
            echo "No admin";
        }

    }else{
        echo "No records";
        //header('Location: ./admin.php');
    }

    mysqli_close($conn);