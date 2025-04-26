document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const rows = document.querySelectorAll('.vendor-row');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.getAttribute('data-filter');

            // Highlight the active button
            filterButtons.forEach(btn => btn.classList.remove('bg-orange-400', 'text-white', 'font-bold'));
            button.classList.add('bg-orange-400', 'text-white', 'font-bold');

            // Filter rows based on the selected filter
            rows.forEach(row => {
                const status = row.getAttribute('data-status');
                if (filter === 'all' || status === filter) {
                    row.style.display = ''; // Show the row
                } else {
                    row.style.display = 'none'; // Hide the row
                }
            });
        });
    });
});