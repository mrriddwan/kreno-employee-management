<!-- <template>
    <form @submit.prevent="uploadImageEmployee">
        <div class="mb-6">
            <label
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                for="user_avatar"
                >Upload photo</label
            >
            <input
                @change="imageSelected"
                class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="user_avatar_help"
                id="user_avatar"
                type="file"
            />

            <button
                type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
                Update employee
            </button>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            name: "",
            file: "",
            success: "",
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
        uploadImageEmployee() {
            let existingObj = this;
            const config = {
                headers: {
                    "content-type": "multipart/form-data",
                },
            };
            let data = new FormData();
            data.append("file", this.file);
            axios
                .post("/uploadEmployeeImage", data, config)
                .then(function (res) {
                    existingObj.success = res.data.success;
                })
                .catch(function (err) {
                    existingObj.output = err;
                });
        },
    },
};
</script> -->

<template>
        <form @submit.prevent="profileUpload" method="POST" enctype="multipart/form-data">
            <div class="custom-file">
                <input type="file" @change="imageSelected" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose an image</label>
            </div>
            <div v-if="photoPreview" class="mt-3">
                <img :src="photoPreview" class="figure-img img-fluid rounded"  style="max-height:100px;">
            </div>
            <button class="btn btn-success mt-5" type="submit">Upload profile</button>
        </form>
</template>
<script>
export default {
    data(){
        return{
            photo: null,
            photoPreview: null,
        }
    },

    methods:{
        imageSelected(e){
            this.photo = e.target.files[0];

            let reader = new FileReader();
            reader.readAsDataURL(this.photo);
            reader.onload = e => {
            this.photoPreview = e.target.result;
               };
        },

        profileUpload(){
            let data = new FormData;
            data.append('photo', this.photo);
            axios
                // .put('/api/employees/upload-photo/', data)
                // .then(()=>{
                //     window.location = '../profile';
                // }).catch(()=>{            })
                .put('/api/employees/upload-photo/' + this.$route.params.id, {
                    photo: this.photo,
                })
        }
    }
}
</script>
