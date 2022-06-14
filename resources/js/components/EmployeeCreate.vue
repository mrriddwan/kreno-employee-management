<template>
    <div>
        <h3 class="text-center">Create Employee</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addEmployee">
                    <div class="form-group">
                        <label>Name</label>
                        <input
                            type="text"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="form.name"
                        />
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input
                            type="text"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="form.address"
                        />
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input
                            type="text"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="form.email"
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
                address: '',
                email: '',
            },
        };
    },
    methods: {
        addEmployee() {
            axios
                .post("/api/employees/store", {
                    name: this.form.name,
                    address: this.form.address,
                    email: this.form.email
                })
                .then((res) => {
                    this.$router.push({ name: "index" });
                });
        },
    },
};
</script>
