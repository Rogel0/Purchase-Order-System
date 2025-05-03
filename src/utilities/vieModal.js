function initializeModals(
  openButtonSelector,
  modalSelector,
  closeButtonSelector
) {
  const openModalButtons = document.querySelectorAll(openButtonSelector);
  const closeModalButtons = document.querySelectorAll(closeButtonSelector); 
  const modals = document.querySelectorAll(modalSelector);
  
  // Open modal
  openModalButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const targetModalClass = button.getAttribute("data-target"); 
      const targetModal = document.querySelector(targetModalClass);
      if (targetModal) {
        targetModal.classList.remove("hidden"); 
      }
    });
  });

  // Close modal
  closeModalButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const modal = button.closest(modalSelector); // Find the closest modal to the button
      if (modal) {
        modal.classList.add("hidden"); 
      }
    });
  });

  // Close modal when clicking outside the modal content
  modals.forEach((modal) => {
    modal.addEventListener("click", (event) => {
      if (event.target === modal) {
        modal.classList.add("hidden"); 
      }
    });
  });
}

document.addEventListener('DOMContentLoaded', () => {
    initializeModals('.viewVendorBtn', '.modal', '.close-modal');
});

document.addEventListener("DOMContentLoaded", () => {
  initializeModals(".viewProductBtn", ".modal", ".close-modal");
});

document.addEventListener('DOMContentLoaded', () => {
    initializeModals('.viewOrderBtn', '.modal', '.close-modal');
});


document.addEventListener('DOMContentLoaded', () => {
  initializeModals('.viewThreshholdBtn', '.modal', '.close-modal');
});

