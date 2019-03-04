<?php
    session_start();

    if(empty($_SESSION['token'])) {
        header('Location: ../login.php');
    }

    include('./connectDB.php');

    $username = $_POST['username'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $gender = $_POST['gender'];

    echo $username." ".$email." ".$telephone." ".$gender;

    $sql = "UPDATE `tbl_user` SET `username`= '".$username."', `email`= '".$email."', `telephone`= '".$telephone."', `genderID`= '".$gender."' WHERE `remember_token` = '".$_SESSION['token']."'";

    if ( mysqli_query($conn, $sql) === TRUE ) {
        echo "Record updated successfully";
        header('Location: ../profile.php');

    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
