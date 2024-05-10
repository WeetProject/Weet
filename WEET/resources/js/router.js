import { createWebHistory, createRouter } from 'vue-router';
import AppComponent from '../components/AppComponent.vue';
import MainComponent from '../components/MainComponent.vue';
import TestComponent from '../components/TestComponent.vue';
import MypageComponent from '../components/User/MypageComponent.vue';
import ReservationComponent from '../components/Reservation/ReservationComponent.vue';
import SearchComponent from '../components/search/SearchComponent.vue';
import SignUpComponent from '../components/User/SignUpComponent.vue';
import kakaoLoginComponent from '../components/User/kakaoLoginComponent.vue';
import GoogleLoginComponent from '../components/User/GoogleLoginComponent.vue';
import EmailVerificationComponent from '../components/User/EmailVerificationComponent.vue';

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

// 로그인 되있는지 확인
function requireAuth(to, from, next) {
	if (!localStorage.getItem('setToken') && !localStorage.getItem('setKakaoToken') && !localStorage.getItem('setGoogleToken')) {
		next('/');
	} else {
		next();
	}
}
const routes = [
	{
		path: '/',
		component: MainComponent
	},
	{
		path: '/main',
		component: MainComponent
	},
	{
		path: '/test',
		component: TestComponent
	},
	{
		path: '/mypage',
		component: MypageComponent,
		beforeEnter: requireAuth,
	},
	{
		path: '/reservation',
		component: ReservationComponent,
		beforeEnter: requireAuth,
	},
	{
		path: '/search',
		component: SearchComponent,
	},
	{
		path: '/signup',
		component: SignUpComponent
	},
	{
		path: '/kakaoLogin',
		component: kakaoLoginComponent
	},
	{
		path: '/googleLogin',
		component: GoogleLoginComponent
	},
	{
		path: '/sendEmail',
		component: EmailVerificationComponent
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
	next();

	document.title = to.meta.title || '기본 타이틀';
});


export default router;