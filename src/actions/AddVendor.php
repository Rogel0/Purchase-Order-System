<?php
session_start();
include('../database/connection.php');

if (isset($_POST['submitVendorBtn'])) {
    $VendorNumber = $_POST['vendorNumber'];
    $VendorName = $_POST['vendorName'];
    $VendorCategory = $_POST['vendorCategory'];
    $VendorDesc = $_POST['vendorDescription'];
    $VendorContact = $_POST['contactPerson'];
    $VendorPhone = $_POST['phoneNumber'];
    $VendorEmail = $_POST['email'];
    $VendorAddress = $_POST['address'];
    $VendorStatus = 'Pending'; // Default status
    $VendorTaxID = $_POST['taxId'];
    $VendorPaymentTerms = $_POST['paymentTerms'];
    $VendorCreatedAt = date('Y-m-d H:i:s');

    // Handle file upload
    if (isset($_FILES['supportingInfo']) && $_FILES['supportingInfo']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "../uploads/";
        $VendorSupportingInfo = $targetDir . basename($_FILES['supportingInfo']['name']);
        move_uploaded_file($_FILES['supportingInfo']['tmp_name'], $VendorSupportingInfo);
    } else {
        $VendorSupportingInfo = null; // Handle cases where no file is uploaded
    }



    // Check if the Vendor Name already exists
    $checkQuery = "SELECT * FROM vendors WHERE vendor_name = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("s", $VendorName);
    $stmt->execute();
    $checkResult = $stmt->get_result();

    if ($checkResult->num_rows > 0) {
        $_SESSION['error'] = "Vendor name already exists. Please choose a different name.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    // Insert the vendor into the database
    $insertQuery = "INSERT INTO vendors (vendor_number, vendor_name, vendor_description, category_id, status, contact_person, phone_number, email, address, tax_id, payment_terms, supporting_info, created_at) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sssssssssssss", $VendorNumber, $VendorName, $VendorDesc, $VendorCategory, $VendorStatus, $VendorContact, $VendorPhone, $VendorEmail, $VendorAddress, $VendorTaxID, $VendorPaymentTerms, $VendorSupportingInfo, $VendorCreatedAt);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Vendor added successfully, wait for admin approval.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        $_SESSION['error'] = "Error: " . $stmt->error;
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $stmt->close();
    $conn->close();
}
?>