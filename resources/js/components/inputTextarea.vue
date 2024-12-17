<template>
    <div class="form-control-input">
        <label for="textarea">{{ label }}</label>
        <textarea v-model="inputValue" :id="id" :name="name" :placeholder="placeholder" :rows="rows" :cols="cols"
        class="form-control"
        :class="{ 'is-invalid': isInvalid }" @input="handleChange"></textarea>
        <p v-if="isInvalid" class="text-danger">
            El campo no puede estar vacío.
        </p>
    </div>
</template>

<script setup>
import { ref } from 'vue';

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

// Propiedades que puede recibir el componente
const props = defineProps({
    label: {
        type: String,
        required: true
    },
    id: {
        type: String,
        required: true
    },
    name: {
        type: String,
        required: true
    },
    placeholder: {
        type: String,
        default: ''
    },
    rows: {
        type: Number,
        default: 4
    },
    cols: {
        type: Number,
        default: 50
    },
    value: {
        type: String,
        default: ''
    }
});

// Estado local para el valor del textarea
const inputValue = ref(props.value);

// Emitir el valor cuando se haga un cambio
const handleInput = () => {
    emit('update:value', inputValue.value);
};
</script>

<style scoped>
.form-control-input {
    width: 100%;
}

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
