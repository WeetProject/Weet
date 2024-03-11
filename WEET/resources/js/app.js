require('./bootstrap');

import { createApp } from 'vue';
import router from '../js/router.js';
import AppComponent from '../components/AppComponent.vue';
import TestComponent from '../components/TestComponent.vue';
import MainComponent from '../components/MainComponent.vue';
import HeaderComponent from '../components/Layout/HeaderComponent.vue';
import FooterComponent from '../components/Layout/FooterComponent.vue';
import AdminLoginComponent from '../components/Admin/AdminLoginComponent.vue';
import AdminIndexComponent from '../components/Admin/AdminIndexComponent.vue';
import AdminComponent from '../components/Admin/AdminComponent.vue';
import RegistComponent from '../components/RegistComponent.vue';

createApp({
	components: {
		AppComponent,
		HeaderComponent,
		FooterComponent,
		MainComponent,
		AdminLoginComponent,
		AdminIndexComponent,
		AdminComponent,
		RegistComponent,
	}
})
.use(router)
.mount('#app');