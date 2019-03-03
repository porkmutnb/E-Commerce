<?php
    function RandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 5; $i++) {
            $randstring .= $characters[rand(0, strlen($characters))];
        }
        return $randstring;
    }

    session_start();

    if(empty($_SESSION['token'])) {
        header('Location: ../login.php');
    }

    if (empty($_POST)) {
        header('Location: ../home.php');
    }

    include('./connectDB.php');

    $sqluser = "SELECT * FROM tbl_user WHERE remember_token = '".$_SESSION['token']."'";
    $res = mysqli_query($conn, $sqluser);
    $user = mysqli_fetch_array($res);

    //$file = $_POST['customFile'];
    $addr = $_POST['address'];

    $target_dir = "public/data-image/evidence/";
    $rand = RandomString();
    $filename = basename($_FILES["customFile"]["name"]);
    $target_file = $target_dir . $filename;

    if (move_uploaded_file($_FILES["customFile"]["tmp_name"], "../".$target_file)) {
        echo "The file ". basename( $_FILES["customFile"]["name"]). " has been uploaded.";
        $sqlorder = $sql = "INSERT INTO tbl_order (`userID`, `address`, `evidence`)VALUES ('".$user['userID']."', '".$addr."', '".$target_file."')";
    } else {
        echo "Sorry, there was an error uploading your file.";
        $sqlorder = $sql = "INSERT INTO tbl_order (`userID`, `address`)VALUES ('".$user['userID']."', '".$addr."')";
    }

    if ($conn->query($sqlorder) === TRUE) {
        echo "New order created successfully";

        $sqlorderlast = "SELECT * FROM tbl_order ORDER BY orderID DESC LIMIT 1";
        $query = mysqli_query($conn, $sqlorderlast);
        $orderlast = mysqli_fetch_array($query);

        $array = explode(",", $_SESSION['basket']);
        for ($i=0; $i < count($array); $i++) {
            $e = explode(":", $array[$i]);
            $sqlorderdetail = "INSERT INTO tbl_order_detail (`orderID`, `productID`, `qualtity`)VALUES ('".$orderlast['orderID']."', '".$e[0]."', '".$e[1]."')";
            if (mysqli_query($conn, $sqlorderdetail) === TRUE) {
                echo "New order detail created successfully ".$i+1;
            }else{
                $deleteorder = "DELETE FROM tbl_order WHERE orderID = '".$orderlast['orderID']."'";
                $conn->mysqli_query($deleteorder);
                echo "Error order detail: " . $sqlorderdetail . "<br>" . $conn->error;
                break;
            }
        }
        unset($_SESSION['basket']);
        header('Location: ../profile.php');
    } else {
        echo "Error order: " . $sqlInsert . "<br>" . $conn->error;
    }

    mysqli_close($conn);