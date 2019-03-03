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
                header('Location: ../../backoffice/manageproducts.php');
            }
        
            $id = $_GET['id'];
        
            $deleteproductimage = "DELETE FROM `tbl_product_image` WHERE `productID` = ".$id;
        
            if (mysqli_query($conn, $deleteproductimage)===true) {
                $deleteproduct = "DELETE FROM `tbl_product` WHERE `productID` = ".$id;
                if(mysqli_query($conn, $deleteproduct)===true){
                    echo "Delete record successfully <br>";
                    header('Location: ../../backoffice/manageproducts.php');
                }
            }else{
                echo "Error delete: " . $deleteproduct . "<br>" . $conn->error."<br>";
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