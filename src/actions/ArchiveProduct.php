<?php
session_start();
include('../database/connection.php');

function archiveProduct($productId, $conn) {
    // Check if product_id is provided
    if (!isset($productId) || empty($productId)) {
        die('Error: product_id not provided or empty.');
    }
    echo 'Product ID received: ' . $productId; // Debug statement

    // Fetch the product data
    $query = "SELECT * FROM products WHERE product_number = ?"; // Ensure 'product_number' exists in the database
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $productId);
    if (!$stmt->execute()) {
        die('Error fetching product: ' . $stmt->error);
    }
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        die('Error: No product found with the provided product_id.');
    }
    $productData = $result->fetch_assoc();

    if ($productData) {
        // Insert the product data into the archive table
        $archiveQuery = "INSERT INTO archive_products (record_id, record_type, product_number, data) VALUES (?, 'product', ?, ?)";
        $stmt = $conn->prepare($archiveQuery);
        $jsonData = json_encode($productData);
        $stmt->bind_param("iis", $productId, $productData['product_number'], $jsonData);
        if (!$stmt->execute()) {
            die('Error archiving product: ' . $stmt->error);
        }

        // Delete the product from the products table
        $deleteQuery = "DELETE FROM products WHERE product_number = ?";
        $stmt = $conn->prepare($deleteQuery);
        $stmt->bind_param("i", $productId);
        if (!$stmt->execute()) {
            die('Error deleting product: ' . $stmt->error);
        }

        $_SESSION['success'] = "Product archived successfully.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    die('Error: Product not found.');
}

// Get the product_id from POST
$productId = $_POST['product_id'] ?? null;
archiveProduct($productId, $conn);
?>