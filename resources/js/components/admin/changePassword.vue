<template>
    <div>
        <header class="content__title">
            <h1>Change Password</h1>
        </header>

        <div class="card">
            <div class="card-body">
                <!--<h3 class="card-body__title">Update Password</h3>-->
                <form @submit.prevent="changePassword" @keydown="form.onKeydown($event)">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="password" class="form-control" v-model="form.currPass" required minlength="6" placeholder="Current Password">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" v-model="form.newPass" required minlength="6" placeholder="New Password">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" v-model="form.conPass" required minlength="6" placeholder="Confirm Password">
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn login__block__btn"> <i class="zmdi zmdi-comment-edit"></i> &nbsp;&nbsp;&nbsp; Update Password </button>
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
                    currPass: "",
                    newPass: "",
                    conPass: ""
                })
            }
        },
        methods:{
            changePassword(){
                this.form.post('/api/userResource/updatePassword').then(function (data) {
                    swal({
                        "title" : data.data,
                        "text" : "",
                        "icon" : "success"
                    });
                    this.form.currPass = "";
                    this.form.newPass = "";
                    this.form.conPass = "";
                }.bind(this)).catch(function (error) {
                    swal({
                        "title" : error.response.data.error,
                        "text" : "Please Try Again",
                        "icon" : "error"
                    });
                    this.form.currPass = "";
                    this.form.newPass = "";
                    this.form.conPass = "";
                }.bind(this));
            }
        },
        created() {

        }
    }
</script>

<style scoped>

</style>
