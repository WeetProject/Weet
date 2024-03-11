import { createWebHistory, createRouter } from 'vue-router';
import AppComponent from '../components/AppComponent.vue';
import MainComponent from '../components/MainComponent.vue';
import TestComponent from '../components/TestComponent.vue';
import MypageComponent from '../components/MypageComponent.vue';
import ReservationComponent from '../components/Reservation/ReservationComponent.vue';
import AdminComponent from '../components/Admin/AdminComponent.vue';
import RegistComponent from '../components/RegistComponent.vue';
import AdminLoginComponent from '../components/Admin/AdminLoginComponent.vue';
import AdminIndexComponent from '../components/Admin/AdminIndexComponent.vue';

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
		path: '/regist',
		component: RegistComponent
	},
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;