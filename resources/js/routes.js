import EmployeeIndex from './components/EmployeeIndex.vue';
import EmployeeCreate from './components/EmployeeCreate.vue';
import EmployeeEdit from './components/EmployeeEdit.vue';
import EmployeeUploadImage from './components/EmployeeUploadImage.vue';

import DepartmentList from './components/department/DepartmentList.vue';
import DepartmentCreate from './components/department/DepartmentCreate.vue';
import DepartmentEdit from './components/department/DepartmentEdit.vue';
import DepartmentUploadImage from './components/department/DepartmentUploadImage.vue';


import RoleCreate from './components/department/role/RoleCreate.vue';


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
        name: 'EmployeeUploadImage',
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
    {
        name: 'RoleCreate',
        path: '/role-create',
        component: RoleCreate
    },
    {
        name: 'department-edit',
        path: '/edit/department/:id',
        component: DepartmentEdit
    },
    {
        name: 'DepartmentUploadImage',
        path: '/edit/:id/upload-dept-image',
        component: DepartmentUploadImage
    },


];

export default createRouter({
    history: createWebHistory(),
    routes
})