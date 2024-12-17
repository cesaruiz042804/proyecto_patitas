<script setup>
import { ref } from 'vue';
//import InputLabel from '@/components/InputLabel.vue';
//import Message from '@/components/Message.vue'; // Asegúrate de que la ruta sea correcta
import InputError from '@/components/InputError.vue'; // Asegúrate de que la ruta sea correcta
import SelectSpeciesBreed from '@/components/selectInput.vue';
import Textarea from '@/components/inputTextarea.vue';  // Asegúrate de importar el componente

// Definir los valores para cada input
const nameValue = ref('');
const weightValue = ref('');
const oldValue = ref('');
const species = ref('');
const breed = ref('');
const descriptionText = ref('');

// Definir el valor para los componentes
//const labelValue = ref('Este es el valor del label');
//const message = ref('Este es un mensaje de error');
</script>

<template>
    <div class="form-input">
        <InputError v-model="nameValue" type="text" placeholder="Nombre de la mascota" name="petName" />

        <InputError v-model="weightValue" type="number" placeholder="Peso (libras)" name="weight" />

        <InputError v-model="oldValue" type="number" placeholder="Edad" name="old" />

        <SelectSpeciesBreed v-model:species="species" v-model:breed="breed" />

        <Textarea label="Motivo y asignación de la consulta" id="consultation" name="consultation" placeholder="Escribe algo aquí..."
            v-model="descriptionText" />
    </div>

</template>

<style scoped></style>
