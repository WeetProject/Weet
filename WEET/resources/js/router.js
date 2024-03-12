import { createWebHistory, createRouter } from 'vue-router';
import AppComponent from '../components/AppComponent.vue';
import MainComponent from '../components/MainComponent.vue';
import TestComponent from '../components/TestComponent.vue';
import MypageComponent from '../components/User/MypageComponent.vue';
import ReservationComponent from '../components/Reservation/ReservationComponent.vue';
import SignUpComponent from '../components/User/SignUpComponent.vue';
import AdminLoginComponent from '../components/Admin/AdminLoginComponent.vue';
import AdminIndexComponent from '../components/Admin/AdminIndexComponent.vue';
// import LoginComponent from '../components/User/LoginComponent.vue';

const routes = [
	{
		path: '/',
		component: MainComponent
	},
	{
		path: '/test',
		component: TestComponent
	},
	{
		path: '/mypage',
		component: MypageComponent
	},
	{
		path: '/reservation',
		component: ReservationComponent
	},
	{
		path: '/admin',
		component: AdminLoginComponent
	},
	{
		path: '/admin/index',
		component: AdminIndexComponent
	},
	{
		path: '/signup',
		component: SignUpComponent
	},
	
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;