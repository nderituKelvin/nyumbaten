<template>
    <div>
        <header class="content__title">
            <h1>Join Group</h1>
        </header>

        <div class="card">
            <div class="card-body">
                <!--<h3 class="card-body__title">Update Password</h3>-->
                <form @submit.prevent="joinGroup" @keydown="form.onKeydown($event)">
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <select @change="loadSubCounties($event)" title="" class="form-control" required>
                                    <option value="" selected disabled>Select County</option>
                                    <option v-for="county in counties" :value="county.id" v-bind:key="county.id">{{ county.name }}</option>
                                </select>
                                <i class="form-group__bar"></i>
                            </div>
                            <div class="form-group">
                                <select @change="loadConstituencies($event)" class="form-control">
                                    <option value="" selected disabled>Select Sub County</option>
                                    <option v-for="subCounty in subCounties" :value="subCounty.id" v-bind:key="subCounty.id">{{ subCounty.name }}</option>
                                </select>
                                <i class="form-group__bar"></i>
                            </div>
                            <div class="form-group">
                                <select @change="loadLocations($event)" class="form-control">
                                    <option  value="" selected disabled>Select Constituency</option>
                                    <option v-for="consti in constituencies" :value="consti.id">{{ consti.name }}</option>
                                </select>
                                <i class="form-group__bar"></i>
                            </div>
                            <div @change="loadVillages($event)" class="form-group">
                                <select class="form-control">
                                    <option value="" selected disabled>Select Location</option>
                                    <option  v-for="location in locations" :value="location.id">{{ location.name }}</option>
                                </select>
                                <i class="form-group__bar"></i>
                            </div>
                            <div class="form-group">
                                <select @change="loadGroups($event)" class="form-control" required>
                                    <option value="" selected disabled>Village</option>
                                    <option v-for="village in villages" :value="village.id">{{ village.name }}</option>
                                </select>
                                <i class="form-group__bar"></i>
                            </div>
                            <div class="form-group">
                                <select v-model="form.group" class="form-control" required>
                                    <option value="" selected disabled>Group</option>
                                    <option v-for="group in groups" :value="group.id">{{ group.name }}</option>
                                </select>
                                <i class="form-group__bar"></i>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn login__block__btn"> <i class="zmdi zmdi-group-work"></i> &nbsp;&nbsp;&nbsp; Join Group </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                form: new Form({
                    group: "",
                }),
                counties: [],
                subCounties: [],
                constituencies: [],
                locations: [],
                villages: [],
                groups: [],
            }
        },
        methods:{
            checkForGroup(){
                axios.post('/api/memberResource/checkIfAssignedToGroup').then(function (data) {
                    if(data.data !== 0 ){
                        router.push('/member')
                    }
                }.bind(this))
            },
            joinGroup(){
                this.form.post('/api/memberResource').then(function (data) {
                    window.location.href = '/member/sign/in';
                }.bind(this));
            },
            loadGroups(event){
                axios.get('/api/groupResource/getGroupsOfVillage/'+event.target.value).then(function (data) {
                    this.groups = data.data;
                }.bind(this));
            },
            loadVillages(event){
                axios.get('/api/villageResource/getVillagesOfLocation/'+event.target.value).then(function (data) {
                    this.villages = data.data;
                }.bind(this))
            },
            loadLocations(event){
                this.villages = "";
                axios.get('/api/locationResource/getLocationsOfConstituency/'+event.target.value).then(function (data) {
                    this.locations = data.data;
                }.bind(this))
            },
            loadConstituencies(event){
                this.locations = "";this.villages = "";
                axios.get('/api/constituencyResource/getConstituenciesOfSubCounty/'+event.target.value).then(function (data) {
                    this.constituencies = data.data;
                }.bind(this))
            },
            loadSubCounties(event){
                this.constituencies = "";this.locations = "";this.villages = "";
                axios.get('/api/subCountyResource/getSubCountiesOfCounty/'+event.target.value).then(function (data) {
                    this.subCounties = data.data;
                }.bind(this))
            },
            loadCounties(){
                axios.get('/api/countyResource').then(function (data) {
                    this.counties = data.data;
                    console.log(this.counties);
                }.bind(this));
            },
        },
        created() {
            this.loadCounties();
            this.checkForGroup();
            this.checkForGroup();
        }
    }
</script>

<style scoped>

</style>
