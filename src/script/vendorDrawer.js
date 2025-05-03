// Get the button and drawer elements
const addVendorBtn = document.getElementById('addVendorBtn');
const DrawerContent = document.getElementById('drawerContent');
const closeDrawerBtn = document.getElementById('closeDrawerBtn');
const drawerOverlay = document.getElementById('drawerOverlay');

function openProductDrawer() {
    console.log('Opening  Drawer');
    DrawerContent.classList.remove('translate-x-full');
    closeDrawerBtn.classList.add('translate-x-0');
    drawerOverlay.classList.remove('hidden'); // Show the overlay
    console.log('Overlay is now visible');
}

function closeProductDrawer() {
    console.log('Closing  Drawer');
    DrawerContent.classList.remove('translate-x-0');
    DrawerContent.classList.add('translate-x-full');
    drawerOverlay.classList.add('hidden'); // Hide the overlay
    console.log('Overlay is now hidden');
}

// Add event listeners
addVendorBtn.addEventListener('click', openProductDrawer);
closeDrawerBtn.addEventListener('click', closeProductDrawer);
drawerOverlay.addEventListener('click', closeProductDrawer); 