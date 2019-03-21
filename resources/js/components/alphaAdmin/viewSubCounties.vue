<template>
    <div>
        <header class="content__title">
            <h1>List of Sub Counties</h1>

            <div class="actions">
                <button @click="goToAddSubCounty" class="btn login__block__btn"> <i class="zmdi zmdi-plus"></i> &nbsp;&nbsp;&nbsp; New Sub County </button>
            </div>
        </header>


        <div class="card">
            <div class="card-body">
                <div class="table-responsive ">
                    <table id="" class="table">
                        <thead>
                            <tr>
                                <th><b>Sub County Name</b></th>
                                <!--<th><b>County</b></th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="subCounty in subCounties">
                                <td>{{ subCounty.name }}</td>
                                <!--<td>{{ getCountyName(subCounty.county) }}</td>-->
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
                subCounties: []
            }
        },
        methods: {
            loadSubCounties(){
                axios.get('/api/subCountyResource').then(function (data) {
                    this.subCounties = data.data;
                    console.log(this.subCounties);
                }.bind(this));
            },
            // getCountyName(countyId){
            //     axios.get('/api/countyResource/'+countyId).then(function (data) {
            //         console.log(data.data.name);
            //         return data.data.name;
            //     });
            // },
            goToAddSubCounty(){
                router.push('/alpha/newsubcounty');
            }
        },
        created() {
            this.loadSubCounties();
        }
    }
</script>

<style scoped>

</style>
