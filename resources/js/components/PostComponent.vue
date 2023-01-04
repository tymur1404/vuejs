<template>
    <div>
        <p>Post Component</p>
        <CreateComponent></CreateComponent>
        <SinglePostComponent></SinglePostComponent>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Job</th>
            </tr>
            </thead>
            <tbody>
                <template  v-for="person in persons">
                    <tr v-if="person.age > 19">
                        <td>{{ person.id }}</td>
                        <td>{{ person.name }}</td>
                        <td>{{ person.age }}</td>
                        <td>{{ person.job }}</td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import SinglePostComponent from "./SinglePostComponent.vue";
import CreateComponent from "./CreateComponent.vue";
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
        SinglePostComponent,
        CreateComponent,
    }
}
</script>

<style scoped>

</style>
