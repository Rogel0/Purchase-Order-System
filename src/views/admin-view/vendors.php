<?php
include('../database/connection.php');
include('../drawer/vendorDrawer.php');

$query = "SELECT * FROM vendor_details_view";
$result = $conn->query($query);
$addvendors = $result->fetch_all(MYSQLI_ASSOC);

$activeTab = $_GET['tab'] ?? 'all';


?>

<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-[24px] font-bold text-red-600">Vendors </h1>

        <div class="flex border-b-2 border-gray-200 mb-5">
            <button data-filter="all" class="filter-btn px-6 py-2 text-gray-600 text-lg font-medium rounded-t-lg hover:bg-orange-400 hover:text-white transition-all bg-orange-400 text-white font-bold">
                All
            </button>
            <button data-filter="pending" class="filter-btn px-6 py-2 text-gray-600 text-lg font-medium rounded-t-lg hover:bg-orange-400 hover:text-white transition-all">
                Pending
            </button>
            <button data-filter="approve" class="filter-btn px-6 py-2 text-gray-600 text-lg font-medium rounded-t-lg hover:bg-orange-400 hover:text-white transition-all">
                Approve
            </button>
            <button data-filter="rejected" class="filter-btn px-6 py-2 text-gray-600 text-lg font-medium rounded-t-lg hover:bg-orange-400 hover:text-white transition-all">
                Rejected
            </button>
        </div>

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
        <?php include('../tables/tables-admin/VendorTable.php') ?>
    </div>
</div>

<script src="../script/vendorDrawer.js"></script>

