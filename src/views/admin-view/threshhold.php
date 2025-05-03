<?php
include('../database/connection.php');

$queryProducts = "SELECT * FROM products WHERE status = 'active'";
$resultProducts = $conn->query($queryProducts);
$addproducts = $resultProducts->fetch_all(MYSQLI_ASSOC);
?>

<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-[24px] font-bold text-red-600">Vendors </h1>

    </div>

    <div class="flex items-center mb-4">
        <div class="relative w-2/5 max-w-sm">
            <input type="text" id="searchInput" placeholder="Search" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-300">
            <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
    </div>

    <div class="overflow-x-auto">
        <?php include('../tables/tables-admin/ThreshholdTable.php') ?>
    </div>
</div>

<script src="../script/search.js"></script>
<script src="../script/vendor_filter.js"></script>
<script src="../script/toast2.js"></script>
<script src="../script/toast.js"></script>