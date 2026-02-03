import './bootstrap';
import { createApp } from 'vue';
import router from './router'; // Importamos el router
import App from './App.vue';    // Componente principal

const app = createApp(App);
app.use(router);
app.mount('#app');