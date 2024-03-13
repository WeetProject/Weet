<template>
    <div class="login_container">
        <!-- 로그인모달 -->
					<!-- <div v-if="showmodal" class="modal"> -->
					<div class="modal">
						<div class="modal-content">
							<!-- 모달 내용 -->
							<!-- 로그인 폼 등 -->
							<div class="flex scene" style="width: 350px;">
								<section class="card">
									<div class="login_modal">
										<div class="login_modal_headline">
											<div class="card__heading">
												<!-- <span class="visually-hidden">Account name:</span> -->
												<!-- <span>WEET</span> -->
												<img src="../../../public/images/WEET_logo.png" alt="">
											</div>
										</div>
										<div class="login_modal_text">
											<!-- <div class="login_modal_text_login">
												<p>로그인</p>
											</div> -->
											<div class="login_modal_text_comment">
												<p>한눈에 예매 항공권을 확인하고</p>
												<p>다양한 항공권 가격을 비교해보세요</p>
											</div>	
										</div>
										<form class="card__form">
											<div class="card__form_email">
												<!-- <label for="email" class="visually-hidden">Email:</label> -->
												<label for="email">Email</label>
													<input id="email" class="card__input" type="email" />
											</div>
											<div class="card__form_pw">
												<!-- <label for="password" class="visually-hidden">Password:</label> -->
												<label for="password">Password</label>
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
														<!-- <button>kakao login</button> -->
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
// import Header from '../Layout/HeaderComponent.vue';

export default {
    name: 'LoginComponent',

    // components: {
    //     Header
    // },

    data() {
        return {
            showmodal: false,
        }
	},

	// methods: {
    //     	toggleModal() {
    //         	this.showmodal = !this.showmodal; // 모달을 열고 닫는 토글 메서드
    //     	},
    //     	closeModal() {
    //         	this.showmodal = false; // 모달을 닫는 메서드
    //     	}
    // 	}
}
</script>

<style lang="scss">
	@import '../../sass/User/loginModal.scss';
</style>