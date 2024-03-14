<template>
    <div class="reservation_layout">
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
                <div class="reservation_header_ball_2">3</div>
            </div>
        </div>
        <div class="reservation_progress_box">
            <div class="h-4 bg-gray-200 rounded reservation_progress_gray">
                <!-- 0314 한줄로 변경 -->
                <!-- <div class="h-full rounded reservation_progress_blue w-1/4"  v-if="this.pageflg==='0'"></div>
                <div class="h-full rounded reservation_progress_blue w-3/4" v-if="this.pageflg==='1'"></div> -->
                <div class="h-full rounded reservation_progress_blue" :class=" pageflg==='0' ? 'w-1/4' : 'w-3/4'"></div>
            </div>      
        </div>

        <div class="reservation_body">
            <div class="reservation_title_1">
                ㅁㅁㅁ 여행
            </div>
            <div class="reservation_to_tiket_title">
                <div>가는편</div>
                <div>3월 11일(일)</div>
                <div>소요시간 1시간 45분</div>
            </div>
            <div class="reservation_to_tiket_info">
                <div class="reservation_to_tiket_time text-center">
                    <div>08:50</div>
                    <div>10:35</div>
                </div>
                <div class="reservation_to_tiket_time_type">
                    <div>INC 서울 인천국제공항 T2</div>
                    <div>진에어 LI233 보잉 777-200 일반석</div>
                    <div>KIX 오사카 간사이공항 T1</div>
                </div>
            </div>
            <div class="reservation_to_tiket_title">
                <div>오는편</div>
                <div>3월 13일(일)</div>
                <div>소요시간 1시간 45분</div>
            </div>
            <div class="reservation_to_tiket_info">
                <div class="reservation_to_tiket_time text-center">
                    <div>09:20</div>
                    <div>11:05</div>
                </div>
                <div class="reservation_to_tiket_time_type">
                    <div>KIX 오사카 간사이공항 T1</div>
                    <div>진에어 LI232 보잉 777-200 일반석</div>
                    <div>INC 서울 인천국제공항 T2</div>
                </div>
            </div>
        </div>
    </div>
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
                    <div class="reservation_input_reset_btn">
                        초기화
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                    </div>
                </div>
                <div class="reservation_grid">
                    <div class="grid gap-4 mb-4 md:grid-cols-2">
                        <input type="text" class="reservation_input" placeholder="성(영문)" v-model="lastName">
                        <input type="text" class="reservation_input" placeholder="이름(중간 이름 포함)" v-model="firstName">
                    </div>
                    <div class="grid gap-4 mb-4 md:grid-cols-3">
                        <select id="" class="w-full reservation_input" v-model="gender">
                            <option value="" disabled selected hidden class="reservation_placeholder">성별</option>
                            <option value="">남자(male)</option>
                            <option value="">여자(female)</option>
                        </select>
                        <input type="date" class="reservation_input" placeholder="생년월일" v-model="birthDate">
                        <fieldset class="reservation_input">
                            <legend >국적</legend>
                            <select id="" class="w-full" v-model="country">
                                <option value="">대한민국</option>
                            </select>
                        </fieldset>
                    </div>
                    <div class="grid gap-4 mb-4 md:grid-cols-3">
                        <fieldset class="reservation_input">
                            <legend >신분증 종류</legend>
                            <select id=""  class="w-full" v-model="idCard">
                                <option value="">여권</option>
                            </select>
                        </fieldset>
                        <input type="text" class="reservation_input" placeholder="여권번호" v-model="passPortNum">
                        <input type="date" class="reservation_input" placeholder="유효기간" v-model="passPortDate">
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
                            취소 시 ,<span><span class="reservation_icon_blue">{{ ticketPrice }}원</span>을(를) 환불 받으실수 있습니다</span></div>
                    </div>
                    <div>
                        <span class="pr-3">
                            <span class="reservation_icon_deepblue">{{ Math.ceil(ticketPrice * 0.15) }}원</span>/1인당
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
                            취소 시 ,<span><span class="reservation_icon_blue">{{ Math.ceil(ticketPrice * 0.8) }}원</span>을(를) 환불 받으실수 있습니다</span></div>
                    </div>
                    <div>
                        <span class="pr-3">
                            <span class="reservation_icon_deepblue">{{ Math.ceil(ticketPrice * 0.1) }}원</span>/1인당
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
                    <div class="reservation_custom_sec_box ">
                        <input type="text" name="" required="" @click="namePlaceholder(1)" v-model="fullName" :placeholder="contactNamePlaceholder">
                        <label>이름</label>
                    </div>
                    <div class="reservation_custom_sec_box">
                        <input type="text" name="" required="" @click="namePlaceholder(2)" v-model="email" :placeholder="contactEmailPlaceholder">
                        <label>이메일</label>
                    </div>
                    <div class="reservation_custom_sec_box">
                        <input type="text" name="" required="" @click="namePlaceholder(3)" v-model="phone" :placeholder="contactNumPlaceholder">
                        <label>휴대폰번호</label>
                    </div>
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
                                <div class="font-bold text-2xl mb-2">탑승자명</div>
                                <div class="text-sm mb-4">{{ lastName }}/{{ firstName }}</div>
                                <div class="font-bold text-2xl mb-2">연락받을메일</div>
                                <div class="text-sm mb-4">{{ email }}</div>
                                <div class="font-bold text-2xl mb-4">여권번호</div>
                                <div class="text-sm mb-2">{{ passPortNum }}</div>
                            </div>
                        </div>
                    </div>
                    <div>{{ ticketPrice }}원</div>
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
                    <div class="reservation_icon_blue" v-if="refund==='1'">{{ Math.ceil(ticketPrice * 0.1) }}원</div>
                    <div class="reservation_icon_blue" v-if="refund==='2'">{{ Math.ceil(ticketPrice * 0.15) }}원</div>
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
            <div class="reservation_next_btn w-full text-center font-bold cursor-pointer w-full">결제</div>
        </div>
    </div>
