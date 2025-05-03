
 function generateUniqueProductNumber() {
    const now = new Date();
    const day = now.getDate().toString().padStart(2, '0'); 
    const hours = now.getHours().toString().padStart(2, '0'); 
    const seconds = now.getSeconds().toString().padStart(2, '0'); 

    return `${day}${hours}${seconds}`;
}

document.addEventListener("DOMContentLoaded", function () {
    const orderNumberDisplay = document.getElementById("poNumberDisplay");
    const orderNumberHidden = document.getElementById("poNumber");
    const uniqueProductNumber = generateUniqueProductNumber();

    if (orderNumberDisplay) {
        orderNumberDisplay.value = uniqueProductNumber;
    }
    if (orderNumberHidden) {
        orderNumberHidden.value = uniqueProductNumber;
    }
});