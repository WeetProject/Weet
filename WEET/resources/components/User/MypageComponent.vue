<template>
    <div class="mypage_container">
        <div class="mypage_side_view">
            <div class="mypage_side_view_user_info">
                <div class="mypage_side_view_user_info_name"> 
                    <span>최현희님의 MyPage</span>
                </div>
                <div class="mypage_side_view_user_info_email"> 
                    <span>roseok624@gmail.com</span>
                </div>
            </div>
            <div class="mypage_side_view_tab">
                <div class="mypage_side_view_tab_list">
                    <li @click="clickTab = 0;">개인정보</li>
                    <li @click="clickTab = 1;">예매내역</li>
                    <li @click="clickTab = 2;">찜한내역</li>
                </div>
            </div>
        </div>
        <div class="mypage_main_view">
            <div v-if="clickTab === 0" class="mypage_main_view_tab">

                    <div class="mypage_main_view_user_info_box">

                        <div class="mypage_main_view_user_info_box_content">
                            <div class="mypage_main_view_user_info_box_content_label">
                                <span class="font-bold">이메일</span>
                            </div>
                            <div class="mypage_main_view_user_info_box_content_span">
                                <div>
                                    <span>roseok624@gmail.com</span>
                                </div>
                            </div>
                        </div>

                        <div class="mypage_main_view_user_info_box_content">
                            <div class="mypage_main_view_user_info_box_content_label">
                                <span class="font-bold">비밀번호</span><span style="color: red;">*</span>
                            </div>
                            <div class="mypage_main_view_user_info_box_content_input">
                                <input id="user_password" name="user_password" type="password" placeholder="영대소문자,숫자,특수문자(!@#)를 포함한 8~16자" minlength="8" maxlength="17">
                                <div class="regist_message_container">
                                    <!-- <div class="error_message text-xs text-red-500" v-if="errors.userPassword">{{ errors.userPassword }}</div>
                                    <div class="success_message text-xs text-blue-500" v-else-if="!errors.userPassword && frmUserData.userPassword">유효한 비밀번호입니다.</div>
                                    <div class="error_message text-xs text-red-500" v-else-if="RegistrationErrorMessage.userPassword">{{ RegistrationErrorMessage.userPassword }}</div> -->
                                </div>
                            </div>
                        </div>

                        <div class="mypage_main_view_user_info_box_content">
                            <div class="mypage_main_view_user_info_box_content_label">
                                <span class="font-bold">비밀번호 확인</span><span style="color: red;">*</span>
                            </div>
                            <div class="mypage_main_view_user_info_box_content_input">
                                <input type="password" placeholder="영대소문자,숫자,특수문자(!@#)를 포함한 8~16자" minlength="8" maxlength="17">
                                <div class="regist_message_container">
                                    <!-- <div class="error_message text-xs text-red-500" v-if="errors.userPasswordChk">{{ errors.userPasswordChk }}</div>
                                    <div class="success_message text-xs text-blue-500" v-else-if="!errors.userPasswordChk && frmUserData.userPasswordChk">비밀번호가 일치합니다.</div>
                                    <div class="error_message text-xs text-red-500" v-else-if="RegistrationErrorMessage.userPasswordChk">{{ RegistrationErrorMessage.userPasswordChk }}</div> -->
                                </div>
                            </div>
                        </div>

                        <div class="mypage_main_view_user_info_box_content">
                            <div class="mypage_main_view_user_info_box_content_label">
                                <span class="font-bold">이름</span>
                            </div>
                            <div class="mypage_main_view_user_info_box_content_span">
                                <div>
                                    <span>최현희</span>
                                </div>
                            </div>
                        </div>

                        <div class="mypage_main_view_user_info_box_content">
                            <div class="mypage_main_view_user_info_box_content_label">
                                <span class="font-bold">연락처</span>
                            </div>
                            <div class="mypage_main_view_user_info_box_content_span">
                                <div>
                                    <span>010-****-7060</span>
                                </div>
                            </div>    
                        </div>

                        <div class="mypage_main_view_user_info_box_content">
                            <div class="mypage_main_view_user_info_box_content_postcode_div">
                                <div class="mypage_main_view_user_info_box_content_postcode_div_label">
                                    <span class="font-bold">우편번호</span><span style="color: red;">*</span>
                                </div>
                                <div class="mypage_main_view_user_info_box_content_postcode_div_input">
                                    <input id="user_postcode" name="user_postcode" type="text" placeholder="">
                                </div>
                                <div class="mypage_main_view_user_info_box_content_postcode_div_label">
                                    <button class="font-bold" type="button" @click="openDaumPostcode()">검색</button>
                                </div>
                                <div class="mypage_main_view_user_info_box_content_postcode_div_input">
                                    <input id="user_basic_address" name="user_basic_address" type="text" placeholder="">
                                </div>
                            </div>
                            <div class="mypage_main_view_user_info_box_content_postcode_div">
                                <div class="mypage_main_view_user_info_box_content_postcode_div_label">
                                    <span class="font-bold">상세주소</span><span style="color: red;">*</span>
                                </div>
                                <div class="mypage_main_view_user_info_box_content_postcode_div_input2">
                                    <input id="user_detail_address" name="user_detail_address" type="address" placeholder="나머지 주소를 입력해주세요">
                                </div>
                            </div>
                        </div>

                        <div class="mypage_main_view_user_info_box_content">
                            <div class="mypage_main_view_user_info_box_content_label">
                                <span class="font-bold">성별</span>
                            </div>
                            <div class="mypage_main_view_user_info_box_content_span">
                                <div>
                                    <span>여</span>
                                </div>
                            </div>
                        </div>
                        <div class="mypage_main_view_user_info_box_content">
                            <div class="mypage_main_view_user_info_box_content_label">
                                <span class="font-bold">생년월일</span>
                            </div>
                            <div class="mypage_main_view_user_info_box_content_span">
                                <div>
                                    <span>1993-06-24</span>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div v-if="clickTab === 1">
                예매내역이여
            </div>
            <div v-if="clickTab === 2">
                찜한내역이여
            </div>
        </div>
    </div>
</template>


<script>
import axios from 'axios';

export default {
    name: 'MypageComponent',

    data() {
        return {
            clickTab: 0,
            userInfoData: [],
        }
    },

    methods: {
        fetchData() {
            axios.get('/getMyPage',{

            })
            .then(res => {
                console.log(res);
                this.userInfoData = res.data.userData;
                // this.userInfoData = $state.userData;
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        }
    },

    
}
</script>


<style lang="scss">
	@import '../../sass/User/mypage.scss';
	@import '../../sass/User/signup.scss';
</style>