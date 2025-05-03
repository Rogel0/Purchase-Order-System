document.getElementById('itemQuantity').addEventListener('input', function() {
    const itemQuantity = parseFloat(this.value) || 0;
    const unitPrice = parseFloat(document.getElementById('unitPrice').value) || 0; 
    const totalPrice = itemQuantity * unitPrice; 

    document.getElementById('totalPriceDisplay').value = totalPrice.toFixed(2); 
    document.getElementById('totalPrice').value = totalPrice.toFixed(2);
});