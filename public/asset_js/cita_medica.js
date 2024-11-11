document.getElementById('species').addEventListener('change', function () {
    const species = this.value;
    const dogBreeds = document.querySelector('.dog-breeds');
    const catBreeds = document.querySelector('.cat-breeds');

    // Oculta o muestra las opciones de acuerdo a la especie seleccionada
    if (species === 'perro') {
        dogBreeds.style.display = 'block';
        catBreeds.style.display = 'none';
    } else if (species === 'gato') {
        dogBreeds.style.display = 'none';
        catBreeds.style.display = 'block';
    } else {
        // Muestra ambas si no se ha seleccionado ninguna especie
        dogBreeds.style.display = 'none';
        catBreeds.style.display = 'none';
    }
});

// Opciones iniciales ocultas hasta seleccionar la especie
document.querySelector('.cat-breeds').style.display = 'none';
document.querySelector('.dog-breeds').style.display = 'none';