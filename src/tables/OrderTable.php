<?php
include('../modals/archiveOrder.php')
?>


<div class="overflow-y-auto max-h-[65vh] custom-scrollbar">
    <table id="productTable" class="min-w-full bg-white rounded-lg shadow">
        <thead class="bg-gray-100 sticky top-0">
            <tr class="text-center text-sm text-gray-600">
                <th class="px-6 py-3 text-center">PO Number</th>
                <th class="px-6 py-3 text-center">Order date</th>
                <th class="px-6 py-3 text-center">Supplier</th>
                <th class="px-6 py-3 text-center">PO Status </th>
                <!-- <th class="px-6 py-3 text-center">Delivery Status</th> -->
                <th class="px-6 py-3 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($addorders)): ?>
                <?php foreach ($addorders as $order): ?>
                    <tr class="border-t text-sm text-center">
                        <td class="px-6 py-4"><?php echo htmlspecialchars($order['po_number']); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($order['order_date']); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($order['supplier_name'] ?? 'N/A'); ?></td>
                        <!-- <td><?php //echo htmlspecialchars($order['delivery_status']) 
                                    ?></td> -->
                        <td class="px-6 py-4">
                            <?php
                            $status = htmlspecialchars($order['po_status']);
                            if ($status == 'approved') {
                                echo '<span class="text-green-500 font-semibold">Approved</span>';
                            } elseif ($status == 'rejected') {
                                echo '<span class="text-red-500 font-semibold">Rejected</span>';
                            } else if ($status == 'pending') {
                                echo '<span class="text-yellow-500 font-semibold">Pending</span>';
                            } else {
                                echo '<span class="text-gray-500 font-semibold">Inactive</span>';
                            }
                            ?>
                        </td>
                        <td class="px-6 py-4 flex items-center justify-center space-x-2">
                            <!-- <a href="viewProduct.php?id=<?php echo $order['order_id']; ?>" class="text-red-500 hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>

                            </a> -->
                            <a href="#>" class="text-red-500 hover:scale-110">
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
                    <td colspan="6" class="text-center py-4">No orders found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


