<template>
    <div v-if="!['/admin', '/admin/index'].includes($route.fullPath)">
        <footer>
            <div class="footer_container">
                <div class="text-center footer_container_text">
                    <div class="footer_container_text_logo">
                        <h1 style="font-weight: bold; font-size: 15px;">
                            WEET
                        </h1>
                    </div>
                    <div class="footer_container_text_personal_info">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check-fill" viewBox="0 0 16 16">
                                <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
                            </svg>
                        </span>
                        <button>
                            <span>개인정보처리방침</span>
                        </button>    
                    </div>
                    <div>
                        <p>제작자 : 여중기 | 최정훈 | 최현희</p>
                    </div>
                    <div>
                        <p>주소 : 대구 중구 중앙대로394 제일빌딩5F</p>
                    </div>
                </div>
                <div class="footer_container_icons">
                    <div class="footer_container_icons_instar">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                            </svg>
                        </span>
                    </div>
                    <div class="footer_container_icons_facebook">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                            </svg>
                        </span>
                    </div>
                    <div class="footer_container_icons_amadeus">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-airplane-engines" viewBox="0 0 16 16">
                                <path d="M8 0c-.787 0-1.292.592-1.572 1.151A4.35 4.35 0 0 0 6 3v3.691l-2 1V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.191l-1.17.585A1.5 1.5 0 0 0 0 10.618V12a.5.5 0 0 0 .582.493l1.631-.272.313.937a.5.5 0 0 0 .948 0l.405-1.214 2.21-.369.375 2.253-1.318 1.318A.5.5 0 0 0 5.5 16h5a.5.5 0 0 0 .354-.854l-1.318-1.318.375-2.253 2.21.369.405 1.214a.5.5 0 0 0 .948 0l.313-.937 1.63.272A.5.5 0 0 0 16 12v-1.382a1.5 1.5 0 0 0-.83-1.342L14 8.691V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v.191l-2-1V3c0-.568-.14-1.271-.428-1.849C9.292.591 8.787 0 8 0M7 3c0-.432.11-.979.322-1.401C7.542 1.159 7.787 1 8 1s.458.158.678.599C8.889 2.02 9 2.569 9 3v4a.5.5 0 0 0 .276.447l5.448 2.724a.5.5 0 0 1 .276.447v.792l-5.418-.903a.5.5 0 0 0-.575.41l-.5 3a.5.5 0 0 0 .14.437l.646.646H6.707l.647-.646a.5.5 0 0 0 .14-.436l-.5-3a.5.5 0 0 0-.576-.411L1 11.41v-.792a.5.5 0 0 1 .276-.447l5.448-2.724A.5.5 0 0 0 7 7z"/>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </footer>

        <div class="header_mobile_nav_container">
            <div class="header_mobile_nav_icon_flight">
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-airplane" viewBox="0 0 16 16">
                        <path d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849m.894.448C7.111 2.02 7 2.569 7 3v4a.5.5 0 0 1-.276.447l-5.448 2.724a.5.5 0 0 0-.276.447v.792l5.418-.903a.5.5 0 0 1 .575.41l.5 3a.5.5 0 0 1-.14.437L6.708 15h2.586l-.647-.646a.5.5 0 0 1-.14-.436l.5-3a.5.5 0 0 1 .576-.411L15 11.41v-.792a.5.5 0 0 0-.276-.447L9.276 7.447A.5.5 0 0 1 9 7V3c0-.432-.11-.979-.322-1.401C8.458 1.159 8.213 1 8 1s-.458.158-.678.599"/>
                    </svg>
                </a>
            </div>
            <div class="header_mobile_nav_icon_hotel">
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                        <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022M6 8.694 1 10.36V15h5zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5z"/>
                        <path d="M2 11h1v1H2zm2 0h1v1H4zm-2 2h1v1H2zm2 0h1v1H4zm4-4h1v1H8zm2 0h1v1h-1zm-2 2h1v1H8zm2 0h1v1h-1zm2-2h1v1h-1zm0 2h1v1h-1zM8 7h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zM8 5h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zm0-2h1v1h-1z"/>
                    </svg>
                </a>    
            </div>
            <div class="header_mobile_nav_icon_home">
                <a href="/">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                    </svg>
                </a>
            </div>
            <div class="header_mobile_nav_icon_trip">
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-suitcase-lg" viewBox="0 0 16 16">
                        <path d="M5 2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2h3.5A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5H14a.5.5 0 0 1-1 0H3a.5.5 0 0 1-1 0h-.5A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2zm1 0h4a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1M1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5H3V3zM15 12.5v-9a.5.5 0 0 0-.5-.5H13v10h1.5a.5.5 0 0 0 .5-.5m-3 .5V3H4v10z"/>
                    </svg>
                </a>
            </div>
            <div class="header_mobile_nav_icon_user">
                <!-- <a href="/login"> -->
                    <button @click="toggleModal">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                    </button>
                <!-- </a> -->
            </div>
        </div>
        <!-- 로그인 모달 -->
			<!-- <LoginComponent v-if="showmodal" @click="closeModal" /> -->
            <!-- <LoginComponent /> -->
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
												
												<label for="email">Email:</label>
													<input id="email" class="card__input" type="email" />
											</div>
											<div class="card__form_pw">
												
												<label for="password">Password:</label>
													<input id="password" class="card__input" type="password" />
											</div>
						

											<div class="card__form_button">
												<div>
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
													<button class="card__social_btn_kakao">
														<img src="../../../public/images/Kakao_logo.png" alt="">
													</button>
												</div>
											</form>
										</div>
									</section>
								</div>
								<div>
									<button @click="showmodal = false">Close</button>
								</div>
							</div>
						</div>
    </div>
</template>

<script>
import LoginComponent from '../User/LoginComponent.vue';
import axios from 'axios'
import Vuex from 'vuex';
import store from '../../js/store.js';

export default {
    name: 'FooterComponent',

    // components: {
	// 		LoginComponent,
	// 	},

        data() {
            return {
                showmodal: false,
            }
	    },

    methods: {
        // adjustFooterPosition() {
        //     const footer = document.getElementById('footer');
        //     const windowHeight = window.innerHeight;
        //     const bodyHeight = document.body.offsetHeight;

        //     if (windowHeight > bodyHeight) {
        //         footer.style.position = 'fixed';
        //         footer.style.bottom = '0';
        //     } else {
        //         footer.style.position = 'absolute';
        //         footer.style.bottom = 'auto';
        //     }
        // }
        // toggleModal() {
		// 		// 모달을 열고 닫는 토글 메서드
        //     	// this.showmodal = !this.showmodal;
        //     	this.showmodal = true; // 모달을 열고 닫는 토글 메서드
        // 	},
        // closeModal() {
        //     	this.showmodal = false; // 모달을 닫는 메서드
        // 	}
        toggleModal() {
			this.$store.commit('setToggleModal');
            this.showmodal = true;
    	},
        closeModal() {
            this.$store.commit('setCloseModal'); // 모달을 닫는 메서드
            this.showmodal = false;
        },
    },
    
    // mounted() {
    //     // 페이지 로드 및 창 크기 변경 시 푸터 위치 조정
    //     window.addEventListener('load', this.adjustFooterPosition);
    //     window.addEventListener('resize', this.adjustFooterPosition);
    // }
};
</script>

<style lang="scss">
	@import '../../sass/Layout/footer.scss';
</style>