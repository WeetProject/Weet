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


require('./bootstrap');
        import { createApp } from 'vue';
        import AppComponent from '../components/AppComponent.vue';
		import HeaderComponent from '../components/Layout/HeaderComponent.vue';
		import FooterComponent from '../components/Layout/FooterComponent.vue';
        import store from './store.js';
        import router from './router.js';
        

	const app = createApp({
		components: {
			AppComponent,
			HeaderComponent,
			FooterComponent,
		}
	})
	.use(store)
	.use(router)
	app.mount('#app')  //마운트 처리
