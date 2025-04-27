<?php
// Fetch active vendors from the database
$queryVendors = "SELECT vendor_id, vendor_name FROM active_vendors";
$resultVendors = $conn->query($queryVendors);
$activeVendors = $resultVendors->fetch_all(MYSQLI_ASSOC);

?>

<div class="flex">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black bg-opacity-30 z-10 hidden" id="drawerOverlay"></div>

    <!-- Drawer Content -->
    <div class="fixed top-0 right-0 z-20 w-3/5 h-full overflow-x-hidden transition-all duration-500 transform translate-x-full bg-white shadow-lg" id="drawerContent">
        <form action="../actions/AddProduct.php" method="POST" class="px-6 py-4 flex flex-col h-full overflow-y-auto">
            <!-- <input type="hidden" name="productInitialStock" value="200">
        <input type="hidden" name="productStatus" value="Pending"> -->
            <!-- Drawer Header -->
            <div class="flex justify-start border-b border-gray-200 p-4">
                <h2 class="text-lg font-semibold">New Product</h2>
            </div>

            <!-- Drawer Body -->
            <div class="flex-1 p-4 flex gap-4 flex-col overflow-y-auto">
                <h4 class="font-semibold">Basic Product Information</h4>
                <div class="grid grid-cols-3 gap-4 p-8 border border-gray-200 h-auto">
                    <!-- Product Number -->
                    <div>
                        <label for="productNumber" class="text-sm">Product Number</label>
                        <input type="text" id="productNumberDisplay" disabled class="w-full bg-gray-100 border border-gray-300 rounded-md p-2 mt-1 h-10">
                        <input type="hidden" name="productNumber" id="productNumber">
                    </div>

                    <!-- Product Name -->
                    <div>
                        <label for="productName" class="text-sm">Product Name</label>
                        <input type="text" name="productName" id="productName" required class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10" placeholder="Enter product name">
                    </div>

                    <!-- Product Category -->
                    <div>
                        <label for="productCategory" class="text-sm">Product Category</label>
                        <select name="productCategory" id="productCategory" required class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10">
                            <option value="">Select Category</option>
                            <option value="category1">Category 1</option>
                            <option value="category2">Category 2</option>
                            <option value="category3">Category 3</option>
                        </select>
                    </div>

                    <!-- Product Description -->
                    <div class="col-span-3">
                        <label for="productDesc" class="text-sm">Product Description</label>
                        <textarea name="productDesc" id="productDesc" rows="4" required class="w-full border border-gray-300 rounded-md p-2 mt-1" placeholder="Enter product description"></textarea>
                    </div>
                </div>


                <!-- Other Details -->
                <h4 class="pt-4 font-semibold">Other Details</h4>
                <div class="grid grid-cols-3 gap-4 p-8 border border-gray-200 h-auto">
                    <!-- Pricing -->
                    <div>
                        <label for="productPrice" class="text-sm">Pricing</label>
                        <input type="number" required name="productPrice" id="productPrice" class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10" placeholder="Enter product price">
                    </div>

                    <!-- Product Status -->
                    <div>
                        <label for="productStatus" class="text-sm">Status</label>
                        <input type="text" name="productStatus" id="productStatus" disabled class="w-full border bg-gray-100 border-gray-300 rounded-md p-2 mt-1 h-10" value="Pending">
                    </div>

                    <!-- Supplier -->
                    <div>
                        <label for="productSupplier" class="text-sm">Linked Supplier</label>
                        <select name="productSupplier" id="productSupplier" required class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10">
                            <option value="">Select Supplier</option>
                            <?php
                            // Loop through the active vendors and populate the dropdown
                            foreach ($activeVendors as $vendor): ?>
                                <option value="<?php echo $vendor['vendor_id']; ?>">
                                    <?php echo htmlspecialchars($vendor['vendor_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Drawer Footer -->
            <div class="mt-auto flex justify-end gap-6 p-3 border-t border-gray-200">
                <button type="submit" name="submitProductBtn" id="submitProductBtn" class="px-6 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
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
<script src="../script/generate_product_number.js"></script>
<script src="../script/toast.js"></script>
<script src="../script/toast2.js"></script>