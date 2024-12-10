document.addEventListener("DOMContentLoaded", function () {
   const lazyBackgrounds = document.querySelectorAll(".lazy-background");

   const onIntersection = (entries, observer) => {
       entries.forEach(entry => {
           if (entry.isIntersecting) {
               const bgElement = entry.target;
               const bgUrl = bgElement.getAttribute("data-bg");
               bgElement.style.backgroundImage = `url('${bgUrl}')`;
               observer.unobserve(bgElement); // Deja de observar después de cargar
           }
       });
   };

   const observer = new IntersectionObserver(onIntersection, {
       rootMargin: "1200px"
   });
   console.log('lazy');

   lazyBackgrounds.forEach(bg => observer.observe(bg));
});

function showFlyer(img) {
    const modal = document.getElementById('flyerModal');
    const flyer = document.getElementById('flyerImage');
    flyer.src = img; // Actualiza la ruta al flyer
    modal.style.display = "block";
}

function closeFlyer() {
    document.getElementById('flyerModal').style.display = "none";
}

document.addEventListener('DOMContentLoaded', function () {
    // Selecciona el input
    var inputElementTel = document.querySelector('#phone');

    // Crea una máscara para el input
    var maskOptionsTel = {
        mask: '0000-0000'
    };

    var mask = IMask(inputElementTel, maskOptionsTel);
});