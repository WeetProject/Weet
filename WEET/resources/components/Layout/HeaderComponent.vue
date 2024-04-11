<template>
	<div v-show="!$route.path.startsWith('/admin')">
		<div class="header_container">
			<div class="header_nav">
				<div class="header_nav_logo">
					<a href="/">
						<img src="../../../public/images/WEET_logo.png" alt="">
					</a>
				</div>

				<div class="header_nav_user_btn">
					<button class="header_nav_user_btn_search">
						<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16">
							<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247m2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
						</svg>
					</button>
					<div class="header_nav_login_btn">
						<div v-if="!$store.state.token" class="header_nav_login_btn_user">
							
							<button @click="toggleModal">login</button>
							<!-- <LoginComponent v-if="showmodal" @closeModal="closemodal" /> -->
							<!-- <a href="/login">login</a> -->
						</div>
						<div v-if="$store.state.token" class="header_nav_login_btn_user">
							<div style="margin: 5px 10px 0 0;">
								<button>
									<a href="/mypage">
										<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
											<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
											<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
										</svg>
									</a>
								</button>
							</div>
							<div style="margin-top: 3px;">
								<button @click="logout">logout</button>
							</div>
						</div>

					<!-- 로그인모달 -->
					<div v-if="showmodal" class="modal">
						<div class="modal-content">
							<div class="flex scene" style="width: 300px;">
								<section class="card">
									<div class="login_modal">
										<div class="login_modal_headline">
											<div class="card__heading">
												
												<img src="../../../public/images/WEET_logo.png" alt="">
											</div>
										</div>
										<div class="login_modal_text">
											
											<div class="login_modal_text_comment">
												<p>한눈에 예매 항공권을 확인하고</p>
												<p>다양한 항공권 가격을 비교해보세요</p>
											</div>	
										</div>
										<div class="card__form">
											<div class="card__form_email">
												
												<label for="email">Email</label>
													<input id="email" class="card__input" type="email" v-model="frmUserLoginData.userEmail" @keyup.enter="submitUserLoginData" />
											</div>
											<div class="card__form_pw">
												
												<label for="password">Password</label>
													<input id="password" class="card__input" type="password" v-model="frmUserLoginData.userPassword" @keyup.enter="submitUserLoginData" />
											</div>
						

											<div class="card__form_button">
												<div @click="submitUserLoginData">
													<button class="card__button" type="button">
														<span>Login</span>
													</button>
												</div>  
												<div>
													<button class="card__button" type="button">
														<span><a href="/signup">Sign Up</a></span>
													</button>
												</div>
											</div>
										<hr>
											<div class="card__social_login_text">
												<p>- Social Login -</p>
											</div>

												<div class="card__social_btn">
													<button class="card__social_btn_google">
														<img src="../../../public/images/Google_logo.svg.png" alt="">
													</button>
													<button @click="loginKakao" class="card__social_btn_kakao">
														<img src="../../../public/images/Kakao_logo.png" alt="">
													</button>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div>
									<button @click="closeModal">Close</button>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
				
		</div>
		<!-- 로그인 모달 -->
			<!-- <LoginComponent v-if="showmodal" @click="closeModal" /> -->
		<!-- <LoginComponent /> -->
	</div>
</template>

<script>
// import LoginComponent from '../User/LoginComponent.vue';
import axios from 'axios';
import Vuex from 'vuex';
import store from '../../js/store.js';
// import jwtDecode from 'vue-jwt-decode';

    export default {
        name: 'HeaderComponent',

		// components: {
		// 	LoginComponent,
		// },

        data() {
            return {
                showmodal: false,
				frmUserLoginData: {
                	userEmail: '',
                	userPassword: '',
            	},
            }
	    },

		computed: {
			
		},

		// 로컬스토리지에 유저정보 저장
		// created() : Vue애플리케이션이 생성된 후 컴포넌트가 생성되고 
		// DOM이 렌더링되기 직전에 호출되는 시점
		created() {
        	this.loadUserLoginStatus();
    	},

		mounted() {
			// this.loadUserLoginStatus();
		},

		methods: {

			// 모달 토글 액션을 Store에 커밋
			toggleModal() {
				this.$store.commit('setToggleModal');
				this.showmodal = true;
				// if (!this.$store.state.userLoginChk) {
				// 	this.$store.commit('setToggleModal');
				// 	this.showmodal = true;
				// } else {
				// 	this.closeModal();
				// }
    		},
			closeModal() {
            	this.$store.commit('setCloseModal'); // 모달을 닫는 메서드
				this.showmodal = false;
        	},

			// 로그인
			submitUserLoginData() {
				console.log("로그인정보");
				this.$store.dispatch('submitUserLoginData', this.frmUserLoginData);
				// this.$router.push('/');
				this.showmodal = false;
			},

			// 로그아웃
			logout() {
				this.$store.dispatch('logout');
				localStorage.clear();
        	},

			// 로컬스토리지에 있는 유저 정보를 저장하기 위한 함수.
			loadUserLoginStatus() {
				const userLoginChk = localStorage.getItem('setUserLoginChk');
				const userID = localStorage.getItem('setUserID');
				const token = localStorage.getItem('setToken');

				if (userLoginChk !== null) {
					this.$store.commit('setUserLoginChk', userLoginChk);
					this.$store.commit('setUserID', userID);
					this.$store.commit('setToken', token);
				}
        	},

			loginKakao() {
				// axios.get('/login/kakao') // 서버의 소셜 로그인 처리 API 엔드포인트
				// .then(response => {
				// 	// 요청이 성공적으로 처리될 때의 동작
				// 	console.log(response.data);
				// })
				// .catch(error => {
				// 	// 요청이 실패했을 때의 동작
				// 	console.error(error);
				// });
				location.href='/login/kakao?before_url=' + window.location.pathname;
			},
    	},
		// mounted() {
		// 	this.toggleModal();
		// 	this.closeModal();
    	// },
    }
</script>

<style lang="scss">
	@import '../../sass/Layout/header.scss';
</style>