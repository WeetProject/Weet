<template>
    <div class="box-border admin_signup_container">
		<div class="admin_signup_section">
			<div class="admin_signup_left_section">
				<div class="admin_signup_title_section">
					<img class="admin_signup_title_img" src="../../../../public/images/WEET_logo.png" alt="">
				</div>
				<div class="admin_signup_input_area">
					<svg class="admin_signup_input_svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                    </svg>
					<input class="text-base admin_signup_input" type="text"
                        name="admin_number" id="admin_number" maxlength="5"
                        autocomplete="off" placeholder="사원번호" 
                        @input="handleAdminNumberInput" @keyup.enter="adminSignUp"
						v-model="adminSignupFormData.admin_number">
				</div>
                <div class="text-center admin_signup_validation_error_area">
                    <span class="text-xs font-semibold text-rose-600">{{ adminValidationError.adminValidationErrorAdminNumber }}</span>
                </div>
				<div class="admin_signup_input_area">
					<svg class="admin_signup_input_svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
					</svg>
					<input class="text-base admin_signup_input" type="password" 
                        name="password" id="password" 
                        autocomplete="off" placeholder="비밀번호"
                        @input="handleAdminPasswordInput" @keyup.enter="adminSignUp"
						v-model="adminSignupFormData.password">
				</div>
                <div class="text-center admin_signup_validation_error_area">
                    <span class="text-xs font-semibold text-rose-600">{{ adminValidationError.adminValidationErrorPassword }}</span>
                </div>
                <div class="admin_signup_input_area">
					<svg class="admin_signup_input_svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
					</svg>
					<input class="text-base admin_signup_input" type="password" 
                        name="password_confirm" id="password_confirm" 
                        autocomplete="off" placeholder="비밀번호 확인" 
                        @input="handleAdminPasswordConfirmInput" @keyup.enter="adminSignUp"
						v-model="adminSignupFormData.password_confirm">
				</div>
                <div class="text-center admin_signup_validation_error_area">
                    <span class="text-xs font-semibold text-rose-600">{{ adminValidationError.adminValidationErrorPasswordConfirm }}</span>
                </div>
                <div class="admin_signup_input_area">
					<svg class="admin_signup_input_svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
					<input class="text-base admin_signup_input" type="text" 
                        name="admin_name" id="admin_name" 
                        autocomplete="off" placeholder="이름"
                        @input="handleAdminNameInput" @keyup.enter="adminSignUp"
						v-model="adminSignupFormData.admin_name">
				</div>
                <div class="text-center admin_signup_validation_error_area">
                    <span class="text-xs font-semibold text-rose-600">{{ adminValidationError.adminValidationErrorAdminName }}</span>
                </div>
				<div class="w-full mt-5 text-center admin_signup_error_area">
					<span class="text-xs font-semibold text-rose-600">{{ adminSignUpError }}</span>
				</div>
				<div class="admin_signup_button_area">
					<div class="mx-5 admin_signup_signup_button">
						<button class="admin_signup_button" type="submit" @click="adminSignUp">
							<div class="admin_signup_button_text_area">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="admin_signup_svg">
									<path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9" />
								</svg>
								<span class="text-base font-semibold">Sign Up</span>
							</div>
						</button>
					</div>
                    <div class="mx-5 admin_signup_cancel_button">
						<router-link to="/admin" class="flex w-full text-base font-semibold">				
							<button class="admin_cancel_button" type="button">
								<div class="admin_cancel_button_text_area">								
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="admin_signup_svg">
										<path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
									</svg>
									Cancel								
								</div>
							</button>	
						</router-link>					
                    </div>
				</div>
			</div>

			<div class="admin_signup_right_section">
				<img class="admin_signup_image" src="../../../../public/images/Admin_login.jpg" alt="">
			</div>
		</div>
	</div>
    
