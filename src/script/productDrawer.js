// Get the button and drawer elements
const addProductBtn = document.getElementById('addProductBtn');
const productDrawerContent = document.getElementById('drawerContent');
const closeProductDrawerBtn = document.getElementById('closeDrawerBtn');
const drawerOverlay = document.getElementById('drawerOverlay');

function openProductDrawer() {
    console.log('Opening Product Drawer');
    productDrawerContent.classList.remove('translate-x-full');
    productDrawerContent.classList.add('translate-x-0');
    drawerOverlay.classList.remove('hidden'); 
    console.log('Overlay is now visible');
}

function closeProductDrawer() {
    console.log('Closing Product Drawer');
    productDrawerContent.classList.remove('translate-x-0');
    productDrawerContent.classList.add('translate-x-full');
    drawerOverlay.classList.add('hidden'); 
    console.log('Overlay is now hidden');
}

// Add event listeners
addProductBtn.addEventListener('click', openProductDrawer);
closeProductDrawerBtn.addEventListener('click', closeProductDrawer);
drawerOverlay.addEventListener('click', closeProductDrawer);