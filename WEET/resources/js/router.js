import { createWebHistory, createRouter } from 'vue-router';
import AppComponent from '../components/AppComponent.vue';
import MainComponent from '../components/MainComponent.vue';
import TestComponent from '../components/TestComponent.vue';
import MypageComponent from '../components/User/MypageComponent.vue';
import ReservationComponent from '../components/Reservation/ReservationComponent.vue';
import SignUpComponent from '../components/User/SignUpComponent.vue';
import LoginComponent from '../components/User/LoginComponent.vue';

// Admin
import AdminLoginComponent from '../components/Admin/AdminLoginComponent.vue';
import AdminSignUpComponent from '../components/Admin/AdminSignUpComponent.vue';
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
		path: '/admin/signup',
		component: AdminSignUpComponent
	},
	{
		path: '/admin/index',
		component: AdminIndexComponent,
		beforeEnter: (to, from, next) => {
            if (!localStorage.getItem('token')) {
                next('/admin');
            } else {
                next();
            }
        },
	},
	{
		path: '/signup',
		component: SignUpComponent
	},
	{
		path: '/login',
		component: LoginComponent
	},
	
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;