import { createWebHistory, createRouter } from 'vue-router';
import AppComponent from '../components/AppComponent.vue';
import MainComponent from '../components/MainComponent.vue';
import TestComponent from '../components/TestComponent.vue';
import MypageComponent from '../components/User/MypageComponent.vue';
import ReservationComponent from '../components/Reservation/ReservationComponent.vue';
import HotelComponent from '../components/Reservation/HotelComponent.vue';
import SignUpComponent from '../components/User/SignUpComponent.vue';
import LoginComponent from '../components/User/LoginComponent.vue';

// ### Admin ###
// Admin Layout
import AdminComponent from '../components/Admin/AdminComponent.vue';
// Admin Login
import AdminLoginComponent from '../components/Admin/AdminAuth/AdminLoginComponent.vue';
// Admin Sign Up
import AdminSignUpComponent from '../components/Admin/AdminAuth/AdminSignUpComponent.vue';
// Admin Index
import AdminIndexComponent from '../components/Admin/AdminDashboard/AdminIndexComponent.vue';
// Admin User Management
import AdminUserManagementComponent from '../components/Admin/UserManagement/AdminUserManagementComponent.vue';
// Admin Management
import AdminManagementComponent from '../components/Admin/AdminManagement/AdminManagementComponent.vue';
// Admin Registration
import AdminRegistrationComponent from '../components/Admin/AdminRegistration/AdminRegistrationComponent.vue';

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
		path: '/reservation/air',
		component: ReservationComponent
	},	
	{
		path: '/reservation/hotel',
		component: HotelComponent
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
		path: '/admin/signup',
		name: 'Admin Signup',
		component: AdminSignUpComponent,
		meta: {
			title: '회원가입',
		}
	},
	{
		path: '/admin',
		name: 'Admin',
		component: AdminLoginComponent,
		meta: {
			title: 'Admin'
		},
	},
	{
		path: '/admin/dashboard',
		component: AdminComponent,
		meta: {
            title: 'Admin Dashboard',
        },
		children: [
			{
				path: '',
				component: AdminIndexComponent,
				meta: {
					title: 'Admin Dashboard',	
				}
			},
			{
				path: 'user/management',
				component: AdminUserManagementComponent,
				meta: {
					title: 'Admin 이용자 관리',
				}
			},
			{
				path: 'management',
				component: AdminManagementComponent,
				meta: {
					title: 'Admin 계정 관리',
				}
			},
			{
				path: 'registration',
				component: AdminRegistrationComponent,
				meta: {
					title: 'Admin 가입 승인',
				}
			},	
		]
	}
];

const router = createRouter({
	history: createWebHistory(),
	routes,
	// 캐시 미사용 처리
	scrollBehavior() {
		return { x: 0, y: 0 };
	}
});

router.beforeEach((to, from, next) => {
	// // admin Token 확인
	// const adminToken = localStorage.getItem('setAdminToken');
	// // user Token 확인
	// const userToken = localStorage.getItem('setToken');

	// if (to.path === '/admin') {
    //     if (adminToken) {
    //         // admin Token 존재 시, /admin 이동 불가 처리
    //         next('/admin/dashboard');
    //     } else {
    //         next();
    //     }
    // } 
	// if (to.path === '/') {
	// 	if (userToken) {
	// 		next('/');
	// 	} else {
	// 		next();
	// 	}
	// }
	// else {
    //     if (!adminToken) {
    //         // admin Token 미존재 시, /admin 페이지 이동
    //         next('/admin');
    //     } else {
    //         next();
    //     }
    // }

	// 수정중
	// admin Token 확인
	// const adminToken = localStorage.getItem('setAdminToken');
	// // user Token 확인
	// const userToken = localStorage.getItem('setToken');

	// if (to.path.startsWith('/admin')) {
	// 	if (!adminToken) {
	// 		next('/admin');
	// 	} 
	// 	next();
	// }
	if (to.path === '/admin') {

		const adminToken = localStorage.getItem('setAdminToken');
		
		if (adminToken) {
			next('/admin/dashboard');
		} else if (!adminToken) {
			next('/admin');
		}
		next();
	}
	else if (to.path === '/') {
		next();
	}
	else {
        next(); // 다른 경로로 이동하는 경우 그대로 진행
    }

	document.title = to.meta.title || '기본 타이틀';
});


export default router;