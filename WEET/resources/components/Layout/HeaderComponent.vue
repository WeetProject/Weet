<template>
	<div v-if="!['/admin', '/admin/index'].includes($route.fullPath)">
		<div class="header_container">
			<div class="header_nav">
				<div class="header_nav_logo">
					<a href="/">
						<img src="../../../public/images/WEET_logo.png" alt="">
					</a>
				</div>

				<div class="header_nav_user_btn">
					<button class="header_nav_user_btn_search">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16">
							<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247m2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
						</svg>
					</button>
					<div class="header_nav_login_btn">
						<div class="header_nav_login_btn_user">
							<button @click="toggleModal">login</button>
							<!-- <LoginComponent v-if="showmodal" @closeModal="closemodal" /> -->
							<!-- <a href="/login">login</a> -->
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
										<form class="card__form">
											<div class="card__form_email">
												
												<label for="email">Email</label>
													<input id="email" class="card__input" type="email" v-model="frmUserLoginData.userEmail" />
											</div>
											<div class="card__form_pw">
												
												<label for="password">Password</label>
													<input id="password" class="card__input" type="password" v-model="frmUserLoginData.userPassword" />
											</div>
						

											<div class="card__form_button">
												<div>
													<button class="card__button" type="button" @click="submitUserLoginData">
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
													<button class="card__social_btn_kakao">
														<img src="../../../public/images/Kakao_logo.png" alt="">
													</button>
												</div>
											</form>
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
import LoginComponent from '../User/LoginComponent.vue';
import axios from 'axios';
import Vuex from 'vuex';
import store from '../../js/store.js';

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
			showModal() {
				return this.$store.state.showModal;
			}
		},

		methods: {
        	// toggleModal() {
			// 	// 모달을 열고 닫는 토글 메서드
            // 	// this.showmodal = !this.showmodal;
            // 	this.showmodal = true; // 모달을 열고 닫는 토글 메서드
        	// },
        	// closeModal() {
            // 	this.showmodal = false; // 모달을 닫는 메서드
        	// }
			// 모달 토글 액션을 Store에 커밋
			toggleModal() {
				this.$store.commit('setToggleModal');
				this.showmodal = true;
    		},
			closeModal() {
            	this.$store.commit('setCloseModal'); // 모달을 닫는 메서드
				this.showmodal = false;
        	},

			// 로그인
			submitUserLoginData() {
				this.$store.dispatch('submitUserLoginData', this.frmUserLoginData);
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