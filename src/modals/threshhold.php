<div class="modal exampleModal-<?php echo htmlspecialchars($product['product_number']); ?> fixed inset-0 z-50 hidden flex items-center justify-center">
    <div class="absolute inset-0 bg-black custom-opacity"></div>

    <div class="relative flex flex-col bg-white rounded-xl shadow-2xl w-4xl max-w-5xl p-8 overflow-y-auto">
        <header class="flex justify-between items-center border-b pb-4">
            <h2 class="text-2xl font-bold text-gray-900">Edit Threshold</h2>
            <button type="button" class="text-gray-500 hover:text-gray-700 text-2xl close-modal">&times;</button>
        </header>
        <main class="grow mt-6 text-gray-700 text-sm">
            <form method="POST" action="../actions/update/updateThreshold.php" class="space-y-8">
                <input type="hidden" name="product_number" value="<?php echo htmlspecialchars($product['product_number']); ?>">

                <!-- Product Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name</label>
                        <div class="relative mt-1">
                            <input type="text" id="product_name" name="product_name" value="<?php echo htmlspecialchars($product['product_name']); ?>" 
                                class="block w-full rounded-lg border border-gray-300 bg-gray-100 text-gray-700 shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:text-sm px-4 py-3" readonly>
                            <span class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                                <i class="fas fa-tag"></i>
                            </span>
                        </div>
                    </div>
                    <div>
                        <label for="current_threshold" class="block text-sm font-medium text-gray-700">Current Threshold</label>
                        <div class="relative mt-1">
                            <input type="number" id="current_threshold" name="current_threshold" value="<?php echo htmlspecialchars($product['threshold_limit']); ?>" 
                                class="block w-full rounded-lg border border-gray-300 bg-gray-100 text-gray-700 shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:text-sm px-4 py-3" readonly>
                            <span class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                                <i class="fas fa-chart-line"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="new_threshold" class="block text-sm font-medium text-gray-700">New Threshold</label>
                    <div class="relative mt-1">
                        <input type="number" id="new_threshold" name="new_threshold" placeholder="Enter new threshold" 
                            class="block w-full rounded-lg border border-gray-300 bg-white text-gray-700 shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:text-sm px-4 py-3" required>
                        <span class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                            <i class="fas fa-edit"></i>
                        </span>
                    </div>
                </div>

                <footer class="mt-6 flex justify-end space-x-4">
                    <button type="submit" 
                        class="px-6 py-3 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none shadow-md">
                        Save Changes
                    </button>
                </footer>
            </form>
        </main>
    </div>
</div>

<style>
    .custom-opacity {
        opacity: 0.6 !important;
    }

    .relative {
        max-width: 80%;
        max-height: 90%;
        overflow-y: auto;
    }
</style>