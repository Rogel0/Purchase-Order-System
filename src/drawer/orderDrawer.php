<div class="flex">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black bg-opacity-30 z-10 hidden" id="drawerOverlay"></div>

    <!-- Drawer Content -->
    <div class="fixed top-0 right-0 z-20 w-3/5 h-full transition-all duration-500 transform translate-x-full bg-white shadow-lg" id="drawerContent">
        <div class="px-6 py-4 flex flex-col h-full">
            <!-- Drawer Header -->
            <div class="flex justify-start border-b border-gray-200 p-4">
                <h2 class="text-lg font-semibold">New Order</h2>
            </div>

            <!-- Drawer Body -->
            <div class="flex-1 p-4 flex gap-4 flex-col">
                <h4 class="font-semibold">Basic Order Information</h4>
                <div class="grid grid-cols-3 gap-4 p-8 border border-gray-200 h-auto">
                    <!-- Order PO Number -->
                    <div>
                        <label for="orderPONumber" class="text-sm">PO Number</label>
                        <input type="text" name="orderPONumber" id="orderPONumber" class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10" placeholder="Enter product number">
                    </div>

                    <!-- Order Date -->
                    <div>
                        <label for="orderDate" class="text-sm">Order Date</label>
                        <input type="date" name="orderDate" id="orderDate" class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10" placeholder="Select order date">
                    </div>

                    <!-- PO Type -->
                    <div>
                        <label for="orderPOType" class="text-sm">PO Type</label>
                        <select name="orderPOType" id="orderPOType" class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10">
                            <option value="">Select type</option>
                            <option value="category1">Category 1</option>
                            <option value="category2">Category 2</option>
                            <option value="category3">Category 3</option>
                        </select>
                    </div>

                    <!-- Priority Level -->
                    <div>
                        <label for="orderPrioLevel" class="text-sm">Priority Level</label>
                        <select name="orderPrioLevel" id="orderPrioLevel" class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10">
                            <option value="">Select Level</option>
                            <option value="category1">Category 1</option>
                            <option value="category2">Category 2</option>
                            <option value="category3">Category 3</option>
                        </select>
                    </div>
                </div>


                <!-- #2 -->
                <h4 class="font-semibold">Vendor Information</h4>
                <div class="grid grid-cols-3 gap-4 p-8 border border-gray-200 h-auto">
                    <!-- Supplier Name -->
                    <div>
                        <label for="orderSupplierName" class="text-sm">Supplier Name</label>
                        <select name="orderSupplierName" id="orderSupplierName" class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10">
                            <option value="">Select</option>
                            <option value="category1">Category 1</option>
                            <option value="category2">Category 2</option>
                            <option value="category3">Category 3</option>
                        </select>
                    </div>

                    <div>
                        <label for="orderSupplierContact" class="text-sm">Supplier Contact</label>
                        <input type="text" name="orderSupplierContact" id="orderSupplierContact" class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10 bg-gray-100" disabled placeholder="098482782783">
                    </div>
                </div>


            </div>
            <!-- Drawer Footer -->
            <div class="mt-auto flex justify-end p-4">
                <button id="closeDrawerBtn" class="px-6 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                    Close Drawer
                </button>
            </div>
        </div>
    </div>
</div>
<style>
    #drawerOverlay {
        opacity: 0.5;
        transition: opacity 0.3s ease-in-out;
        background-color: black;
    }
</style>