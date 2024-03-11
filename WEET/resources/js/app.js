require('./bootstrap');

import { createApp } from 'vue';
import router from '../js/router.js';
import AppComponent from '../components/AppComponent.vue';
import TestComponent from '../components/TestComponent.vue';
import MainComponent from '../components/MainComponent.vue';
import HeaderComponent from '../components/HeaderComponent.vue';
import FooterComponent from '../components/FooterComponent.vue';
import AdminComponent from '../components/AdminComponent.vue';

createApp({
	components: {
		AppComponent,
		HeaderComponent,
		FooterComponent,
		MainComponent,
		AdminComponent
	}
})
.use(router)
.mount('#app');