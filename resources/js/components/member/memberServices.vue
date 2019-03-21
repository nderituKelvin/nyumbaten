<template>
    <div>
        <header class="content__title">
            <h1>List of Services</h1>

            <div class="text-right">
                <button @click="goToHome" class="btn login__block__btn"> <i class="zmdi zmdi-home"></i> &nbsp;&nbsp;&nbsp; Home </button>
            </div>
        </header>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive ">
                    <table id="" class="table">
                        <thead>
                            <tr>
                                <th><b>Service</b></th>
                                <th><b>Provider</b></th>
                                <th>
                                    <b>
                                        Contact
                                    </b>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="service in services">
                                <td>{{ service.name }}</td>
                                <td>{{ service.provider }}</td>
                                <th>
                                    <b>
                                        <a @click="openPhonelink($event)" href="#"> {{ service.contact }} </a>
                                    </b>
                                </th>
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
            openPhonelink(event){
                window.open('tel:'+event.target.value);
            },
            loadServices(){
                axios.get('/api/serviceResource').then(function (data) {
                    console.log(data.data);
                    this.services = data.data;
                }.bind(this));
            },
            checkForGroup(){
                axios.post('/api/memberResource/checkIfAssignedToGroup').then(function (data) {
                    if(data.data === 0 ){
                        router.push('/member/joingroup')
                    }
                }.bind(this))
            },
            goToHome(){
                router.push('/member');
            },
        },
        created() {
            this.checkForGroup();
            this.loadServices();
        }
    }
</script>

<style scoped>

</style>
