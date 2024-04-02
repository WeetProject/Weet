import { createWebHistory, createRouter } from 'vue-router';
import AppComponent from '../components/AppComponent.vue';
import MainComponent from '../components/MainComponent.vue';
import TestComponent from '../components/TestComponent.vue';
import MypageComponent from '../components/User/MypageComponent.vue';
import ReservationComponent from '../components/Reservation/ReservationComponent.vue';
import SignUpComponent from '../components/User/SignUpComponent.vue';
import LoginComponent from '../components/User/LoginComponent.vue';

// ### Admin ###
// Admin Login
import AdminLoginComponent from '../components/Admin/AdminLoginComponent.vue';
// Admin Sign Up
import AdminSignUpComponent from '../components/Admin/AdminSignUpComponent.vue';
// Admin Index
import AdminIndexComponent from '../components/Admin/AdminIndexComponent.vue';
// Admin User Management
import AdminUserManagementComponent from '../components/Admin/AdminUserManagementComponent.vue';
// Admin Management
import AdminManagementComponent from '../components/Admin/AdminManagementComponent.vue';
// Admin Registration
import AdminRegistrationComponent from '../components/Admin/AdminRegistrationComponent.vue';

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
		path: '/signup',
		component: SignUpComponent
	},
	{
		path: '/login',
		component: LoginComponent
	},
	// Admin
	{
		path: '/admin',
		name: 'Admin',
		component: AdminLoginComponent,
		meta: {
			title: 'Admin'
		},
		beforeEnter: (to, from, next) => {
			const token = localStorage.getItem('token');
			if (token) {
				next('/admin/index');
			} else {
				next();
			}
		},
	},
	{
		path: '/admin/signup',
		name: 'Admin Signup',
		component: AdminSignUpComponent,
		meta: {
			title: '회원가입',
			requireAuth: true
		}
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
		meta: {
			title: 'Admin',
			requireAuth: true
		}
	},
	{
		path: '/admin/user/management',
		name: 'Admin User Management',
		component: AdminUserManagementComponent,
		beforeEnter: (to, from, next) => {
            if (!localStorage.getItem('token')) {
                next('/admin');
            } else {
                next();
            }
        },
		meta: {
			title: 'User 계정관리',
			requireAuth: true
		}
	},
	{
		path: '/admin/management',
		name: 'Admin Management',
		component: AdminManagementComponent,
		beforeEnter: (to, from, next) => {
            if (!localStorage.getItem('token')) {
                next('/admin');
            } else {
                next();
            }
        },
		meta: {
			title: 'Admin 계정관리',
			requireAuth: true
		}
	},
	{
		path: '/admin/registration',
		name: 'Admin Registration',
		component: AdminRegistrationComponent,
		beforeEnter: (to, from, next) => {
            if (!localStorage.getItem('token')) {
                next('/admin');
            } else {
                next();
            }
        },
		meta: {
			title: 'Admin 가입승인',
			requireAuth: true
		}
	}
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

router.beforeEach((to, from, next) => {
	// 로그인 여부 확인	
	const token = localStorage.getItem('token');

	// requireAuth 확인
	if (to.matched.some(record=>record.meta.requireAuth) && !token) {
		next('/admin')		
	}
	document.title = to.meta.title || '기본 타이틀';
	next();
});


export default router;