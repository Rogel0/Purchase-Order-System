<?php
include('../modals/archiveProduct.php')
?>

<div class="overflow-y-auto max-h-[65vh]">
    <table id="productTable" class="min-w-full bg-white rounded-lg shadow">
        <thead class="bg-gray-100 sticky top-0 ">
            <tr class="text-center text-sm text-gray-600">
                <th class="px-6 py-3 text-center">Product name</th>
                <th class="px-6 py-3 text-center">Description</th>
                <th class="px-6 py-3 text-center">Quantity</th>
                <th class="px-6 py-3 text-center">Status</th>
                <th class="px-6 py-3 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($addproducts)): ?>
                <?php foreach ($addproducts as $product): ?>
                    <tr class="border-t text-sm text-center">
                        <td class="px-6 py-4"><?php echo htmlspecialchars($product['product_name']); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($product['description']); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($product['quantity']); ?></td>
                        <td class="px-6 py-4">
                            <?php
                            $status = htmlspecialchars($product['status']);
                            if ($status == 'active') {
                                echo '<span class="text-green-500 font-semibold">Active</span>';
                            } elseif ($status == 'rejected') {
                                echo '<span class="text-red-500 font-semibold">Rejected</span>';
                            } else if ($status == 'pending') {
                                echo '<span class="text-yellow-500 font-semibold">Pending</span>';
                            } else {
                                echo '<span class="text-gray-500 font-semibold">Inactive</span>';
                            }
                            ?>
                        </td>
                        <td class="px-6 py-4 flex items-center justify-center space-x-4">
                        <a href="#" data-order-id="<?php echo $order['product_number']; ?>" class="text-yellow-500 hover:scale-110 archiveOrderBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                    <path d="M20.5 7V13C20.5 16.7712 20.5 18.6569 19.3284 19.8284C18.1569 21 16.2712 21 12.5 21H11.5M3.5 7V13C3.5 16.7712 3.5 18.6569 4.67157 19.8284C5.37634 20.5332 6.3395 20.814 7.81608 20.9259"></path>
                                    <path d="M12 3H4C3.05719 3 2.58579 3 2.29289 3.29289C2 3.58579 2 4.05719 2 5C2 5.94281 2 6.41421 2.29289 6.70711C2.58579 7 3.05719 7 4 7H20C20.9428 7 21.4142 7 21.7071 6.70711C22 6.41421 22 5.94281 22 5C22 4.05719 22 3.58579 21.7071 3.29289C21.4142 3 20.9428 3 20 3H16"></path>
                                    <path d="M12 7L12 16M12 16L15 12.6667M12 16L9 12.6667"></path>
                                </svg>
                            </a>

                            <a href="viewProduct.php?id=<?php echo $product['product_number']; ?>" class="text-red-500 hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>

                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center py-4">No products found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


<script src="../utilities/modalUtility.js"></script>
<script>
    setupModal('archive-modal', '.archiveOrderBtn', '#cancel-modal, #close-modal');
</script>