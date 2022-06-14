import EmployeeIndex from './components/EmployeeIndex.vue';
import EmployeeCreate from './components/EmployeeCreate.vue';
import EmployeeEdit from './components/EmployeeEdit.vue';
import EmployeeUploadImage from './components/EmployeeUploadImage.vue'

import { createRouter, createWebHistory } from 'vue-router';
 
const routes = [
    {
        name: 'index',
        path: '/dashboard',
        component: EmployeeIndex
    },
    {
        name: 'create',
        path: '/create',
        component: EmployeeCreate
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EmployeeEdit
    },
    {
        name: 'uploadEmployeeImage',
        path: '/edit/:id/upload-employee-image',
        component: EmployeeUploadImage
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})