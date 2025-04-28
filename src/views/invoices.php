<?php
include('../database/connection.php');
include('../drawer/invoiceDrawer.php');

$queryInvoice = "SELECT * FROM invoice";
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