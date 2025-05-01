<?php
session_start();
include('../database/connection.php');

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function archiveOrder($orderId, $conn) {
    if (empty($orderId)) {
        die('Error: order_id not provided or empty.');
    }

    echo 'Order ID received: ' . $orderId; // optional debug

    // Fetch the order data
    $query = "SELECT * FROM orders WHERE po_number = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $orderId);
    if (!$stmt->execute()) {
        die('Error fetching order: ' . $stmt->error);
    }
    $result = $stmt->get_result();
    $orderData = $result->fetch_assoc();

    if ($orderData) {
        // Insert the order data into the archive table
        $archiveQuery = "INSERT INTO archive (record_id, record_type, po_number, vendor_number, data) VALUES (?, 'order', ?, ?, ?)";
        $stmt = $conn->prepare($archiveQuery);
        $jsonData = json_encode($orderData);
        $stmt->bind_param("isis", $orderId, $orderData['po_number'], $orderData['vendor_number'], $jsonData);
        if (!$stmt->execute()) {
            die('Error archiving order: ' . $stmt->error);
        }

        // Delete the order from the orders table
        $deleteQuery = "DELETE FROM orders WHERE po_number = ?";
        $stmt = $conn->prepare($deleteQuery);
        $stmt->bind_param("i", $orderId);
        if (!$stmt->execute()) {
            die('Error deleting order: ' . $stmt->error);
        }

        $_SESSION['success'] = "Order archived successfully.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    die('Error: Order not found.');
}

// Get the order_id from POST
$orderId = $_POST['order_id'] ?? null;
archiveOrder($orderId, $conn);
?>