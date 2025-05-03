
 function generateUniqueProductNumber() {
    const now = new Date();
    const day = now.getDate().toString().padStart(2, '0'); 
    const hours = now.getHours().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0'); 


    return `${day}${hours}${seconds}`;
}


document.addEventListener("DOMContentLoaded", function () {
    const productNumberDisplay = document.getElementById("vendorNumberDisplay");
    const productNumberHidden = document.getElementById("vendorNumber");
    const uniqueProductNumber = generateUniqueProductNumber();

    if (productNumberDisplay) {
        productNumberDisplay.value = uniqueProductNumber;
    }
    if (productNumberHidden) {
        productNumberHidden.value = uniqueProductNumber;
    }
});