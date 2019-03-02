<?php
    include('./controller/connectDB.php');

    $sql = "SELECT tbl_product.productID, tbl_product.productName, tbl_product.productDetail, tbl_product.price, tbl_product.qualtity, tbl_product_image.image  FROM tbl_product JOIN tbl_product_image ON tbl_product_image.productID = tbl_product.productID ORDER BY tbl_product.created_at DESC";

    $product = mysqli_query($conn, $sql);

    mysqli_close($conn);