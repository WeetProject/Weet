<template>
    <div class="reservation_layout">
        <!-- 최상단 1,2,3 -->
        <div class="reservation_header text-center">
            <div class="reservation_header_box">
                <span>객실선택</span>    
                <div class="reservation_header_ball_1">1</div>
            </div>
            <div class="reservation_header_box">
                <span>예약 및 결제</span>    
                <div :class=" pageflg==='0' ? 'reservation_header_ball_2' : 'reservation_header_ball_1'">2</div>
            </div>
            <div class="reservation_header_box">
                <span>결제 완료</span>    
                <div :class=" pageflg==='2' ? 'reservation_header_ball_1' : 'reservation_header_ball_2'">3</div>
            </div>
        </div>
        <div class="reservation_progress_box">
            <div class="h-4 bg-gray-200 rounded reservation_progress_gray">
                <div class="h-full rounded reservation_progress_blue" :class="progressWidth[pageflg]"></div>
            </div>      
        </div>
        <!-- 예약내역 -->
        <div class="reservation_body">
            <div class="reservation_title_1">
                호텔 정보
            </div>
            <div>
                <div class="reservation_to_tiket_title">
                    <div>체크인 날짜</div>
                    <div>2023년10월10일</div>
                </div>
                <div class="reservation_to_tiket_info">
                    <div class="reservation_to_tiket_time text-center">
                        <div>테스트</div>
                    </div>
                    <div class="reservation_to_tiket_time_type">
                        <div>테스트1</div>
                    </div>
                </div>
            </div>
            <div class="reservation_to_tiket_title">
                <div>테스트</div>
            </div>
            <div class="reservation_to_tiket_info">
                <div class="reservation_to_tiket_time text-center">
                    <div>테스트</div>
                </div>
                <div class="reservation_to_tiket_time_type">
                    <div>테스트</div>
                </div>
            </div>
        </div>
    </div>
    <!-- 첫페이지 -->
    <div class="reservation_gray_bg" v-if="pageflg==='0'">
        <div class="reservation_body">
            <div class="reservation_title_2">예약자 정보</div>
            <div class="reservation_passenger_box">
                <div class="reservation_spacebetween">
                    <div class="reservation_icon_flex">
                        <div class="reservation_title_4">예약자(대표)</div>
                    </div>
                </div>
                <div class="reservation_grid">
                    <div class="pt-4 pb-4">
                        <div class="reservation_custom_box grid gap-4 md:grid-cols-2 mb-3">
                            <div class="reservation_custom_sec_box " :class="lastNameValFlg!=='9'&&lastNameValFlg!=='0'?'reservation_fail':''">
                                <input type="text" name="" required="" @click="namePlaceholder(1)" v-model="lastName" :placeholder="contactLastNamePlaceholder" @input="koreaLastName">
                                <label>성(영문)</label>
                            </div>
                            <div class="reservation_custom_sec_box" :class="firstNameValFlg!=='9'&&firstNameValFlg!=='0'?'reservation_fail':''">
                                <input type="text" name="" required="" @click="namePlaceholder(2)" v-model="firstName" :placeholder="contactFirstNamePlaceholder"  @input="koreaFirstName">
                                <label>이름(중간 이름 포함)</label>
                            </div>
                            <div v-if="lastNameValFlg!=='0'&&lastNameValFlg!=='9'" class="text-red-600 text-xs font-bold">{{ lastNameValMsg[lastNameValFlg] }}</div>
                            <div v-if="firstNameValFlg!=='0'&&firstNameValFlg!=='9'" class="text-red-600 text-xs font-bold">{{ firstNameValMsg[firstNameValFlg] }}</div>
                        </div>
                        <div class="reservation_custom_box grid gap-4 md:grid-cols-2">
                            <div class="reservation_custom_sec_box " :class="phoneValFlg!=='9'&&phoneValFlg!=='0'?'reservation_fail':''">
                                <input type="text" name="" required="" @click="namePlaceholder(3)" v-model="email" :placeholder="contactEmailPlaceholder" @input="koreaEmail" >
                                <label>이메일</label>
                            </div>
                            <div class="reservation_custom_sec_box" :class="emailValFlg!=='9'&&emailValFlg!=='0'?'reservation_fail':''">
                                <input type="text" name="" required="" @click="namePlaceholder(4)" v-model="phone" :placeholder="contactPhonePlaceholder" @input="koreaPhone" >
                                <label>전화번호</label>
                            </div>
                            <div v-if="phoneValFlg!=='0'&&phoneValFlg!=='9'" class="text-red-600 text-xs font-bold">{{ phoneValMsg[phoneValFlg] }}</div>
                            <div v-if="emailValFlg!=='0'&&emailValFlg!=='9'" class="text-red-600 text-xs font-bold">{{ emailValMsg[emailValFlg] }}</div>
                        </div>
                    </div>
                </div>
                <div class="reservation_notification_box text-sm"><span>*</span> 예약자 이름은 체크인 시 제시할 유효한 신분증 이름과 정확히 일치해야 합니다.
                </div>
            </div>
            <div class="reservation_next_btn_box">
                <div class="reservation_next_btn_price">
                    <div class="reservation_title_4">총금액</div>
                    <div class="text-2xl font-bold reservation_icon_deepblue">{{ totalPrice }}원</div>
                </div>
                <div class="reservation_next_btn w-full text-center font-bold cursor-pointer" @click="requestPay(1)">결제</div>
            </div>
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

