<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-header"><router-link :to="{ name: 'Add' }" class="btn btn-info">Add New</router-link></div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(student, index) in student.data" :key="index">
                                        <th scope="row">{{++index}}</th>
                                        <td>{{ student.name }}</td>
                                        <td>{{ student.email }}</td>
                                        <td>{{ student.phone }}</td>
                                        <td>{{ student.gender }}</td>
                                        <td>
                                            <router-link :to="{name:'Edit', params:{id:student.id}}" href="" class="btn btn-success me-2">Edit</router-link>
                                            <a href="" class="btn btn-danger" @click.prevent="destroy(student.id)">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            student: []
        }
    },
    mounted(){
        this.fetchData();
    },
    methods: {
        fetchData(){
            axios.get("/api/student")
            .then((res) => {
                this.student = res.data

            }).catch(() => {

            })
        },
        destroy(id){
            if(!window.confirm('Are you sure to delete ?')){
                return;
            }
            axios.delete(`api/student/${id}`)
                .then((res) => {
                    if(res.status == 200){
                        this.fetchData();
                    }
                })
        },
    },
}
</script>
<style lang="">
    
</style>