<template>
	<div class="box-border admin_login_container">
		<div class="admin_login_section">
			<div class="admin_login_left_section">
				<div class="admin_login_title_section">
					<img class="admin_login_title_img" src="../../../public/images/WEET_logo.png" alt="">
				</div>
				<div class="admin_login_input_area">
					<svg class="admin_login_input_svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
					</svg>
					<input class="text-base admin_login_input" type="text" name="admin_number" id="admin_number" 
					autocomplete="off" placeholder="Enter your ID" v-model="admin_number">
				</div>
				<div class="admin_login_input_area">
					<svg class="admin_login_input_svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
					</svg>
					<input class="text-base admin_login_input" type="password" name="password" id="password" 
					autocomplete="off" placeholder="Enter your Password" v-model="password">
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
			</div>

			<div class="admin_login_right_section">
				<img class="admin_login_image" src="../../../public/images/Admin_login.jpg" alt="">
			</div>
		</div>
	</div>
</template>
<script>
import axios from 'axios';
export default {
    name: 'AdminLoginComponent',

	data() {
        return {
			admin_number: '',
			password: '',
			error: '',
        }
    },

	methods: {
		adminLogin() {
			const URL = '/admin';
			const adminLoginFormData = new FormData();
			adminLoginFormData.append('admin_number', this.admin_number);
			adminLoginFormData.append('password', this.password);
			
			axios.post(URL, adminLoginFormData)
			.then(response => {
				console.log("response ", response.data)

					// if(response.data.code === "AL00") {
					// 	const loginAdminName = response.data.loginAdminAccountInfo.admin_name;
					// 	const loginAdminFlg = response.data.loginAdminAccountInfo.admin_flg;
					// 	localStorage.setItem('loginAdminName', loginAdminName);
					// 	localStorage.setItem('loginAdminFlg', loginAdminFlg);
					// 	this.$router.push('/admin/index'); 
					// } else {                
					// 	this.error = error.response.data.error;
					// }
				})
				.catch(error => {             
					console.log(error.response);
				});
			
        }
	}
}
</script>
<style lang="scss">
	@import '../../sass/Admin/admin_login.scss';
</style>