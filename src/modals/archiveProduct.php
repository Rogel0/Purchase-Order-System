<div id="archive-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center">
    <!-- Background Overlay -->
    <div class="absolute inset-0 bg-black opacity"></div>

    <!-- Modal Content -->
    <div class="relative bg-white rounded-xl shadow-2xl w-2/5 max-w-lg p-8 transform transition-all scale-95">
        <header class="flex justify-between items-center border-b pb-4">
            <h2 class="text-2xl font-bold text-gray-900">Product Archive Confirmation</h2>
            <button class="text-gray-500 hover:text-gray-700 focus:outline-none text-2xl" aria-label="Close modal" id="close-modal">
                &times;
            </button>
        </header>
        <main class="mt-6 text-gray-700 text-lg">
            Are you sure you want to archive this product? This action cannot be undone.
        </main>
        <footer class="mt-8 flex justify-end space-x-4">
            <button class="px-5 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 focus:outline-none" id="cancel-modal">
                Cancel
            </button>
            <form action="../actions/ArchiveProduct.php" method="POST" style="display: inline;">
            <input type="hidden" name="product_id" id="archive-product-id">
                <button type="submit" class="px-5 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none">
                    Confirm Archive
                </button>
            </form>
        </footer>
    </div>
</div>

<script>
    document.querySelectorAll('.archiveProductBtn').forEach(button => {
    button.addEventListener('click', function () {
        const productId = this.getAttribute('data-product-id');
        document.getElementById('archive-product-id').value = productId;
    });
});
</script>

<style>
#logout-modal[aria-hidden="true"] {
    display: none;
}

.opacity {
    opacity: 0.6;
}
</style>