<template>
    <div>
        <header class="content__title">
            <h1>List of Villages</h1>

            <div class="actions">
                <button @click="goToAddVillage" class="btn login__block__btn"> <i class="zmdi zmdi-plus"></i> &nbsp;&nbsp;&nbsp; New Village </button>
            </div>
        </header>


        <div class="card">
            <div class="card-body">
                <div class="table-responsive ">
                    <table id="" class="table">
                        <thead>
                            <tr>
                                <th><b>Village Name</b></th>
                                <!--<th><b>County</b></th>-->
                                <!--<th><b>SubCounty</b></th>-->
                                <!--<th><b>Delete</b></th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="village in villages">
                                <td>{{ village.name }}</td>
                                <!--<td>Nyeri</td>-->
                                <!--<td>Tetu</td>-->
                                <!--<td>-->
                                    <!--<button @click="deleteItem" class="btn login__block__btn">-->
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
                villages: []
            }
        },
        methods: {
            deleteItem(){

            },
            loadVillages(){
                axios.get('/api/villageResource').then(function (data) {
                    this.villages = data.data;
                    console.log(this.villages);
                }.bind(this));
            },
            goToAddVillage(){
                router.push('/alpha/newvillage');
            }
        },
        created() {
            this.loadVillages();
        }
    }
</script>

<style scoped>

</style>
