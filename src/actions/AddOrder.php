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
        po_number, vendor_number, order_date, po_type, priority_level, product_number, quantity, unit_price, 
        payment_method, delivery_address, expected_delivery, order_notes, po_status, delivery_status, created_at
    ) VALUES (
        '$poNumber', '$supplierId', '$orderDate', '$poType', '$priorityLevel', '$productId', '$quantity', '$unitPrice', 
        '$paymentMethod', '$deliveryAddress', '$expectedDeliveryDate', '$orderNotes', 'pending', 'pending', NOW()
    )";

    if (mysqli_query($conn, $insertOrderQuery)) {
        // Step 2: Generate an invoice number
        $uniqueId = uniqid(); 
        $invoiceNumber = 'INV-' . strtoupper(substr($uniqueId, -6));

        // Step 3: Insert the invoice into the `invoices` table
        $insertInvoiceQuery = "INSERT INTO invoices (
            invoice_number, vendor_number, invoice_date, company_from, company_to, type, description, status
        ) VALUES (
            '$invoiceNumber', '$supplierId', NOW(), 'Your Company', '$linkedSupplier', '$poType', 'Invoice for PO #$poNumber', 'active'
        )";

        if (mysqli_query($conn, $insertInvoiceQuery)) {
            // Step 4: Update the order with the generated invoice number
            $updateOrderQuery = "UPDATE orders SET invoice_number = '$invoiceNumber' WHERE po_number = '$poNumber'";
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
