<template>
    <h3 class="text-center">Edit Employee</h3>
    <GoBack />
    <form @submit.prevent="profileUpload" enctype="multipart/form-data">
        <div class="custom-file">
            <input
                type="file"
                @change="imageSelected"
                class="custom-file-input"
                id="customFile"
            />

        </div>
        <div v-if="photoPreview" class="mt-3">
            <img
                :src="photoPreview"
                class="figure-img img-fluid rounded"
                style="max-height: 100px"
            />
        </div>
        <button class="btn btn-success mt-5" type="submit">
            Upload profile
        </button>
    </form>
</template>

<script>
import GoBack from '../utils/GoBack.vue';
export default {
    data() {
        return {
            photo: "",
            photoPreview: null,
        };
    },
    methods: {
        imageSelected(e) {
            this.photo = e.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(this.photo);
            reader.onload = (e) => {
                this.photoPreview = e.target.result;
            };
        },
        profileUpload() {
            const config = {
                headers: {
                    "content-type": "multipart/form-data"
                }
            };
            let data = new FormData();
            data.append("employee_photo", this.photo);
            axios
                .post("/api/employees/upload-photo/" + this.$route.params.id, data, config)
                .then((res) => {
                this.success = res.data.success;
                this.$router.push({ name: "edit" });
            })
                .catch((err) => {
                this.output = err;
            });
        },
    },
    components: { GoBack }
};
</script>
