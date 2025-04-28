<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="max-h-[79vh] overflow-y-auto custom-scrollbar">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6 sticky top-0 bg-white shadow z-10 p-4">
        <h1 class="text-3xl font-bold text-gray-800">Purchase Order Dashboard</h1>
        <button class="bg-white p-2 rounded-full shadow">
            <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M21 21l-4.35-4.35m0 0a7 7 0 10-9.9 0 7 7 0 009.9 0z" />
            </svg>
        </button>
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
            <p class="text-2xl font-semibold text-gray-800">150</p>
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
            <p class="text-2xl font-semibold text-gray-800">$480,000</p>
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
            <p class="text-2xl font-semibold text-gray-800">3,250</p>
        </div>
    </div>
</div>

    <!-- Charts -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mb-6">
        <!-- Line Chart -->
        <div class="bg-white rounded-xl shadow p-3">
            <h2 class="text-sm font-bold text-gray-800 mb-2">Monthly Purchase Trends</h2>
            <canvas id="monthlyTrendsChart" style="height: 120px;"></canvas>
        </div>

        <!-- Bar Chart -->
        <div class="bg-white rounded-xl shadow p-3">
            <h2 class="text-sm font-bold text-gray-800 mb-2">Top Suppliers by Orders</h2>
            <canvas id="topSuppliersChart" style="height: 120px;"></canvas>
        </div>




        <!-- Horizontal Bar Chart -->
        <div class="bg-white rounded-xl shadow p-3">
            <h2 class="text-sm font-bold text-gray-800 mb-2">Top Categories by Purchase Value</h2>
            <canvas id="topCategoriesChart" style="height: 120px;"></canvas>
        </div>


        <!-- Stacked Bar Chart -->
        <div class="bg-white rounded-xl shadow p-3">
            <h2 class="text-sm font-bold text-gray-800 mb-2">Quarterly Purchase Value</h2>
            <canvas id="quarterlyRevenueChart" style="height: 120px;"></canvas>
        </div>
    </div>

    <!-- Recent Purchase Orders -->
    <div class="bg-white rounded-xl shadow p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-800">Recent Purchase Orders</h2>
        <a href="#" class="text-blue-600 hover:underline font-medium">See All</a>
    </div>
    <div class="overflow-x-auto">
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
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-3 px-4">#PO-1001</td>
                    <td class="py-3 px-4">ABC Supplies Co.</td>
                    <td class="py-3 px-4">April 25, 2025</td>
                    <td class="py-3 px-4">$2,000</td>
                    <td class="py-3 px-4 text-green-600 font-medium">Received</td>
                </tr>
                <tr class="border-t bg-gray-50 hover:bg-gray-100">
                    <td class="py-3 px-4">#PO-1002</td>
                    <td class="py-3 px-4">Global Equipments</td>
                    <td class="py-3 px-4">April 24, 2025</td>
                    <td class="py-3 px-4">$7,800</td>
                    <td class="py-3 px-4 text-yellow-600 font-medium">Pending</td>
                </tr>
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-3 px-4">#PO-1003</td>
                    <td class="py-3 px-4">Stationery Mart</td>
                    <td class="py-3 px-4">April 20, 2025</td>
                    <td class="py-3 px-4">$500</td>
                    <td class="py-3 px-4 text-red-600 font-medium">Canceled</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>

<script>
    // Horizontal Bar Chart: Top Categories by Purchase Value
    const topCategoriesCtx = document.getElementById('topCategoriesChart').getContext('2d');
    const topCategoriesChart = new Chart(topCategoriesCtx, {
        type: 'bar',
        data: {
            labels: ['Electronics', 'Furniture', 'Stationery', 'Office Supplies'],
            datasets: [{
                label: 'Purchase Value',
                data: [12000, 8000, 6000, 4000],
                backgroundColor: ['#60a5fa', '#34d399', '#fbbf24', '#f87171']
            }]
        },
        options: {
            indexAxis: 'y', // Horizontal bar chart
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

    // Bar Chart: Top Suppliers by Orders
    const topSuppliersCtx = document.getElementById('topSuppliersChart').getContext('2d');
    const topSuppliersChart = new Chart(topSuppliersCtx, {
        type: 'bar',
        data: {
            labels: ['ABC Supplies', 'Global Equipments', 'Stationery Mart', 'Office Express'],
            datasets: [{
                label: 'Number of Orders',
                data: [15, 10, 8, 5],
                backgroundColor: '#60a5fa'
            }]
        },
        options: {
            indexAxis: 'y',
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

    // Line Chart: Monthly Purchase Trends
    const monthlyTrendsCtx = document.getElementById('monthlyTrendsChart').getContext('2d');
    const monthlyTrendsChart = new Chart(monthlyTrendsCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Purchase Value',
                data: [5000, 7000, 8000, 6000, 9000, 11000, 10000, 9500, 12000, 13000, 14000, 15000],
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

    // Stacked Bar Chart: Quarterly Purchase Value
    const quarterlyRevenueCtx = document.getElementById('quarterlyRevenueChart').getContext('2d');
    const quarterlyRevenueChart = new Chart(quarterlyRevenueCtx, {
        type: 'bar',
        data: {
            labels: ['Q1', 'Q2', 'Q3', 'Q4'],
            datasets: [{
                    label: '2024',
                    data: [15000, 20000, 18000, 22000],
                    backgroundColor: '#34d399'
                },
                {
                    label: '2025',
                    data: [18000, 24000, 20000, 26000],
                    backgroundColor: '#60a5fa'
                }
            ]
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
</script>