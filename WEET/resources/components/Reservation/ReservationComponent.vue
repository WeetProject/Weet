<template>
    <div class="reservation_layout">
        <!-- 최상단 1,2,3 -->
        <div class="reservation_header text-center">
            <div class="reservation_header_box">
                <span>예약정보확인</span>    
                <div class="reservation_header_ball_1">1</div>
            </div>
            <div class="reservation_header_box">
                <span>결제 준비</span>    
                <div :class=" pageflg==='0' ? 'reservation_header_ball_2' : 'reservation_header_ball_1'">2</div>
            </div>
            <div class="reservation_header_box">
                <span>결제 완료</span>    
                <div :class=" pageflg==='2' ? 'reservation_header_ball_1' : 'reservation_header_ball_2'">3</div>
            </div>
        </div>
        <!-- 123 뒤 프로그레스 바 -->
        <div class="reservation_progress_box">
            <div class="h-4 bg-gray-200 rounded reservation_progress_gray">
                <!-- 0314 한줄로 변경 -->
                <!-- <div class="h-full rounded reservation_progress_blue w-1/4"  v-if="this.pageflg==='0'"></div>
                <div class="h-full rounded reservation_progress_blue w-3/4" v-if="this.pageflg==='1'"></div> -->
                <!-- 0318 데이터에 값불러오는 형태로 변형 -->
                <!-- <div class="h-full rounded reservation_progress_blue" :class=" pageflg==='0' ? 'w-1/4' : 'w-3/4'"></div> -->
                <div class="h-full rounded reservation_progress_blue" :class="progressWidth[pageflg]"></div>
            </div>      
        </div>
        <!-- 예약내역 -->
        <div class="reservation_body" v-if="pageflg !=='2'&&pageflg !=='3'">
            <div class="reservation_title_1">
                항공권 정보
            </div>
            <div class="reservation_to_tiket_title">
                <div>가는편</div>
                <div v-if="departureDate1===arrivalDate1">{{ arrivalDate1 }}</div>
                <div v-else>{{ departureDate1 }}~{{ arrivalDate1 }}</div>
                <div>소요시간 1시간 45분</div>
            </div>
            <div class="reservation_to_tiket_info">
                <div class="reservation_to_tiket_time text-center">
                    <div>{{ departureTime1 }}</div>
                    <div>{{ arrivalTime1 }}</div>
                </div>
                <div class="reservation_to_tiket_time_type">
                    <div>{{ departureAirport1 }}</div>
                    <div>{{ departureAirplane }}</div>
                    <div>{{ arrivalAirport1 }}</div>
                </div>
            </div>
            <div class="reservation_to_tiket_title">
                <div>오는편</div>
                <div v-if="departureDate2===arrivalDate2">{{ arrivalDate2 }}</div>
                <div v-else>{{ departureDate2 }}~{{ arrivalDate2 }}</div>
                <div>소요시간 1시간 45분</div>
            </div>
            <div class="reservation_to_tiket_info">
                <div class="reservation_to_tiket_time text-center">
                    <div>{{ departureTime2 }}</div>
                    <div>{{ arrivalTime2 }}</div>
                </div>
                <div class="reservation_to_tiket_time_type">
                    <div>{{ departureAirport2 }}</div>
                    <div>{{ arrivalAirplane }}</div>
                    <div>{{ arrivalAirport2 }}</div>
                </div>
            </div>
        </div>
    </div>
    <!-- 첫페이지 -->
    <div class="reservation_gray_bg" v-if="pageflg==='0'">
        <div class="reservation_body">
            <div class="reservation_title_2">나의 항공권</div>
            <div class="reservation_baggage_rule_box">
                <div class="reservation_baggage">
                    <div class="reservation_title_4">수하물 허용량</div>
                    <div>
                        <span class="reservation_icon_flex pr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-duffle reservation_icon_blue" viewBox="0 0 16 16">
                                <path d="M8 5.75c1.388 0 2.673.193 3.609.385a18 18 0 0 1 1.43.354l.112.034.002.001h.001a.5.5 0 0 1-.308.952l-.004-.002-.018-.005a17 17 0 0 0-1.417-.354A17.3 17.3 0 0 0 8 6.75a17.3 17.3 0 0 0-3.408.365 17 17 0 0 0-1.416.354l-.018.005-.003.001a.5.5 0 1 1-.308-.95A17.3 17.3 0 0 1 8 5.75"/>
                                <path d="M5.229 2.722c-.126.461-.19.945-.222 1.375-1.401.194-2.65.531-3.525 1.012C-.644 6.278.036 11.204.393 13.127a.954.954 0 0 0 .95.772h13.314a.954.954 0 0 0 .95-.772c.357-1.923 1.037-6.85-1.09-8.018-.873-.48-2.123-.818-3.524-1.012a7.4 7.4 0 0 0-.222-1.375c-.162-.593-.445-1.228-.971-1.622-1.115-.836-2.485-.836-3.6 0-.526.394-.81 1.03-.971 1.622M9.2 1.9c.26.195.466.57.606 1.085.088.322.142.667.173.998a23.3 23.3 0 0 0-3.958 0 6 6 0 0 1 .173-.998c.14-.515.346-.89.606-1.085.76-.57 1.64-.57 2.4 0M8 4.9c2.475 0 4.793.402 6.036 1.085.238.13.472.406.655.93.183.522.28 1.195.303 1.952.047 1.486-.189 3.088-.362 4.032H1.368c-.173-.944-.409-2.545-.362-4.032.024-.757.12-1.43.303-1.952.183-.524.417-.8.655-.93C3.207 5.302 5.525 4.9 8 4.9"/>
                            </svg>
                            휴대수화물 : <span class="font-bold">1 X 10kg</span>
                        </span>
                    </div>
                    <div>
                        <span class="reservation_icon_flex pr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suitcase reservation_icon_blue" viewBox="0 0 16 16">
                                <path d="M6 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 6 5m2 0a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m2 0a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 10 5"/>
                                <path d="M6.5 0a.5.5 0 0 0-.5.5V3H5a2 2 0 0 0-2 2v8a2 2 0 0 0 1.031 1.75A1.003 1.003 0 0 0 5 16a1 1 0 0 0 1-1h4a1 1 0 1 0 1.969-.25A2 2 0 0 0 13 13V5a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-.5-.5zM9 3H7V1h2zm3 10a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                            </svg>
                            위탁수화물 : <span class="font-bold">1 X 15kg</span>
                        </span>
                    </div>
                </div>
                <div class="reservation_rule">
                    <div class="reservation_title_4">규정</div>
                    <div>
                        <span class="reservation_icon_flex pr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ban reservation_icon_gray" viewBox="0 0 16 16">
                                <path d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                            </svg>
                            일부 환불 불가
                        </span>
                    </div>
                    <div>
                        <span class="reservation_icon_flex pr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin reservation_icon_blue" viewBox="0 0 16 16">
                                <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z"/>
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                            </svg>
                            변경 수수료 최저가 : 38500원
                        </span>
                    </div>
                </div>
            </div>
            <div class="reservation_title_2">여행자 정보</div>
            <div class="reservation_passenger_box">
                <div class="reservation_spacebetween">
                    <div class="reservation_icon_flex">
                        <div class="reservation_title_4">탑승객 1</div>
                        <div>(성인한공권)</div>
                    </div>
                    <div class="reservation_input_reset_btn" @click="clearForm">
                        초기화
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                    </div>
                </div>
                <div class="reservation_grid">
                    <div class="grid gap-4 mb-4 md:grid-cols-2">
                        <input type="text" class="reservation_input" placeholder="성(영문)" v-model="lastName" :class="lastNameValFlg!=='9'&&lastNameValFlg!=='0'?'reservation_fail':''" @input="koreaLastName">
                        <input type="text" class="reservation_input" placeholder="이름(중간 이름 포함)" v-model="firstName" :class="firstNameValFlg!=='9'&&firstNameValFlg!=='0'?'reservation_fail':''" @input="koreaFirstName">
                        <div v-if="lastNameValFlg!=='0'&&lastNameValFlg!=='9'" class="text-red-600 text-xs font-bold">{{ lastNameValMsg[lastNameValFlg] }}</div>
                        <div v-if="firstNameValFlg!=='0'&&firstNameValFlg!=='9'" class="text-red-600 text-xs font-bold">{{ firstNameValMsg[firstNameValFlg] }}</div>
                    </div>
                    <div class="grid gap-4 mb-4 md:grid-cols-3">
                        <select id="" class="w-full reservation_input" v-model="gender">
                            <option value="M">남자(male)</option>
                            <option value="F">여자(female)</option>
                        </select>
                        <input type="date" class="reservation_input" placeholder="생년월일" v-model="birthDate" :class="birthDateValFlg!=='9'&&birthDateValFlg!=='0'?'reservation_fail':''">
                        <fieldset class="reservation_input">
                            <legend >국적</legend>
                            <select id="" class="w-full" v-model="country">
                                <option value="KOR">대한민국</option>
                            </select>
                        </fieldset>
                        <div v-if="birthDateValFlg!=='0'&&birthDateValFlg!=='9'" class="text-red-600 text-xs font-bold col-span-3">{{ birthDateValMsg[birthDateValFlg] }}</div>
                    </div>
                    <div class="grid gap-4 mb-4 md:grid-cols-3">
                        <fieldset class="reservation_input">
                            <legend >신분증 종류</legend>
                            <select id=""  class="w-full" v-model="idCard">
                                <option value="passport">여권</option>
                            </select>
                        </fieldset>
                        <input type="text" class="reservation_input" placeholder="여권번호" v-model="passPortNum" :class="passPortNumValFlg!=='9'&&passPortNumValFlg!=='0'?'reservation_fail':''" @input="koreaPassPortNum">
                        <input type="date" class="reservation_input" placeholder="유효기간" v-model="passPortDate" :class="passPortDateValFlg!=='9'&&passPortDateValFlg!=='0'?'reservation_fail':''">
                        <div v-if="passPortNumValFlg!=='0'&&passPortNumValFlg!=='9'" class="text-red-600 text-xs font-bold">{{ passPortNumValMsg[passPortNumValFlg] }}</div>
                        <div v-if="passPortDateValFlg!=='0'&&passPortDateValFlg!=='9'" class="text-red-600 text-xs font-bold">{{ passPortDateValMsg[passPortDateValFlg] }}</div>
                    </div>
                </div>
                <div class="reservation_notification_box text-sm"><span>*</span> 이름을 포함하여 탑승객의 모든 정보는 신분증 정보와 일치해야합니다.신분증 상의 정보와 다른경우 <span>탑승이 불가</span>
                    하여, 예약 확정 후에는 <span>탑승객 정보의 변경이 불가</span>합니다.
                </div>
            </div>
            <div class="reservation_title_3">이유불문! 환불보장</div>
            <div class="reservation_refund_box">
                <div class="reservation_refund_area relative">
                    <div>
                        <span>예약 항공권 금액 100% 보상!</span>
                        <div class="reservation_icon_flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check reservation_icon_blue" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                            </svg>
                            취소 시 ,<span><span class="reservation_icon_blue">{{ ticketPrices }}원</span>을(를) 환불 받으실수 있습니다</span></div>
                    </div>
                    <div>
                        <span class="pr-3">
                            <span class="reservation_icon_deepblue">{{ Math.ceil(ticketPrices * 0.15) }}원</span>/1인당
                        </span>
                        <input type="radio" name="refund" class="cursor-pointer" id="reservation_refund_100" v-model="refund" value="2">
                    </div>
                    <label for="reservation_refund_100" class="reservation_radio_label absolute right-0 top-0 cursor-pointer w-full h-full"/>
                </div>
                <div class="reservation_refund_area relative">
                    <div>
                        <span>예약 항공권 금액 80% 보상!</span>
                        <div class="reservation_icon_flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check reservation_icon_blue" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                            </svg>
                            취소 시 ,<span><span class="reservation_icon_blue">{{ Math.ceil(ticketPrices * 0.8) }}원</span>을(를) 환불 받으실수 있습니다</span></div>
                    </div>
                    <div>
                        <span class="pr-3">
                            <span class="reservation_icon_deepblue">{{ Math.ceil(ticketPrices * 0.1) }}원</span>/1인당
                        </span>
                        <input type="radio" name="refund" class="cursor-pointer" id="reservation_refund_80" v-model="refund" value="1">
                    </div>
                    <label for="reservation_refund_80" class="reservation_radio_label absolute right-0 top-0 cursor-pointer w-full h-full"/>
                </div>
                <div class="reservation_refund_area relative">
                    <div>
                        <span>보상없음</span>
                        <div class="reservation_icon_flex text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                            </svg>
                            취소 시,환불이 불가합니다
                        </div>
                    </div>
                    <div>
                        <input type="radio" name="refund" class="cursor-pointer" id="reservation_refund_0" v-model="refund" value="0">
                    </div>
                    <label for="reservation_refund_0" class="reservation_radio_label absolute right-0 top-0 cursor-pointer w-full h-full"/>
                </div>
            </div>
            <div class="reservation_title_3">안전한 여행을 위한 해외 보험 서비스</div>
            <div class="reservation_refund_box">
                <span class="reservation_title_4">해외여행 보험서비스</span>
                <div class="reservation_icon_flex text-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check reservation_icon_blue" viewBox="0 0 16 16">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                    </svg>
                    COVID 보장
                </div>
                <div class="reservation_icon_flex text-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check reservation_icon_blue" viewBox="0 0 16 16">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                    </svg>
                    여행중 상해 의료비 5000만원 실손보상
                </div>
                <div class="reservation_icon_flex text-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check reservation_icon_blue" viewBox="0 0 16 16">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                    </svg>
                    여행중 휴대품 손해 30만원 보장
                </div>
                <div class="reservation_icon_flex text-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check reservation_icon_blue" viewBox="0 0 16 16">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                    </svg>
                    해외여행 중단 보상 30만원 보장
                </div>
                <div class="cursor-pointer reservation_icon_deepblue text-sm mb-3">
                    보장내역 자세히 보기 》
                </div>
                <hr>
                <div class="text-sm">
                    <span>기간 및 보장범위: 2024년03월10일 00:00</span> ㅡ <span>2024년03월13일 00:00</span>
                </div>
                <div class="text-sm mb-2">
                    총 보험료: <span class="reservation_icon_deepblue font-black">{{ insurancePrice }}원</span>
                </div>
                <div class="text-sm font-black">
                    안전한 여행을 위한 필수품, 해외여행보험! 미리준비하면 든든합니다.
                </div>
                <div class="reservation_insurance_area relative">
                    <label for="reservation_insurance_yes" class="reservation_radio_label absolute right-0 top-0 cursor-pointer w-full h-full"/>
                    <div>
                        <input type="radio" name="insurance" id="reservation_insurance_yes" v-model="insurance" value="1">
                        <span> 네, 해외여행보험서비스를 구매하겠습니다.</span>
                    </div>
                    <div>
                        <div class="reservation_insurance_small_msg text-xs">
                            <span class="reservation_icon_deepblue ">해외여행보험 이용약관</span> 및 <span class="reservation_icon_deepblue">보험가입 시 유의사항</span>에 동의합니다.
                        </div>
                        <div class="reservation_insurance_small_msg text-xs">해외여행보험 불가능(보상불가) 지역 안내</div>
                        <div class="reservation_insurance_small_msg text-xs">단체여행보험 연말정산 소득공제 제외 안내</div>
                        <div class="reservation_insurance_small_msg text-xs">실손 담보 비례보상 안내</div>
                        <div class="reservation_insurance_small_msg text-xs">휴대폰 손해 보상 안내</div>
                        <div class="reservation_insurance_small_msg text-xs">항공기 및 수하물 지연보상 안내</div>
                    </div>
                </div>
                <div class="reservation_insurance_area relative">
                    <label for="reservation_insurance_no" class="reservation_radio_label absolute right-0 top-0 cursor-pointer w-full h-full"/>
                    <div>
                        <input type="radio" name="insurance" id="reservation_insurance_no" v-model="insurance" value="0">
                        <span> 아니오, 해외여행보험서비스를 구매하지 않겠습니다.</span>
                    </div>
                </div>
            </div>
            <div class="reservation_title_3">연락처 정보</div>
            <div class="reservation_contact_info_box">
                <div class="reservation_custom_box grid gap-4 md:grid-cols-3">
                    <div class="reservation_custom_sec_box " :class="fullNameValFlg!=='9'&&fullNameValFlg!=='0'?'reservation_fail':''">
                        <input type="text" name="" required="" @click="namePlaceholder(1)" v-model="fullName" :placeholder="contactNamePlaceholder" @input="koreaFullName">
                        <label>이름</label>
                    </div>
                    <div class="reservation_custom_sec_box" :class="emailValFlg!=='9'&&emailValFlg!=='0'?'reservation_fail':''">
                        <input type="text" name="" required="" @click="namePlaceholder(2)" v-model="email" :placeholder="contactEmailPlaceholder" @input="koreaEmail" >
                        <label>이메일</label>
                    </div>
                    <div class="reservation_custom_sec_box" :class="phoneValFlg!=='9'&&phoneValFlg!=='0'?'reservation_fail':''">
                        <input type="text" name="" required="" maxlength="11" @click="namePlaceholder(3)" v-model="phone" :placeholder="contactNumPlaceholder" @input="koreaPhone">
                        <label>휴대폰번호</label>
                    </div>
                    <div v-if="fullNameValFlg!=='0'&&fullNameValFlg!=='9'" class="text-red-600 text-xs font-bold">{{ fullNameValMsg[fullNameValFlg] }}</div>
                        <div v-if="emailValFlg!=='0'&&emailValFlg!=='9'" class="text-red-600 text-xs font-bold">{{ emailValMsg[emailValFlg] }}</div>
                        <div v-if="phoneValFlg!=='0'&&phoneValFlg!=='9'" class="text-red-600 text-xs font-bold">{{ phoneValMsg[phoneValFlg] }}</div>
                </div>
            </div>
            <div class="reservation_next_btn_box">
                <div class="reservation_next_btn_price">
                    <div class="reservation_title_4">총금액</div>
                    <div class="text-2xl font-bold reservation_icon_deepblue">{{ totalPrice }}원</div>
                </div>
                <div class="reservation_next_btn w-full text-center font-bold cursor-pointer" @click="changeFlg(1)">다음</div>
            </div>
        </div>
    </div>
    <!-- 중간페이지 -->
    <div v-if="pageflg==='1'" class="reservation_body">
        <div class="reservation_spacebetween mb-10">
            <div class="reservation_switch">
                <input id="s1" type="checkbox" class="reservation_switch" disabled :checked="refund==='2' ? true : false">
                <label for="s1" class="pl-2">100%환불</label>
            </div>
            <div class="reservation_switch">
                <input id="s1" type="checkbox" class="reservation_switch" disabled :checked="refund==='1' ? true : false">
                <label for="s1" class="pl-2">80%환불</label>
            </div>
            <div class="reservation_switch">
                <input id="s1" type="checkbox" class="reservation_switch" disabled :checked="insurance==='1' ? true : false">
                <label for="s1" class="pl-2">여행자보험</label>
            </div>
        </div>
        <div class="max-w-sm rounded overflow-hidden shadow-2xl mx-auto mb-5">
            <div class="px-6 py-4">
                <div class="font-bold text-2xl mb-4">요금 상세정보</div>
                <div class="font-bold text-sm mb-2 reservation_spacebetween">
                    <div class="reservation_icon_flex">
                        <div >
                            항공권 (성인1명)
                        </div>
                        <div class="cursor-pointer relative" @mouseover="popoverFlg=true" @mouseleave="popoverFlg=false">
                            <svg class="w-4 h-4 ms-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                            </svg>
                            <div class="reservation_popover" v-if="popoverFlg">
                                <div class="font-bold text-xl mb-2">탑승자명</div>
                                <div class="text-sm mb-4">{{ lastName }}/{{ firstName }}</div>
                                <div class="font-bold text-xl mb-2">연락받을메일</div>
                                <div class="text-sm mb-4">{{ email }}</div>
                                <div class="font-bold text-xl mb-2">여권번호</div>
                                <div class="text-sm mb-4">{{ passPortNum }}</div>
                                <div class="font-bold text-xs mb-2 text-red-500">※ 결제 후 수정이 불가능 합니다.</div>
                            </div>
                        </div>
                    </div>
                    <div>{{ ticketPrices }}원</div>
                </div>
                <div class="text-sm mb-4">탑승객</div>
                <div class="font-bold text-sm mb-2">수하물</div>
                <div class="text-sm mb-1 reservation_spacebetween">
                    <div>개인 소지품</div>
                    <div class="reservation_icon_blue">무료</div>
                </div>
                <div class="text-sm mb-1 reservation_spacebetween">
                    <div>휴대 수하물</div>
                    <div class="reservation_icon_blue">무료</div>
                </div>
                <div class="text-sm mb-3 reservation_spacebetween">
                    <div>위탁 수하물</div>
                    <div class="reservation_icon_blue">무료</div>
                </div>
                <hr class="mb-3" v-if="insurance==='1'||refund==='1'||refund==='2'">
                <div class="text-sm mb-2 reservation_spacebetween" v-if="insurance==='1'||refund==='1'||refund==='2'">
                    <div v-if="refund==='1'">환불80%</div>
                    <div v-if="refund==='2'">환불100%</div>
                    <div class="reservation_icon_blue" v-if="refund==='1'">{{ Math.ceil(ticketPrices * 0.1) }}원</div>
                    <div class="reservation_icon_blue" v-if="refund==='2'">{{ Math.ceil(ticketPrices * 0.15) }}원</div>
                </div>
                <div class="text-sm mb-2 reservation_spacebetween" v-if="insurance==='1'||refund==='1'||refund==='2'">
                    <div v-if="insurance==='1'">여행자보험</div>
                    <div class="reservation_icon_blue" v-if="insurance==='1'">{{ insurancePrice }}원</div>
                </div>
                <hr>
                <div class="font-bold text-xl mt-3 reservation_spacebetween">
                    <div>총결제금액</div>
                    <div class="reservation_icon_deepblue">{{ totalPrice }}원</div>
                </div>
            </div>
        </div>
        <div class="grid gap-4 mb-4 md:grid-cols-2">
            <div class="reservation_next_btn w-full text-center font-bold cursor-pointer w-full" @click="changeFlg(0)">이전</div>
            <div class="reservation_next_btn w-full text-center font-bold cursor-pointer w-full" @click="requestPay()">결제</div>
        </div>
    </div>
    <!-- 결제완료 -->
    <div v-if="pageflg==='2'" class="reservation_body reservation_complete text-center">
        <svg class="w-[60px] h-[60px] text-gray-800 dark:text-white reservation_complete_icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
        </svg>
        <div class="reservation_complete_msg">
            결제가 완료되었습니다.
        </div>
        <button type="button" class="py-2.5 px-5 me-2 mb-2 text-sm  text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 font-bold" @click="clickMain(1)">메인으로</button>
    </div>
    <!-- 결제취소 및 에러 -->
    <div v-if="pageflg==='3'" class="reservation_body reservation_complete text-center">
        <svg class="w-[60px] h-[60px] text-gray-800 dark:text-white reservation_cancel_icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
        </svg>
        <div class="reservation_complete_msg">
            결제가 취소되었습니다.
        </div>
        <button type="button" class="py-2.5 px-5 me-2 mb-2 text-sm  text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 font-bold" @click="clickMain(0)">처음으로</button>
        <button type="button" class="py-2.5 px-5 me-2 mb-2 text-sm  text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 font-bold" @click="clickMain(1)">메인으로</button>
    </div>
