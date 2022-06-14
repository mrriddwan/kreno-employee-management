import Alpine from 'alpinejs';
import { createApp } from 'vue';
import EmployeeIndex from './components/EmployeeIndex.vue';
import routes from './routes';

require('./bootstrap');
Alpine.start();
window.Alpine = Alpine;
window.Vue = require('vue');

createApp({
    components: {
        EmployeeIndex
    }
}).use(routes).mount('#app')

