<template>
    <div>
        <header class="content__title">
            <h1>New Location</h1>
        </header>

        <div class="card">
            <div class="card-body">
                <!--<h3 class="card-body__title">Update Password</h3>-->
                <form @submit.prevent="submitLocation" @keydown="form.onKeydown($event)">
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <select name="" v-model="form.constituency" title="" class="form-control">
                                    <option  value="" selected disabled>Select Constituency</option>
                                    <option v-for="consti in constituencies" :value="consti.id">{{ consti.name }}</option>
                                </select>
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" v-model="form.location" placeholder="Location Name">
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
            return {
                form: new Form({
                    constituency: "",
                    location: ""
                }),
                constituencies: []
            }
        },
        methods:{
            loadConstituencies(){
                axios.get('/api/constituencyResource').then(function (data) {
                    this.constituencies = data.data;
                    console.log(this.constituencies);
                }.bind(this));
            },
            submitLocation(){
                this.$Progress.start();
                this.form.post('/api/locationResource').then(function (data) {
                    console.log(data.data);
                    swal({
                        "title" : "Location Added",
                        "text" : "",
                        "icon" : "success"
                    });
                });
                this.form.constituency = "";
                this.form.location = "";
                this.$Progress.finish();
            }
        },
        created() {
            this.loadConstituencies();
        }
    }
</script>

<style scoped>

</style>
