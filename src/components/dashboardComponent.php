<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
include('../database/connection.php');

// Fetch data for Total Suppliers
$querySuppliers = "SELECT COUNT(*) AS total_suppliers FROM vendors WHERE status = 'active'";
$resultSuppliers = $conn->query($querySuppliers);
$totalSuppliers = $resultSuppliers->fetch_assoc()['total_suppliers'];

// Fetch data for Total Purchase Value
$queryPurchaseValue = "SELECT SUM(total_price) AS total_purchase_value FROM orders";
$resultPurchaseValue = $conn->query($queryPurchaseValue);
$totalPurchaseValue = $resultPurchaseValue->fetch_assoc()['total_purchase_value'];

// Fetch data for Items Purchased
$queryItemsPurchased = "SELECT SUM(quantity) AS total_items FROM orders";
$resultItemsPurchased = $conn->query($queryItemsPurchased);
$totalItemsPurchased = $resultItemsPurchased->fetch_assoc()['total_items'];

// Fetch data for Monthly Purchase Trends
$queryMonthlyTrends = "
    SELECT MONTH(order_date) AS month, SUM(total_price) AS total
    FROM orders
    GROUP BY MONTH(order_date)
    ORDER BY MONTH(order_date)";
$resultMonthlyTrends = $conn->query($queryMonthlyTrends);
$monthlyTrends = [];
while ($row = $resultMonthlyTrends->fetch_assoc()) {
    $monthlyTrends[] = $row;
}

// Fetch data for Top Suppliers by Orders
$queryTopSuppliers = "
    SELECT v.vendor_name, COUNT(o.order_id) AS total_orders
    FROM orders o
    JOIN vendors v ON o.vendor_id = v.vendor_id
    GROUP BY v.vendor_name
    ORDER BY total_orders DESC
    LIMIT 5";
$resultTopSuppliers = $conn->query($queryTopSuppliers);
$topSuppliers = [];
while ($row = $resultTopSuppliers->fetch_assoc()) {
    $topSuppliers[] = $row;
}

// Fetch the 3 most recent orders
$queryRecentOrders = "
                SELECT o.po_number, v.vendor_name, o.order_date, (o.quantity * o.unitprice) AS total_amount, o.po_status
                FROM orders o
                JOIN vendors v ON o.vendor_id = v.vendor_id
                ORDER BY o.order_date DESC
                LIMIT 3";
$resultRecentOrders = $conn->query($queryRecentOrders);
?>

<div class="max-h-[79vh] overflow-y-auto custom-scrollbar">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6 sticky top-0 bg-white shadow z-10 p-4">
        <h1 class="text-3xl font-bold text-gray-800">Purchase Order Dashboard</h1>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Suppliers -->
        <div class="bg-white rounded-xl shadow p-4 flex items-center">
            <div class="bg-blue-100 text-blue-600 rounded-full p-3 mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a2 2 0 00-2-2h-3m-4 4h-4m-4 0H4a2 2 0 01-2-2v-2m0-4h20M4 10h16M4 6h16M4 6a2 2 0 012-2h12a2 2 0 012 2M4 10a2 2 0 012-2h12a2 2 0 012 2" />
                </svg>
            </div>
            <div>
                <h2 class="text-sm text-gray-500 mb-1">SUPPLIERS</h2>
                <p class="text-2xl font-semibold text-gray-800"><?php echo $totalSuppliers; ?></p>
            </div>
        </div>

        <!-- Total Purchase Value -->
        <div class="bg-white rounded-xl shadow p-4 flex items-center">
            <div class="bg-green-100 text-green-600 rounded-full p-3 mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 0c-4.418 0-8 3.582-8 8h16c0-4.418-3.582-8-8-8z" />
                </svg>
            </div>
            <div>
                <h2 class="text-sm text-gray-500 mb-1">TOTAL PURCHASE VALUE</h2>
                <p class="text-2xl font-semibold text-gray-800">₱<?php echo number_format($totalPurchaseValue, 2); ?></p>
            </div>
        </div>

        <!-- Items Purchased -->
        <div class="bg-white rounded-xl shadow p-4 flex items-center">
            <div class="bg-yellow-100 text-yellow-600 rounded-full p-3 mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h11M9 21V3m0 0L5 7m4-4l4 4" />
                </svg>
            </div>
            <div>
                <h2 class="text-sm text-gray-500 mb-1">ITEMS PURCHASED</h2>
                <p class="text-2xl font-semibold text-gray-800"><?php echo $totalItemsPurchased; ?></p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div class="bg-white rounded-xl shadow p-3">
            <h2 class="text-sm font-bold text-gray-800 mb-2">Monthly Purchase Trends</h2>
            <canvas id="monthlyTrendsChart" style="height: 120px;"></canvas>
        </div>

        <div class="bg-white rounded-xl shadow p-3">
            <h2 class="text-sm font-bold text-gray-800 mb-2">Top Suppliers by Orders</h2>
            <canvas id="topSuppliersChart" style="height: 120px;"></canvas>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800">Recent Purchase Orders</h2>
            <a href="#" class="text-blue-600 hover:underline font-medium">See All</a>
        </div>
        <div class="overflow-x-auto max-h-[3rows] custom-scrollbar">
            <table class="min-w-full text-sm border-collapse">
                <thead class="bg-gray-100">
                    <tr class="text-gray-600 text-left">
                        <th class="py-3 px-4 font-semibold">PO #</th>
                        <th class="py-3 px-4 font-semibold">Supplier</th>
                        <th class="py-3 px-4 font-semibold">Date</th>
                        <th class="py-3 px-4 font-semibold">Amount</th>
                        <th class="py-3 px-4 font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php


                    if ($resultRecentOrders->num_rows > 0) {
                        while ($row = $resultRecentOrders->fetch_assoc()) {
                            echo '<tr class="border-t hover:bg-gray-50">';
                            echo '<td class="py-3 px-4">#' . htmlspecialchars($row['po_number']) . '</td>';
                            echo '<td class="py-3 px-4">' . htmlspecialchars($row['vendor_name']) . '</td>';
                            echo '<td class="py-3 px-4">' . htmlspecialchars(date('F d, Y', strtotime($row['order_date']))) . '</td>';
                            echo '<td class="py-3 px-4">$' . number_format($row['total_amount'], 2) . '</td>';
                            echo '<td class="py-3 px-4 text-green-600 font-medium">' . htmlspecialchars(ucfirst($row['po_status'])) . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5" class="py-3 px-4 text-center text-gray-500">No recent orders found.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Line Chart: Monthly Purchase Trends
        const monthlyTrendsCtx = document.getElementById('monthlyTrendsChart').getContext('2d');
        const monthlyTrendsChart = new Chart(monthlyTrendsCtx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode(array_column($monthlyTrends, 'month')); ?>,
                datasets: [{
                    label: 'Purchase Value',
                    data: <?php echo json_encode(array_column($monthlyTrends, 'total')); ?>,
                    borderColor: '#4f46e5',
                    backgroundColor: 'rgba(79, 70, 229, 0.2)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Bar Chart: Top Suppliers by Orders
        const topSuppliersCtx = document.getElementById('topSuppliersChart').getContext('2d');
        const topSuppliersChart = new Chart(topSuppliersCtx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode(array_column($topSuppliers, 'vendor_name')); ?>,
                datasets: [{
                    label: 'Number of Orders',
                    data: <?php echo json_encode(array_column($topSuppliers, 'total_orders')); ?>,
                    backgroundColor: '#60a5fa'
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>