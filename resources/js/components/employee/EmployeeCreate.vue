<template>
    <div>
        <h3 class="text-center">Create Employee</h3>
        <GoBack />
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
                            type="email"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="form.email"
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
                address: "",
                email: "",
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
    components: { GoBack }
};
</script>
