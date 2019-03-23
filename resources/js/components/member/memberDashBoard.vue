<template>
    <div>
        <div>
            <div class="messages">

                <div class="messages__body">
                    <div class="messages__header">
                        <div class="toolbar toolbar--inner mb-0">
                            <div class="toolbar__label">{{ groupData.name }}</div>

                            <div class="actions toolbar__actions">
                                {{ groupLocation }}
                            </div>

                            <div class="toolbar__search">
                                <input type="text" placeholder="Search...">
                                <i class="toolbar__search__close zmdi zmdi-long-arrow-left" data-sa-action="toolbar-search-close"></i>
                            </div>
                        </div>
                    </div>

                    <div class="messages__content">
                        <div ref="messageDisplay" class="scrollbar-inner">


                            <div v-for="message in messages">
                                <div class="messages__item" v-if="message.user.id !== me.id">
                                    <div class="messages__details">
                                        <small><u>{{ message.user.name }} | {{ message.user.phone }}</u></small>
                                        <p>{{ message.message }}</p>
                                        <small><i class="zmdi zmdi-time"></i> {{ message.created_at }}</small>
                                    </div>
                                </div>

                                <div class="messages__item messages__item--right" v-if="message.user.id === me.id">
                                    <div class="messages__details">

                                        <p>{{ message.message }}</p>
                                        <small><i class="zmdi zmdi-time"></i> {{ message.created_at }}</small>
                                    </div>
                                </div>


                            </div>
                            <div id="chatBottom"></div>
                        </div>
                    </div>
                    <div class="messages__reply">
                        <form @submit.prevent="sendMessage" @keydown="form.onKeydown($event)">
                            <input class="messages__reply__text" v-model="form.message" placeholder="Type a message..." required/>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="text-left">
                    <button @click="viewServices" class="btn login__block__btn"> <i class="zmdi zmdi-eye"></i> &nbsp;&nbsp;&nbsp; View Services </button>
                </div>
            </div>
            <div class="col-6">
                <div class="text-right">
                    <button @click="logout" class="btn login__block__btn"> <i class="zmdi zmdi-sign-in"></i> &nbsp;&nbsp;Logout </button>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data(){
            return{
                groupNums: null,
                groupData: "",
                groupLocation: "",
                messages: [],
                me: "",
                form: new Form({
                    message: ""
                })
            }
        },
        methods:{
            logout(){
                window.location.href = "/logout";
            },
            loadMe(){
                this.form.post('/api/userResource/loadMe').then(function (data) {
                    console.log(data.data);
                    this.me = data.data;
                }.bind(this));
            },
            sendMessage(){
                this.form.post('/api/messageResource').then(function (data) {
                    console.log(data.data);
                    this.form.message = "";
                }.bind(this));
            },
            loadMessages(){
                axios.post('/api/messageResource/loadMessages').then(function (data) {
                    console.log(data.data);
                    this.messages = data.data;
                }.bind(this));
            },
            getGroupLocation(){
                axios.post('/api/groupResource/getGroupLocation').then(function (data) {
                    console.log(data.data);
                    this.groupLocation = data.data;
                }.bind(this));
            },
            getGroupData(){
                axios.post('/api/groupResource/getGroupData').then(function (data) {
                    console.log(data.data);
                    this.groupData = data.data;
                    this.getGroupLocation();
                }.bind(this));
            },
            getNumberOfGroups(){
                axios.post('/api/groupResource/getAdminGroupCount').then(function (data) {
                    console.log(data.data);
                    this.groupNums = data.data;
                }.bind(this));
            },
            checkForGroup(){
                axios.post('/api/memberResource/checkIfAssignedToGroup').then(function (data) {
                    if(data.data === 0 ){
                        router.push('/member/joingroup')
                    }
                }.bind(this))
            },
            viewServices(){
                router.push('/member/services');
            }
        },
        created() {
            this.checkForGroup();
            this.loadMe();
            this.getNumberOfGroups();
            this.getGroupData();
            this.loadMessages();
            this.interval = setInterval(() => this.loadMessages(), 2000);
        },
        updated() {
            var VueScrollTo = require('vue-scrollto');
            Vue.use(VueScrollTo, {
                container: "div#chatBottom",
                duration: 500,
                easing: "ease",
                offset: 0,
                force: true,
                cancelable: true,
                onStart: false,
                onDone: false,
                onCancel: false,
                x: false,
                y: true
            })
        }

    }
</script>

<style scoped>

</style>
