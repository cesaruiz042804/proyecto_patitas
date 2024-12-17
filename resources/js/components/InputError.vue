<script setup>
import { ref } from 'vue';

// Props para recibir placeholder, name, type y modelValue
defineProps({
    placeholder: {
        type: String,
        default: 'Escribe algo...', // Placeholder predeterminado
    },
    name: {
        type: String,
        default: '', // Atributo name predeterminado
    },
    type: {
        type: String,
        default: 'text', // Tipo de input predeterminado
    },
    modelValue: {
        type: String,
        default: '', // Valor inicial del input
    },
});

// Emitir cambios
const emit = defineEmits(['update:modelValue']);

// Validación
const isInvalid = ref(false);

// Función para manejar cambios en el input
const handleChange = (event) => {
    const newValue = event.target.value;
    emit('update:modelValue', newValue); // Emitir valor al padre
    isInvalid.value = newValue.trim() === ''; // Validación: si está vacío, es inválido
};
</script>

<template>
    <!-- Input dinámico -->
    <div class="form-control-input">
        <input :value="modelValue" :type="type" :name="name" :placeholder="placeholder" class="form-control"
            :class="{ 'is-invalid': isInvalid }" @input="handleChange" />

        <!-- Mensaje de error debajo del input -->
        <p v-if="isInvalid" class="text-danger">
            El campo no puede estar vacío.
        </p>
    </div>
</template>

<style scoped>

/* Estilo para los inputs inválidos */
.is-invalid {
    border: 1px solid red;
    background-color: #f8d7da;
    color: #721c24;
}

/* Estilo para el texto de error */
.text-danger {
    color: red;
    font-size: 16px;
}
</style>
