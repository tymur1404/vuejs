<template>
    <div class="w-25">
        <div class="mb-3">
            <input type="text" class="form-control" v-model="name" id="name" placeholder="Name">
        </div>
        <div class="mb-3">
            <input type="number" class="form-control"  v-model="age" id="age" placeholder="Age">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" v-model="job" id="job" placeholder="Job">
        </div>
        <div class="mb-3">
            <input @click.prevent="addPerson" class="btn btn-primary" value="Добавить">
        </div>
    </div>
</template>

<script>
export default {
    name: "CreateComponent",

    data(){
        return {
            name: null,
            age: null,
            job: null
        }
    },

    methods: {
        addPerson() {
            axios.post('/api/people',{ name: this.name,
                                                age: this.age,
                                                job: this.job})
                .then(
                    res => {

                        console.log(res);
                    }
                ).finally(function(){
                this.name = null
                this.age = null
                this.job = null
            });
        }
    }


}
</script>

<style scoped>

</style>
