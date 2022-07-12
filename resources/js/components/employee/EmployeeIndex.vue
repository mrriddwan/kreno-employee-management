<template>
    <div class="flex flex-row">
        <div class="basis-1/2">
            <div
                class="text-center border-black rounded-md font-bold text-xl text-black uppercase"
            >
                <h2 class="text-center">Employee List</h2>
            </div>

            <router-link
                to="/create"
                class="inline-flex items-center px-1 py-1 m-5 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                >Create Employee</router-link
            >

            <table class="table">
                <thead>
                    <tr>
                        <th class="px-3 py-3 bg-gray-50">
                            <span
                                class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                                >ID</span
                            >
                        </th>
                        <th class="px-6 py-3 bg-gray-50">
                            <span
                                class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                                >Name</span
                            >
                        </th>
                        <th class="px-6 py-3 bg-gray-50">
                            <span
                                class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                                >Department</span
                            >
                        </th>
                        <th class="px-6 py-3 bg-gray-50">
                            <span
                                class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                                >Roles</span
                            >
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="employee in employees" :key="employee.id" class="align-content-center;
">
                        <td
                            class="px-3 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
                        >
                            {{ employee.id }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
                        >
                            {{ employee.name }}
                        </td>

                        <td
                            v-if="employee.department_id === null"
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
                        >
                            <span id="no-department-bubble">
                                No department
                            </span>
                        </td>
                        <td
                            v-else
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
                        >
                            <span id="department-bubble">
                                {{ employee.department.name }}
                            </span>

                        </td>

                        <td
                            v-if="employee.roles.length === 0"
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
                        >
                            <span id="no-role-bubble">
                                No role(s)
                            </span>
                        </td>
                        <td
                            v-else
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
                        >

                            <span v-for="role in employee.roles" :key="role.id" id="role-bubble">
                                {{role.name}}
                            </span>
                        </td>

                        <td>
                            <div class="btn-group" role="group">
                                <router-link
                                    :to="{
                                        name: 'edit',
                                        params: { id: employee.id },
                                    }"
                                    class="mr-2 mb-2 inline-flex items-center px-1 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                    >Edit</router-link
                                >
                                <button
                                    class="mr-2 mb-2 inline-flex items-center px-1 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                    @click="deleteEmployee(employee.id)"
                                >
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="basis-1/2">
            <DepartmentList />
            <RoleIndex />
        </div>

        <!-- <div class="basis-1/2">
            <RoleIndex />
        </div> -->
    </div>
</template>

<script>
import DepartmentList from "../department/DepartmentList.vue";
import RoleIndex from "../department/role/RoleIndex.vue";

export default {
    components: {
        DepartmentList,
        RoleIndex,
    },

    data() {
        return {
            employees: [],
            departments: [],
        };
    },

    created() {
        this.getEmployees();
    },

    methods: {
        getEmployees() {
            axios
                .get("/api/employees/index")
                .then((res) => {
                    this.employees = res.data.data;
                    console.log(res.data.data);
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        deleteEmployee(id) {
            if (!window.confirm("Are you sure?")) {
                return;
            }
            axios.delete("/api/employees/delete/" + id);
            this.getEmployees();
        },
    },
};
</script>

<style scoped>
#role-bubble {
    border-radius: 6px;
    background-color: rgb(45 212 191);
    border-color: rgb(45 212 191);
    border-width: 6px;
    margin: 3px;

}

#no-role-bubble {
    border-radius: 6px;
    background-color: rgb(253 230 138);
    border-color: rgb(253 230 138);
    border-width: 6px;
    margin: 3px;
    
}

#department-bubble {
    border-radius: 6px;
    background-color: rgb(103 232 249);
    border-color: rgb(103 232 249);
    border-width: 6px;
    margin: 3px;
}

#no-department-bubble {
    border-radius: 6px;
    background-color: rgb(253 230 138);
    border-color: rgb(253 230 138);
    border-width: 6px;
    margin: 3px;
    
}
</style>
