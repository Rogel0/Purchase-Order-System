<?php
include('../database/connection.php');
include('../drawer/vendorDrawer.php');

// Fetch vendors with their category names
$query = "SELECT v.vendor_id, v.vendor_number, v.vendor_name, vc.category_name, v.status, v.contact_person, v.phone_number, v.email, v.address, v.created_at, v.updated_at
          FROM vendors v
          LEFT JOIN vendor_categories vc ON v.category_id = vc.category_id";
$result = $conn->query($query);
$addvendors = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-[24px] font-bold text-red-600">Vendors </h1>
        <?php
// Determine the active tab from the query string or default to 'all'
$activeTab = isset($_GET['tab']) ? $_GET['tab'] : 'all';

// Tab labels and keys
$tabs = [
    'all' => 'All',
    'pending' => 'Pending',
    'approve' => 'Approve',
    'rejected' => 'Rejected'
];
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .tab-menu {
            display: flex;
            border-bottom: 2px solid #eee;
            margin-bottom: 20px;
        }
        .tab-menu a {
            padding: 10px 24px;
            text-decoration: none;
            color: #666;
            background: none;
            border: none;
            outline: none;
            font-size: 18px;
            border-radius: 8px 8px 0 0;
            margin-right: 8px;
            transition: background 0.2s, color 0.2s;
        }
        .tab-menu a.active {
            background: #FFA94D;
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="tab-menu">
        <?php foreach ($tabs as $key => $label): ?>
            <a href="?tab=<?= $key ?>" class="<?= $activeTab === $key ? 'active' : '' ?>">
                <?= $label ?>
            </a>
        <?php endforeach; ?>
    </div>

    <div>
        <!-- Content for each tab can be handled here -->
        <?php
        switch ($activeTab) {
            case 'pending':
                echo "<p>Pending items go here.</p>";
                break;
            case 'approve':
                echo "<p>Approved items go here.</p>";
                break;
            case 'rejected':
                echo "<p>Rejected items go here.</p>";
                break;
            default:
                echo "<p></p>";
        }
        ?>
    </div>
</body>
</html>
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