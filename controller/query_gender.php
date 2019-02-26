<?php

    include('./controller/connectDB.php'); 

    $genderList = array();

    $sql = "SELECT genderID, genderName FROM tbl_gender";
    $result = $conn->query($sql);

    $conn->close();