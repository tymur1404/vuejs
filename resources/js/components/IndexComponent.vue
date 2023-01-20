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
                <ShowComponent :person="person"></ShowComponent>
                <EditComponent :person="person" :ref="`edit_${person.id}`"></EditComponent>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import EditComponent from "./EditComponent.vue";
import ShowComponent from "./ShowComponent.vue";
export default {
    name: "IndexComponent",
    components: {
        ShowComponent,
        EditComponent
    },
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
