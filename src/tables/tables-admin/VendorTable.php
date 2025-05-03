

<table id="productTable" class="min-w-full bg-white rounded-lg shadow">
    <thead class="bg-gray-100">
        <tr class="text-center text-sm text-gray-600">
            <th class="px-6 py-3 text-center">Vendor Number</th>
            <th class="px-6 py-3 text-center">Vendor name</th>
            <th class="px-6 py-3 text-center">Category/Type</th>
            <th class="px-6 py-3 text-center">Status</th>
            <th class="px-6 py-3 text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($addvendors)): ?>
            <?php foreach ($addvendors as $vendor): ?>
                <tr class="vendor-row border-t text-sm text-center" data-status="<?= htmlspecialchars($vendor['status']); ?>">
                    <td class="px-6 py-4"><?php echo htmlspecialchars($vendor['vendor_number']); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($vendor['vendor_name']); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($vendor['category_name']); ?></td>
                    <td class="px-6 py-4">
                        <?php
                        $status = htmlspecialchars($vendor['status']);
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
                  

                        <a href="viewProduct.php?id=<?php echo $vendor['vendor_number']; ?>" class="text-red-500 hover:scale-110">
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
                <td colspan="6" class="text-center py-4">No vendors found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<script src="../utilities/modalUtility.js"></script>
<script>
 setupModal(
  'archive-modal',
  '.archiveVendorBtn',
  '#cancel-modal, #close-modal',
  (triggerButton, modal) => {
    const vendorId = triggerButton.getAttribute('data-vendor-id');
    document.getElementById('archive-vendor-id').value = vendorId;
  }
);
</script>