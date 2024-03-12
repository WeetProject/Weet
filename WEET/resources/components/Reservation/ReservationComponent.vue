<template>
    <div class="reservation_layout">
        <div class="reservation_header text-center">
            <div class="reservation_header_box">
                <span>예약정보확인</span>    
                <div class="reservation_header_ball_1">1</div>
            </div>
            <div class="reservation_header_box">
                <span>결제 준비</span>    
                <div class="reservation_header_ball_2">2</div>
            </div>
            <div class="reservation_header_box">
                <span>결제 완료</span>    
                <div class="reservation_header_ball_2">3</div>
            </div>
        </div>
        <!-- <div class="reservation_progress_box">
            <div class="h-4 w-900 bg-gray-200 rounded reservation_progress_gray">
                <div class="h-full rounded reservation_progress_blue w-1/4"></div>
            </div>      
        </div> -->
        <div class="reservation_progress_box">
            <div class="h-4 bg-gray-200 rounded reservation_progress_gray">
                <div class="h-full rounded reservation_progress_blue w-1/4"></div>
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
    <div class="reservation_gray_bg">
        <div class="reservation_body">
            <div class="reservation_title_2">나의 항공권</div>
            <div class="reservation_baggage_rule_box">
                <div class="reservation_baggage">
                    <div class="reservation_title_4">수하물 허용량</div>
                    <div>
                        <span class="reservation_icon_flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-duffle reservation_icon_blue" viewBox="0 0 16 16">
                                <path d="M8 5.75c1.388 0 2.673.193 3.609.385a18 18 0 0 1 1.43.354l.112.034.002.001h.001a.5.5 0 0 1-.308.952l-.004-.002-.018-.005a17 17 0 0 0-1.417-.354A17.3 17.3 0 0 0 8 6.75a17.3 17.3 0 0 0-3.408.365 17 17 0 0 0-1.416.354l-.018.005-.003.001a.5.5 0 1 1-.308-.95A17.3 17.3 0 0 1 8 5.75"/>
                                <path d="M5.229 2.722c-.126.461-.19.945-.222 1.375-1.401.194-2.65.531-3.525 1.012C-.644 6.278.036 11.204.393 13.127a.954.954 0 0 0 .95.772h13.314a.954.954 0 0 0 .95-.772c.357-1.923 1.037-6.85-1.09-8.018-.873-.48-2.123-.818-3.524-1.012a7.4 7.4 0 0 0-.222-1.375c-.162-.593-.445-1.228-.971-1.622-1.115-.836-2.485-.836-3.6 0-.526.394-.81 1.03-.971 1.622M9.2 1.9c.26.195.466.57.606 1.085.088.322.142.667.173.998a23.3 23.3 0 0 0-3.958 0 6 6 0 0 1 .173-.998c.14-.515.346-.89.606-1.085.76-.57 1.64-.57 2.4 0M8 4.9c2.475 0 4.793.402 6.036 1.085.238.13.472.406.655.93.183.522.28 1.195.303 1.952.047 1.486-.189 3.088-.362 4.032H1.368c-.173-.944-.409-2.545-.362-4.032.024-.757.12-1.43.303-1.952.183-.524.417-.8.655-.93C3.207 5.302 5.525 4.9 8 4.9"/>
                            </svg>
                            휴대수화물 : <span class="font-bold">1 X 10kg</span>
                        </span>
                    </div>
                    <div>
                        <span class="reservation_icon_flex">
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
                        <span class="reservation_icon_flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ban reservation_icon_gray" viewBox="0 0 16 16">
                                <path d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                            </svg>
                            일부 환불 불가
                        </span>
                    </div>
                    <div>
                        <span class="reservation_icon_flex">
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
                    <div>
                        <input type="text" class="reservation_input" placeholder="성(영문)">
                        <input type="text" class="reservation_input" placeholder="이름(중간 이름 포함)">
                    </div>
                    <div>
                        <select name="" id="" class="reservation_input" aria-placeholder="성별">
                            <option value="" disabled selected hidden class="reservation_placeholder">성별</option>
                            <option value="">남자(male)</option>
                            <option value="">여자(female)</option>
                        </select>
                        <input type="date" class="reservation_input" placeholder="생년월일">
                        <fieldset class="reservation_input">
                            <legend >국적</legend>
                            <select name="" id="" >
                                <option value="">대한민국</option>
                            </select>
                        </fieldset>
                    </div>
                    <div>
                        <fieldset class="reservation_input">
                            <legend >신분증 종류</legend>
                            <select name="" id="">
                                <option value="">여권</option>
                            </select>
                        </fieldset>
                        <input type="text" class="reservation_input">
                        <input type="date" class="reservation_input">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>
<style lang="scss">
	// @import '../sass/Reservation/reservation.scss';
</style>
