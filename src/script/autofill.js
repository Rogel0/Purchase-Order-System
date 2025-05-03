console.log('autofill.js loaded');
document.addEventListener('DOMContentLoaded', () => {
    const supplierDropdown = document.getElementById('itemName');
    const itemCategory = document.getElementById('itemCategory');
    const itemDesc = document.getElementById('itemDescription');
    const itemStockQuantity = document.getElementById('stockQuantity');
    const itemUnitPriceDisplay = document.getElementById('unitPriceDisplay');
    const itemUnitPrice = document.getElementById('unitPrice');
    const itemmeasurement = document.getElementById('itemMeasurement');
    const itemThreshold = document.getElementById('threshold');


    supplierDropdown.addEventListener('change', (event) => {
        const selectedOption = event.target.options[event.target.selectedIndex];
        itemCategory.value = selectedOption.getAttribute('data-category') || '';
        itemDesc.value = selectedOption.getAttribute('data-desc') || '';
        itemStockQuantity.value = selectedOption.getAttribute('data-stockquantity') || '';
        itemmeasurement.value = selectedOption.getAttribute('data-unitmeasurement') || '';
        itemUnitPriceDisplay.value = selectedOption.getAttribute('data-unitprice') || ''; 
        itemUnitPrice.value = selectedOption.getAttribute('data-unitprice') || ''; 
        itemThreshold.value = selectedOption.getAttribute('data-threshold') || '';
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
    const linkedSupplierInput = document.getElementById('linkedSupplier'); 
    const thresholdInput = document.getElementById('threshold'); 

    itemDropdown.addEventListener('change', (event) => {
        const selectedOption = event.target.options[event.target.selectedIndex];
        const stockQuantity = parseInt(selectedOption.getAttribute('data-stockquantity')) || 0;
        const threshold = parseInt(selectedOption.getAttribute('data-threshold')) || 20; 


        stockQuantityInput.value = stockQuantity;


        thresholdInput.value = threshold;

 
        
        if (stockQuantity < threshold) {
            stockCriticalityInput.value = 'Critical';
            stockCriticalityInput.style.color = 'red'; 
        // } else if (stockQuantity < threshold + 10) {
        //     stockCriticalityInput.value = 'Low Stock';
        //     stockCriticalityInput.style.color = 'orange'; 
        } else {
            stockCriticalityInput.value = 'Sufficient';
            stockCriticalityInput.style.color = 'green';
        }

        const linkedSupplier = selectedOption.getAttribute('data-linkedsupplier') || '';
        linkedSupplierInput.value = linkedSupplier; 
    });
});
