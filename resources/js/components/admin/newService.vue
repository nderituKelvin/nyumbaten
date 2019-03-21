<template>
    <div>
        <header class="content__title">
            <h1>New Service</h1>
        </header>

        <div class="card">
            <div class="card-body">
                <h3 class="card-body__title">Add New Service</h3>
                <form @submit.prevent="submitService" @keydown="form.onKeydown($event)">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" v-model="form.name" required class="form-control" placeholder="Service Name">
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" v-model="form.provider" required class="form-control" placeholder="Provider Name">
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="tel" v-model="form.phone" required class="form-control" placeholder="Mobile Phone Number">
                                <i class="form-group__bar"></i>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn login__block__btn"> <i class="zmdi zmdi-plus"></i> &nbsp;&nbsp;&nbsp; Add Service </button>
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
                    name: "",
                    provider: "",
                    phone: ""
                }),
            }
        },
        methods:{
            submitService(){
                this.form.post('/api/serviceResource').then(function (data) {
                    swal({
                        "title" : 'Service Has been created',
                        'text' : '',
                        'icon' : 'success'
                    });
                    this.form.name = "";
                    this.form.provider = "";
                    this.form.phone = "";
                }.bind(this));
            }
        },
        created() {

        }
    }
</script>

<style scoped>

</style>
