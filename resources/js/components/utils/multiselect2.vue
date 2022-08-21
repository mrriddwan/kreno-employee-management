<template>
    <div class="sm-12">
        <select2
            ref="selectComp"
            :value="value"
            :min-count-for-search="0"
            multiple="true"
            :data="options"
            @update="update($event)"
        />
        Value: {{ value }}
    </div>
</template>
<script>
export default {
    name: "multiselect-example2",
    data: () => {
        return {
            value: [],
            options: [],
        };
    },
    mounted() {
        this.options = this.getOptions(4);

        console.log("0ms");
        setTimeout(() => {
            console.log("500ms");
            this.value = [this.options[2].value];
            this.options = this.getOptions(10);
        }, 1500);
    },
    methods: {
        update(e) {
            this.value = e;
            console.log("update", e);
        },
        select(e) {
            console.log("select", e);
        },
        getOptions(n) {
            var result = [];
            for (let i = 0; i < n; i++) {
                result.push({ label: "asd " + i, value: "asd " + i });
            }
            return result;
        },
    },
};
</script>
