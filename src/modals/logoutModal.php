<div class="fixed inset-0 z-50 flex items-center justify-center hidden" id="logout-modal" style="background-color:rgba(56, 53, 53, 0.05);" inert>
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg p-8 transform transition-all scale-95">
        <header class="flex justify-between items-center border-b pb-4">
            <h2 class="text-2xl font-bold text-gray-900" id="logout-modal-title">Logout Confirmation</h2>
            <button class="text-gray-500 hover:text-gray-700 focus:outline-none text-2xl" aria-label="Close modal" id="close-modal">
                &times;
            </button>
        </header>
        <main class="mt-6 text-gray-700 text-lg">
            Are you sure you want to log out? This action cannot be undone.
        </main>
        <footer class="mt-8 flex justify-end space-x-4">
            <button class="px-5 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 focus:outline-none" id="cancel-modal">
                Cancel
            </button>
            <form action="../auth/logout.php" method="post" style="display: inline;">
                <button type="submit" class="px-5 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none">
                    Logout
                </button>
            </form>
        </footer>
    </div>
</div>

<style>
#logout-modal[aria-hidden="true"] {
    display: none;
}
</style>