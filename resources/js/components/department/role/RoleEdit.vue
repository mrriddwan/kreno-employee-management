<template>
    <div>
        <h3 class="text-center">Edit Role</h3>

        <GoBack />

        <div class="row">
            <div class="col-md-6">


                <form
                    class="space-y-6"
                    v-on:submit.prevent="updateRoles"
                >
                    <div class="space-y-4 rounded-md shadow-sm">

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
import GoBack from '../../utils/GoBack.vue';
export default {
    data() {
        return {
            form: {
                name: "",
                description: "",
            },
        };
    },
    created() {
        this.showRoles();
    },
    methods: {
        showRoles() {
            axios
                .get("/api/roles/show/" + this.$route.params.id)
                .then((res) => {
                this.form = res.data.data;
            })
                .catch((error) => {
                console.log(error);
            });
        },
        updateRoles() {
            axios
                .put("/api/roles/update/" + this.$route.params.id, {
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
