import Alpine from 'alpinejs';
import { createApp } from 'vue';
import EmployeeIndex from './components/employee/EmployeeIndex.vue';
import routes from './routes';
import DepartmentList from './components/department/DepartmentList.vue';
import RoleIndex from './components/department/role/RoleIndex.vue';

require('./bootstrap');
Alpine.start();
window.Alpine = Alpine;
window.Vue = require('vue');

createApp({
    components: {
        EmployeeIndex,
        DepartmentList,
        RoleIndex,
    }
}).use(routes).mount('#app')

