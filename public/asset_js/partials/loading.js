function pageLoading(classForm){
   var loading = document.querySelector('#page-loading');
   var form = document.querySelector(classForm);

   form.style.display = 'none';
   loading.style.display = 'block';
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 51923894247a93a57e2907aaff37b1b93760fe7d

   if (document.querySelector('.hamburger-menu')) {
      console.log('La clase .hamburger-menu existe en el DOM');
      const navbar = document.querySelector('.hamburger-menu');
      navbar.style.display = 'none';
  } else {
      console.log('La clase no existe en el DOM');
  }

  if (document.querySelector('.foot')) {
    console.log('La clase .hamburger-menu existe en el DOM');
    const foot = document.querySelector('.foot');
    foot.style.display = 'none';
} else {
    console.log('La clase no existe en el DOM');
}
  
<<<<<<< HEAD
=======
=======
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
>>>>>>> 51923894247a93a57e2907aaff37b1b93760fe7d
}