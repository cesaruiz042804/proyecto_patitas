const signUpButton = document.querySelector('.signUp');
const signInButton = document.querySelector('.signIn');
const form1 = document.querySelector('.sign-in-container');
const form2 = document.querySelector('.sign-up-container');
const btnRegister = document.querySelector('.btn-register');

signUpButton.addEventListener('click', () => {
    signUpButton.style.background = "#35ad35";
    signInButton.style.background = "#403192";
    form2.style.display = "block";
    form1.style.display = "none";
    form1.classList.add("form-active");

    form2.classList.remove('form-active'); // Remueve la clase
    setTimeout(() => {
        form2.classList.add('form-active'); // Luego vuelve a agregar la clase
    }, 50);
});

signInButton.addEventListener('click', () => {
    signUpButton.style.background = "#403192";
    signInButton.style.background = "#35ad35";
    form1.style.display = "block";
    form2.style.display = "none";
    //form1.classList.add("form-active");

    form1.classList.remove('form-active'); // Remueve la clase
    setTimeout(() => {
        form1.classList.add('form-active'); // Luego vuelve a agregar la clase
    }, 50);
});

document.addEventListener('DOMContentLoaded', function () {
    // Selecciona el input
    var inputElementTel = document.querySelector('.inputTel');
    var inputElementCedula = document.querySelector('.inputCedula');

    // Crea una máscara para el input
    var maskOptionsTel = {
        mask: '0000-0000'
    };

    var maskOptionsCedula = {
        mask: '00-0000-0000'
    };

    var mask = IMask(inputElementTel, maskOptionsTel);
    var mask = IMask(inputElementCedula, maskOptionsCedula);
});

