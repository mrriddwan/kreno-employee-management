<template>
    <div>
        <h3 class="text-center">Create Roles</h3>

        <GoBack />

        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="createRole">
                
                    <label
                        for="department"
                        class="block text-sm font-medium text-gray-700"
                        >Department
                    </label>
                    <select v-model="form.department" @change="getDepartments">
                        <option disabled value="">Please select one</option>
                        <option
                            v-for="department in departments"
                            :key="department.id"
                            :value="department.id"
                        >
                            {{ department.name }}
                        </option>
                    </select>

                    <div class="form-group">
                        <label>Name</label>
                        <input
                            type="text"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="form.role"
                        />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input
                            type="text"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="form.description"
                        />
                    </div>

                    <button
                        type="submit"
                        class="flex mt-10 items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                    >
                        Create
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                department_id: "",
                role: "",
                description: "",
            },
            departments: [],
        };
    },

    created() {
        this.getDepartments();
    },

    methods: {
        createRole() {
            axios
                .post("/api/roles/store", {
                    department_id: this.form.department,
                    role: this.form.role,
                    description: this.form.description,
                })
                .then((res) => {
                    this.$router.push({ name: "index" });
                });
        },

        getDepartments() {
            axios
                .get("/api/departments/index")
                .then((res) => {
                    this.departments = res.data.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
