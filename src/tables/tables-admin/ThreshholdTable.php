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
                            <button
                                data-target=".exampleModal-<?php echo htmlspecialchars($product['product_number']); ?>"
                                type="button"
                                class="viewThreshholdBtn text-red-500 hover:scale-110">
                                <svg class="w-6 h-6" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title>threshold-off</title>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="icon" fill="#000000" transform="translate(64.000000, 64.000000)">
                                                <path d="M42.6666667,1.42108547e-14 L42.666,341.333 L384,341.333333 L384,384 L1.42108547e-14,384 L1.42108547e-14,1.42108547e-14 L42.6666667,1.42108547e-14 Z M290.80086,91.7065484 L382.469976,176.324193 L353.530024,207.675807 L306.517333,164.288 L263.90925,265.523605 L197.653333,204.8 L140.664173,309.333333 L64,309.333333 L64,266.666667 L115.328,266.666667 L186.323324,136.522922 L248.085333,193.130667 L290.80086,91.7065484 Z" id="Combined-Shape"> </path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </button>
                        </td>
                    </tr>

                    <?php
                    include('../modals/threshhold.php')
                    ?>

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