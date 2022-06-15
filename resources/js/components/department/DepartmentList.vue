<template>
    <h2 class="text-left">Department List</h2>

    <router-link to="/create" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
        >Create Department</router-link
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
                <!-- <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                        >Department</span
                    >
                </th> -->

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

                <!-- <td
                    class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
                >
                    Department
                </td> -->

                <td>

                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    data() {
        return {
            department: [],
        };
    },

    created() {
        this.getDepartment();
    },

    methods: {
        getDepartment() {
            axios
                .get("/api/departments/list")
                .then((res) => {
                    this.department = res.data.data;
                    console.log(res.data.data);
                })
                .catch((error) => {
                    console.log(error);
                });
        },

    },
};