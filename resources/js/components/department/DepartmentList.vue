<template>
    <h2 class=" text-center border-black rounded-md font-bold text-xl text-black uppercase">Department List</h2>
    <router-link
        to="department-create"
        class="mr-2 inline-flex m-10 items-center px-1 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
        >Create Dept</router-link
    >

    <router-link
        to="/role-create"
        class="inline-flex items-center px-1 py-1 ml-5 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
        >Create Roles</router-link
    >

    <table class="table">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                        >ID</span
                    >
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                        >Department</span
                    >
                </th>
            </tr>
        </thead>

        <tbody>
            <tr v-for="department in departments" :key="department.id">
                <td
                    class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
                >
                    {{ department.id }}
                </td>
                <td
                    class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
                >
                    {{ department.name }}
                </td>

                <td>
                    <div class="btn-group" role="group">
                        <router-link
                            :to="{
                                name: 'department-edit',
                                params: { id: department.id },
                            }"
                            class="mr-2 inline-flex items-center px-1 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                            >Edit</router-link
                        >
                        <button
                            class="inline-flex items-center px-1 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                            @click="deleteDepartment(department.id)"
                        >
                            Delete
                        </button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    data() {
        return {
            departments: [],
        };
    },

    created() {
        this.getDepartment();
    },

    methods: {
        getDepartment() {
            axios
                .get("/api/departments/index")
                .then((res) => {
                    this.departments = res.data.data;
                    console.log(res.data.data);
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        deleteDepartment(id) {
            if (!window.confirm("Are you sure?")) {
                return;
            }
            axios.delete("/api/departments/delete/" + id);
            this.getDepartment();
        },
    },
};
</script>

<style>


</style>