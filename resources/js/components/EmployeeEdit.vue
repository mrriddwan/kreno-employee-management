<template>
    <div>
        <h3 class="text-center">Edit Employee</h3>
        <div class="row">
            <div class="col-md-6">
                <router-link
                    :to="{ name: 'EmployeeUploadImage' }"
                    class="inline-flex items-center px-2 py-2 mt-4 mb-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                    >Edit</router-link
                >
                <!-- <img
                    v-if="employee_photo"
                    class="w-20 h-20 rounded-full shadow-lg"
                    @change="imageSelected"
                    :src="employee_photo"
                    alt="Bonnie image"
                />

                <img
                    v-else
                    class="w-20 h-20 rounded-full shadow-lg"
                    src="https://freesvg.org/img/abstract-user-flat-4.png"
                    alt="Bonnie image"
                /> -->

                <form
                    class="space-y-6"
                    v-on:submit.prevent="updateEmployee"
                    enctype="multipart/form-data"
                >
                    <div class="space-y-4 rounded-md shadow-sm">
                        <img
                            v-if="form.employee_photo"
                            class="w-20 h-20 rounded-full shadow-lg"
                            :src="require('/laragon/www/kreno-employee-management/storage/app/public/employee/'+ this.form.employee_photo)"
                            alt="Bonnie image"
                        />

                        <img
                            v-else
                            class="w-20 h-20 rounded-full shadow-lg"
                            src="https://freesvg.org/img/abstract-user-flat-4.png"
                            alt="Bonnie image"
                        />

                        <div>
                            <label
                                for="name"
                                class="block text-sm font-medium text-gray-700"
                                >Name
                            </label>

                            <div class="mt-1">
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    v-model="form.name"
                                />
                            </div>
                        </div>

                        <div>
                            <label
                                for="address"
                                class="block text-sm font-medium text-gray-700"
                                >Address
                            </label>

                            <div class="mt-1">
                                <input
                                    type="text"
                                    name="address"
                                    id="address"
                                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    v-model="form.address"
                                />
                            </div>
                        </div>

                        <div>
                            <label
                                for="email"
                                class="block text-sm font-medium text-gray-700"
                                >Email
                            </label>
                            <div class="mt-1">
                                <input
                                    type="text"
                                    name="email"
                                    id="email"
                                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    v-model="form.email"
                                />
                            </div>
                        </div>

                        <label
                            for="department"
                            class="block text-sm font-medium text-gray-700"
                            >Department
                        </label>
                        <select
                            v-model="form.department_id"
                            @change="getDepartments"
                        >
                            <option disabled value="">Please select one</option>
                            <option
                                v-for="department in departments"
                                :key="department.id"
                                :value="department.id"
                            >
                                {{ department.name }}
                            </option>
                        </select>

                        <label
                            for="roles"
                            class="block text-sm font-medium text-gray-700"
                            >Roles
                        </label>
                        <select
                            v-model="form.department_role_id"
                            @change="getRoles"
                        >
                            <option disabled value="">Please select one</option>
                            <option
                                v-for="role in roles"
                                :key="role.id"
                                :value="role.id"
                            >
                                {{ role.name }}
                            </option>
                        </select>
                    </div>

                    <button
                        type="submit"
                        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25"
                    >
                        Save
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
                name: "",
                address: "",
                email: "",
                department_id: "",
                department_role_id: "",
                employee_photo: "",
                photoPreview: null,
            },

            roles: [],
            departments: [],
        };
    },
    created() {
        this.showEmployee();
        this.getDepartments();
        this.getRoles();
        this.getEmployeePhoto();
    },
    methods: {
        imageSelected(e) {
            this.form.employee_photo = e.target.files[0];

            let reader = new FileReader();
            reader.readAsDataURL(this.form.employee_photo);
            reader.onload = (e) => {
                this.form.photoPreview = e.target.result;
            };
        },

        getEmployeePhoto(){

            return "employee/" + this.form.employee_photo;
        },
        // imageSelected(e) {
        //     this.photo = e.target.files[0];

        //     let reader = new FileReader();
        //     reader.readAsDataURL(this.photo);
        //     reader.onload = (e) => {
        //         this.photoPreview = e.target.result;
        //     };
        // },

        showEmployee() {
            axios
                .get("/api/employees/show/" + this.$route.params.id)
                .then((res) => {
                    this.form = res.data.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        updateEmployee() {
            axios
                .put("/api/employees/update/" + this.$route.params.id, {
                    name: this.form.name,
                    address: this.form.address,
                    email: this.form.email,
                    employee_photo: this.form.employee_photo,
                    department_id: this.form.department_id,
                    department_role_id: this.form.department_role_id,
                })
                .then((res) => {
                    this.$router.push({ name: "index" });
                });
        },

        getDepartments() {
            axios
                .get("/api/departments/list")
                .then((res) => {
                    this.departments = res.data.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        getRoles() {
            axios
                .get("/api/roles/list")
                .then((res) => {
                    this.roles = res.data.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
