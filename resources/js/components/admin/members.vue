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
                                <th><b>Approve</b></th>
                                <th><b>Delete</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="member in members">
                                <td>{{ member.user.name }}</td>
                                <td>{{ member.user.phone }}</td>
                                <td>{{ member.user.status }}</td>
                                <td>
                                    <button :disabled="member.status === '1'" @click="approveMember(member.id)" class="btn login__block__btn" title="Approve Member">
                                        <i class="zmdi zmdi-check-circle"></i>
                                    </button>
                                </td>
                                <td>
                                    <button :disabled="member.user.id === me.id" @click="deleteMember(member.id)" class="btn login__block__btn" title="Delete Member">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </td>
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
                members: [],
                me : ""
            }
        },
        methods:{
            loadMe(){
                axios.post('/api/userResource/loadMe').then(function (data) {
                    console.log(data.data);
                    this.me = data.data;
                }.bind(this));
            },
            loadMembers(){
                axios.post('/api/memberResource/getMembers').then(function (data) {
                    console.log(data.data);
                    this.members = data.data;
                }.bind(this));
            },
            deleteMember(id){
                axios.delete('/api/memberResource/'+id).then(function () {
                   console.log(data);
                });
                this.loadMembers();
            },
            approveMember(id){
                axios.post('/api/memberResource/approveMember/'+id).then(function () {
                    console.log(data);
                });
                this.loadMembers();
            },
            goToAddMember(){
                router.push('/admin/newmember');
            },
        },
        created() {
            this.loadMe();
            this.loadMembers();
        }
    }

</script>
<style scoped>

</style>
