<div class="modal exampleModal-<?php echo htmlspecialchars($order['po_number']); ?> fixed inset-0 z-50 hidden flex items-center justify-center">
    <div class="absolute inset-0 bg-black custom-opacity"></div>

    <div class="relative flex flex-col bg-white rounded-xl shadow-2xl w-4xl max-w-5xl p-8 overflow-y-auto">
        <header class="flex justify-between items-center border-b pb-4">
            <h2 class="text-2xl font-bold text-gray-900">Order Details</h2>
            <button type="button" class="text-gray-500 hover:text-gray-700 text-2xl close-modal">&times;</button>
        </header>
        <main class="grow mt-6 text-gray-700 text-sm">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-3">
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">PO Number:</span>
                        <span><?php echo htmlspecialchars($order['po_number']); ?></span>
                    </div>
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Vendor Number:</span>
                        <span><?php echo htmlspecialchars($order['vendor_number']); ?></span>
                    </div>
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Invoice Number:</span>
                        <span><?php echo htmlspecialchars($order['invoice_number']); ?></span>
                    </div>
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Product Number:</span>
                        <span><?php echo htmlspecialchars($order['product_number']); ?></span>
                    </div>
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Order Date:</span>
                        <span><?php echo htmlspecialchars($order['order_date']); ?></span>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">PO Type:</span>
                        <span><?php echo htmlspecialchars($order['po_type']); ?></span>
                    </div>
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Priority Level:</span>
                        <span><?php echo htmlspecialchars($order['priority_level']); ?></span>
                    </div>
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">PO Status:</span>
                        <span><?php echo htmlspecialchars($order['po_status']); ?></span>
                    </div>
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Delivery Status:</span>
                        <span><?php echo htmlspecialchars($order['delivery_status']); ?></span>
                    </div>
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Expected Delivery:</span>
                        <span><?php echo htmlspecialchars($order['expected_delivery']); ?></span>
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <div class="flex">
                    <span class="w-40 font-semibold text-gray-800">Delivery Address:</span>
                    <span class="text-gray-600"><?php echo nl2br(htmlspecialchars($order['delivery_address'])); ?></span>
                </div>
                <div class="flex mt-3">
                    <span class="w-40 font-semibold text-gray-800">Order Notes:</span>
                    <span class="text-gray-600"><?php echo nl2br(htmlspecialchars($order['order_notes'])); ?></span>
                </div>
            </div>
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex">
                    <span class="w-40 font-semibold text-gray-800">Quantity:</span>
                    <span><?php echo htmlspecialchars($order['quantity']); ?></span>
                </div>
                <div class="flex">
                    <span class="w-40 font-semibold text-gray-800">Unit Price:</span>
                    <span><?php echo htmlspecialchars($order['unit_price']); ?></span>
                </div>
                <div class="flex">
                    <span class="w-40 font-semibold text-gray-800">Payment Method:</span>
                    <span><?php echo htmlspecialchars($order['payment_method']); ?></span>
                </div>
            </div>
        </main>
        <footer class="mt-6 flex justify-end space-x-6 gap-4">
            <form method="POST" action="../actions/updateOrderStatus.php" class="flex space-x-4">
                <input type="hidden" name="po_number" value="<?php echo htmlspecialchars($order['po_number']); ?>">

                <?php if ($order['po_status'] === 'pending'): ?>
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
                <?php elseif ($order['po_status'] === 'approved'): ?>
                    <button
                        type="submit"
                        name="action"
                        value="reject"
                        class="px-5 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none">
                        Reject
                    </button>
                <?php elseif ($order['po_status'] === 'rejected'): ?>
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