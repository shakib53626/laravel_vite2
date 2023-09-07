<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-header"><router-link :to="{ name: 'list' }" class="btn btn-success">All Data</router-link></div>
                        <div class="card-body">
                            <form @submit.prevent="updateData">
                                <div class="mb-3">
                                  <label for="" class="form-label">Name</label>
                                  <input type="text" class="form-control" name="name" placeholder="Enter Your Name" v-model="form.name">
                                  <span v-if="errors.name" class="text-danger">{{errors.name[0]}}</span>
                                </div>
                                <div class="mb-3">
                                  <label for="" class="form-label">Email</label>
                                  <input type="email" class="form-control" name="email" placeholder="Enter Your Email" v-model="form.email">
                                  <span v-if="errors.name" class="text-danger">{{errors.email[0]}}</span>
                                </div>
                                <div class="mb-3">
                                  <label for="" class="form-label">Phone Number</label>
                                  <input type="text" class="form-control" name="number" placeholder="Enter Your Phone Number" v-model="form.phone">
                                  <span v-if="errors.name" class="text-danger">{{errors.phone[0]}}</span>
                                </div>
                                <div class="mb-3">
                                  <label for="" class="form-label">Gender</label>
                                  <select class="form-select form-select-lg" name="gender" id="" v-model="form.gender">
                                    <option value="" selected>Select Gender</option>
                                    <option value="male">Mele</option>
                                    <option value="female">Femele</option>
                                    <option value="others">Others</option>
                                  </select>
                                  <span v-if="errors.name" class="text-danger">{{errors.gender[0]}}</span>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                              </form>
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
      form:{
        name: '',
        email: '',
        phone: '',
        gender: '',
      },
      errors:{},
    }
  },
  mounted(){
    this.editData();
  },
  methods: {
    editData(){
      axios
            .get(`/api/student/${this.$route.params.id}`)
            .then((res) => {
                if(res.status === 200){
                  this.form = res.data.data
                }
            }).catch((err) => {
              this.errors = err.response.data.errors
            })
    },
    updateData(){
      axios
            .put(`/api/student/${this.$route.params.id}`, this.form)
            .then((res) => {
                if(res.status === 200){
                  this.form = '';
                  this.errors = '';
                  this.$router.push({name:'list'});
                }
            }).catch((err) => {
              this.errors = err.response.data.errors
            })
    }
  },

}
</script>
<style lang="">
    
</style>