<?php
    include('./controller/connectDB.php');

    $sqlcategory = "SELECT * FROM tbl_category WHERE categoryID = '".$categoryID."'";

    $query = mysqli_query($conn, $sqlcategory);

    $category = mysqli_fetch_array($query);

    $sql = "SELECT tbl_product.productID, tbl_product.productName, tbl_product.productDetail, tbl_product.price, tbl_product.qualtity, tbl_product_image.image , tbl_category.categoryName FROM tbl_product JOIN tbl_product_image ON tbl_product_image.productID = tbl_product.productID JOIN tbl_category ON tbl_category.categoryID = tbl_product.categoryID WHERE tbl_product.categoryID = '".$categoryID."' ORDER BY tbl_product.created_at DESC";

    $product = mysqli_query($conn, $sql);

    mysqli_close($conn);