<template>
    <div>

        <CreateComponent></CreateComponent>
        <IndexComponent></IndexComponent>

    </div>
</template>

<script>
import CreateComponent from "./CreateComponent.vue";
import IndexComponent from "./IndexComponent.vue";
export default {
    name: "PostComponent",

    data() {
        return {
            persons: null
        }
    },

    mounted() {

    },

    methods:{

    },

    computed: {

    },

    components: {
        CreateComponent,
        IndexComponent,
    }
}
</script>

<style scoped>

</style>
