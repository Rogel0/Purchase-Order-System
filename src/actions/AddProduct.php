<?php
session_start();
include('../database/connection.php');

if (isset($_POST['submitProductBtn'])) {
    $ProductNumber = $_POST['productNumber'];
    $ProductName = $_POST['productName'];
    $ProductCategory = $_POST['productCategory'];
    $ProductDesc = $_POST['productDesc'];
    $ProductPrice = $_POST['productPrice'];
    $ProductStatus = 'pending'; // Default status
    $ProductSupplier = $_POST['productSupplier'];

    // Check if the Product Name already exists
    $categoryCheckQuery = "SELECT * FROM categories WHERE category_id = '$ProductCategory'";
    $categoryCheckResult = mysqli_query($conn, $categoryCheckQuery);
    
    if (mysqli_num_rows($categoryCheckResult) == 0) {
        $_SESSION['error'] = "Invalid category selected. Please choose a valid category.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    // Insert the new product into the database
    $insertQuery = "INSERT INTO products (product_number, product_name, category_id, description, unit_price, status, vendor_number, quantity, threshold_limit) 
                    VALUES ('$ProductNumber', '$ProductName', '$ProductCategory', '$ProductDesc', '$ProductPrice', '$ProductStatus', '$ProductSupplier', 0, 10)";

    if (mysqli_query($conn, $insertQuery)) {
        $_SESSION['success'] = "Product added successfully, wait for admin approval.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}