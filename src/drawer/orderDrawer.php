<?php
// Fetch category vendors from the database
$queryVendors = "SELECT category_id, category_name FROM vendor_categories";
$resultVendors = $conn->query($queryVendors);
$categoryVendors = $resultVendors->fetch_all(MYSQLI_ASSOC);

// Fetch payment terms from the database
$queryTerms = "SELECT term_id, term_name FROM payment_terms";
$resultTerms = $conn->query($queryTerms);
$paymentTerms = $resultTerms->fetch_all(MYSQLI_ASSOC);

//Fetch active vendors from the database
$queryVendorsInfo = "SELECT * FROM active_vendors";
$resultVendorsInfo = $conn->query($queryVendorsInfo);
$suppliers = $resultVendorsInfo->fetch_all(MYSQLI_ASSOC);

//Fetch active product from the database
$queryProducts = "SELECT * FROM active_products";
$resultProductsActive = $conn->query($queryProducts);
$activeProducts = $resultProductsActive->fetch_all(MYSQLI_ASSOC);
?>

<div class="flex">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black bg-opacity-30 z-10 hidden" id="drawerOverlay"></div>

    <!-- Drawer Content -->
    <div class="fixed top-0 right-0 z-20 w-3/5 h-full overflow-x-hidden transition-all duration-500 transform translate-x-full bg-white shadow-lg" id="drawerContent">
        <form action="../actions/AddOrder.php" method="POST" enctype="multipart/form-data" class="px-6 py-4 flex flex-col h-full overflow-y-auto">
            <!-- Drawer Header -->
            <div class="flex justify-start border-b border-gray-200 p-4">
                <h2 class="text-lg font-semibold">New Order</h2>
            </div>

            <!-- Drawer Body -->
            <div class="flex-1 p-4 flex gap-4 flex-col overflow-y-auto">
                <!-- Basic Order Information -->
                <h4 class="font-semibold">Basic Order Information</h4>
                <div class="grid grid-cols-3 gap-4 p-4 border border-gray-200 h-auto">
                    <!-- PO Number -->
                    <div>
                        <label for="poNumber" class="text-sm">PO Number</label>
                        <input type="text" id="poNumberDisplay" disabled class="w-full bg-gray-100 border border-gray-300 rounded-md p-2 mt-1 h-10">
                        <input type="hidden" name="poNumber" id="poNumber">
                    </div>

                    <!-- Order Date -->
                    <div>
                        <label for="orderDate" class="text-sm">Order Date</label>
                        <input type="date" name="orderDate" id="orderDate" disabled class="w-full border bg-gray-100 border-gray-300 rounded-md p-2 mt-1 h-10" value="<?php echo date('Y-m-d'); ?>">
                    </div>

                    <!-- PO Type -->
                    <div>
                        <label for="poType" class="text-sm">PO Type</label>
                        <select name="poType" id="poType" required class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10">
                            <option value="">Select PO Type</option>
                            <option value="Standard">Standard</option>
                            <option value="Urgent">Urgent</option>
                        </select>
                    </div>

                    <!-- Priority Level -->
                    <div>
                        <label for="priorityLevel" class="text-sm">Priority Level</label>
                        <select name="priorityLevel" id="priorityLevel" required class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10">
                            <option value="">Select Priority</option>
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>
                </div>

                <!-- Vendor (Supplier) Information -->
                <h4 class="font-semibold">Vendor (Supplier) Information</h4>
                <div class="grid grid-cols-3 gap-4 p-4 border border-gray-200 h-auto">
                    <!-- Supplier Name -->
                    <div>
                        <label for="supplierName" class="text-sm">Supplier Name</label>
                        <select name="supplierName" id="supplierName" required class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10">
                            <option value="">Select Supplier</option>
                            <?php foreach ($suppliers as $supplier): ?>
                                <option
                                    value="<?php echo $supplier['vendor_id']; ?>"
                                    data-contact="<?php echo htmlspecialchars($supplier['contact_person']); ?>"
                                    data-email="<?php echo htmlspecialchars($supplier['email']); ?>"
                                    data-phone="<?php echo htmlspecialchars($supplier['phone_number']); ?>">
                                    <?php echo htmlspecialchars($supplier['vendor_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Supplier Contact -->
                    <div>
                        <label for="supplierContact" class="text-sm">Supplier Contact</label>
                        <input type="text" name="supplierContact" id="supplierContact" disabled class="w-full bg-gray-100 border border-gray-300 rounded-md p-2 mt-1 h-10">
                    </div>

                    <!-- Supplier Email -->
                    <div>
                        <label for="supplierEmail" class="text-sm">Supplier Email</label>
                        <input type="email" name="supplierEmail" id="supplierEmail" disabled class="w-full bg-gray-100 border border-gray-300 rounded-md p-2 mt-1 h-10">
                    </div>

                    <!-- Supplier Phone -->
                    <div>
                        <label for="supplierPhone" class="text-sm">Supplier Phone</label>
                        <input type="text" name="supplierPhone" id="supplierPhone" disabled class="w-full bg-gray-100 border border-gray-300 rounded-md p-2 mt-1 h-10">
                    </div>
                </div>

                <!-- Item Details -->
                <h4 class="font-semibold">Item Details</h4>
                <div class="grid grid-cols-3 gap-4 p-4 border border-gray-200 h-auto">
                    <!-- Item Name -->
                    <div>
                        <label for="itemName" class="text-sm">Item Name</label>
                        <select name="itemName" id="itemName" required class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10">
                            <option value="">Select Item</option>
                            <?php foreach ($activeProducts as $activeProduct): ?>
                                <option
                                    value="<?php echo $activeProduct['productid']; ?>"
                                    data-category="<?php echo htmlspecialchars($activeProduct['category']); ?>"
                                    data-desc="<?php echo htmlspecialchars($activeProduct['description']); ?>"
                                    data-unitprice="<?php echo htmlspecialchars($activeProduct['unitprice']); ?>"
                                    data-unitmeasurement="<?php echo htmlspecialchars($activeProduct['unitofmeasurement']); ?>"
                                    data-stockquantity="<?php echo htmlspecialchars($activeProduct['stockquantity']); ?>">
                                  
                                    <?php echo htmlspecialchars($activeProduct['productname']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="itemCategory" class="text-sm">Category</label>
                        <input type="text" name="itemCategory" id="itemCategory" disabled class="w-full bg-gray-100 border border-gray-300 rounded-md p-2 mt-1 h-10">
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="itemDescription" class="text-sm">Description</label>
                        <input type="text" name="itemDescription" id="itemDescription" disabled class="w-full bg-gray-100 border border-gray-300 rounded-md p-2 mt-1 h-10">
                    </div>

                    <div>
                        <label for="stockQuantity" class="text-sm">Stock Quantity</label>
                        <input type="number" name="stockQuantity" id="stockQuantity" disabled class="w-full bg-gray-100 border border-gray-300 rounded-md p-2 mt-1 h-10">
                    </div>

                    <!-- Measurement -->
                    <div>
                        <label for="itemMeasurement" class="text-sm">Measurement</label>
                        <input type="text" name="itemMeasurement" id="itemMeasurement" disabled class="w-full bg-gray-100 border border-gray-300 rounded-md p-2 mt-1 h-10">
                    </div>

                    <!-- Unit Price -->
                    <div>
                        <label for="unitPrice" class="text-sm">Unit Price</label>
                        <input type="text" name="unitPrice" id="unitPrice" disabled class="w-full bg-gray-100 border border-gray-300 rounded-md p-2 mt-1 h-10">
                    </div>

                    <!-- Stock Criticality -->
                    <div>
                        <label for="stockCriticality" class="text-sm">Stock Criticality</label>
                        <input type="text" name="stockCriticality" id="stockCriticality" disabled class="w-full bg-gray-100 border border-gray-300 rounded-md p-2 mt-1 h-10">
                    </div>

                    <!-- Quantity -->
                    <div>
                        <label for="itemQuantity" class="text-sm">Quantity</label>
                        <input type="number" name="itemQuantity" id="itemQuantity" required class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10">
                    </div>

                    <!-- Total Price -->
                    <div>
                        <label for="totalPrice" class="text-sm">Total Price</label>
                        <input type="text" name="totalPrice" id="totalPrice" disabled class="w-full bg-gray-100 border border-gray-300 rounded-md p-2 mt-1 h-10">
                    </div>
                </div>

                <!-- Payment Information -->
                <h4 class="font-semibold">Payment Information</h4>
                <div class="grid grid-cols-3 gap-4 p-4 border border-gray-200 h-auto">
                    <!-- Payment Terms -->
                    <div>
                        <label for="paymentTerms" class="text-sm">Payment Terms</label>
                        <select name="paymentTerms" id="paymentTerms" required class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10">
                            <option value="">Select Payment Terms</option>
                            <?php foreach ($paymentTerms as $terms): ?>
                                <option value="<?php echo $terms['term_id']; ?>">
                                    <?php echo htmlspecialchars($terms['term_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Payment Method -->
                    <div>
                        <label for="paymentMethod" class="text-sm">Payment Method</label>
                        <select name="paymentMethod" id="paymentMethod" required class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10">
                            <option value="">Select Payment Method</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Cash">Cash</option>
                        </select>
                    </div>

                    <!-- Invoice Number -->
                    <div>
                        <label for="invoiceNumber" class="text-sm">Invoice Number</label>
                        <input type="text" name="invoiceNumber" id="invoiceNumber" required class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10">
                    </div>

                    <!-- Total Amount -->
                    <div>
                        <label for="totalAmount" class="text-sm">Total Amount</label>
                        <input type="text" name="totalAmount" id="totalAmount" disabled class="w-full bg-gray-100 border border-gray-300 rounded-md p-2 mt-1 h-10">
                    </div>
                </div>

                <!-- Delivery & Shipping Details -->
                <h4 class="font-semibold">Delivery & Shipping Details</h4>
                <div class="grid grid-cols-3 gap-4 p-4 border border-gray-200 h-auto">
                    <!-- Delivery Address -->
                    <div>
                        <label for="deliveryAddress" class="text-sm">Delivery Address</label>
                        <textarea name="deliveryAddress" id="deliveryAddress" rows="3" class="w-full border border-gray-300 rounded-md p-2 mt-1"></textarea>
                    </div>

                    <!-- Receiving Person -->
                    <div>
                        <label for="receivingPerson" class="text-sm">Receiving Person</label>
                        <select name="receivingPerson" id="receivingPerson" required class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10">
                            <option value="">Select Receiving Person</option>
                            <!-- Populate dynamically -->
                        </select>
                    </div>

                    <!-- Delivery Method -->
                    <div>
                        <label for="deliveryMethod" class="text-sm">Delivery Method</label>
                        <select name="deliveryMethod" id="deliveryMethod" required class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10">
                            <option value="">Select Delivery Method</option>
                            <option value="Courier">Courier</option>
                            <option value="Pickup">Pickup</option>
                        </select>
                    </div>

                    <!-- Shipping Carrier -->
                    <div>
                        <label for="shippingCarrier" class="text-sm">Shipping Carrier</label>
                        <select name="shippingCarrier" id="shippingCarrier" required class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10">
                            <option value="">Select Shipping Carrier</option>
                            <option value="FedEx">FedEx</option>
                            <option value="DHL">DHL</option>
                            <option value="UPS">UPS</option>
                        </select>
                    </div>

                    <!-- Expected Delivery -->
                    <div>
                        <label for="expectedDelivery" class="text-sm">Expected Delivery</label>
                        <input type="date" name="expectedDelivery" id="expectedDelivery" required class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10">
                    </div>
                </div>

                <!-- Notes & Attachments -->
                <h4 class="font-semibold">Notes & Attachments</h4>
                <div class="grid grid-cols-3 gap-4 p-4 border border-gray-200 h-auto">
                    <!-- Order Notes -->
                    <div class="col-span-3">
                        <label for="orderNotes" class="text-sm">Order Notes</label>
                        <textarea name="orderNotes" id="orderNotes" rows="4" class="w-full border border-gray-300 rounded-md p-2 mt-1"></textarea>
                    </div>

                    <!-- Attachments -->
                    <div class="col-span-3">
                        <label for="attachments" class="text-sm">Attachments</label>
                        <input type="file" name="attachments[]" id="attachments" multiple class="w-full border border-gray-300 rounded-md p-2 mt-1">
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
<script src="../script/price_computation.js"></script>
<script src="../script/generate_po_number.js"></script>
<script src="../script/toast.js"></script>
<script src="../script/autofill.js"></script>