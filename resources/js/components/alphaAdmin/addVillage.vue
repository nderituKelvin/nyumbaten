<template>
    <div>
        <header class="content__title">
            <h1>New Village</h1>
        </header>

        <div class="card">
            <div class="card-body">
                <!--<h3 class="card-body__title">Update Password</h3>-->
                <form @submit.prevent="submitVillage" @keydown="form.onKeydown($event)">
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <select name="" title="" v-model="form.location" class="form-control" required>
                                    <option value="" selected disabled>Select Location</option>
                                    <option v-for="location in locations" :value="location.id">{{ location.name }}</option>
                                </select>
                                <i class="form-group__bar"></i>
                            </div>


                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Location Name" v-model="form.village" required>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn login__block__btn"> <i class="zmdi zmdi-collection-plus"></i> &nbsp;&nbsp;&nbsp; Add Location </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                form: new Form({
                    village: "",
                    location : ""
                }),
                locations : []
            }
        },
        methods:{
            loadLocations(){
                axios.get('/api/locationResource').then(function (data) {
                    this.locations = data.data;
                    console.log(this.locations);
                }.bind(this));
            },
            submitVillage(){
                this.$Progress.start();
                this.form.post('/api/villageResource').then(function (data) {
                    console.log(data.data);
                    swal({
                        "title" : "Village Added",
                        "text" : "",
                        "icon" : "success"
                    });
                });
                this.form.village = "";
                this.form.location = "";
                this.$Progress.finish();
            }
        },
        created() {
            this.loadLocations();
        }
    }
</script>

<style scoped>

</style>
