require('./bootstrap');

window.Vue = require('vue');
// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// ======================================================================

import VueRouter from 'vue-router';
Vue.use(VueRouter);
let routes = [
    {
        path: '/admin', component: require('./components/admin/dashBoard.vue').default
    },{
        path: '/admin/changepassword', component: require('./components/admin/changePassword.vue').default
    },{
        path: '/admin/members', component: require('./components/admin/members.vue').default
    },{
        path: '/admin/newmember', component: require('./components/admin/newMember.vue').default
    },{
        path: '/admin/newgroup', component: require('./components/admin/newGroup.vue').default
    },{
        path: '/admin/newService', component: require('./components/admin/newService.vue').default
    },{
        path: '/admin/services', component: require('./components/admin/services.vue').default
    },{
        path: '/admin/newgroup', component: require('./components/admin/members.vue').default
    },

    // ==============================================================================================
    {
        path: '/alpha', component: require('./components/alphaAdmin/dashBoard.vue').default
    },{
        path: '/alpha/newconstituency', component: require('./components/alphaAdmin/addConstituency.vue').default
    },{
        path: '/alpha/newcounty', component: require('./components/alphaAdmin/addCounty.vue').default
    },{
        path: '/alpha/newsubcounty', component: require('./components/alphaAdmin/addSubCounty.vue').default
    },{
        path: '/alpha/newlocation', component: require('./components/alphaAdmin/addLocation.vue').default
    },{
        path: '/alpha/newvillage', component: require('./components/alphaAdmin/addVillage.vue').default
    },{
        path: '/alpha/updatepassword', component: require('./components/alphaAdmin/updatePassword.vue').default
    },{
        path: '/alpha/viewconstituencies', component: require('./components/alphaAdmin/viewConstituencies.vue').default
    },{
        path: '/alpha/viewcounties', component: require('./components/alphaAdmin/viewCounties.vue').default
    },{
        path: '/alpha/viewsubcounties', component: require('./components/alphaAdmin/viewSubCounties.vue').default
    },{
        path: '/alpha/viewgroups', component: require('./components/alphaAdmin/viewGroups.vue').default
    },{
        path: '/alpha/viewlocations', component: require('./components/alphaAdmin/viewLocations.vue').default
    },{
        path: '/alpha/viewvillages', component: require('./components/alphaAdmin/viewVillages.vue').default
    },
    // ==============================================================================================
    {
        path: '/member', component: require('./components/member/memberDashBoard.vue').default
    },{
        path: '/member/services', component: require('./components/member/memberServices.vue').default
    },{
        path: '/member/joingroup', component: require('./components/member/joinGroup.vue').default
    },


];

const router = new VueRouter({
    mode : 'history',
    routes
});

window.router = router;
// ======================================================================

import VueProgressBar from 'vue-progressbar';

Vue.use(VueProgressBar, {
    color: '#fffee8',
    failedColor: '#000000',
    thickness: '20px',
    transition: {
        speed: '0.1s',
        opacity: '0.9s',
        termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
});

// ======================================================================

import { Form, HasError, AlertError } from 'vform';
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

// ======================================================================

import swal from 'sweetalert';
window.swal = swal;

// ======================================================================

// Vue.filter('telHrefLink', function (text) {
//     let returnText = "<a href=\"{{ service.contact }}\"\\>  </a>
// });

// ======================================================================

const app = new Vue({
    el: '#app',
    router
});
