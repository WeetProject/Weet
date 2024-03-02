<template>
    <div class="scene flex">
        <section class="card">
    <!-- <figure class="card__figure">
      <img class="card__image" src="https://picsum.photos/id/454/200/200" alt="A female hand holding a camera"/>
      <figcaption>
        <span class="visually-hidden">
          Avatar photo
        </span>
      </figcaption>
    </figure> -->
            <div class="login_modal">
                <div class="login_modal_headline">
                    <div class="card__heading">
                        <!-- <span class="visually-hidden">Account name:</span> -->
                        <span>WEET</span>
                    </div>
                    <div>
                        <span>login</span>
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
                    <div>
                        <button class="card__button" type="button">
                            <span>Login</span>
                        </button>
                    </div>    
                </form>
            </div>
        </section>
    </div>

</template>

<script>
export default {
		name: 'TestComponent',
	}
</script>

<style lang="scss">
	@import '../sass/test.scss';
</style>