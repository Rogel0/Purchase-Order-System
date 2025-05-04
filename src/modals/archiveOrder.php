<div id="archive-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center">
    <!-- Background Overlay -->
    <div class="absolute inset-0 bg-black opacity"></div>

    <!-- Modal Content -->
    <div class="relative bg-white rounded-xl shadow-2xl w-2/5 max-w-lg p-8 transform transition-all scale-95">
        <header class="flex justify-between items-center border-b pb-4">
            <h2 class="text-2xl font-bold text-gray-900">Archive Order Confirmation</h2>
            <button class="text-gray-500 hover:text-gray-700 focus:outline-none text-2xl" aria-label="Close modal" id="close-modal">
                &times;
            </button>
        </header>
        <main class="mt-6 text-gray-700 text-lg">
            Are you sure you want to arvhive this order? This action cannot be undone.
        </main>
        <footer class="mt-8 flex justify-end space-x-4">
            <button class="px-5 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 focus:outline-none" id="cancel-modal">
                Cancel
            </button>
            <form action="../actions/ArchiveOrder.php" method="POST" style="display: inline;">
                <input type="hidden" name="order_id" id="archive-order-id">
                <button type="submit" class="px-5 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none">
                    Confirm Archive
                </button>
            </form>
        </footer>
    </div>
</div>

<script>
    document.querySelectorAll('.archiveOrderBtn').forEach(button => {
        button.addEventListener('click', function() {
            const orderId = this.getAttribute('data-order-id');
            document.getElementById('archive-order-id').value = orderId;
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