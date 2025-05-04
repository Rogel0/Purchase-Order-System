
/**
 * Utility to handle opening and closing modals dynamically.
 * @param {string} modalId 
 * @param {string} openButtonSelector
 * @param {string} closeButtonSelector
 * @param {function} [onOpen] 
 * @param {function} [onClose] 
 */
function setupModal(modalId, openButtonSelector, closeButtonSelector, onOpen = null, onClose = null) {
    const modal = document.getElementById(modalId);
    const openButtons = document.querySelectorAll(openButtonSelector);
    const closeButtons = document.querySelectorAll(closeButtonSelector);

    if (!modal) {
        console.error(`Modal with ID "${modalId}" not found.`);
        return;
    }

    function openModal(triggerButton) {
        modal.classList.remove('hidden');
        modal.removeAttribute('inert');
        const firstFocusableElement = modal.querySelector('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
        if (firstFocusableElement) firstFocusableElement.focus(); 


        if (onOpen && typeof onOpen === 'function') {
            onOpen(triggerButton, modal);
        }
    }


    function closeModal() {
        modal.classList.add('hidden');
        modal.setAttribute('inert', '');

        if (onClose && typeof onClose === 'function') {
            onClose(modal);
        }
    }


    openButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            openModal(button);
        });
    });


    closeButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            closeModal();
        });
    });
}