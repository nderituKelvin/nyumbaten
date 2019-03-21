<template>
    <div>
        <header class="content__title">
            <h1>List of Services</h1>

            <div class="actions">
                <button @click="goToAddService" class="btn login__block__btn"> <i class="zmdi zmdi-plus"></i> &nbsp;&nbsp;&nbsp; New Service</button>
            </div>
        </header>


        <div class="card">
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table">
                        <thead>
                        <tr>
                            <th><b>Service</b></th>
                            <th><b>Provider</b></th>
                            <th><b>Contact</b></th>
                            <!--<th><b>Remove</b></th>-->
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="service in services">
                                <td>{{ service.name }}</td>
                                <td>{{ service.provider }}</td>
                                <td>{{ service.contact }}</td>
                                <!--<td>-->
                                    <!--<button @click="deleteService" class="btn login__block__btn">-->
                                        <!--<i class="zmdi zmdi-delete"></i>-->
                                    <!--</button>-->
                                <!--</td>-->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </div>
</template>

<script>
    export default {
        data(){
            return{
                services: []
            }
        },
        methods:{
            loadServices(){
                axios.get('/api/serviceResource').then(function (data) {
                    console.log(data.data);
                    this.services = data.data;
                }.bind(this));
            },

            goToAddService(){
                router.push('/admin/newService');
            },
            deleteService(){

            }
        },
        created(){
            this.loadServices();
        }
    }
</script>

<style scoped>

</style>
