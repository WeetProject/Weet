// require('./bootstrap');

// import { createApp } from 'vue';
// import store from './store';
// import router from '../js/router.js';
// import AppComponent from '../components/AppComponent.vue';
// import MainComponent from '../components/MainComponent.vue';
// import HeaderComponent from '../components/Layout/HeaderComponent.vue';
// import FooterComponent from '../components/Layout/FooterComponent.vue';
// import AdminLoginComponent from '../components/Admin/AdminLoginComponent.vue';
// import AdminIndexComponent from '../components/Admin/AdminIndexComponent.vue';
// import SignUpComponent from '../components/User/SignUpComponent.vue';

// createApp({
	
// 	components: {
// 		AppComponent,
// 		// HeaderComponent,
// 		// FooterComponent,
// 		// MainComponent,
// 		// AdminLoginComponent,
// 		// AdminIndexComponent,
// 		// SignUpComponent,
// 	}
// })
// .use(router)
// .mount('#app');


import { createApp } from 'vue';
import AppComponent from '../components/AppComponent.vue';
import HeaderComponent from '../components/Layout/HeaderComponent.vue';
import FooterComponent from '../components/Layout/FooterComponent.vue';
import store from './store.js';
import router from './router.js';


// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
	components,
	directives,
})
const app = createApp({
	components: {
		AppComponent,
		HeaderComponent,
		FooterComponent,
	}
});

app
.use(store)
.use(router)
.use(vuetify)
.mount('#app'); // 마운트 처리