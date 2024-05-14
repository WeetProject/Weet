<template>
    <div class="background_body">
        <div class="box-border mypage_container">
            <div class="mypage_top_container">
                <div class="mypage_top_tab_top_section">
                    <div v-if="userToken" class="text-center mypage_top_tab_top_area">
                        <div :class="{ 'font-semibold': clickTab === 0 }" @click = "clickTab = 0;">개인정보</div>
                    </div>
                    <div class="text-center mypage_top_tab_top_area">
                        <div :class="{ 'font-semibold': clickTab === 1 }" @click = "clickTab = 1;">예매내역</div>
                    </div>
                    <div class="text-center mypage_top_tab_top_area">
                        <div :class="{ 'font-semibold': clickTab === 2 }" @click = "clickTab = 2;">찜내역</div>
                    </div>
                </div>
                <div class="mypage_top_tab_bottom_section">
                    <div class="mypage_top_tab_bottom_area"></div>
                </div>                
            </div>
            <div class="mypage_bottom_container">
                <!-- clickTab 0 -->
                <div class="mypage_user_info_container" v-show="clickTab === 0" v-if="userToken">
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
                                <span class="ml-2.5">{{ userInfo.userEmail }}</span>
                            </div>
                            <div class="mypage_user_info_content_area">
                                <input type="password" name="password" id="password"
                                minlength="8" maxlength="17" v-model="newUserInfoData.userPassword"
                                class="mypage_user_info_content_input"
                                placeholder="영대소문자,숫자,특수문자(!@#)를 포함한 8~16자">
                            </div>
                            <div class="mypage_user_info_content_area">
                                <input type="password"
                                minlength="8" maxlength="17" v-model="newUserInfoData.userPasswordChk"
                                class="mypage_user_info_content_input"
                                placeholder="영대소문자,숫자,특수문자(!@#)를 포함한 8~16자">
                            </div>
                            <div class="mypage_user_info_content_area">
                                <span class="ml-2.5">{{ userInfo.userName }}</span>
                            </div>
                            <div class="mypage_user_info_content_area">
                                <span class="ml-2.5">{{ userInfo.userTel }}</span>
                            </div>
                            <!-- 우편번호 -->
                            <div class="mypage_user_info_content_postcode_area">
                                <input type="text" name="user_postcode" id="user_postcode"
                                autocomplete="off" v-model="userInfo.userPostcode"
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
                                autocomplete="off" v-model="userInfo.userBasicAddress"
                                class="mypage_user_info_content_input">
                            </div>
                            <div class="mypage_user_info_content_area">
                                <input
                                type="text" name="user_detail_address" id="user_detail_address"
                                autocomplete="off" v-model="userInfo.userDetailAddress"
                                class="mypage_user_info_content_input">
                            </div>                        
                        </div>
                    </div>
                    <div class="my-10 mypage_user_info_button_container">
                        <div class="mypage_user_info_button_section">
                            <div class="mypage_user_info_button_withdrawal text-center">
                                <button @click="delWithdrawal" class="mypage_user_info_button">회원탈퇴</button>
                            </div>
                            <div class="mypage_user_info_button_area">
                                <button @click="back" class="mypage_user_info_button">취소</button>
                            </div> 
                            <div class="mypage_user_info_button_area">
                                <button @click="changeInfo()" class="mypage_user_info_button">수정</button>
                            </div>                 
                        </div>
                    </div>            
                </div>
                <!-- clickTab 1 -->
                <div class="mypage_flight_info_container" v-show="clickTab === 1" v-if="kakaoToken || googleToken || userToken">
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
                                        <div class="text-center mypage_flight_route_line" style="margin: 0 auto;">
                                            <span>소요시간</span>
                                            <svg class="text-center w-[50px] h-[50px] fill-[#8e8e8e]" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"></path>
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
            userToken: null,
            kakaoToken: null,
            googleToken: null,
        }
    },

    created() {
        
    },

    mounted() {
        this.userToken = localStorage.getItem('setToken');
        this.kakaoToken = localStorage.getItem('setKakaoToken');
        this.googleToken = localStorage.getItem('setGoogleToken');
        this.userInfo = JSON.parse(localStorage.getItem('setUserData'));
        console.log("일반 토큰" , this.userToken);
        console.log("유저 정보" , this.userInfo);
        console.log(this.kakaoToken);
        console.log(this.googleToken);
        // console.log(this.userInfo.userEmail);
        // this.userInfo;
        // this.userInfo.userBasicAddress;
        // this.userInfo.userDetailAddress;
    },

    updated() {
        // this.userInfo = JSON.parse(localStorage.getItem('setUserData'));
        // this.userData = this.$store.state.userData;
        // this.userInfo.userPostcode;
        // this.userInfo.userBasicAddress;
        // this.userInfo.userDetailAddress;

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

            this.userInfo.userPostcode = data.zonecode;
            this.userInfo.userBasicAddress = roadAddr;
            this.userInfo.userDetailAddress = extraRoadAddr;
            
            console.log(data);
        },
        changeInfo() {
            if (this.newUserInfoData.userPassword !== this.newUserInfoData.userPasswordChk) {
                alert('비밀번호와 비밀번호 확인이 일치하지 않습니다.');
                return;
            }

            // API 요청 데이터 구성
            const requestData = {
                email: this.userInfo.userEmail,
                token: localStorage.getItem('setToken'),
                userPostcode: this.userInfo.userPostcode,
                userBasicAddress: this.userInfo.userBasicAddress,
                userDetailAddress: this.userInfo.userDetailAddress
            };

            console.log("리퀘스트데이터", requestData);

            // 비밀번호가 입력되었다면 요청 데이터에 추가
            if (this.newUserInfoData.userPassword) {
                requestData.password = this.newUserInfoData.userPassword;
            }

            axios.post('/userInfoChange', requestData
                // email: this.userInfo.userEmail,
                // password: this.newUserInfoData.userPassword,
                // token: localStorage.getItem('setToken'),
            )
            .then(response => {
                // console.log("response",response.data.updateAddress);
                if(response.data.code === "UICP00") {
                    alert('비밀번호를 성공적으로 변경하였습니다.\n 다시 로그인해주세요.');
                    // 성공 시, 추가 작업을 수행할 수 있습니다.
                    this.$store.dispatch('logout');
                    location.reload();
                } else if (response.data.code === 'UICA00') {
                    console.log("else if 실행");

                    const userData = response.data.userData;

                    localStorage.setItem('setUserData', JSON.stringify(userData));
                    console.log(localStorage.getItem('setUserData'));

                    alert(response.data.message);
                }
            })
            .catch(error => {
                console.error('회원정보 변경에 실패했습니다.', error);
                alert('회원정보 변경에 실패했습니다. 다시 시도해주세요.');
            });
        },

        back() {
            this.$router.push('/');
        },

        delWithdrawal() {
            const url = '/userWithdrawal';

            axios.delete()
        }
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