 // Function to generate a unique product number using the current date and time
 function generateUniqueProductNumber() {
    const now = new Date();
    const day = now.getDate().toString().padStart(2, '0'); // Day (01-31)
    const hours = now.getHours().toString().padStart(2, '0'); // Hours (00-23)
    const seconds = now.getSeconds().toString().padStart(2, '0'); // Seconds (00-59)

    // Combine date and time components to create a unique product number
    return `${day}${hours}${seconds}`;
}

// Automatically set the generated product number in the input fields
document.addEventListener("DOMContentLoaded", function () {
    const productNumberDisplay = document.getElementById("productNumberDisplay");
    const productNumberHidden = document.getElementById("productNumber");
    const uniqueProductNumber = generateUniqueProductNumber();

    if (productNumberDisplay) {
        productNumberDisplay.value = uniqueProductNumber;
    }
    if (productNumberHidden) {
        productNumberHidden.value = uniqueProductNumber;
    }
});