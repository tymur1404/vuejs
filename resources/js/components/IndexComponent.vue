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
                    <td><a href="#" @click.prevent="changeEditPersonId(person.id)" class="btn btn-success">Edit</a>
                    <a href="#" @click.prevent="deletePerson(person.id)" class="btn btn-danger">Delete</a></td>
                </tr>
                <tr :class="isEdit(person.id) ? '' : 'd-none'">
                    <td>{{ person.id }}</td>
                    <td><input type="text" class="form-control" v-model="person.name"></td>
                    <td><input type="number" class="form-control" v-model="person.age"></td>
                    <td><input type="text" class="form-control" v-model="person.job"></td>
                    <td><a href="#"  @click.prevent="updatedPerson(person)" class="btn btn-success">Update</a></td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "IndexComponent",

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

        changeEditPersonId(id){
            this.editPersonId = id
        },

        isEdit(id){
            return this.editPersonId === id
        }
    }


}
</script>

<style scoped>

</style>
