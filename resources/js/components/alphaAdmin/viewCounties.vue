<template>
    <div>
        <header class="content__title">
            <h1>List of Counties</h1>

            <div class="actions">
                <button @click="goToAddCounty" class="btn login__block__btn"> <i class="zmdi zmdi-plus"></i> &nbsp;&nbsp;&nbsp; New County </button>
            </div>
        </header>


        <div class="card">
            <div class="card-body">
                <div class="table-responsive ">
                    <table id="" class="table">
                        <thead>
                            <tr>
                                <th><b>County Name</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="county in counties" v-bind:key="county.id">
                                <td>{{ county.name }}</td>
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
                counties: []
            }
        },
        methods: {
            loadCounties(){
                axios.get('/api/countyResource').then(function (data) {
                    this.counties = data.data;
                    console.log(this.counties);
                }.bind(this));
            },
            deleteItem(){

            },
            goToAddCounty(){
                router.push('/alpha/newcounty');
            }
        },
        created() {
            this.loadCounties();
        }
    }
</script>

<style scoped>

</style>
