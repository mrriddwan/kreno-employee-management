import Alpine from 'alpinejs';
import { createApp } from 'vue';
import EmployeeIndex from './components/employee/EmployeeIndex.vue';
import routes from './routes';
import DepartmentList from './components/department/DepartmentList.vue';
import RoleIndex from './components/department/role/RoleIndex.vue';
import LaravelVuePagination from 'laravel-vue-pagination';
import { Select2 } from "select2-vue-component";



require('./bootstrap');
Alpine.start();
window.Alpine = Alpine;
window.Vue = require('vue');

const app = createApp({})

app.component('employee-index', EmployeeIndex)
app.component('departmnet-list', DepartmentList)
app.component('role-index', RoleIndex)
app.component('Pagination', LaravelVuePagination)
app.component('select2', Select2)
app.use(routes)
app.mount('#app')



