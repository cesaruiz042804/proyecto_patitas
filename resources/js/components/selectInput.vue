<template>
    <div class="form-control-input">
        <!-- Select de especie -->
        <select v-model="selectedSpecies" name="species" id="species">
            <option value="">Selecciona una especie</option>
            <option value="perro">Perro</option>
            <option value="gato">Gato</option>
        </select>
    </div>

    <div class="form-control-input">
        <!-- Select de raza -->
        <select v-model="selectedBreed" name="breed" id="breed">
            <option value="">Selecciona una raza</option>
            <optgroup v-if="availableBreeds.length">
                <option v-for="(breed, index) in availableBreeds" :key="index" :value="breed.value">
                    {{ breed.label }}
                </option>
            </optgroup>
        </select>
    </div>

    <div class="form-control-input">
        <!-- Select de color -->
        <select v-model="selectedColor" name="color" id="color">
            <option value="">Selecciona el color de pelaje</option>
            <optgroup>
                <option v-for="(color, index) in colors" :key="index" :value="color.value">
                    {{ color.label }}
                </option>
            </optgroup>
        </select>
    </div>
</template>

<script setup>
import { ref, computed, watch } from 'vue';

// Datos predefinidos de razas por especie
const breedsData = {
    perro: [
        { value: 'labrador', label: 'Labrador' },
        { value: 'bulldog', label: 'Bulldog' },
        { value: 'poodle', label: 'Poodle' },
        { value: 'beagle', label: 'Beagle' },
        { value: 'golden_retriever', label: 'Golden Retriever' },
        { value: 'chihuahua', label: 'Chihuahua' },
        { value: 'dachshund', label: 'Dachshund' },
        { value: 'rottweiler', label: 'Rottweiler' },
        { value: 'shih_tzu', label: 'Shih Tzu' },
        { value: 'yorkshire_terrier', label: 'Yorkshire Terrier' },
        { value: 'boxer', label: 'Boxer' },
        { value: 'schnauzer', label: 'Schnauzer' },
        { value: 'german_shepherd', label: 'Pastor Alemán' },
        { value: 'pitbull', label: 'Pitbull' },
        { value: 'jack_russell', label: 'Jack Russell Terrier' },
        { value: 'french_bulldog', label: 'Bulldog Francés' },
        { value: 'cocker_spaniel', label: 'Cocker Spaniel' },
        { value: 'basset_hound', label: 'Basset Hound' },
        { value: 'pug', label: 'Pug' },
        { value: 'maltese', label: 'Maltés' },
        { value: 'doberman', label: 'Doberman' },
        { value: 'otro', label: 'Otro' },
    ],
    gato: [
        { value: 'angora', label: 'Angora' },
        { value: 'ragdoll', label: 'Ragdoll' },
        { value: 'sphynx', label: 'Sphynx' },
        { value: 'british_shorthair', label: 'British Shorthair' },
        { value: 'himalayo', label: 'Himalayo' },
        { value: 'exotico', label: 'Exótico de Pelo Corto' },
        { value: 'siames', label: 'Siamés' },
        { value: 'maine_coon', label: 'Maine Coon' },
        { value: 'bombay', label: 'Bombay' },
        { value: 'persa', label: 'Persa' },
        { value: 'american_shorthair', label: 'American Shorthair' },
        { value: 'birmano', label: 'Birmano' },
        { value: 'abisinio', label: 'Abisinio' },
        { value: 'scottish_fold', label: 'Scottish Fold' },
        { value: 'snowshoe', label: 'Snowshoe' },
        { value: 'munchkin', label: 'Munchkin' },
        { value: 'otro', label: 'Otro' },
    ],
};

// Datos predefinidos de colores
const colors = [
    { value: 'blanco', label: 'Blanco' },
    { value: 'negro', label: 'Negro' },
    { value: 'marron', label: 'Marrón' },
    { value: 'gris', label: 'Gris' },
    { value: 'naranja', label: 'Naranja' },
    { value: 'atigrado', label: 'Atigrado' },
    { value: 'bicolor', label: 'Bicolor' },
    { value: 'tricolor', label: 'Tricolor' },
    { value: 'crema', label: 'Crema' },
    { value: 'champagne', label: 'Champagne' },
    { value: 'otro', label: 'Otro' },
];

// Estado para la especie seleccionada
const selectedSpecies = ref('');

// Estado para la raza seleccionada
const selectedBreed = ref('');

// Estado para el color seleccionado
const selectedColor = ref('');

// Computed para obtener las razas disponibles según la especie
const availableBreeds = computed(() => {
    return selectedSpecies.value ? breedsData[selectedSpecies.value] : [];
});

// Resto de la lógica: resetear raza al cambiar especie
watch(selectedSpecies, () => {
    selectedBreed.value = ''; // Restablecer la raza cuando cambie la especie
});

</script>

<style scoped>

</style>
