<?php
session_start(); // Ensure session is started
include('../database/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderNumber = $_POST['po_number'] ?? null;
    $action = $_POST['action'] ?? null;

    if ($orderNumber && $action) {
        // Determine the new status based on the action
        $newStatus = ($action === 'approve') ? 'approved' : 'rejected';

        $query = "UPDATE orders SET po_status = ? WHERE po_number = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $newStatus, $orderNumber);

        if ($stmt->execute()) {
            if ($newStatus === 'rejected') {
                $clearInvoiceQuery = "UPDATE orders SET invoice_number = NULL WHERE po_number = ?";
                $clearInvoiceStmt = $conn->prepare($clearInvoiceQuery);
                $clearInvoiceStmt->bind_param('s', $orderNumber);

                if ($clearInvoiceStmt->execute()) {
                    $deleteInvoiceQuery = "DELETE FROM invoices WHERE description LIKE ?";
                    $deleteStmt = $conn->prepare($deleteInvoiceQuery);
                    $description = "Invoice for PO #$orderNumber";
                    $deleteStmt->bind_param('s', $description);

                    if ($deleteStmt->execute()) {
                        $_SESSION['success'] = "Order rejected and associated invoice deleted successfully.";
                    } else {
                        $_SESSION['error'] = "Order rejected, but failed to delete associated invoice.";
                    }

                    $deleteStmt->close();
                } else {
                    $_SESSION['error'] = "Order rejected, but failed to clear associated invoice reference.";
                }

                $clearInvoiceStmt->close();
            } else {
                $_SESSION['success'] = "Order status updated successfully.";
            }

            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $_SESSION['error'] = "Order status update failed.";
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $stmt->close();
    } else {
        $_SESSION['error'] = "Invalid input. Order status update failed.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }
}

$conn->close();
?>