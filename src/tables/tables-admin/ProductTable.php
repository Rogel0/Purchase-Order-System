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
                        <td class="px-6 py-4"><?php echo htmlspecialchars($product['productname']); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($product['description']); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($product['stockquantity']); ?></td>
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
                            <a href="editProduct.php?id=<?php echo $product['productid']; ?>" class="text-yellow-500 hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
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