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
    $checkQuery = "SELECT * FROM products WHERE productname = '$ProductName'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // StudentID already exists
        $_SESSION['error'] = "Product name already exists. Please choose a different name.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $insertQuery = "INSERT INTO products (productnumber, productname, category, description, unitprice, status, linkedsupplier) VALUES ('$ProductNumber', '$ProductName', '$ProductCategory', '$ProductDesc',    '$ProductPrice', '$ProductStatus', '$ProductSupplier')";

    if (mysqli_query($conn, $insertQuery)) {
        echo "Success";
        // Redirect to the products page after successful insertion
        // $_SESSION['addingstudent_success'] = "Product added successfully.";
        $_SESSION['success'] = "Product added successfully, wait for admin approval.";
        header("Location: " . $_SERVER['HTTP_REFERER']);

        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
