<template>
    <span class="go-back">
        <button @click="goBack" class="inline-flex items-center px-2 py-2 mt-4 mb-4 rounded-md font-semibold text-xs text-white uppercase">
            Previous
        </button>
    </span>
</template>

<script>
export default {
    methods: {
        goBack() {
            return this.$router.go(-1)
        }
    }
}
</script>

<style scoped>
.go-back{
    display: flex;
    cursor: pointer;
}

button{
    background-color: rgb(20 184 166);
    border-color: black;
}

</style>

