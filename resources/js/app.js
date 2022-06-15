import Alpine from 'alpinejs';
import { createApp } from 'vue';
import EmployeeIndex from './components/EmployeeIndex.vue';
import routes from './routes';
import DepartmentList from './components/department/DepartmentList.vue';

require('./bootstrap');
Alpine.start();
window.Alpine = Alpine;
window.Vue = require('vue');

createApp({
    components: {
        EmployeeIndex,
        DepartmentList
    }
}).use(routes).mount('#app')

