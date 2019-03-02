<?php
    include('./connectDB.php');

    if(empty($_POST)) {
        header('Location: ../profile.php');
    }

    $id = $_POST['id'];

    $target_dir = "public/data-image/evidence/";
    $filename = basename($_FILES["customFile"]["name"]);
    $target_file = $target_dir . $filename;

    if (move_uploaded_file($_FILES["customFile"]["tmp_name"], "../".$target_file)) {
        echo "The file ". basename( $_FILES["customFile"]["name"]). " has been uploaded.";
        $update = "UPDATE `tbl_order` SET `evidence`= '".$target_file."' WHERE `orderID` = '".$id."'";
        if (mysqli_query($conn, $update) === TRUE) {
            echo "New order detail created successfully";
            header('Location: ../profile.php');
        }else{
            echo "Error order detail: " . $update . "<br>" . $conn->error;
        }
    }else{
        echo "Sorry, there was an error uploading your file.";
    }

    mysqli_close($conn);
    