// Get modal elements
const modal = document.getElementById('logout-modal');
const openModalButton = document.getElementById('logoutButton');
const closeModalButtons = document.querySelectorAll('#close-modal, #cancel-modal');


function openModal() {
    modal.classList.remove('hidden');
    modal.removeAttribute('inert');
    modal.querySelector('button').focus();
}


function closeModal() {
    modal.classList.add('hidden');
    modal.setAttribute('inert', '');
    openModalButton.focus(); 
}


openModalButton.addEventListener('click', openModal);
closeModalButtons.forEach(button => {
    button.addEventListener('click', closeModal);
});