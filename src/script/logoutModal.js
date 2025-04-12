// Get modal elements
const modal = document.getElementById('logout-modal');
const openModalButton = document.getElementById('logoutButton');
const closeModalButtons = document.querySelectorAll('#close-modal, #cancel-modal');

// Function to open the modal
function openModal() {
    modal.classList.remove('hidden');
    modal.removeAttribute('inert');
    modal.querySelector('button').focus(); // Focus on the first button in the modal
}

// Function to close the modal
function closeModal() {
    modal.classList.add('hidden');
    modal.setAttribute('inert', '');
    openModalButton.focus(); // Return focus to the button that opened the modal
}

// Add event listeners
openModalButton.addEventListener('click', openModal);
closeModalButtons.forEach(button => {
    button.addEventListener('click', closeModal);
});