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