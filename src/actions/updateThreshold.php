<?php
include('../database/connection.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productNumber = $_POST['product_number'] ?? null;
    $newThreshold = $_POST['new_threshold'] ?? null;

    if ($productNumber && is_numeric($newThreshold) && $newThreshold > 0) {
        $query = "UPDATE products SET threshold_limit = ? WHERE product_number = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('is', $newThreshold, $productNumber);
        if ($stmt->execute()) {
            $_SESSION['success'] = "Threshold updated successfully.";
            header("Location: " . $_SERVER['HTTP_REFERER']);

        } else {
            $_SESSION['error'] = "Failed to update the threshold. Please try again.";
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
        
        $stmt->close();
    } else {
        $_SESSION['error'] = "Invalid input. Please provide a valid threshold value.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}
$conn->close();
?>