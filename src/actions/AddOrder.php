<?php
session_start();
include('../database/connection.php');

if (isset($_POST['submitOrderBtn'])) {
    $poNumber = $_POST['poNumber'];
    $orderDate = $_POST['orderDate'];
    $poType = $_POST['poType'];
    $priorityLevel = $_POST['priorityLevel'];
    $supplierId = $_POST['supplierName'];
    $productId = $_POST['itemName'];
    $quantity = $_POST['itemQuantity'];
    $unitPrice = $_POST['unitPrice'];
    $totalPrice = $_POST['totalPrice'];
    $paymentTerms = $_POST['paymentTerms'];
    $paymentMethod = $_POST['paymentMethod'];
    $deliveryAddress = $_POST['deliveryAddress'];
    $expectedDeliveryDate = $_POST['expectedDelivery'];
    $orderNotes = $_POST['orderNotes'];
    $linkedSupplier = $_POST['linkedSupplier'];

    // Step 1: Insert the order into the `orders` table
    $insertOrderQuery = "INSERT INTO orders (
        po_number, vendor_id, order_date, po_type, priority_level, productid, quantity, unitprice, total_price, 
        payment_method, delivery_address, expected_delivery, order_notes, po_status, delivery_status, created_at, linkedsupplier
    ) VALUES (
        '$poNumber', '$supplierId', '$orderDate', '$poType', '$priorityLevel', '$productId', '$quantity', '$unitPrice', '$totalPrice', 
        '$paymentMethod', '$deliveryAddress', '$expectedDeliveryDate', '$orderNotes', 'pending', 'pending', NOW(), '$linkedSupplier'
    )";

    if (mysqli_query($conn, $insertOrderQuery)) {
        $orderId = mysqli_insert_id($conn); // Get the newly created order ID

        // Step 2: Generate an invoice number
        $invoiceNumber = 'INV-' . str_pad($orderId, 6, '0', STR_PAD_LEFT);

        // Step 3: Insert the invoice into the `invoice` table
        $insertInvoiceQuery = "INSERT INTO invoice (
            invoicenumber, invoice_date, companyfrom, companyto, type, description, qty, amount, subtotal, total, status
        ) VALUES (
            '$invoiceNumber', NOW(), 'Your Company', '$linkedSupplier', '$poType', 'Invoice for PO #$poNumber', 
            '$quantity', '$unitPrice', '$totalPrice', '$totalPrice', 'active'
        )";

        if (mysqli_query($conn, $insertInvoiceQuery)) {
            // Step 4: Update the order with the generated invoice number
            $updateOrderQuery = "UPDATE orders SET invoice_number = '$invoiceNumber' WHERE order_id = '$orderId'";
            mysqli_query($conn, $updateOrderQuery);

            $_SESSION['success'] = "Order and Invoice added successfully.";
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $_SESSION['error'] = "Error creating invoice: " . mysqli_error($conn);
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
    } else {
        $_SESSION['error'] = "Error adding order: " . mysqli_error($conn);
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }
}

mysqli_close($conn);
?>