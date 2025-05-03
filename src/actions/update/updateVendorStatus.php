

<?php
include('../../database/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vendorNumber = $_POST['vendor_number'] ?? null;
    $action = $_POST['action'] ?? null;

    if ($vendorNumber && $action) {
        // Determine the new status based on the action
        $newStatus = ($action === 'approve') ? 'active' : 'rejected';

        // Update the vendor status in the database
        $query = "UPDATE vendors SET status = ? WHERE vendor_number = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('si', $newStatus, $vendorNumber);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Vendor status updated successfully.";
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $_SESSION['error'] = "Vendor status update failed.";
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $stmt->close();
    } else {
        $_SESSION['error'] = "Vendor status updated failed.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }
}

$conn->close();
?>