<template>
    <div class="mypage_container">
        <div class="mypage_box1">
            <div class="mypage_mention">
                <p class="mypage_mention_1">안녕하세요 <span>oo</span>님!</p>
                <p class="mypage_mention_2">이메일주소</p>
            </div>
            <div class="mypage_menu">
                <div class="mypage_menu_button">
                    <div class="mypage_menu_button_content">여행객아이콘</div>
                    <div class="mypage_menu_button_content">상세개인정보</div>
                    <div class="mypage_menu_button_content_btn">▷</div>
                </div>
                <div class="mypage_menu_button">
                    <div class="mypage_menu_button_content">예매아이콘</div>
                    <div class="mypage_menu_button_content">예매내역</div>
                    <div class="mypage_menu_button_content_btn">▷</div>
                </div>
                <div class="mypage_menu_button">
                    <div class="mypage_menu_button_content">종아이콘</div>
                    <div class="mypage_menu_button_content">가격변동알림</div>
                    <div class="mypage_menu_button_content_btn">▷</div>
                </div>
                <div class="mypage_menu_button">
                    <div class="mypage_menu_button_content">사람아이콘</div>
                    <div class="mypage_menu_button_content">계정</div>
                    <div class="mypage_menu_button_content_btn">▷</div>
                </div>
            </div>
        </div>
        <div class="mypage_box2">
            <div class="mypage_menu_detail">
                <h1>상세 개인 정보</h1>
                <div class="mypage_menu_detail_input">
                    <p class="mypage_menu_detail_input_title">이름</p>
                    <p class="mypage_menu_detail_input_title">*</p>
                    <div class="mypage_menu_detail_input_cont">
                        <input type="text">
                    </div>
                </div>
                <div class="mypage_menu_detail_input">
                    <p class="mypage_menu_detail_input_title">성</p>
                    <p class="mypage_menu_detail_input_title">*</p>
                    <div class="mypage_menu_detail_input_cont">
                        <input type="text">
                    </div>
                </div>
                <div class="mypage_menu_detail_input">
                    <p class="mypage_menu_detail_input_title">성별</p>
                    <!-- <p class="mypage_menu_detail_input_title">*</p> -->
                    <div class="mypage_menu_detail_input_cont">
                        <select type="text"></select>
                    </div>
                </div>
                <div class="mypage_menu_detail_input">
                    <p class="mypage_menu_detail_input_title">국가</p>
                    <!-- <p class="mypage_menu_detail_input_title">*</p> -->
                    <div class="mypage_menu_detail_input_cont">
                        <select type="text"></select>
                    </div>
                </div>
                <div class="mypage_menu_detail_input">
                    <p class="mypage_menu_detail_input_title">생년월일</p>
                    <!-- <p class="mypage_menu_detail_input_title">*</p> -->
                    <div class="mypage_menu_detail_input_cont">
                        <input type="text" placeholder="YYYY.MM.DD">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    name: 'MypageComponent',
}
</script>


<style lang="scss">
	@import '../sass/User/mypage.scss';
</style>