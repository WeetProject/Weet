<template>
    <div class="mypage_container">
        <div class="mypage_banner_section">
            <!-- <img src="../../../public/images/banner.JPG" alt=""> -->
            배너 영역
        </div>
        <div class="mypage_main_section">
            <div class="mypage_main_section_top">
                <div class="mypage_main_section_top_profile">
                    <p>@@</p>
                </div>
                <div class="mypage_main_section_top_mention">
                    <p>안녕하세요 <span>@@</span>님!</p>
                    <p>admin123@admin.com</p>
                </div>
                <ul class="mypage_main_section_top_content">
                    <li>
                        <p>상세 개인 정보</p>
                        <p>▷</p>
                    </li>
                    <li>
                        <p>예매 내역</p>
                        <p>▷</p>
                    </li>
                    <li>
                        <p>찜 내역</p>
                        <p>▷</p>
                    </li>
                    <li>
                        <p>계정 정보</p>
                        <p>▷</p>
                    </li>
                </ul>
            </div>
            <div class="mypage_main_section_bottom">
                <div class="mypage_main_section_bottom_title">
                    <p>상세 개인 정보</p>
                    <p>▷</p>
                </div>
                <div class="mypage_main_section_bottom_content">
                    <div class="mypage_main_section_bottom_content_element">                       
                        <div class="mypage_main_section_bottom_content_element_title">
                            <p>이름</p>
                            <p>*</p>
                        </div>
                        <div class="mypage_main_section_bottom_content_element_input">
                            <input type="text" placeholder="로마자로 표기해 주세요">
                        </div>
                    </div>
                    <div class="mypage_main_section_bottom_content_button">
                        <p>수정</p>
                    </div>
                    <div class="mypage_main_section_bottom_content_element">                       
                        <div class="mypage_main_section_bottom_content_element_title">
                            <p>성</p>
                            <p>*</p>
                        </div>
                        <div class="mypage_main_section_bottom_content_element_input">
                            <input type="text" placeholder="로마자로 표기해 주세요">
                        </div>
                    </div>
                    <div class="mypage_main_section_bottom_content_button">
                        <p>수정</p>
                    </div>
                    <div class="mypage_main_section_bottom_content_element">                       
                        <div class="mypage_main_section_bottom_content_element_title">
                            <p>성별</p>
                        </div>
                        <div class="mypage_main_section_bottom_content_element_input">
                            <select name="" id="">
                                <option value="female" selected>여성</option>
                                <option value="male">남성</option>
                            </select>
                        </div>
                    </div>
                    <div class="mypage_main_section_bottom_content_button">
                        <p>수정</p>
                    </div>
                    <div class="mypage_main_section_bottom_content_element">                       
                        <div class="mypage_main_section_bottom_content_element_title">
                            <p>생년월일</p>
                        </div>
                        <div class="mypage_main_section_bottom_content_element_input">
                            <input type="text" placeholder="YYYY.MM.DD">
                        </div>
                    </div>
                    <div class="mypage_main_section_bottom_content_button">
                        <p>수정</p>
                    </div>
                    <div class="mypage_main_section_bottom_content_element">                       
                        <div class="mypage_main_section_bottom_content_element_title">
                            <p>전화번호</p>
                        </div>
                        <div class="mypage_main_section_bottom_content_element_input">
                            <input type="text">
                        </div>
                    </div>
                    <div class="mypage_main_section_bottom_content_button">
                        <p>수정</p>
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
	@import '../../sass/User/mypage.scss';
</style>