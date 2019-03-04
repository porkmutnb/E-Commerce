<?php

    session_start();

    include('../connectDB.php');

    $token = $_SESSION['token'];

    $sql = "SELECT * FROM `tbl_user` WHERE `remember_token` ='".$token."'";

    $query = mysqli_query($conn, $sql);

    if($query==true) {

        $admin = mysqli_fetch_array($query);

        if($admin['status']=="admin") {
            if (empty($_GET)) {
                header('Location: ../../backoffice/orderinformation.php');
            }
        
            $oid = $_GET['id'];
            $type = $_GET['type'];
        
            switch ($type) {
                case 'verify':
                    //$sqlupdateorder = "UPDATE `tbl_order` SET `notification` = 0, `status` = 2 WHERE `orderID` = ".$oid;
                    $sqlupdateorder = "UPDATE `tbl_order` SET `status` = 2 WHERE `orderID` = ".$oid;
                    break;
                case 'deliverly':
                    $sqlupdateorder = "UPDATE `tbl_order` SET `status` = 3 WHERE `orderID` = ".$oid;
                    break;
                default:
                    header('Location: ../../backoffice/orderinformation.php');
                    break;
            }

            if(mysqli_query($conn, $sqlupdateorder)===true){
                echo "Update record successfully <br>";
                header('Location: ../../backoffice/orderinformation.php');
            }else {
                echo "Error edit: " . $sqlupdateorder . "<br>" . $conn->error."<br>";
            }
        }else{
            header('Location: ./admin.php');
            echo "No admin";
        }

    }else{
        echo "No records";
        header('Location: ./admin.php');
    }

    mysqli_close($conn);