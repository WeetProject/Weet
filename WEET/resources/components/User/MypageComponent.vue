<template>
    <div class="background_body">
        <div class="box-border mypage_container">
            <div class="mypage_top_container">
                <div class="mypage_top_tab_top_section">
                    <div class="text-center mypage_top_tab_top_area">
                        <div @click = "clickTab = 0;">개인정보</div>
                    </div>
                    <div class="text-center mypage_top_tab_top_area">
                        <div @click = "clickTab = 1;">예매내역</div>
                    </div>
                    <div class="text-center mypage_top_tab_top_area">
                        <div @click = "clickTab = 2;">찜내역</div>
                    </div>
                </div>
                <div class="mypage_top_tab_bottom_section">
                    <div class="mypage_top_tab_bottom_area"></div>
                </div>                
            </div>
            <div class="mypage_bottom_container">
                <!-- clickTab 0 -->
                <div class="mypage_user_info_container" v-if="clickTab === 0">
                    <div class="mypage_user_info_data_container">
                        <div class="mypage_user_info_title_section">
                            <div class="mypage_user_info_title_area">
                                <span class="font-semibold">이메일</span>
                            </div>
                            <div class="mypage_user_info_title_area">
                                <span class="font-semibold">비밀번호</span><span class="mypage_user_info_title_area_span">*</span>
                            </div>
                            <div class="mypage_user_info_title_area">
                                <span class="font-semibold">비밀번호 확인</span><span class="mypage_user_info_title_area_span">*</span>
                            </div>
                            <div class="mypage_user_info_title_area">
                                <span class="font-semibold">이름</span>
                            </div>
                            <div class="mypage_user_info_title_area">
                                <span class="font-semibold">연락처</span>
                            </div>
                            <div class="mypage_user_info_title_area">
                                <span class="font-semibold">우편번호</span>
                            </div>
                            <div class="mypage_user_info_title_area">
                                <span class="font-semibold">기본주소</span>
                            </div>
                            <div class="mypage_user_info_title_area">
                                <span class="font-semibold">상세주소</span>
                            </div>                        
                        </div> 
                        <div class="mypage_user_info_content_section">
                            <div class="mypage_user_info_content_area">
                                <span class="ml-2.5">{{ this.userInfo.userEmail }}</span>
                            </div>
                            <div class="mypage_user_info_content_area">
                                <input type="password" name="password" id="password"
                                minlength="8" maxlength="17"
                                class="mypage_user_info_content_input">
                            </div>
                            <div class="mypage_user_info_content_area">
                                <input type="password" name="password" id="password"
                                minlength="8" maxlength="17"
                                class="mypage_user_info_content_input">
                            </div>
                            <div class="mypage_user_info_content_area">
                                <span class="ml-2.5">{{ this.userInfo.userName }}</span>
                            </div>
                            <div class="mypage_user_info_content_area">
                                <span class="ml-2.5">{{ this.userInfo.userTel }}</span>
                            </div>
                            <!-- 우편번호 -->
                            <div class="mypage_user_info_content_postcode_area">
                                <input type="text" name="user_postcode" id="user_postcode"
                                autocomplete="off" v-model="this.userInfo.userPostcode"
                                class="mypage_user_info_content_input_postcode">
                                <div class="mypage_user_info_content_area_postcode_button">
                                    <button type="button" @click="openDaumPostcode()"
                                        class="text-center mypage_user_info_content_postcode_button">
                                    주소 검색
                                    </button>
                                </div>
                            </div>
                            <div class="mypage_user_info_content_area">
                                <input type="text" name="user_basic_address" id="user_basic_address"
                                autocomplete="off" v-model="this.userInfo.userBasicAddress"
                                class="mypage_user_info_content_input">
                            </div>
                            <div class="mypage_user_info_content_area">
                                <input type="text" name="user_detail_address" id="user_detail_address"
                                autocomplete="off" v-model="this.userInfo.userDetailAddress"
                                class="mypage_user_info_content_input">
                            </div>                        
                        </div>
                    </div>
                    <div class="my-10 mypage_user_info_button_container">
                        <div class="mypage_user_info_button_section">
                            <div class="mypage_user_info_button_area">
                                <button class="mypage_user_info_button">수정</button>
                            </div>
                            <div class="mypage_user_info_button_area">
                                <button class="mypage_user_info_button">취소</button>
                            </div>                 
                        </div>
                    </div>            
                </div>
                <!-- clickTab 1 -->
                <div class="mypage_flight_info_container" v-if="clickTab === 1">
                    <div class="mypage_flight_info_data_container">
                        <div class="mb-10 mypage_flight_info_data_top_section">
                            <button class="mr-5 mypage_all_list_button">전체</button>
                            <button class="mypage_flight_button">항공권</button>
                            <button class="ml-5 mypage_hotel_button">호텔</button>
                        </div>
                        <div class="mypage_flight_info_data_bottom_section">
                            <div class="mb-5 mypage_flight_time_container">
                                <span>2024.04.03</span>
                                <span>~</span>
                                <span>2024.04.10</span>
                            </div>
                            <div class="mypage_flight_ticket_container">
                                <div class="text-center mypage_flight_airline_section">
                                    <div class="mypage_flight_airline_departure_area">
                                        <span>진에어</span>
                                    </div>
                                    <div class="mypage_flight_airline_arrival_area">
                                        <span>진에어</span>
                                    </div>
                                </div>
                                <div class="mypage_flight_route_section">
                                    <div class="mb-5 mypage_flight_route_area">
                                        <div class="mypage_flight_route_departure_time">
                                            <span>오전 07:05</span>
                                            <span>PUS</span>
                                        </div>
                                        <div class="text-center mypage_flight_route_line">
                                            <span>소요시간</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mypage_flight_route_line_svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                            </svg>
                                            <span>직항</span>
                                        </div>
                                        <div class="mypage_flight_route_arrival_time">
                                            <span>오전 08:00</span>
                                            <span>CJU</span>
                                        </div>
                                    </div>
                                    <div class="mt-5 mypage_flight_route_area">
                                        <div class="mypage_flight_route_departure_time">
                                            <span>오전 07:05</span>
                                            <span>CJU</span>
                                        </div>
                                        <div class="text-center mypage_flight_route_line">
                                            <span>소요시간</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mypage_flight_route_line_svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                            </svg>
                                            <span>직항</span>
                                        </div>
                                        <div class="mypage_flight_route_arrival_time">
                                            <span>오전 08:00</span>
                                            <span>PUS</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mypage_flight_line_section"></div>
                                <div class="mypage_flight_button_section">
                                    <div class="mb-5 mypage_flight_button_area">
                                        <button class="mypage_flight_button">예약 상세</button>
                                    </div>
                                    <div class="mt-5 mypage_flight_button_area">
                                        <button class="mypage_flight_button">예약 취소</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- mobile Size -->
                        <div class="mypage_flight_info_data_bottom_section_minsize">
                            <div class="mb-5 mypage_flight_time_container">
                                <span>2024.04.03</span>
                                <span>~</span>
                                <span>2024.04.10</span>                                
                            </div>
                            <div class="mypage_flight_ticket_container">
                                <div class="mypage_flight_airline_section">
                                    <div class="mb-5 mypage_flight_airline_departure_area">
                                        <span>진에어</span>
                                    </div>
                                </div>
                                <div class="mypage_flight_route_section">
                                    <div class="mb-5 mypage_flight_route_area">
                                        <div class="text-center mypage_flight_route_departure_time">
                                            <span>오전 07:05</span>
                                            <span>PUS</span>
                                        </div>
                                        <div class="text-center mypage_flight_route_line">
                                            <span>소요시간</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mypage_flight_route_line_svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                            </svg>
                                            <span>직항</span>
                                        </div>
                                        <div class="mypage_flight_route_arrival_time">
                                            <span>오전 08:00</span>
                                            <span>CJU</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mypage_flight_airline_section">
                                    <div class="mb-5 mypage_flight_airline_departure_area">
                                        <span>진에어</span>
                                    </div>
                                </div>
                                <div class="mypage_flight_route_section">
                                    <div class="mb-5 mypage_flight_route_area">
                                        <div class="text-center mypage_flight_route_departure_time">
                                            <span>오전 07:05</span>
                                            <span>PUS</span>
                                        </div>
                                        <div class="text-center mypage_flight_route_line">
                                            <span>소요시간</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mypage_flight_route_line_svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                            </svg>
                                            <span>직항</span>
                                        </div>
                                        <div class="mypage_flight_route_arrival_time">
                                            <span>오후 08:00</span>
                                            <span>CJU</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-10 mypage_flight_button_section">
                                    <div class="mypage_flight_button_area">
                                        <button class="mypage_flight_button">예약 상세</button>
                                    </div>
                                    <div class="mypage_flight_button_area">
                                        <button class="mypage_flight_button">예약 취소</button>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
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