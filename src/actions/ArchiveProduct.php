<?php
session_start();
include('../database/connection.php');

function archiveProduct($productId, $conn) {
    // Check if product_id is provided
    if (!isset($productId) || empty($productId)) {
        $_SESSION['error'] = "Error: Product ID not provided or empty.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    // Fetch the product data
    $query = "SELECT * FROM products WHERE product_number = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $productId);
    if (!$stmt->execute()) {
        $_SESSION['error'] = "Error fetching product: " . $stmt->error;
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        $_SESSION['error'] = "Error: No product found with the provided Product ID.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }
    $productData = $result->fetch_assoc();

    // Check if the product status is "active"
    if ($productData['status'] === 'active') {
        $_SESSION['error'] = "Error: Active products cannot be archived.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    // Insert the product data into the archive table
    $archiveQuery = "INSERT INTO archive_products (record_id, record_type, product_number, data) VALUES (?, 'product', ?, ?)";
    $stmt = $conn->prepare($archiveQuery);
    $jsonData = json_encode($productData);
    $stmt->bind_param("iis", $productId, $productData['product_number'], $jsonData);
    if (!$stmt->execute()) {
        $_SESSION['error'] = "Error archiving product: " . $stmt->error;
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    // Delete the product from the products table
    $deleteQuery = "DELETE FROM products WHERE product_number = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("i", $productId);
    if (!$stmt->execute()) {
        $_SESSION['error'] = "Error deleting product: " . $stmt->error;
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $_SESSION['success'] = "Product archived successfully.";
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}

$productId = $_POST['product_id'] ?? null;
archiveProduct($productId, $conn);
?>