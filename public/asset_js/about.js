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
