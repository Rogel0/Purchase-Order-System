document.getElementById('itemQuantity').addEventListener('input', function() {
    const itemQuantity = parseFloat(this.value) || 0; // Get the item quantity from the input field
    const unitPrice = parseFloat(document.getElementById('unitPrice').value) || 0; // Get the unit price from the input field
    const totalPrice = itemQuantity * unitPrice; // Calculate the total price

    document.getElementById('totalPrice').value = totalPrice.toFixed(2); // Update the total price input field
});