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
       rootMargin: "50px"
   });
   console.log('lazy');

   lazyBackgrounds.forEach(bg => observer.observe(bg));
});
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 51923894247a93a57e2907aaff37b1b93760fe7d


function showFlyer(img) {
    const modal = document.getElementById('flyerModal');
    const flyer = document.getElementById('flyerImage');
    flyer.src = img; // Actualiza la ruta al flyer
    modal.style.display = "block";
}

function closeFlyer() {
    document.getElementById('flyerModal').style.display = "none";
}
<<<<<<< HEAD
=======
=======
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
>>>>>>> 51923894247a93a57e2907aaff37b1b93760fe7d
