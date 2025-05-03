<div class="modal exampleModal-<?php echo htmlspecialchars($product['product_number']); ?> fixed inset-0 z-50 hidden flex items-center justify-center">
    <div class="absolute inset-0 bg-black custom-opacity"></div>
    <div class="relative flex flex-col bg-white rounded-xl shadow-2xl w-4xl max-w-5xl p-8 overflow-y-auto">
        <header class="flex justify-between items-center border-b pb-4">
            <h2 class="text-2xl font-bold text-gray-900">Product Details</h2>
            <button type="button" class="text-gray-500 hover:text-gray-700 text-2xl close-modal">&times;</button>
        </header>
        <main class="grow mt-6 text-gray-700 text-sm">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-3">
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Product Number:</span>
                        <span><?php echo htmlspecialchars($product['product_number']); ?></span>
                    </div>
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Product Name:</span>
                        <span><?php echo htmlspecialchars($product['product_name']); ?></span>
                    </div>
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Category ID:</span>
                        <span><?php echo htmlspecialchars($product['category_id']); ?></span>
                    </div>
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Description:</span>
                        <span><?php echo nl2br(htmlspecialchars($product['description'])); ?></span>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Unit of Measurement:</span>
                        <span><?php echo htmlspecialchars($product['unit_of_measurement']); ?></span>
                    </div>
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Unit Price:</span>
                        <span><?php echo htmlspecialchars($product['unit_price']); ?></span>
                    </div>
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Status:</span>
                        <span><?php echo htmlspecialchars($product['status']); ?></span>
                    </div>
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Vendor Number:</span>
                        <span><?php echo htmlspecialchars($product['vendor_number']); ?></span>
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <div class="flex">
                    <span class="w-40 font-semibold text-gray-800">Quantity:</span>
                    <span><?php echo htmlspecialchars($product['quantity']); ?></span>
                </div>
                <div class="flex mt-3">
                    <span class="w-40 font-semibold text-gray-800">Threshold Limit:</span>
                    <span><?php echo htmlspecialchars($product['threshold_limit']); ?></span>
                </div>
            </div>
        </main>
        <footer class="mt-6 flex justify-end space-x-6 gap-4">
            <form method="POST" action="../actions/update/updateProductStatus.php" class="flex space-x-4">
                <input type="hidden" name="product_number" value="<?php echo htmlspecialchars($product['product_number']); ?>">

                <?php if ($product['status'] === 'pending'): ?>
                    <button
                        type="submit"
                        name="action"
                        value="approve"
                        class="px-5 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none">
                        Approve
                    </button>
                    <button
                        type="submit"
                        name="action"
                        value="reject"
                        class="px-5 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none">
                        Reject
                    </button>
                <?php elseif ($product['status'] === 'active'): ?>
                    <button
                        type="submit"
                        name="action"
                        value="reject"
                        class="px-5 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none">
                        Reject
                    </button>
                <?php elseif ($product['status'] === 'rejected'): ?>
                    <button
                        type="submit"
                        name="action"
                        value="approve"
                        class="px-5 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none">
                        Approve
                    </button>
                <?php endif; ?>
            </form>
            <button class="px-5 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 focus:outline-none close-modal">
                Close
            </button>
        </footer>
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