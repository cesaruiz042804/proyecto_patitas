// Manejador para abrir el modal
document.querySelectorAll('.openModal').forEach(btn => {
   const productId = btn.getAttribute('data-product-id');
   btn.addEventListener('click', () => openModal(productId)); // Abre el modal
});

// Manejador para cerrar el modal
document.querySelectorAll('.close').forEach(closeBtn => {
   const productId = closeBtn.getAttribute('data-modal-id');
   closeBtn.addEventListener('click', () => closeModal(productId)); // Cierra el modal
});

// Cerrar el modal al hacer clic fuera del contenido
window.addEventListener('click', (e) => {
   document.querySelectorAll('.modal').forEach(modal => {
      if (e.target === modal) {
         modal.style.display = 'none';
      }
   });
});

// Función para abrir el modal
function openModal(productId) {
   const modal = document.getElementById(`modal-${productId}`);
   modal.style.display = 'flex'; // Mostrar el modal
}

// Función para cerrar el modal
function closeModal(productId) {
   const modal = document.getElementById(`modal-${productId}`);
   modal.style.display = 'none'; // Ocultar el modal
}

// Función para cambiar la cantidad
function changeQuantity(amount, productId) {
   const quantityInput = document.getElementById(`quantity-${productId}`);
   if (quantityInput) {
      let currentQuantity = parseInt(quantityInput.value);
      if (currentQuantity + amount >= 0) {
         quantityInput.value = currentQuantity + amount;
      }
   }
}

// Manejadores para los botones de cantidad (+ y -)
document.querySelectorAll('.quantity-btn').forEach(button => {
   button.addEventListener('click', function () {
      const productId = button.closest('.modal').getAttribute('id').replace('modal-',
         '');
      const action = button.classList.contains('increase') ? 1 : -1;
      changeQuantity(action, productId); // Cambia la cantidad
   });
});

// Función para mostrar notificaciones usando Toastify
function showToast(message, type) {
   Toastify({
      text: message,
      backgroundColor: type === 'success' ? 'green' : 'red',
      duration: 3000,
      close: true
   }).showToast();
}