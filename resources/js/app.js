require('./bootstrap');

//import vue
import Vue from 'vue';
import App from './App.vue';

import BootstrapVue from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

//import axios for ajax
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';

//import routes
import {routes} from './routes';


Vue.use(VueRouter);
//always need to use all axios modules in single line
Vue.use(VueAxios,axios);
Vue.use(BootstrapVue);

const router = new VueRouter({
	mode : 'history',
	routes : routes,
});

//create app
const app = new Vue({
	el: "#app",
	router: router,
	render: h => h(App),
});
console.log(app);