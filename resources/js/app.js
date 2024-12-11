import './bootstrap';

import { createApp } from 'vue'; // Importa Vue
import ExampleComponent from './components/ExampleComponent.vue'; // Ajusta la ruta si cambias el nombre o ubicación

const app = createApp({}); // Crea la instancia de Vue

// Registra el componente
app.component('example-component', ExampleComponent);

app.mount('#app'); // Monta Vue en el div con id "app"