export default {
	name: 'HotelComponent',
	data() {
        return {
            // 예약자
            firstName: '',
            lastName: '',
			email: '',
			phone: '',
            // 예약자 플레이스홀더용
            contactFirstNamePlaceholder: '',
            contactLastNamePlaceholder: '',
            contactEmailPlaceholder: '',
            contactPhonePlaceholder: '',
            lastNameValMsg:["","이름(성)은 필수 입력 사항 입니다.","이름(성)은 0~50 글자 사이로 입력해 주세요.","이름(성)은 영문만 입력 가능합니다."],
            lastNameValFlg:"0",
            firstNameValMsg:["","이름은 필수 입력 사항 입니다.","이름은 0~50 글자 사이로 입력해 주세요.","이름은 영문만 입력 가능합니다."],
            firstNameValFlg:"0",
            emailValMsg:["","이메일 필수 입력 사항 입니다.","이메일의 형식이 유효하지 않습니다."],
            emailValFlg:"0",
            phoneValMsg:["","연락처는 필수 입력 사항 입니다","-를 제외한 11자리를 입력해 주세요","연락처의 형식이 유효하지 않습니다."],
            phoneValFlg:"0",
            // 상단 프로그레스바
            progressWidth:["w-1/4","w-3/4","w-full","w-3/4"],
            pageflg:"0",
		}
	},
    
	created() {

	},

    watch: {

    },

	methods: {
        // 플레이스 홀더용 메소드
        namePlaceholder(i){
            this.contactFirstNamePlaceholder = '';
            this.contactLastNamePlaceholder = '';
            this.contactEmailPlaceholder = '';  
            this.contactPhonePlaceholder = '';  
            if(i===1){
                this.contactLastNamePlaceholder = "예)Hong"
            }else if(i===2){
                this.contactFirstNamePlaceholder = "예)gildong"
            }else if(i===3){
                this.contactEmailPlaceholder = "예)test@test.com"
            }else if(i===4){
                this.contactPhonePlaceholder = "예)01012345678"
            }
        },
        // 결제기능
        requestPay: function () {
            IMP.request_pay({ // param
                pg: "kakaopay",
                pay_method: "card",
                name: "weet 호텔예약",
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
	},
}

</script>
<style lang="scss">
	@import '../../sass/Reservation/reservation.scss';
</style>
