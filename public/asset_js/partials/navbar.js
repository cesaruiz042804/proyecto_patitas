const openModalDesktopBtn  = document.getElementById('openModal-desktop');
const closeModalBtn = document.getElementById('closeModal');
const openModalMovilBtn = document.getElementById('openModal-movil');
const closeModalMovilBtn = document.getElementById('openModal');
const modalOverlay = document.getElementById('modalOverlay');


// Abrir modal desde escritorio
if (openModalDesktopBtn) {
   openModalDesktopBtn.addEventListener('click', () => {
       console.log('OpenModal Desktop');
       modalOverlay.classList.add('active');
   });
}

// Cerrar modal
if (closeModalBtn) {
   closeModalBtn.addEventListener('click', () => {
       modalOverlay.classList.remove('active');
   });
}

if (closeModalMovilBtn) {
   closeModalMovilBtn.addEventListener('click', () => {
       modalOverlay.classList.remove('active');
   });
}
// Cerrar modal al hacer clic fuera de él
modalOverlay.addEventListener('click', (e) => {
   if (e.target === modalOverlay) {
      console.log('RemoveModal');
      modalOverlay.classList.remove('active');
   }
});

// modal movil

if(openModalMovilBtn){
   openModalMovilBtn.addEventListener('click', () => {
      modalOverlay.classList.add('active');
   });
}
