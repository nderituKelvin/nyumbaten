<template>
    <div>
        <header class="content__title">
            <h1>List of Groups</h1>
        </header>


        <div class="card">
            <div class="card-body">
                <div class="table-responsive ">
                    <table id="" class="table">
                        <thead>
                        <tr>
                            <th><b>Group Name</b></th>
                            <!--<th><b>County</b></th>-->
                            <!--<th><b>Constituency</b></th>-->
                            <!--<th><b>Delete</b></th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="group in groups">
                            <td>{{ group.name }}</td>
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
                groups: []
            }
        },
        methods: {
            loadGroups(){
                axios.get('/api/groupResource').then(function (data) {
                    this.groups = data.data;
                    console.log(this.groups);
                }.bind(this));
            },
            deleteItem(){

            },
        },
        created() {
            this.loadGroups();
        }
    }
</script>

<style scoped>

</style>
