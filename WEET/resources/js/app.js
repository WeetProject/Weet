require('./bootstrap');

import { createApp } from 'vue';
import router from '../js/router.js';
import AppComponent from '../components/AppComponent.vue';
import TestComponent from '../components/TestComponent.vue';
import MainComponent from '../components/MainComponent.vue';
import HeaderComponent from '../components/HeaderComponent.vue';

createApp({
	components: {
		AppComponent,
		HeaderComponent,
		MainComponent
	}
})
.use(router)
.mount('#app');