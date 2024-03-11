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

createApp({
	components: {
		AppComponent,
		HeaderComponent,
		FooterComponent,
		MainComponent,
		AdminLoginComponent,
		AdminIndexComponent,
	}
})
.use(router)
.mount('#app');