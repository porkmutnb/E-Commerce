<?php
    include('./controller/connectDB.php');

    $sql = "SELECT categoryID, categoryName FROM tbl_category";
    $result = $conn->query($sql);

    $conn->close();