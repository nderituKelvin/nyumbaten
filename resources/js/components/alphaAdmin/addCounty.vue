<template>
    <div>
        <header class="content__title">
            <h1>New County</h1>
        </header>

        <div class="card">
            <div class="card-body">
                <!--<h3 class="card-body__title">Update Password</h3>-->
                <form @submit.prevent="submitCounty" @keydown="form.onKeydown($event)">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" v-model="form.countyName" placeholder="County Name" required minlength="4">
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" :disabled="form.busy" class="btn login__block__btn"> <i class="zmdi zmdi-collection-plus"></i> &nbsp;&nbsp;&nbsp; Add County </button>
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
                    countyName : "",
                }),
            }
        },
        methods:{
            submitCounty(){
                this.$Progress.start();
                this.form.post('/api/countyResource').then(function (data) {
                    console.log(data.data);
                    swal({
                        "title" : "County Added",
                        "text" : "",
                        "icon" : "success"
                    })
                });
                this.form.countyName = "";
                this.$Progress.finish();
            }
        },
        created() {

        }
    }
</script>

<style scoped>

</style>