</template>
<script>
import axios from 'axios';
export default {
    name: 'AdminSignUpComponent',
    props: {

    },
    
    components: {

    },

    data() {
        return {
            // Admin 회원가입 데이터
            adminSignupFormData: {
                admin_number: '',
                password: '',
                password_confirm: '',
                admin_name: '',
            },
            // 실시간 유효성 검사 에러 출력용
            adminValidationError: {
                adminValidationErrorAdminNumber: '',
                adminValidationErrorPassword: '',
                adminValidationErrorPasswordConfirm: '',
                adminValidationErrorAdminName: '',
            },
            adminSignUpError: '', // Admin 회원가입 에러 출력용
			adminSuccess: '', // Admin 회원가입 성공 출력용
        }
    },

    created() {},

    mounted() {},

    methods: {
        adminSignUp() {
            if(!(this.adminSignupFormData.admin_number && this.adminSignupFormData.password
                && this.adminSignupFormData.password_confirm && this.adminSignupFormData.admin_name)) {
				this.adminSignUpError = '입력사항을 모두 입력해주세요.';
				return;
            } 
			const URL = '/admin/signup';
			const adminSignupFormData = new FormData();
			adminSignupFormData.append('admin_number', this.adminSignupFormData.admin_number);
			adminSignupFormData.append('password', this.adminSignupFormData.password);
			adminSignupFormData.append('password_confirm', this.adminSignupFormData.password_confirm);
			adminSignupFormData.append('admin_name', this.adminSignupFormData.admin_name);
			
			axios.post(URL, adminSignupFormData)
				.then(response => {
					if(response.data.code === "ASU00") {
						this.adminSuccess = response.data.success;
                        alert(this.adminSuccess);
						this.$router.push('/admin'); 
					} else {                
						this.adminSignUpError = error.response.data.error;
					}
				})
				.catch(error => {
					this.adminSignUpError = error.response.data.error;
				});			
        },

		// ### 유효성검사 핸들러(유효성 검사 및 에러 초기화) ###
		// 사번
        handleAdminNumberInput() {
			this.validationAdminNumber();
			if (!this.adminSignupFormData.admin_number) {
				this.clearValidationError('adminValidationErrorAdminNumber');
			}
			this.adminSignUpError = '';
        },
		// 비밀번호
        handleAdminPasswordInput() {
            this.validationAdminPassword();
			if (!this.adminSignupFormData.password) {
				this.clearValidationError('adminValidationErrorPassword');
			}
			this.adminSignUpError = '';
        },
		// 비밀번호 일치 여부
        handleAdminPasswordConfirmInput() {
            this.validationAdminPasswordConfirm();
			if (!this.adminSignupFormData.password_confirm) {
				this.clearValidationError('adminValidationErrorPasswordConfirm');
			}
			this.adminSignUpError = '';
        },
		// 이름
        handleAdminNameInput() {
            this.validationAdminName();
			if (!this.adminSignupFormData.admin_name) {
				this.clearValidationError('adminValidationErrorAdminName');
			}
			this.adminSignUpError = '';
        },

		// ### 유효성 검사 ###
		// 사번
		validationAdminNumber()  {
			if (!this.adminSignupFormData.admin_number.match(/^1\d{4}$/)) {
				this.adminValidationError.adminValidationErrorAdminNumber = '숫자만 입력해주세요.';
			} else {
				this.adminValidationError.adminValidationErrorAdminNumber = '';
			}
		},
		// 비밀번호
		validationAdminPassword()  {
			if (!this.adminSignupFormData.password.match(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/)) {
				this.adminValidationError.adminValidationErrorPassword = '보안이 취약합니다. 영문과 숫자, 특수문자를 포함해주세요';
			} else {
				this.adminValidationError.adminValidationErrorPassword = '';
			}
		},
		// 비밀번호 일치 여부
		validationAdminPasswordConfirm() {
			if(this.adminSignupFormData.password_confirm !== this.adminSignupFormData.password) {
				this.adminValidationError.adminValidationErrorPasswordConfirm = '비밀번호와 비밀번호 확인이 일치하지 않습니다';
			} else {
				this.adminValidationError.adminValidationErrorPasswordConfirm = '';
			}
		},
		// 이름
        validationAdminName() {
			if(!this.adminSignupFormData.admin_name.match(/^[가-힣]{1,50}$/)) {
				this.adminValidationError.adminValidationErrorAdminName = '한글만 입력해주세요.';
			} else {
                this.adminValidationError.adminValidationErrorAdminName = '';
            }
		},

        // 유효성 검사 에러 초기화
        clearValidationError(inputName) {
			this.adminValidationError[inputName] = '';
        },
    }
}
</script>
<style lang="scss">
	@import '../../../sass/Admin/admin_signup.scss';
</style>