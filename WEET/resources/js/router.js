import { createWebHistory, createRouter } from 'vue-router';
import AppComponent from '../components/AppComponent.vue';
import MainComponent from '../components/MainComponent.vue';
import TestComponent from '../components/TestComponent.vue';
import MypageComponent from '../components/MypageComponent.vue';
import ReservationComponent from '../components/ReservationComponent.vue';
import AdminComponent from '../components/Admin/AdminComponent.vue';

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
		component: AdminComponent
	},
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;