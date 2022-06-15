import EmployeeIndex from './components/EmployeeIndex.vue';
import EmployeeCreate from './components/EmployeeCreate.vue';
import EmployeeEdit from './components/EmployeeEdit.vue';
import EmployeeUploadImage from './components/EmployeeUploadImage.vue'
import DepartmentList from './components/department/DepartmentList.vue'
import DepartmentCreate from './components/department/DepartmentCreate.vue'

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
    },
    {
        name: 'DepartmentList',
        path: '/department-list',
        component: DepartmentList
    },
    {
        name: 'DepartmentCreate',
        path: '/department-create',
        component: DepartmentCreate
    },


];

export default createRouter({
    history: createWebHistory(),
    routes
})