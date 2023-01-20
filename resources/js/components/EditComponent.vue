<template>

    <tr :class="this.$parent.isEdit(person.id) ? '' : 'd-none'">
        <td>{{ person.id }}</td>
        <td><input type="text" class="form-control" v-model="name"></td>
        <td><input type="number" class="form-control" v-model="age"></td>
        <td><input type="text" class="form-control" v-model="job"></td>
        <td><a href="#" @click.prevent="updatedPerson(person.id, name, age, job)" class="btn btn-success">Update</a></td>
    </tr>

</template>

<script>
export default {
    name: "EditComponent",

    props: [
        'person'
    ],

    data() {
        return {
            name: '',
            age: null,
            job: '',
        }
    },
    mounted(){

    },

    methods: {

        updatedPerson(id, name, age, job) {
            this.$parent.editPersonId = null

            axios.patch(`/api/people/${id}`, {
                id: id,
                name: name,
                age: age,
                job: job
            })
                .then(res => {
                        this.$parent.getPeople()
                    }
                );
        }
    }


}
</script>

<style scoped>

</style>
