<template>
    <div>
        <h3 class="text-center">Edit Department</h3>
        <GoBack />
        <div class="row">
            <div class="col-md-6">
                <router-link
                    :to="{ name: 'DepartmentUploadImage' }"
                    class="inline-flex items-center px-2 py-2 mt-4 mb-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                    >Edit</router-link
                >

                <form
                    class="space-y-6"
                    v-on:submit.prevent="updateDepartment"
                    enctype="multipart/form-data"
                >
                    <div class="space-y-4 rounded-md shadow-sm">
                        <!-- :src="`../storage/employee/` + this.form.employee_photo" -->
                        <img
                            v-if="form.dept_photo"
                            class="w-20 h-20 rounded-full shadow-lg"
                            :src="`/storage/department/`+ this.form.dept_photo"
                            alt="Department Photo"
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
                                for="email"
                                class="block text-sm font-medium text-gray-700"
                                >Description
                            </label>
                            <div class="mt-1">
                                <input
                                    type="text"
                                    name="email"
                                    id="email"
                                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    v-model="form.description"
                                />
                            </div>
                        </div>

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
import GoBack from '../utils/GoBack.vue';
export default {
    data() {
        return {
            form: {
                name: "",
                description: "",
                dept_photo: ""
            },
        };
    },
    created() {
        this.showDepartment();
    },
    methods: {
        showDepartment() {
            axios
                .get("/api/departments/show/" + this.$route.params.id)
                .then((res) => {
                this.form = res.data.data;
            })
                .catch((error) => {
                console.log(error);
            });
        },
        updateDepartment() {
            axios
                .put("/api/departments/update/" + this.$route.params.id, {
                name: this.form.name,
                description: this.form.description,
            })
                .then((res) => {
                this.$router.push({ name: "index" });
            });
        },
    },
    components: { GoBack }
};
</script>
