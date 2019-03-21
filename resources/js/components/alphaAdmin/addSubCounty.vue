<template>
    <div>
        <header class="content__title">
            <h1>New Sub County</h1>
        </header>

        <div class="card">
            <div class="card-body">
                <!--<h3 class="card-body__title">Update Password</h3>-->
                <form @submit.prevent="submitSubCounty" @keydown="form.onKeydown($event)">
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <select v-model="form.countyId" name="" title="" class="form-control" required>
                                    <option value="" selected disabled>Select County</option>
                                    <option v-for="county in counties" :value="county.id" v-bind:key="county.id">{{ county.name }}</option>
                                </select>
                                <i class="form-group__bar"></i>
                            </div>


                            <div class="form-group">
                                <input type="text" v-model="form.subCounty" class="form-control" placeholder="Sub County Name">
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn login__block__btn"> <i class="zmdi zmdi-collection-plus"></i> &nbsp;&nbsp;&nbsp; Add Sub County </button>
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
                    countyId: "",
                    subCounty: ""
                }),
                counties: []
            }
        },
        methods:{
            loadCounties(){
                axios.get('/api/countyResource').then(function (data) {
                    this.counties = data.data;
                    console.log(this.counties);
                }.bind(this));
            },
            submitSubCounty(){
                this.$Progress.start();
                this.form.post('/api/subCountyResource').then(function (data) {
                    console.log(data.data);
                    swal({
                        "title" : "Sub County Added",
                        "text" : "",
                        "icon" : "success"
                    });
                }).catch(function () {
                    swal({
                        "title" : "An Error Occurred",
                        "text" : "",
                        "icon" : "error"
                    });
                });
                this.form.countyId = "";
                this.form.subCounty = "";
                this.$Progress.finish();
            }
        },
        created() {
            this.loadCounties();
        }
    }
</script>

<style scoped>

</style>
