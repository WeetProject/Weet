<template>
    <!-- <div class="mypage_banner">
        <img src="../../public/images/banner2.jpg" alt="" width="676" height="200" >
    </div> -->
    <div class="mypage_container">
        <div class="mypage_box1">
            <div class="mypage_mention">
                <p class="mypage_mention_1">안녕하세요 <span>oo</span>님!</p>
                <p class="mypage_mention_2">이메일주소</p>
            </div>
            <div class="mypage_menu">
                <div class="mypage_menu_button">
                    <div class="mypage_menu_button_content">
                        <!-- 여행객 아이콘 -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-luggage-fill" viewBox="0 0 16 16">
                            <path d="M2 1.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V5h.5A1.5 1.5 0 0 1 8 6.5V7H7v-.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5H4v1H2.5v.25a.75.75 0 0 1-1.5 0v-.335A1.5 1.5 0 0 1 0 13.5v-7A1.5 1.5 0 0 1 1.5 5H2zM3 5h2V2H3z"/>
                            <path d="M2.5 7a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0v-5a.5.5 0 0 1 .5-.5m10 1v-.5A1.5 1.5 0 0 0 11 6h-1a1.5 1.5 0 0 0-1.5 1.5V8H8v8h5V8zM10 7h1a.5.5 0 0 1 .5.5V8h-2v-.5A.5.5 0 0 1 10 7M5 9.5A1.5 1.5 0 0 1 6.5 8H7v8h-.5A1.5 1.5 0 0 1 5 14.5zm9 6.5V8h.5A1.5 1.5 0 0 1 16 9.5v5a1.5 1.5 0 0 1-1.5 1.5z"/>
                        </svg>
                    </div>
                    <div class="mypage_menu_button_content">상세개인정보</div>
                    <div class="mypage_menu_button_content_btn">
                        <!-- 화살표버튼 -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                        </svg>
                    </div>
                </div>
                <div class="mypage_menu_button">
                    <div class="mypage_menu_button_content">
                        <!-- 예매 아이콘 -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708"/>
                        </svg>
                    </div>
                    <div class="mypage_menu_button_content">예매내역</div>
                    <div class="mypage_menu_button_content_btn">
                        <!-- 화살표버튼 -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                        </svg>
                    </div>
                </div>
                <div class="mypage_menu_button">
                    <div class="mypage_menu_button_content">
                        <!-- 종 아이콘 -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/>
                        </svg>
                    </div>
                    <div class="mypage_menu_button_content">가격변동알림</div>
                    <div class="mypage_menu_button_content_btn">
                        <!-- 화살표버튼 -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                        </svg>
                    </div>
                </div>
                <div class="mypage_menu_button">
                    <div class="mypage_menu_button_content">
                        <!-- 사람 아이콘 -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                    </div>
                    <div class="mypage_menu_button_content">계정</div>
                    <div class="mypage_menu_button_content_btn">
                        <!-- 화살표버튼 -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="mypage_box2">
            <div class="mypage_menu_detail">
                <h1>상세 개인 정보</h1>
                <div class="mypage_menu_detail_frame">
                    <div class="mypage_menu_detail_input">
                        <p class="mypage_menu_detail_input_title">이름</p>
                        <p class="mypage_menu_detail_input_title2">*</p>
                        <div class="mypage_menu_detail_input_cont">
                            <input type="text">
                        </div>
                    </div>
                    <div class="mypage_menu_detail_input">
                        <p class="mypage_menu_detail_input_title">성</p>
                        <p class="mypage_menu_detail_input_title2">*</p>
                        <div class="mypage_menu_detail_input_cont">
                            <input type="text">
                        </div>
                    </div>
                    <div class="mypage_menu_detail_input">
                        <p class="mypage_menu_detail_input_title">성별</p>
                        <!-- <p class="mypage_menu_detail_input_title">*</p> -->
                        <div class="mypage_menu_detail_input_cont">
                            <select>
                                <option value="" selelcted>응답안함</option>
                                <option value="">여성</option>
                                <option value="">남성</option>
                            </select>
                        </div>
                    </div>
                    <div class="mypage_menu_detail_input">
                        <p class="mypage_menu_detail_input_title">국가</p>
                        <!-- <p class="mypage_menu_detail_input_title">*</p> -->
                        <div class="mypage_menu_detail_input_cont">
                            <select>
                                <option value="" selected>한국</option>
                            </select>
                        </div>
                    </div>
                    <div class="mypage_menu_detail_input">
                        <p class="mypage_menu_detail_input_title">생년월일</p>
                        <!-- <p class="mypage_menu_detail_input_title">*</p> -->
                        <div class="mypage_menu_detail_input_cont">
                            <input type="text" placeholder="YYYY.MM.DD">
                        </div>
                    </div>
                    <div class="mypage_menu_detail_input">
                        <p class="mypage_menu_detail_input_title">전화번호</p>
                        <!-- <p class="mypage_menu_detail_input_title">*</p> -->
                        <input type="text">
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