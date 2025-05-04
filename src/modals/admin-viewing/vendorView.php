<div class="modal exampleModal-<?php echo htmlspecialchars($vendor['vendor_number']); ?> fixed inset-0 z-50 hidden flex items-center justify-center">
    <div class="absolute inset-0 bg-black custom-opacity"></div>

    <div class="relative flex flex-col bg-white rounded-xl shadow-2xl w-4xl max-w-5xl p-8 overflow-y-auto">
        <header class="flex justify-between items-center border-b pb-4">
            <h2 class="text-2xl font-bold text-gray-900">Vendor Details</h2>
            <button type="button" class="text-gray-500 hover:text-gray-700 text-2xl close-modal">&times;</button>
        </header>
        <main class="grow mt-6 text-gray-700 text-sm">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-3">
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Vendor Number:</span>
                        <span><?php echo htmlspecialchars($vendor['vendor_number']); ?></span>
                    </div>
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Vendor Name:</span>
                        <span><?php echo htmlspecialchars($vendor['vendor_name']); ?></span>
                    </div>
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Category:</span>
                        <span><?php echo htmlspecialchars($vendor['category_name']); ?></span>
                    </div>
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Status:</span>
                        <span><?php echo htmlspecialchars($vendor['status']); ?></span>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Contact Person:</span>
                        <span><?php echo htmlspecialchars($vendor['contact_person']); ?></span>
                    </div>
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Phone Number:</span>
                        <span><?php echo htmlspecialchars($vendor['phone_number']); ?></span>
                    </div>
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Email:</span>
                        <span><?php echo htmlspecialchars($vendor['email']); ?></span>
                    </div>
                    <div class="flex">
                        <span class="w-40 font-semibold text-gray-800">Tax ID:</span>
                        <span><?php echo htmlspecialchars($vendor['tax_id']); ?></span>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <div class="flex">
                    <span class="w-40 font-semibold text-gray-800">Address:</span>
                    <p class="text-gray-600 whitespace-pre-line"><?php echo htmlspecialchars($vendor['address']); ?></p>
                </div>
            </div>

            <div class="mt-6 space-y-2">
                <div class="flex">
                    <span class="w-40 font-semibold text-gray-800">Payment Terms:</span>
                    <span><?php echo htmlspecialchars($vendor['payment_terms']); ?></span>
                </div>
                <div class="flex">
                    <span class="w-40 font-semibold text-gray-800">Supporting Info:</span>
                    <span><?php echo htmlspecialchars($vendor['supporting_info']); ?></span>
                </div>
            </div>
        </main>

        <footer class="mt-6 flex justify-end space-x-6 gap-4">
            <form method="POST" action="../actions/updateVendorStatus.php" class="flex space-x-4">
                <input type="hidden" name="vendor_number" value="<?php echo htmlspecialchars($vendor['vendor_number']); ?>">

                <?php if ($vendor['status'] === 'pending'): ?>
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
                <?php elseif ($vendor['status'] === 'active'): ?>
                    <button
                        type="submit"
                        name="action"
                        value="reject"
                        class="px-5 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none">
                        Reject
                    </button>
                <?php elseif ($vendor['status'] === 'rejected'): ?>
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