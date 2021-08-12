require('./bootstrap');


window.Vue = require('vue');

Vue.component('example-component', require('./views/app.vue').default);

//const app = new Vue({
//	el:'#app',
	
//});