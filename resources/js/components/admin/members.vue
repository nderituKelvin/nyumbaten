<template>
    <div>
        <header class="content__title">
            <h1>List of Members</h1>

            <!--<div class="actions">-->
                <!--<button @click="goToAddMember" class="btn login__block__btn"> <i class="zmdi zmdi-plus"></i> &nbsp;&nbsp;&nbsp; New Member</button>-->
            <!--</div>-->
        </header>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive ">
                    <table id="" class="table">
                        <thead>
                            <tr>
                                <th><b>Name</b></th>
                                <th><b>Phone Number</b></th>
                                <th><b>Status</b></th>
                                <!--<th><b>Remove</b></th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="member in members">
                                <td>{{ member.name }}</td>
                                <td>{{ member.phone }}</td>
                                <td>{{ member.status }}</td>
                                <!--<td>-->
                                    <!--<button @click="deleteMember" class="btn login__block__btn">-->
                                        <!--<i class="zmdi zmdi-refresh"></i>-->
                                    <!--</button>-->
                                <!--</td>-->
                                <!--<td>-->
                                    <!--<button @click="deleteMember" class="btn login__block__btn">-->
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
                members: []
            }
        },
        methods:{
            loadMembers(){
                axios.post('/api/memberResource/getMembers').then(function (data) {
                    console.log(data.data);
                    this.members = data.data;
                }.bind(this));
            },
            deleteMember(){

            },
            goToAddMember(){
                router.push('/admin/newmember');
            },
        },
        created() {
            this.loadMembers();
        }
    }

</script>
<style scoped>

</style>
