<template>

    <tr :class="this.$parent.isEdit(person.id) ? '' : 'd-none'">
        <td>{{ person.id }}</td>
        <td><input type="text" class="form-control" v-model="name"></td>
        <td><input type="number" class="form-control" v-model="age"></td>
        <td><input type="text" class="form-control" v-model="job"></td>
        <td><a href="#" @click.prevent="updatedPerson(person)" class="btn btn-success">Update</a></td>
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

        updatedPerson(person) {
            this.$parent.editPersonId = null

            axios.patch(`/api/people/${person.id}`, {
                id: person.id,
                name: person.name,
                age: person.age,
                job: person.job
            })
                .then(res => {
                        this.parent.getPeople()
                    }
                );
        }
    }


}
</script>

<style scoped>

</style>
