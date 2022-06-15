<template>
    <div>
        <h3 class="text-center">Create Department</h3>
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


                    <button type="submit" class="btn btn-primary">
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
                name: '',
                description: '',
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
};
</script>