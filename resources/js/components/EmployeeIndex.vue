<template>
    <div class="flex flex-row">
        <div class="basis-2/3">
            <div class="p-10">
                <h2 class="text-left">Employee List</h2>
            </div>
            

            <router-link
                to="/create"
                class="inline-flex items-center px-4 py-2 m-5 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
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
                    <tr v-for="employee in employees" :key="employee.id">
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
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
                        >
                            Department
                        </td>
                        <td
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
                        >
                            Roles
                        </td>
                        <!-- <td>
                    <div class="btn-group" role="group">
                        <router-link
                            :to="{ name: 'edit', params: { id: employee.id } }"
                            class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                            >Edit</router-link
                        >
                        <button
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                            @click="deleteEmployee(employee.id)"
                        >
                            Delete
                        </button>
                    </div>
                </td> -->
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="basis-1/3">
            <DepartmentList />
        </div>
    </div>
</template>

<script>
import DepartmentList from "./department/DepartmentList";

export default {
    components: {
        DepartmentList,
    },

    data() {
        return {
            employees: [],
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
