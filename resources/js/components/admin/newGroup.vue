<template>
    <div>
        <header class="content__title">
            <h1>New Group</h1>
        </header>

        <div class="card">
            <div class="card-body">
                <!--<h3 class="card-body__title">Update Password</h3>-->
                <form @submit.prevent="createGroup" @keydown="form.onKeydown($event)">
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
                                <select name="" title="" v-model="form.village" class="form-control" required>
                                    <option value="" selected disabled>Village</option>
                                    <option v-for="village in villages" :value="village.id">{{ village.name }}</option>
                                </select>
                                <i class="form-group__bar"></i>
                            </div>
                            <div class="form-group">
                                <input type="text" v-model="form.groupName" class="form-control" placeholder="Group" required>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn login__block__btn"> <i class="zmdi zmdi-group-work"></i> &nbsp;&nbsp;&nbsp; Create Group </button>
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
                    village: "",
                    groupName: ""
                }),
                counties: [],
                subCounties: [],
                constituencies: [],
                locations: [],
                villages: [],
            }
        },
        methods:{
            createGroup(){
                this.form.post('/api/groupResource').then(function (data) {
                    swal({
                        "title" : "Group has been created",
                        "text" : "",
                        "icon" : "success"
                    });
                    router.push('/admin')
                }.bind(this)).catch(function (error) {
                    swal({
                        "title" : error.response.data.error,
                        "text" : "Please Try Again",
                        "icon" : "error"
                    });
                });
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
        }
    }
</script>

<style scoped>

</style>
