<template>
    <div>
        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Job</th>
                <th scope="col">Edit</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="person in people">
                <tr :class="isEdit(person.id) ? 'd-none' : ''">
                    <td>{{ person.id }}</td>
                    <td>{{ person.name }}</td>
                    <td>{{ person.age }}</td>
                    <td>{{ person.job }}</td>
                    <td><a href="#" @click.prevent="changeEditPersonId(person.id, person.name, person.age, person.job)" class="btn btn-success">Edit</a>
                    <a href="#" @click.prevent="deletePerson(person.id)" class="btn btn-danger">Delete</a></td>
                </tr>
                <EditComponent :person="person" :ref="`edit_${person.id}`"></EditComponent>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import EditComponent from "./EditComponent.vue";
export default {
    name: "IndexComponent",
    components: {EditComponent},
    data(){
        return {
            people: null,
            editPersonId: null,
            name: '',
            age: null,
            job: '',
        }
    },

    mounted (){
        this.getPeople()
    },

    methods: {
        getPeople() {
            axios.get('/api/people')
                .then(
                    res => {
                        this.people = res.data
                    }
                );
        },

        updatedPerson(person) {
            this.editPersonId = null
            console.log(person.name)
            axios.patch(`/api/people/${person.id}`,{ id: person.id,
                                                            name: person.name,
                                                            age: person.age,
                                                            job: person.job})
                .then(res => {
                        this.getPeople()
                    }
                );
        },

        deletePerson(id){
            this.editPersonId = null
            axios.delete(`/api/people/${id}`)
                .then(res => {
                        this.getPeople()
                    }
                );
        },

        changeEditPersonId(id, name, age, job){
            let editName = `edit_${id}` //dynamic key

            this.editPersonId = id
            this.$refs[editName][0].name = name //accessing a dynamic key
            this.$refs[editName][0].age = age
            this.$refs[editName][0].job = job
        },

        isEdit(id){
            return this.editPersonId === id
        },

        indexLog(){
            console.log('this is log component');
        }
    }


}
</script>

<style scoped>

</style>
