<?php
include('../database/connection.php');
include('../drawer/vendorDrawer.php');

// Fetch vendors with their category names
$query = "SELECT v.vendor_number, v.vendor_name, vc.category_name, v.status, v.contact_person, v.phone_number, v.email, v.address, v.created_at, v.updated_at
          FROM vendors v
          LEFT JOIN vendor_categories vc ON v.category_id = vc.category_id";
$result = $conn->query($query);
$addvendors = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-[24px] font-bold text-red-600">Vendor List</h1>
        <button id="addVendorBtn" class="flex items-center px-4 py-2 bg-orange-400 text-white font-semibold rounded-md shadow hover:scale-105 transition">
            <span class="text-lg font-bold">+ Add Vendor</span>
        </button>
    </div>

    <div class="flex items-center mb-4">
        <div class="relative w-full max-w-md">
            <input type="text" id="searchInput" placeholder="Search" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-300">
            <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
    </div>

    <div class="overflow-x-auto">
        <?php include('../tables/VendorTable.php') ?>
    </div>
</div>

<script src="../script/vendorDrawer.js"></script>
<script src="../script/toast.js"></script>
<script src="../script/search.js"></script>