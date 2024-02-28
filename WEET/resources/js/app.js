require('./bootstrap');

import { createApp } from 'vue';
import router from '../js/router.js';
import AppComponent from '../components/AppComponent.vue';
import TestComponent from '../components/TestComponent.vue';

createApp({
	components: {
		AppComponent,
	}
})
.use(router)
.mount('#app');