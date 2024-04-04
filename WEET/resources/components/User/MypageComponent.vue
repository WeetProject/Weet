<template>
    <div class="mypage_container">
        <div class="mypage_side_view">
            <div class="mypage_side_view_user_info">
                <div class="mypage_side_view_user_info_name"> 
                    <span>님의 MyPage</span>
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
                                    <span></span>
                                </div>
                            </div>
                        </div>

                        <div class="mypage_main_view_user_info_box_content">
                            <div class="mypage_main_view_user_info_box_content_label">
                                <span class="font-bold">비밀번호</span><span style="color: red;">*</span>
                            </div>
                            <div class="mypage_main_view_user_info_box_content_input">
                                <input id="password" name="password" type="password" placeholder="영대소문자,숫자,특수문자(!@#)를 포함한 8~16자" minlength="8" maxlength="17">
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
            <div v-if="clickTab === 1" class="mypage_main_view_tab">
                <div class="mypage_main_view_user_reservation">
                    <div class="mypage_main_view_user_reservation_menu">
                        <div class="mypage_main_view_user_reservation_menu_all">
                            <span>전체</span>
                        </div>
                        <div class="mypage_main_view_user_reservation_menu_all">
                            <span>항공권</span>
                        </div>
                        <div class="mypage_main_view_user_reservation_menu_all">
                            <span>호텔</span>
                        </div>
                    </div>
                    <div class="mypage_main_view_user_reservation_ticket">
                        <div class="mypage_main_view_user_reservation_ticket_date">
                            <span>2024.04.03</span>
                            <span>~</span>
                            <span>2024.04.10</span>
                        </div>
                        <div class="mypage_main_view_user_reservation_ticket_list">
                            <div class="mypage_main_view_user_reservation_ticket_list_flight_name">
                                <div>
                                    <span>진에어</span>
                                </div>
                                <div>
                                    <span>진에어</span>
                                </div>
                            </div>
                            <div class="mypage_main_view_user_reservation_ticket_list_flight_time">
                                <div class="mypage_main_view_user_reservation_ticket_list_flight_time_route">
                                    <div class="mypage_main_view_user_reservation_ticket_list_flight_time_route_info">
                                        <div>
                                            <span>오전 07:05</span>
                                        </div>
                                        <div>
                                            <span>PUS</span>
                                        </div>
                                    </div>
                                    <div class="mypage_main_view_user_reservation_ticket_list_flight_time_route_img">
                                        <span>소요시간</span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                                            </svg>
                                        </span>
                                        <span>직항</span>
                                    </div>
                                    <div class="mypage_main_view_user_reservation_ticket_list_flight_time_route_info">
                                        <div>
                                            <span>오전 08:00</span>
                                        </div>
                                        <div>
                                            <span>CJU</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mypage_main_view_user_reservation_ticket_list_flight_time_route">
                                    <div class="mypage_main_view_user_reservation_ticket_list_flight_time_route_info">
                                        <div>
                                            <span>오전 07:05</span>
                                        </div>
                                        <div>
                                            <span>PUS</span>
                                        </div>
                                    </div>
                                    <div class="mypage_main_view_user_reservation_ticket_list_flight_time_route_img">
                                        <span>소요시간</span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                                            </svg>
                                        </span>
                                        <span>직항</span>
                                    </div>
                                    <div class="mypage_main_view_user_reservation_ticket_list_flight_time_route_info">
                                        <div>
                                            <span>오전 08:00</span>
                                        </div>
                                        <div>
                                            <span>CJU</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div></div>
                            <div class="mypage_main_view_user_reservation_ticket_list_flight_info">
                                <div>
                                    <button>예약상세</button>
                                </div>
                                <div>
                                    <button>예약취소</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="clickTab === 2" class="mypage_main_view_tab">
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
            userData: {
                userName: '',
                userEmail: '',
            },
            
        }
    },

    computed: {
        
    },

    mounted() {
        this.fetchData();
    },

    methods: {
        fetchData() {
            
        }
    },


    
}
</script>


<style lang="scss">
	@import '../../sass/User/mypage.scss';
	@import '../../sass/User/signup.scss';
</style>