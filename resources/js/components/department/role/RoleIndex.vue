<template>
    <div class="flex flex-row">
        <div class="basis-2/3">
            <div class="p-10">
                <h2 class="text-center border-black rounded-md font-bold text-xl text-black uppercase">Role List</h2>
            </div>


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
                                >Roles</span
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

                    <tr v-for="role in roles" :key="role.id">
                        <td
                            class="px-3 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
                        >
                            {{ role.id }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
                        >
                            {{ role.name }}
                        </td>
     
                        <td 
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
                        >
                            {{ role.departments.name }}
                        </td>
                        

                    

                        <td>
                            <div class="btn-group" role="group">
                                <router-link
                                    :to="{
                                        name: 'RoleEdit',
                                        params: { id: role.id },
                                    }"
                                    class="mr-2 inline-flex items-center px-1 py-1 ml-5 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                    >Edit</router-link
                                >
                                <button
                                    class="inline-flex items-center px-1 py-1 ml-5 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                    @click="deleteRoles(role.id)"
                                >
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>
</template>

<script>


export default {

    data() {
        return {
            roles: [],
        };
    },

    created() {
        this.getRoles();
    },

    methods: {
        getRoles() {
            axios
                .get("/api/roles/index")
                .then((res) => {
                    this.roles = res.data.data;
                    console.log(res.data.data);
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        deleteRoles(id) {
            if (!window.confirm("Are you sure?")) {
                return;
            }
            axios.delete("/api/roles/delete/" + id);
            this.getRoles();
        },
    },
};
</script>
