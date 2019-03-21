<template>
    <div>
        <header class="content__title">
            <h1>List of Constituency</h1>

            <div class="actions">
                <button @click="goToAddConstituency" class="btn login__block__btn"> <i class="zmdi zmdi-plus"></i> &nbsp;&nbsp;&nbsp; New Constituency </button>
            </div>
        </header>


        <div class="card">
            <div class="card-body">
                <div class="table-responsive ">
                    <table id="" class="table">
                        <thead>
                            <tr>
                                <th><b>Constituency </b></th>
                                <!--<th><b>County </b></th>-->
                                <!--<th><b>Delete</b></th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="constituency in constituencies">
                                <td>{{ constituency.name }}</td>
                                <!--<td>Nyeri</td>-->
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
                constituencies: []
            }
        },
        methods: {
            loadConstituencies(){
                axios.get('/api/constituencyResource').then(function (data) {
                    this.constituencies = data.data;
                    console.log(this.constituencies);
                }.bind(this));
            },
            deleteItem(){

            },
            goToAddConstituency(){
                router.push('/alpha/newconstituency');
            }
        },
        created() {
            this.loadConstituencies();
        }
    }
</script>

<style scoped>

</style>
