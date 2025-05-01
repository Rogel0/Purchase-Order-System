<?php
include('../database/connection.php');
include('../drawer/invoiceDrawer.php');

$queryInvoice = "
    SELECT 
        i.invoice_number,
        i.invoice_date,
        i.company_from,
        v.vendor_name AS company_to,
        i.type,
        i.description,
        i.status,
        o.priority_level,
        o.expected_delivery,
        SUM(o.quantity) AS qty,
        SUM(o.quantity * o.unit_price) AS amount,
        SUM(o.quantity * o.unit_price) AS subtotal,
        SUM(o.quantity * o.unit_price) AS total
    FROM 
        invoices i
    LEFT JOIN 
        vendors v ON i.company_to = v.vendor_number
    LEFT JOIN 
        orders o ON i.invoice_number = o.invoice_number
    GROUP BY 
        i.invoice_number, i.invoice_date, i.company_from, v.vendor_name, i.type, i.description, i.status, o.priority_level, o.expected_delivery
";
$resultInvoice = $conn->query($queryInvoice);
$invoice = $resultInvoice->fetch_all(MYSQLI_ASSOC);
?>

<div class="p-6">
   

    <div class="overflow-x-auto">
        <?php include('../components/invoiceComponent.php') ?>
    </div>
</div>

<script src="../script/invoiceDrawer.js"></script>
<script src="../script/toast.js"></script>
<script src="../script/search.js"></script>