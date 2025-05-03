 function generateUniqueUniqueNumber() {
    const now = new Date();
    const day = now.getDate().toString().padStart(2, '0'); // Day (01-31)
    const hours = now.getHours().toString().padStart(2, '0'); // Hours (00-23)
    const seconds = now.getSeconds().toString().padStart(2, '0'); // Seconds (00-59)


    return `${day}${hours}${seconds}`;
}


document.addEventListener("DOMContentLoaded", function () {
    const orderNumberDisplay = document.getElementById("invoiceNumberDisplay");
    const orderNumberHidden = document.getElementById("invoiceNumber");
    const uniqueProductNumber = generateUniqueUniqueNumber();

    if (orderNumberDisplay) {
        orderNumberDisplay.value = uniqueProductNumber;
    }
    if (orderNumberHidden) {
        orderNumberHidden.value = uniqueProductNumber;
    }
});