</template>
<script>
export default {
	name: 'ReservationComponent',
	data() {
		return {
			fullName: '',
			email: '',
			phone: '',
            contactNamePlaceholder: '',
            contactEmailPlaceholder: '',
            contactNumPlaceholder: '',
            ticketPrice:'230043',
            refundPrice100:'',
            refundPrice80:'',
            insurancePrice:0,
            totalPrice: 0,
            day: 4,
            refund: "0",
            refundPrice: 0,
            insurance: "0",
            pageflg:"0",
            popoverFlg: false,
            firstName: '',
            lastName: '',
            gender: '',
            birthDate: '',
            country: '',
            idCard: '',
            passPortNum: '',
            passPortDate: '',
		}
	},
    
	created() {
        this.sumTotalPrice(),
        this.addInsurancePrice()
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

    },

	methods: {
        // 플레이스 홀더용 메소드
        namePlaceholder(i){
            this.contactNamePlaceholder = '';
            this.contactEmailPlaceholder = '';  
            this.contactNumPlaceholder = '';
            if(i===1){
                this.contactNamePlaceholder = "예)gildong/hong"
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
                this.refundPrice =  Math.ceil(this.ticketPrice * 0.1)
            }else if(i===2){
                this.refundPrice =  Math.ceil(this.ticketPrice * 0.15)
            }
        },
        // 보험 가격 더하기
        addInsurancePrice(){
            this.insurancePrice = 3000*this.day
        },
        // 최종 금액
        sumTotalPrice(){            
            if(this.insurance==="1"){
                this.totalPrice = parseInt(this.ticketPrice)+this.refundPrice+this.insurancePrice
            }else{
                this.totalPrice = parseInt(this.ticketPrice)+this.refundPrice
            }
        },
        // 페이지플래그 변경
        changeFlg(i) {
            if (i === 1) {
                this.pageflg = "1";
                window.scrollTo({ top: 0 }); // 페이지 맨 위로 스크롤
            } else {
                this.pageflg = "0";
                // 페이지의 가장 아래로 스크롤합니다.
                setTimeout(() => {
                    document.documentElement.scrollIntoView({  block: 'end' });
                }, 10);
            }
        }
	},
}
</script>
<style lang="scss">
	@import '../../sass/Reservation/reservation.scss';
</style>
