<?php
include('../../database/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productNumber = $_POST['product_number'] ?? null;
    $action = $_POST['action'] ?? null;

    if ($productNumber && $action) {
        // Determine the new status based on the action
        $newStatus = ($action === 'approve') ? 'active' : 'rejected';

        // Update the vendor status in the database
        $query = "UPDATE products SET status = ? WHERE product_number = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('si', $newStatus, $productNumber);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Order status updated successfully.";
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $_SESSION['error'] = "Product status update failed.";
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $stmt->close();
    } else {
        $_SESSION['error'] = "Product status updated failed.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }
}

$conn->close();
?>