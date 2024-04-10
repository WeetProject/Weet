<template>
	<div class="box-border admin_login_container">
		<div class="admin_login_section">
			<div class="admin_login_left_section">
				<div class="admin_login_title_section">
					<img class="admin_login_title_img" src="../../../../public/images/WEET_logo.png" alt="">
				</div>
				<div class="admin_login_input_area">
					<svg class="admin_login_input_svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                    </svg>
					<input class="text-base admin_login_input" type="text" 
						name="admin_number" id="admin_number" maxlength="5"
						autocomplete="off" placeholder="사원번호" 
						@input="clearAdminLoginError" @keyup.enter="adminLogin"
						v-model="adminLoginFormData.admin_number">
				</div>
				<div class="admin_login_error_area"></div>
				<div class="admin_login_input_area">
					<svg class="admin_login_input_svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
					</svg>
					<input class="text-base admin_login_input" type="password" 
						name="password" id="password" 
						autocomplete="off" placeholder="비밀번호" 
						@input="clearAdminLoginError" @keyup.enter="adminLogin"
						v-model="adminLoginFormData.password">
				</div>
				<div class="w-full mt-5 text-center admin_login_error_area">
					<span class="font-semibold text-rose-600" v-if="adminError">{{ adminError }}</span>
					<span class="font-semibold text-rose-600" v-if="adminLoginError">{{ adminLoginError }}</span>
				</div>		
				<div class="admin_login_button_area">
					<button class="admin_login_button" type="submit" @click="adminLogin">
						<div class="admin_login_button_text_area">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="admin_login_button_svg">
							<path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9" />
							</svg>
						<span class="text-base font-semibold">Login</span>
						</div>
					</button>
				</div>
				<div class="w-full my-10 text-center admin_login_signup_area">
					<router-link to="/admin/signup" class="font-semibold admin_login_signup_area">admin 등록↗</router-link>
				</div>				
			</div>

			<div class="admin_login_right_section">
				<img class="admin_login_image" src="../../../../public/images/Admin_login.jpg" alt="">
			</div>
		</div>
	</div>
</template>
<script>
export default {
    name: 'AdminLoginComponent',

	data() {
        return {
			adminLoginFormData: {
				admin_number: '',
                password: '',
			},
			adminLoginError: '',
			adminError: this.$store.state.adminError,
        }
    },

	created() {
		this.adminTokenCheck();
	},

	watch: {
		// 에러 출력용
        '$store.state.adminError': {
            handler(adminError) {
                this.adminError = adminError;
            },
            deep: true
        }
    },

	methods: {
		// Admin Token 확인
		adminTokenCheck() {
			if(localStorage.getItem('setAdminToken')) {
				this.$router.push('/admin/dashboard')
			}
		},
		// Admin Login
		adminLogin() {
			const adminLoginFormData = new FormData();
            adminLoginFormData.append('admin_number', this.adminLoginFormData.admin_number);
			adminLoginFormData.append('password', this.adminLoginFormData.password);

			if(!(this.adminLoginFormData.admin_number && this.adminLoginFormData.password)) {
				this.adminLoginError = '사원번호 또는 비밀번호를 입력해주세요.';
				return;
            }

			this.$store.dispatch('adminLogin', this.adminLoginFormData)
        },

		// 에러 초기화
		clearAdminLoginError() {
			this.adminLoginError = '';
		},
	}
}
</script>
<style lang="scss">
	@import '../../../sass/Admin/admin_login.scss';
</style>