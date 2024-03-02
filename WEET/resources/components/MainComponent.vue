<template>
  	<div>
		<div>
			<button @click="showmodal = true">login</button>
		</div>

		<!-- 로그인모달 -->
		<div v-if="showmodal" class="modal">
			<div class="modal-content">
				<!-- 모달 내용 -->
				<!-- 로그인 폼 등 -->
				<div class="scene flex">
					<section class="card">
						<div class="login_modal">
							<div class="login_modal_headline">
								<div class="card__heading">
									<!-- <span class="visually-hidden">Account name:</span> -->
									<span>WEET</span>
								</div>
							</div>
							<div class="login_modal_text">
								<p>한눈에 예매 항공권을 확인하고</p>
								<p>실시간으로 항공권 가격을 비교해보세요</p>
							</div>
							<form class="card__form">
								<div class="card__form_email">
									<!-- <label for="email" class="visually-hidden">Email:</label> -->
									<label for="email">Email:</label>
										<input id="email" class="card__input" type="email" />
								</div>
								<div class="card__form_pw">
									<!-- <label for="password" class="visually-hidden">Password:</label> -->
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
											<span>Sign Up</span>
										</button>
									</div>
								</div>

								<div class="card__kakao_btn">
									<div>
										<button>kakao login</button>
									</div>
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

<script >
import axios from 'axios';

export default {
	name: 'MainComponent',

	data() {
		return {
			showmodal: false,
		}
	}
}
</script>

<style>

</style>