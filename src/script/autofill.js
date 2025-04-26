console.log('autofill.js loaded');
document.addEventListener('DOMContentLoaded', () => {
    const supplierDropdown = document.getElementById('itemName');
    const itemCategory = document.getElementById('itemCategory');
    const itemDesc = document.getElementById('itemDescription');
    const itemStockQuantity = document.getElementById('stockQuantity');
    const itemUnitPriceDisplay = document.getElementById('unitPriceDisplay');
    const itemUnitPrice = document.getElementById('unitPrice');
    const itemmeasurement = document.getElementById('itemMeasurement');


    supplierDropdown.addEventListener('change', (event) => {
        const selectedOption = event.target.options[event.target.selectedIndex];
        itemCategory.value = selectedOption.getAttribute('data-category') || '';
        itemDesc.value = selectedOption.getAttribute('data-desc') || '';
        itemStockQuantity.value = selectedOption.getAttribute('data-stockquantity') || '';
        itemmeasurement.value = selectedOption.getAttribute('data-unitmeasurement') || '';
        itemUnitPriceDisplay.value = selectedOption.getAttribute('data-unitprice') || ''; 
        itemUnitPrice.value = selectedOption.getAttribute('data-unitprice') || ''; 
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const supplierDropdown = document.getElementById('supplierName');
    const supplierContact = document.getElementById('supplierContact');
    const supplierEmail = document.getElementById('supplierEmail');
    const supplierPhone = document.getElementById('supplierPhone');

    supplierDropdown.addEventListener('change', (event) => {
        const selectedOption = event.target.options[event.target.selectedIndex];
        supplierContact.value = selectedOption.getAttribute('data-contact') || '';
        supplierEmail.value = selectedOption.getAttribute('data-email') || '';
        supplierPhone.value = selectedOption.getAttribute('data-phone') || '';
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const itemDropdown = document.getElementById('itemName');
    const stockQuantityInput = document.getElementById('stockQuantity');
    const stockCriticalityInput = document.getElementById('stockCriticality');
    const linkedSupplierInput = document.getElementById('linkedSupplier'); // Hidden input for linkedSupplier

    itemDropdown.addEventListener('change', (event) => {
        const selectedOption = event.target.options[event.target.selectedIndex];
        const stockQuantity = parseInt(selectedOption.getAttribute('data-stockquantity')) || 0;

        // Update Stock Quantity
        stockQuantityInput.value = stockQuantity;

        // Determine Stock Criticality and Apply Color
        if (stockQuantity < 50) {
            stockCriticalityInput.value = 'Critical';
            stockCriticalityInput.style.color = 'red'; // Critical: Red
        } else if (stockQuantity < 100) {
            stockCriticalityInput.value = 'Low Stock';
            stockCriticalityInput.style.color = 'orange'; // Low Stock: Orange
        } else {
            stockCriticalityInput.value = 'Sufficient';
            stockCriticalityInput.style.color = 'green'; // Sufficient: Green
        }

        // Update Linked Supplier
        const linkedSupplier = selectedOption.getAttribute('data-linkedsupplier') || '';
        linkedSupplierInput.value = linkedSupplier; // Update hidden input
    });
});