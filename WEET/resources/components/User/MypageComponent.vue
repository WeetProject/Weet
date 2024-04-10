<template>
    <div class="box-border mypage_container">
        <div class="mypage_layout_container">
            <div class="mypage_user_left_info_section">
                <div class="mypage_left_container">
                    <div class="mypage_left_user_info_section">
                        <div class="mb-5 mypage_left_user_info_name_area">
                            <span>{{ this.userInfo.userName }}님의 My Page</span>
                        </div>
                        <div class="mt-5 mypage_left_user_info_email_area">
                            <span>{{ this.userInfo.userEmail }}</span>
                        </div>
                    </div>
                    <div class="mypage_left_tab_section">
                        <li @click = "clickTab = 0;">개인 정보</li>
                    </div>
                    <div class="mypage_left_tab_section">
                        <li @click = "clickTab = 1;">예매 내역</li>
                    </div>
                    <div class="mypage_left_tab_section">
                        <li @click = "clickTab = 2;">찜 내역</li>
                    </div>
                </div>
            </div>
            <!-- clickTab = 0 -->
            <div class="mypage_right_user_info_section" v-if="clickTab === 0">
                <div class="mypage_right_top_container">
                    <div class="mypage_middle_container">
                        <div class="mypage_middle_user_data_title_section">
                            <span>이메일</span>
                        </div>
                        <div class="mypage_middle_user_data_title_section">
                            <span>비밀번호</span><span class="mypage_middle_user_data_title_span">*</span>
                        </div>
                        <div class="mypage_middle_user_data_title_section">
                            <span>비밀번호 확인</span><span class="mypage_middle_user_data_title_span"> *</span>
                        </div>
                        <div class="mypage_middle_user_data_title_section">
                            <span>이름</span>
                        </div>
                        <div class="mypage_middle_user_data_title_section">
                            <span>연락처</span>
                        </div>
                        <div class="mypage_middle_user_data_title_section">
                            <span>우편번호</span>
                        </div>
                        <div class="mypage_middle_user_data_title_section">
                            <span>기본주소</span>
                        </div>
                        <div class="mypage_middle_user_data_title_section">
                            <span>상세주소</span>
                        </div>
                    </div>
                    <div class="mypage_right_container">
                        <div class="mypage_right_user_data_content_section">
                            <span>{{ this.userInfo.userEmail }}</span>
                        </div>
                        <div class="mypage_right_user_data_content_section">
                            <input type="password" name="password" id="password" 
                            placeholder="영대소문자, 숫자, 특수문자(!@#)를 포함한 8~16자"
                            minlength="8" maxlength="17"
                            class="mypage_right_user_data_content_input">
                        </div>
                        <div class="mypage_right_user_data_content_section">
                            <input type="password" name="password" id="password" 
                            placeholder="영대소문자, 숫자, 특수문자(!@#)를 포함한 8~16자"
                            minlength="8" maxlength="17"
                            class="mypage_right_user_data_content_input">
                        </div>
                        <div class="mypage_right_user_data_content_section">
                            <span>{{ this.userInfo.userName }}</span>
                        </div>
                        <div class="mypage_right_user_data_content_section">
                            <span>{{ this.userInfo.userTel }}</span>
                        </div>
                        <!-- 우편번호 -->
                        <div class="mypage_right_user_data_content_postcode_section">
                            <input type="text" name="user_postcode" id="user_postcode"
                            v-model="this.userInfo.userPostcode"
                            class="text-center mypage_right_user_data_content_input_postcode">
                            <div class="mypage_right_user_data_content_postcode_button_area">
                                <button type="button" @click="openDaumPostcode()"
                                    class="text-center mypage_right_user_data_content_postcode_button">
                                주소 검색
                                </button>
                            </div>
                        </div>
                        <div class="mypage_right_user_data_content_section">
                            <input type="text" name="user_basic_address" id="user_basic_address"
                            v-model="this.userInfo.userBasicAddress"
                            class="mypage_right_user_data_content_input">
                        </div>
                        <div class="mypage_right_user_data_content_section">
                            <input type="text" name="user_detail_address" id="user_detail_address"
                            v-model="this.userInfo.userDetailAddress"
                            class="mypage_right_user_data_content_input">
                        </div>
                    </div>
                </div>
                <div class="mypage_right_bottom_container">
                    <div class="mypage_button_container">
                        <div class="mr-5 mypage_button_section">
                            <button class="mypage_update_button">수정</button>
                        </div>
                        <div class="ml-5 mypage_button_section">
                            <button class="mypage_cancel_button">취소</button>
                        </div>
                    </div>                    
                </div>
            </div>
            <!-- clickTab = 1 -->
            <div class="mypage_right_user_info_section_tab1" v-if="clickTab === 1">
                <div class="mb-5 ml-5 mypage_right_top_container_tab1">
                    <button class="mypage_all_list_button">전체</button>
                    <button class="ml-5 mypage_flight_button">항공권</button>
                    <button class="ml-5 mypage_hotel_button">호텔</button>
                </div>
                <div class="ml-5 mypage_right_bottom_container_tab1">
                    <div class="mb-1 mypage_flight_time_container">
                        <span>2024.04.03</span>
                        <span>~</span>
                        <span>2024.04.10</span>
                    </div>
                    <div class="mypage_flight_container">
                        <div class="text-center mypage_flight_left_section">
                            <div class="mypage_flight_middle_departure_airline_area">
                                <span>진에어</span>
                            </div>
                            <div class="mypage_flight_middle_arrival_airline_area">
                                <span>진에어</span>
                            </div>
                        </div>
                        <div class="mypage_flight_middle_section">
                            <div class="mypage_flight_middle_ticket_info_area">
                                <div class="mypage_flight_middle_ticket_info_departure_time">
                                    <span>오전 07:05</span>
                                    <span>PUS</span>
                                </div>
                                <div class="text-center mypage_flight_middle_ticket_info_line">
                                    <span>소요시간</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mypage_flight_middle_ticket_info_line_svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                    </svg>
                                    <span>직항</span>
                                </div>
                                <div class="mypage_flight_middle_ticket_info_arrival_time">
                                    <span>오전 08:00</span>
                                    <span>CJU</span>
                                </div>
                            </div>
                            <div class="mypage_flight_middle_ticket_info_area">
                                <div class="mypage_flight_middle_ticket_info_departure_time">
                                    <span>오전 07:05</span>
                                    <span>CJU</span>
                                </div>
                                <div class="text-center mypage_flight_middle_ticket_info_line">
                                    <span>소요시간</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mypage_flight_middle_ticket_info_line_svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                    </svg>
                                    <span>직항</span>
                                </div>
                                <div class="mypage_flight_middle_ticket_info_arrival_time">
                                    <span>오전 08:00</span>
                                    <span>PUS</span>
                                </div>
                            </div>
                        </div>
                        <div class="mypage_flight_line_section"></div>
                        <div class="mypage_flight_right_section">
                            <div class="mb-5 mypage_flight_button_area">
                                <button class="mypage_flight_button">예약 상세</button>
                            </div>
                            <div class="mt-5 mypage_flight_button_area">
                                <button class="mypage_flight_button">예약 취소</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- clickTab = 2 -->
            <div class="mypage_right_user_info_section_tab1" v-if="clickTab === 2"></div>

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
            userInfo: {
                userEmail: '',
                userName: '',
                userBirthDate: '',
                userGender: '',
                userTel: '',
                userPostcode: '',
                userBasicAddress: '',
                userDetailAddress: '',
            },
            newUserInfoData: {
                userPassword: '',
                userPasswordChk: '',
            },
            newUserAddressData: {
                userPostcode: '',
                userBasicAddress: '',
                userDetailAddress: '',
            },
        }
    },

    computed: {
        
    },

    mounted() {
        this.userToken = localStorage.getItem('setToken');
        // JSON.parse() : 
        this.userInfo = JSON.parse(localStorage.getItem('setUserData'));
        console.log(this.userInfo);
        // console.log(this.userInfo.userEmail);


    },

    created() {
        // this.userData = this.$store.state.userData;
    },

    methods: {
        
        // 우편번호+기본주소(basicAddress) 입력 함수
        openDaumPostcode() {
            if (typeof daum === 'undefined') {
                // 스크립트를 동적으로 로드하고 로드되면 콜백을 실행합니다.
                const script = document.createElement('script');
                script.src = '//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js';
                script.onload = () => {
                    // 로드가 완료되면 daum.Postcode를 사용할 수 있습니다.
                    new daum.Postcode({
                        oncomplete: (data) => {
                        this.handleAddressComplete(data);
                    }
            }).open();
                };
                document.head.appendChild(script);
            } else {
                // 이미 로드되었으면 바로 실행합니다.
                new daum.Postcode({
                    oncomplete: (data) => {
                        this.handleAddressComplete(data);
                    }
                }).open();
            }
            },
        handleAddressComplete(data) {
        // 주소 검색 완료 후 처리할 작업을 수행합니다.
            var roadAddr = data.roadAddress;
            var extraRoadAddr = '';

            if (data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
                extraRoadAddr += data.bname;
            }

            if (data.buildingName !== '' && data.apartment === 'Y') {
                extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
            }

            if (extraRoadAddr !== '') {
                extraRoadAddr = ' (' + extraRoadAddr + ')';
            }

            this.newUserAddressData = {
                userPostcode: data.zonecode,
                userBasicAddress: roadAddr,
            }
            console.log(data);
        },


    },


    
}
</script>


<style lang="scss">
	@import '../../sass/User/mypage.scss';
	@import '../../sass/User/signup.scss';

    .mypage_vertical_line {
        border-left: 1px solid #ededed; /* 수직 구분선의 스타일 설정 */
        height: 250px; /* 수직 구분선의 높이 설정 */
        margin: 0 10px; /* 수직 구분선의 좌우 여백 설정 */
    }
</style>