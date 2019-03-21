<template>
    <div>
        <header class="content__title">
            <h1>New Constituency</h1>
        </header>

        <div class="card">
            <div class="card-body">
                <!--<h3 class="card-body__title">Update Password</h3>-->
                <form @submit.prevent="submitConstituency" @keydown="form.onKeydown($event)">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select name="" required v-model="form.subCounty" title="" class="form-control">
                                    <option value="" selected disabled>Select Sub County</option>
                                    <option value="" v-for="subCounty in subCounties" :value="subCounty.id">{{ subCounty.name }}</option>
                                </select>
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" v-model="form.constituency" placeholder="Constituency Name" required>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn login__block__btn"> <i class="zmdi zmdi-collection-plus"></i> &nbsp;&nbsp;&nbsp; Add Constituency </button>
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
                    subCounty: "",
                    constituency: ""
                }),
                subCounties: []
            }
        },
        methods:{
            loadSubCounties(){
                axios.get('/api/subCountyResource').then(function (data) {
                    this.subCounties = data.data;
                    console.log(this.subCounties);
                }.bind(this));
            },
            submitConstituency(){
                this.$Progress.start();
                this.form.post('/api/constituencyResource').then(function (data) {
                    console.log(data.data);
                    swal({
                        "title" : "Constituency Added",
                        "text" : "",
                        "icon" : "success"
                    });
                });
                this.form.subCounty = "";
                this.form.constituency = "";
                this.$Progress.finish();
            }
        },
        created() {
            this.loadSubCounties();
        }
    }
</script>

<style scoped>

</style>
