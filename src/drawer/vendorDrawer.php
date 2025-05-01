<?php
// Fetch category vendors from the database
$queryVendors = "SELECT * FROM categories";
$resultVendors = $conn->query($queryVendors);
$categoryVendors = $resultVendors->fetch_all(MYSQLI_ASSOC);

// Fetch payment terms from the database
$queryTerms = "SELECT term_id, term_name FROM payment_terms";
$resultTerms = $conn->query($queryTerms);
$paymentTerms = $resultTerms->fetch_all(MYSQLI_ASSOC);
?>

<div class="flex">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black bg-opacity-30 z-10 hidden" id="drawerOverlay"></div>

    <!-- Drawer Content -->
    <div class="fixed top-0 right-0 z-20 w-3/5 h-full overflow-x-hidden transition-all duration-500 transform translate-x-full bg-white shadow-lg" id="drawerContent">
        <form action="../actions/AddVendor.php" method="POST" enctype="multipart/form-data" class="px-6 py-4 flex flex-col h-full overflow-y-auto">
            <!-- Drawer Header -->
            <div class="flex justify-start border-b border-gray-200 p-4">
                <h2 class="text-lg font-semibold">New Vendor</h2>
            </div>

            <!-- Drawer Body -->
            <div class="flex-1 p-4 flex gap-4 flex-col overflow-y-auto">
                <!-- Vendor Information -->
                <h4 class="font-semibold ">Vendor Information</h4>
                <div class="grid grid-cols-3 gap-4 p-4 border border-gray-200 h-auto">
                    <!-- Vendor Number -->
                    <div>
                        <label for="vendorNumber" class="text-sm">Vendor Number</label>
                        <input type="text" id="vendorNumberDisplay" disabled class="w-full bg-gray-100 border border-gray-300 rounded-md p-2 mt-1 h-10">
                        <input type="hidden" name="vendorNumber" id="vendorNumber">
                    </div>

                    <!-- Vendor Name -->
                    <div>
                        <label for="vendorName" class="text-sm">Vendor Name</label>
                        <input type="text" name="vendorName" id="vendorName" required class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10" placeholder="Enter vendor name">
                    </div>

                    <!-- Vendor Category -->
                    <div>
                        <label for="vendorCategory" class="text-sm">Category</label>
                        <select name="vendorCategory" id="vendorCategory" required class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10">
                            <option value="">Select Category</option>
                            <?php
                            foreach ($categoryVendors as $vendor): ?>
                                <option value="<?php echo $vendor['category_id']; ?>">
                                    <?php echo htmlspecialchars($vendor['category_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Vendor Description -->
                    <div class="col-span-3">
                        <label for="vendorDescription" class="text-sm">Description</label>
                        <textarea name="vendorDescription" id="vendorDescription" rows="4" class="w-full border border-gray-300 rounded-md p-2 mt-1" placeholder="Enter vendor description"></textarea>
                    </div>
                </div>

                <!-- Contact Information -->
                <h4 class="font-semibold ">Contact Information</h4>
                <div class="grid grid-cols-3 gap-4 p-4 border border-gray-200 h-auto">
                    <!-- Contact Person -->
                    <div>
                        <label for="contactPerson" class="text-sm">Contact Person</label>
                        <input type="text" name="contactPerson" id="contactPerson" class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10" placeholder="Enter contact person">
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <label for="phoneNumber" class="text-sm">Phone Number</label>
                        <input type="text" name="phoneNumber" id="phoneNumber" class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10" placeholder="Enter phone number">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="text-sm">Email Address</label>
                        <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10" placeholder="Enter email address">
                    </div>

                    <!-- Address -->
                    <div class="col-span-3">
                        <label for="address" class="text-sm">Address</label>
                        <textarea name="address" id="address" rows="4" class="w-full border border-gray-300 rounded-md p-2 mt-1" placeholder="Enter address"></textarea>
                    </div>
                </div>

                <!-- Business Details -->
                <h4 class="font-semibold ">Business Details</h4>
                <div class="grid grid-cols-3 gap-4 p-4 border border-gray-200 h-auto">
                    <!-- Tax Identification Number -->
                    <div>
                        <label for="taxId" class="text-sm">Tax Identification Number</label>
                        <input type="text" name="taxId" id="taxId" class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10" placeholder="Enter tax ID">
                    </div>

                    <!-- Payment Terms -->
                    <div>
                        <label for="paymentTerms" class="text-sm">Payment Terms</label>
                        <select name="paymentTerms" id="paymentTerms" class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10">
                            <option value="">Select Payment Terms</option>
                            <?php
                            foreach ($paymentTerms as $terms): ?>
                                <option value="<?php echo $terms['term_id']; ?>">
                                    <?php echo htmlspecialchars($terms['term_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label for="vendorStatus" class="text-sm">Status</label>
                        <input type="text" name="vendorStatus" id="vendorStatus" disabled class="w-full border bg-gray-100 border-gray-300 rounded-md p-2 mt-1 h-10" value="Pending">
                    </div>

                    <!-- Supporting Info -->
                    <div class="col-span-3">
                        <label for="supportingInfo" class="text-sm">Supporting Info</label>
                        <input type="file" name="supportingInfo" id="supportingInfo" accept=".jpg, .png" class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10">
                    </div>
                </div>
            </div>

            <!-- Drawer Footer -->
            <div class="mt-auto flex justify-end gap-6 p-3 border-t border-gray-200">
                <button type="submit" name="submitVendorBtn" id="submitVendorBtn" class="px-6 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                    Submit
                </button>
                <button type="button" id="closeDrawerBtn" class="px-6 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                    Close Drawer
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    #drawerOverlay {
        opacity: 0.5;
        transition: opacity 0.3s ease-in-out;
        background-color: black;
    }
</style>
<script src="../script/generate_vendor_number.js"></script>
<script src="../script/toast.js"></script>