</template>
<script>
import { format, parseISO } from 'date-fns';
import { ko } from 'date-fns/locale';

export default {
	name: 'ReservationComponent',
	data() {
        return {
            // api받아온거
            departureAt1: '2021-11-01T11:35:00',
            arrivalAt1: '2021-11-02T15:35:00',
            departureAt2: '2021-11-21T12:35:00',
            arrivalAt2: '2021-11-21T17:35:00',
            departureAirplane: '진에어 LI233 보잉 777-200',
            departureAirplaneNum: '322',
            arrivalAirplane: '진에어 LI232 보잉 777-200',
            arrivalAirplaneNum: '232',
            // 가는편 = 1
            departureAirport1: 'INC 서울 인천국제공항 T2',
            departureDate1: '',
            departureTime1: '',
            departureTicketPrice: 158000,
            arrivalAirport1: 'KIX 오사카 간사이공항 T1',
            arrivalDate1: '',
            arrivalTime1: '',
            // 오는편 = 2
            departureAirport2: 'KIX 오사카 간사이공항 T1',
            departureDate2: '',
            departureTime2: '',
            arrivalAirport2: 'INC 서울 인천국제공항 T2',
            arrivalDate2: '',
            arrivalTime2: '',
            arrivalTicketPrice: 130000,
            // 연락처
			fullName: '',
			email: '',
			phone: '',
            // 연락처 플레이스홀더용
            contactNamePlaceholder: '',
            contactEmailPlaceholder: '',
            contactNumPlaceholder: '',
            // 가격
            ticketPrices: 0,
            insurancePrice:0,
            totalPrice: 0,
            // 여행기간
            day: 4,
            refund: "0",
            refundPrice: 0,
            insurance: "0",
            pageflg:"0",
            popoverFlg: false,
            firstName: '',
            lastName: '',
            gender: 'M',
            birthDate: '',
            country: 'KOR',
            idCard: 'passport',
            passPortNum: '',
            passPortDate: '',
            lastNameValMsg:["","이름(성)은 필수 입력 사항 입니다.","이름(성)은 0~50 글자 사이로 입력해 주세요.","이름(성)은 영문만 입력 가능합니다."],
            lastNameValFlg:"0",
            firstNameValMsg:["","이름은 필수 입력 사항 입니다.","이름은 0~50 글자 사이로 입력해 주세요.","이름은 영문만 입력 가능합니다."],
            firstNameValFlg:"0",
            birthDateValMsg:["","생년월일은 필수 입력 사항 입니다.","현재 날짜보다 미래 입니다."],
            birthDateValFlg:"0",
            passPortNumValMsg:["","여권번호는 필수 입력 사항 입니다.","여권번호가 형식이 유효하지 않습니다."],
            passPortNumValFlg:"0",
            passPortDateValMsg:["","유효기간 필수 입력 사항 입니다.","유효기간이 만료 되었습니다."],
            passPortDateValFlg:"0",
            fullNameValMsg:["","이름은 필수 입력 사항 입니다.","이름은 0~50 글자 사이로 입력해 주세요","한글or영문만 입력 가능합니다"],
            fullNameValFlg:"0",
            emailValMsg:["","이메일 필수 입력 사항 입니다.","이메일의 형식이 유효하지 않습니다."],
            emailValFlg:"0",
            phoneValMsg:["","연락처는 필수 입력 사항 입니다","-를 제외한 11자리를 입력해 주세요","연락처의 형식이 유효하지 않습니다."],
            phoneValFlg:"0",
            progressWidth:["w-1/4","w-3/4","w-full","w-3/4"],
		}
	},
    
	created() {
        // 결제api 스크립트 불러오기
        this.sumTicketPrice();
        this.sumTotalPrice();
        this.addInsurancePrice();
        IMP.init('imp68563753');
	},

    mounted() {
        this.formatDateTime();
    },

    watch: {
		refund(){
            if(this.refund==="0"){
                this.addRefundPrice(0)
            }else if(this.refund==="1"){
                this.addRefundPrice(1)
            }else if(this.refund==="2"){
                this.addRefundPrice(2)
            }
            this.sumTotalPrice()
		},
		insurance(){
            this.sumTotalPrice()
		},
        firstName(){
			this.firstNameValidation();
		},
        lastName(){
			this.lastNameValidation();
		},
        birthDate(){
			this.birthdateValidation();
		},
        passPortNum(){
            this.passPortNumValidation();
        },
        passPortDate(){
			this.passPortDateValidation();
		},
        fullName(){
			this.fullNameValidation();
		},
        email(){
			this.emailValidation();
		},
        phone(){
			this.phoneValidation();
		},
    },

	methods: {
        // 플레이스 홀더용 메소드
        namePlaceholder(i){
            this.contactNamePlaceholder = '';
            this.contactEmailPlaceholder = '';  
            this.contactNumPlaceholder = '';
            if(i===1){
                this.contactNamePlaceholder = "한글or영어"
            }else if(i===2){
                this.contactEmailPlaceholder = "연락 받으실 Email"
            }else if(i===3){
                this.contactNumPlaceholder = "예)01011111111"
            }
        },
        // 환불보장 가격 더하기
        addRefundPrice(i){
            if(i===0){
                this.refundPrice = 0
            }else if(i===1){
                this.refundPrice =  Math.ceil(this.ticketPrices * 0.1)
            }else if(i===2){
                this.refundPrice =  Math.ceil(this.ticketPrices * 0.15)
            }
        },
        // 보험 가격 더하기
        addInsurancePrice(){
            this.insurancePrice = 3000*this.day
        },
        // 티켓 금액 합
        sumTicketPrice(){
            this.ticketPrices = this.departureTicketPrice + this.arrivalTicketPrice 
        },
        // 최종 금액
        sumTotalPrice(){            
            if(this.insurance==="1"){
                this.totalPrice = parseInt(this.ticketPrices)+this.refundPrice+this.insurancePrice
            }else{
                this.totalPrice = parseInt(this.ticketPrices)+this.refundPrice
            }
        },
        // 페이지플래그 변경
        changeFlg(i) {
            if (i === 1) {
                if(this.lastNameValFlg==="9"&&this.firstNameValFlg==="9"&&this.birthDateValFlg==="9"&&this.passPortNumValFlg==="9"&&this.passPortDateValFlg==="9"&&this.fullNameValFlg==="9"&&this.emailValFlg==="9"&&this.phoneValFlg==="9"){
                    this.pageflg = "1";
                    window.scrollTo({ top: 0 }); // 페이지 맨 위로 스크롤
                }else{
                    this.firstNameValidation();
                    this.lastNameValidation();
                    this.birthdateValidation();
                    this.passPortNumValidation();
                    this.passPortDateValidation();
                    this.fullNameValidation();  
                    this.emailValidation();
                    this.phoneValidation();
                    if(this.lastNameValFlg!=="9"||this.firstNameValFlg!=="9"||this.birthDateValFlg!=="9"||this.passPortNumValFlg!=="9"||this.passPortDateValFlg!=="9"){
                        window.scrollTo({ top: 800, behavior: 'smooth' });
                    }
                }
            } else {
                this.pageflg = "0";
                // 페이지의 가장 아래로 스크롤합니다.
                setTimeout(() => {
                    document.documentElement.scrollIntoView({  block: 'end' });
                }, 10);
            }
        },
        // 여권 lastname 바리데이션
        lastNameValidation(){
			const VAR = /^.{2,50}$/;
			const VAR1 = /^[a-zA-Z0-9]+$/;
			if(this.lastName===""){
                console.log("진입")
				this.lastNameValFlg = "1";
                return
			}else if(!VAR.test(this.lastName)){
				this.lastNameValFlg = "2";
				return;
			}else if(!VAR1.test(this.lastName)){
				this.lastNameValFlg = "3";
				return;
			}
			this.lastNameValFlg = "9";
		},
        // 여권 firstname 바리데이션
        firstNameValidation(){
			const VAR = /^.{2,50}$/;
			const VAR1 = /^[a-zA-Z0-9]+$/;
			if(this.firstName===""){
				this.firstNameValFlg = "1";
                return
			}else if(!VAR.test(this.firstName)){
				this.firstNameValFlg = "2";
				return;
			}else if(!VAR1.test(this.firstName)){
				this.firstNameValFlg = "3";
				return;
			}
			this.firstNameValFlg = "9";
		},
        // 생년월일 바리데이션
        birthdateValidation(){
            console.log("함수진입")
            const today = new Date();
			const year = today.getFullYear();
			const month = (today.getMonth() + 1).toString().padStart(2, '0');
			const day = today.getDate().toString().padStart(2, '0');
			const formattedDate = year+"-"+month+"-"+day;
			if(this.birthDate===""){
				this.birthDateValFlg = "1";
                return;
			}else if(this.birthDate>=formattedDate){
                console.log("이상")
				this.birthDateValFlg = "2";
				return;
			}
			this.birthDateValFlg = "9";
		},
        // 여권번호 바리데이션
        passPortNumValidation(){
			const VAR = /^[A-Za-z]{1,3}\d{6,9}$/;
			if(this.passPortNum===""){
				this.passPortNumValFlg = "1";
                return
			}else if(!VAR.test(this.passPortNum)){
				this.passPortNumValFlg = "2";
				return;
			}
			this.passPortNumValFlg = "9";
		},
        // 여권 유효기간 바리데이션
        passPortDateValidation(){
            console.log("함수진입")
            const today = new Date();
			const year = today.getFullYear();
			const month = (today.getMonth() + 1).toString().padStart(2, '0');
			const day = today.getDate().toString().padStart(2, '0');
			const formattedDate = year+"-"+month+"-"+day;
            if(this.passPortDate===""){
				this.passPortDateValFlg = "1";
                return;
			}else if(this.passPortDate<=formattedDate){
				this.passPortDateValFlg = "2";
				return;
			}
			this.passPortDateValFlg = "9";
		},
        // 풀네임 바리데이션
        fullNameValidation(){
			const VAR = /^.{2,50}$/;
            const VAR1 = /^[가-힣]*$|^[a-zA-Z]*$/;
			if(this.fullName===""){
				this.fullNameValFlg = "1";
                return
			}else if(!VAR.test(this.fullName)){
				this.fullNameValFlg = "2";
				return;
			}else if(!VAR1.test(this.fullName)){
				this.fullNameValFlg = "3";
				return;
			}
			this.fullNameValFlg = "9";
		},
        // 이메일 바리데이션
        emailValidation(){
            const VAR = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
            if(this.email===""){
				this.emailValFlg = "1";
                return;
			}else if(!VAR.test(this.email)){
				this.emailValFlg = "2";
				return;
			}
			this.emailValFlg = "9";
		},
        // 휴대폰번호 바리데이션
        phoneValidation(){
            const VAR = /^[^-]{11}$/;
			const VAR1 = /^010([0-9]{4})([0-9]{4})$/;
            if(this.phone===""){
				this.phoneValFlg = "1";
                return;
			}else if(!VAR.test(this.phone)){
				this.phoneValFlg = "2";
				return;
			}else if(!VAR.test(this.phone)){
				this.phoneValFlg = "3";
				return;
			}
			this.phoneValFlg = "9";
		},
        // 이름(성) 한글 바로인식
		koreaLastName(e) {
			this.lastName = e.target.value;
		},
        // 이름 한글 바로인식
		koreaFirstName(e) {
			this.firstName = e.target.value;
		},
        // 여권번호 한글 바로인식
		koreaPassPortNum(e) {
			this.passPortNum = e.target.value;
		},
        // 이름 한글 바로인식
		koreaFullName(e) {
			this.fullName = e.target.value;
		},
        // 입력창 초기화 버튼
        clearForm(){
            this.firstName= '';
            this.lastName= '';
            this.birthDate= '';
            this.passPortNum= '';
            this.passPortDate= '';
            setTimeout(() => {
                this.lastNameValFlg = "0";
                this.firstNameValFlg = "0";
                this.birthDateValFlg = "0";
                this.passPortNumValFlg = "0";
                this.passPortDateValFlg = "0";
            }, 50);
        },
        // 결제완료후 메인으로
        clickMain(i){
            // 예약 첫페이지로 0
            if(i===0){
                this.pageflg="0"
            }
            // 메인으로 1
            if(i===1){
                // 쿠키클리어 한뒤 라우터 푸쉬
                this.$router.push('/')
            }
        },
        // 결제기능
        requestPay: function () {
            IMP.request_pay({ // param
                pg: "kakaopay",
                pay_method: "card",
                name: "weet 항공권",
                amount: this.totalPrice,
                buyer_email: this.email,
                buyer_name: this.fullName,
                buyer_tel: this.phone,
            }, res => { // callback
                if (res.success) {
                    this.addReservation()
                } else {
                    this.pageflg="3"
                }
            });
        },
        // 결제테이블 저장
        addPayment(){
            console.log(this.departureAirplaneNum)
            const URL = '/payment'
            const formData = new FormData();
            formData.append('payment_flg', '0');
            formData.append('payment_price1', this.departureTicketPrice);
            formData.append('reservation_flight_number1', this.departureAirplaneNum);
            formData.append('reservation_departure_airport1', this.departureAirport1);
            formData.append('reservation_departure_time1', this.departureAt1);
            if(this.arrivalAirplaneNum !== ''){
                formData.append('payment_price2', this.arrivalTicketPrice);
                formData.append('reservation_flight_number2', this.arrivalAirplaneNum);
                formData.append('reservation_departure_airport2', this.departureAirport2);
                formData.append('reservation_departure_time2', this.departureAt2);
            }
            axios.post(URL,formData)
            .then(res => {
                if(res.data.code === "0"){
                    this.pageflg="2"
                }else{
                    alert(res.data.errorMsg);
                }
            })
            .catch(err => {
                alert('실패')
            })
        },
        // 예약테이블 저장
        addReservation(){
            const URL = '/reservation'
            const formData = new FormData();
            formData.append('reservation_flight_number1', this.departureAirplaneNum);
            formData.append('reservation_departure_airport1', this.departureAirport1);
            formData.append('reservation_departure_time1', this.departureAt1);
            formData.append('reservation_arrival_airport1', this.arrivalAirport1);
            formData.append('reservation_arrival_time1', this.arrivalAt1);
            formData.append('reservation_ticket_price1', this.departureTicketPrice);
            if(this.arrivalAirplaneNum !== ''){
                formData.append('reservation_flight_number2', this.arrivalAirplaneNum);
                formData.append('reservation_departure_airport2', this.departureAirport2);
                formData.append('reservation_departure_time2', this.departureAt2);
                formData.append('reservation_arrival_airport2', this.arrivalAirport2);
                formData.append('reservation_arrival_time2', this.arrivalAt2);
                formData.append('reservation_ticket_price2', this.arrivalTicketPrice);
            }
            formData.append('reservation_last_name', this.lastName);
            formData.append('reservation_first_name', this.firstName);
            formData.append('reservation_gender', this.gender);
            formData.append('reservation_birth_date', this.birthDate);
            formData.append('reservation_country', this.country);
            formData.append('reservation_id_card', this.idCard);
            formData.append('reservation_passport_num', this.passPortNum);
            formData.append('reservation_passport_date', this.passPortDate);
            formData.append('reservation_full_name', this.fullName);
            formData.append('reservation_email', this.email);
            formData.append('reservation_phone', this.phone);
            formData.append('reservation_refund_flg', this.refund);
            formData.append('reservation_insurance_flg', this.insurance);
            axios.post(URL,formData)
            .then(res => {
                if(res.data.code === "0"){
                    this.addPayment()
                }else{
                    alert(res.data.errorMsg);
                }
            })
            .catch(err => {
                console.log('')
            })
        },
        formatDateTime() {
            // 출발일, 도착일, 출발시간, 도착시간 포맷
            this.formatDateTimeSingle('1', this.departureAt1, this.arrivalAt1);
            this.formatDateTimeSingle('2', this.departureAt2, this.arrivalAt2);
        },
        formatDateTimeSingle(number, departureAt, arrivalAt) {
            const departureDate = parseISO(departureAt);
            const arrivalDate = parseISO(arrivalAt);
            // 출발일 포맷
            this[`departureDate${number}`] = format(departureDate, "MM월dd일 (EEEE)", { locale: ko });
            // 도착일 포맷  
            this[`arrivalDate${number}`] = format(arrivalDate, "MM월dd일 (EEEE)", { locale: ko });
            // 출발시간 포맷
            this[`departureTime${number}`] = format(departureDate, "HH:mm");
            // 도착시간 포맷
            this[`arrivalTime${number}`] = format(arrivalDate, "HH:mm");
        }
	},
}

</script>
<!-- <script src="https://cdn.portone.io/v2/browser-sdk.js"></script> -->
<style lang="scss">
	@import '../../sass/Reservation/reservation.scss';
</style>
