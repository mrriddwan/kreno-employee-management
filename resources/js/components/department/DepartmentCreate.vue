<template>
    <div>
        <h3 class="text-center">Create Department</h3>

        <GoBack />
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="createDepartment">
                    <div class="form-group">
                        <label>Name</label>
                        <input
                            type="text"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="form.name"
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


                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Create
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
            },
        };
    },
    methods: {
        createDepartment() {
            axios
                .post("/api/departments/store", {
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