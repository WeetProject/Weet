<template>
	<!-- desktop -->
	<div class="main_container">
		<div class="main_top_container">
			<div class="main_top_article">
				<img class="main_top_img" src="../../public/images/plane.png" alt="">
				<MainOriginModalComponent 
					v-if="originModalFlg"
					@originExchangeQueryData="originQueryData">
				</MainOriginModalComponent>
				<MainDestinationModalComponent 
					v-if="destinationModalFlg"
					@destinationExchangeQueryData="destinationQueryData">
				</MainDestinationModalComponent>
				<div class="main_top_reservation_section">
					<!-- 왕복, 편도 선택 -->
					<div class="main_top_reservation_select_area">
						<div class="text-center main_top_reservation_round_trip">
							<div :class="{ 'main_top_reservation_round_trip_select font-semibold text-center': clickTab === 0 }" @click = "clickTab = 0;">왕 복</div>
						</div>
						<div class="text-center main_top_reservation_one_way">
							<div :class="{ 'main_top_reservation_one_way_select font-semibold text-center': clickTab === 1 }" @click = "clickTab = 1;">편 도</div>						
						</div>                    
					</div>
					<div class="main_top_reservation_select_detail_area">
						<div class="main_top_reservation_select_detail_input_container">
							<div class="main_top_reservation_select_detail_input_article">
								<!-- 출발지 선택 -->
								<div class="main_top_reservation_select_detail_side_input_section" @click="originModal">
									<p class="mb-2 text-3xl text-center" v-if="!originExchangeQueryData">출발</p>
									<p class="mb-2 text-3xl text-center" v-if="originExchangeQueryData">{{ originExchangeQueryData.airport_iata_code }}</p>
									<div class="main_top_originlocation_title">										
										<p class="font-semibold" v-if="!originExchangeQueryData">선택</p>
										<p class="font-semibold" v-if="originExchangeQueryData">{{ originExchangeQueryData.airport_kr_city_name }}</p>
										<!-- down svg -->
										<svg v-if="originModalFlg" class="ml-2 w-3 h-3 fill-[#666666]" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
											<path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"></path>
										</svg>
										<!-- up svg -->
										<svg v-if="!originModalFlg" class="ml-2 w-3 h-3 fill-[#666666]" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
											<path d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"></path>
										</svg>
									</div>
								</div>
								<div class="main_top_reservation_select_detail_center_input_section">
									<svg class="w-[50px] h-[50px] fill-[#0b4aff]" viewBox="0 0 640 512" xmlns="http://www.w3.org/2000/svg">
										<path d="M381 114.9L186.1 41.8c-16.7-6.2-35.2-5.3-51.1 2.7L89.1 67.4C78 73 77.2 88.5 87.6 95.2l146.9 94.5L136 240 77.8 214.1c-8.7-3.9-18.8-3.7-27.3 .6L18.3 230.8c-9.3 4.7-11.8 16.8-5 24.7l73.1 85.3c6.1 7.1 15 11.2 24.3 11.2H248.4c5 0 9.9-1.2 14.3-3.4L535.6 212.2c46.5-23.3 82.5-63.3 100.8-112C645.9 75 627.2 48 600.2 48H542.8c-20.2 0-40.2 4.8-58.2 14L381 114.9zM0 480c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32s-14.3-32-32-32H32c-17.7 0-32 14.3-32 32z"></path>
									</svg>
								</div>
								<!-- 도착지 선택 -->
								<div class="main_top_reservation_select_detail_side_input_section" @click="destinationModal">
									<p class="mb-2 text-3xl text-center" v-if="!destinationExchangeQueryData">도착</p>
									<p class="mb-2 text-3xl text-center" v-if="destinationExchangeQueryData">{{ destinationExchangeQueryData.airport_iata_code }}</p>
									<div class="main_top_destinationlocation_title">									
										<p class="font-semibold" v-if="!destinationExchangeQueryData">선택</p>
										<p class="font-semibold" v-if="destinationExchangeQueryData">{{ destinationExchangeQueryData.airport_kr_city_name }}</p>
										<!-- down svg -->
										<svg v-if="destinationModalFlg" class="ml-2 w-3 h-3 fill-[#666666]" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
											<path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"></path>
										</svg>
										<!-- up svg -->
										<svg v-if="!destinationModalFlg" class="ml-2 w-3 h-3 fill-[#666666]" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
											<path d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"></path>
										</svg>
									</div>
								</div>
								<!-- 왕복 날짜 선택 -->
								<div class="main_top_reservation_select_detail_date_input_section" v-if="clickTab === 0">
									<VueDatePicker 
										v-model="roundTripDate"
										locale="ko" 
										select-text="선택" 
										cancel-text="취소"
										placeholder="날짜 선택"
										range multi-calendars
										calendar-cell-class-name="calendar_select"
										position="left"
										:min-date="new Date()"
										:enable-time-picker=false
										:format="formatDateRoundTrip">

										<template #calendar-header="{ index, day }">
											<div :class="[index === 5 ? 'saturday' : '', index === 6 ? 'sunday' : '']">
												{{ day }}
											</div>
										</template>
										<template #action-preview>
										</template>
									</VueDatePicker>
								</div>
								<!-- 편도 날짜 선택 -->
								<div class="main_top_reservation_select_detail_date_input_section" v-if="clickTab === 1">
									<VueDatePicker 
										v-model="oneWayDate" 
										locale="ko"
										select-text="선택" 
										cancel-text="취소"
										placeholder="날짜 선택"
										position="left"
										:min-date="new Date()"
										:enable-time-picker=false
										:format="formatDateOneWay">

										<template #calendar-header="{ index, day }">
											<div :class="[index === 5 ? 'saturday' : '', index === 6 ? 'sunday' : '']">
												{{ day }}
											</div>
										</template>
										<template #action-preview>
										</template>
									</VueDatePicker>
								</div>
								<!-- 성인, 소아 및 좌석 선택 -->
								<div class="main_top_reservation_select_detail_passenger_input_section">
									<!-- 성인, 소아 선택 -->
									<div class="ml-5 main_top_reservation_select_detail_passenger">
										<!-- 성인 선택 -->
										<div class="mb-5 main_top_reservation_select_detail_passenger_adult">
											<button @click="passengerMiuns('adult')">
												<svg class="w-8 h-8"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />  <line x1="9" y1="12" x2="15" y2="12" /></svg>
											</button>
											<span class="mx-2" :style="{ fontWeight: adultPassenger ? 'semibold' : 'normal' }">성인 <span :style="{ fontWeight: adultPassenger ? 'bold' : 'normal' }">{{ adultPassenger }}</span>명</span>
											<button @click="passengerPlus('adult')">
												<svg class="w-8 h-8 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />  <line x1="9" y1="12" x2="15" y2="12" />  <line x1="12" y1="9" x2="12" y2="15" /></svg>
											</button>
										</div>
										<!-- 소아 선택 -->
										<div class="mt-5 main_top_reservation_select_detail_passenger_children">
											<button @click="passengerMiuns('children')">
												<svg class="w-8 h-8"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />  <line x1="9" y1="12" x2="15" y2="12" /></svg>
											</button>
											<span class="mx-2" :style="{ fontWeight: childrenPassenger ? 'semibold' : 'normal' }">소아 <span :style="{ fontWeight: childrenPassenger ? 'bold' : 'normal' }">{{ childrenPassenger }}</span>명</span>
											<button @click="passengerPlus('children')">
												<svg class="w-8 h-8 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />  <line x1="9" y1="12" x2="15" y2="12" />  <line x1="12" y1="9" x2="12" y2="15" /></svg>
											</button>
										</div>
									</div>
									<!-- 좌석 선택 -->
									<div class="ml-5 main_top_reservation_select_detail_class">
										<!-- 일반석 -->
										<div class="mb-1 main_top_reservation_select_detail_class_grade">
											<button class="w-full h-full text-center" @click="classButtonSelect('ECONOMY')">일반석</button>
											<div class="mr-2 main_top_reservation_select_detail_class_grade_select" v-if="classSelectData.ECONOMY">
												<svg class="w-5 h-5 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M5 12l5 5l10 -10" /></svg>
											</div>
										</div>
										<!-- 프리미엄 일반석 -->
										<div class="mb-1 main_top_reservation_select_detail_class_grade">
											<button class="w-full h-full text-center" @click="classButtonSelect('PREMIUM_ECONOMY')">프리미엄 일반석</button>
											<div class="mr-2 main_top_reservation_select_detail_class_grade_select" v-if="classSelectData.PREMIUM_ECONOMY">
												<svg class="w-5 h-5 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M5 12l5 5l10 -10" /></svg>
											</div>
										</div>
										<!-- 비즈니스석 -->
										<div class="mb-1 main_top_reservation_select_detail_class_grade">
											<button class="w-full h-full text-center" @click="classButtonSelect('BUSINESS')">비즈니스석</button>
											<div class="mr-2 main_top_reservation_select_detail_class_grade_select" v-if="classSelectData.BUSINESS">
												<svg class="w-5 h-5 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M5 12l5 5l10 -10" /></svg>
											</div>
										</div>
										<!-- 일등석 -->
										<div class="mb-1 main_top_reservation_select_detail_class_grade">
											<button class="w-full h-full text-center" @click="classButtonSelect('FIRST')">일등석</button>
											<div class="mr-2 main_top_reservation_select_detail_class_grade_select" v-if="classSelectData.FIRST">
												<svg class="w-5 h-5 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M5 12l5 5l10 -10" /></svg>
											</div>
										</div>
									</div>
								</div>
								<div class="ml-5 main_top_reservation_select_detail_search_section">
									<div class="main_top_reservation_select_detail_search_button">
										<button class="w-full font-semibold text-center" v-if="clickTab === 0" @click="amadeusSearchRoundTrip()">항공권 검색</button>
										<button class="w-full font-semibold text-center" v-if="clickTab === 1" @click="amadeusSearchOneWay()">항공권 검색</button>
									</div>
								</div>
							</div>
						</div>
							
					</div>
				</div>
			</div>
		</div>
		<div class="main_middle_container">
			<div class="main_middle_article">
				
			</div>
		</div>
	</div>
</template>

<script>
import axios from 'axios';
import { debounce } from 'lodash';
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import AOS from 'aos';
import 'aos/dist/aos.css';
import { ref } from 'vue';
import MainOriginModalComponent from './MainOriginModalComponent.vue'
import MainDestinationModalComponent from './MainDestinationModalComponent.vue'

export default {
	name: 'MainComponent',
	components: {
		VueDatePicker,
		MainOriginModalComponent,
		MainDestinationModalComponent
	},

	setup() {
		const roundTripDate = ref();
		const range = false;

		return {
			roundTripDate,
			range
		};
	},

	data() {
		return {
			clickTab: 0,
			adultPassenger: 1,
			childrenPassenger: 0,
			classSelectData: {
				ECONOMY: true,
				PREMIUM_ECONOMY: false,
				BUSINESS: false,
				FIRST: false,
			},
			selectClass: null,			
			roundTripDate: [],
			oneWayDate:[],
			originModalFlg: false,
			originExchangeQueryData: null,
			originLocationCodeQuery: null,
			destinationModalFlg: false,
			destinationExchangeQueryData: null,
			destinationLocationCodeQuery: null,
		}
	},

	onMounted() {
		const startDate = new Date();
		const endDate = new Date(startDate);
		roundTripDate.value = [startDate, endDate];
	},

	mounted() {
		AOS.init();
		this.amadeusToken()
	},

	methods: {
		// Amadeus 토큰 획득
		amadeusToken() {
			this.$store.dispatch('amadeusToken');
		},

		// origin Modal Open(출발)
		originModal() {
			this.originModalFlg = !this.originModalFlg;
		},

		// origin Modal Data 수신(출발)
		originQueryData(originSuggestion) {
			this.originExchangeQueryData = originSuggestion;
			this.originModalFlg = false;
		},

		// destination Modal Open(도착)
		destinationModal() {
			this.destinationModalFlg = !this.destinationModalFlg;
		},

		// destination Modal Data 수신(도착)
		destinationQueryData(destinationSuggestion) {
			this.destinationExchangeQueryData = destinationSuggestion;
			this.destinationModalFlg = false;
		},		
		
		// date format(왕복)
		formatDateRoundTrip(roundTripDate) {
			const addZero = (num) => (num < 10 ? "0" + num : num);
			if (roundTripDate[0] && roundTripDate[1]) {
				// 출발일
				const startDate = roundTripDate[0];
				console.log(startDate);
				const startYear = startDate.getFullYear();
				const startMonth = addZero(startDate.getMonth() + 1);
				const startDay = addZero(startDate.getDate());
				// 도착일
				const endDate = roundTripDate[1];
				const endYear = endDate.getFullYear();
				const endMonth = addZero(endDate.getMonth() + 1);
				const endDay = addZero(endDate.getDate());
				return `${startYear}-${startMonth}-${startDay} ~ ${endYear}-${endMonth}-${endDay}`;
			}
		},

		// date format(편도)
		formatDateOneWay(oneWayDate) {
			const addZero = (num) => (num < 10 ? "0" + num : num);
			if (oneWayDate) {
				const startDate = oneWayDate;
				const startYear = startDate.getFullYear();
				const startMonth = addZero(startDate.getMonth() + 1);
				const startDay = addZero(startDate.getDate());
				return `${startYear}-${startMonth}-${startDay}`;
			} 
		},

		// 성인, 소아 인원 감소
		passengerMiuns(passengerType) {
			if (passengerType === 'adult' && this.adultPassenger > 1) {
				this.adultPassenger--;
			} else if (passengerType === 'children' && this.childrenPassenger > 0) {
				this.childrenPassenger--;
			}
		},

		// 성인, 소아 인원 증가
		passengerPlus(passengerType) {
			if (passengerType === 'adult' && this.adultPassenger < 8) {
				this.adultPassenger++;
			} else if (passengerType === 'children' && this.childrenPassenger < 8) {
				this.childrenPassenger++;
			}
		},

		// 좌석 등급 체크
		classButtonSelect(classType) {
			for (let key in this.classSelectData) {
				this.classSelectData[key] = false;
			}
			this.classSelectData[classType] = true;
			// Amadeus Class 파라미터 저장
			this.selectClass = classType;
		},

		
		// ### 05-12 todo ### 		
		// 왕복 편도 axios 통합
		// 출발지, 도착지, 날짜 데이터 store 저장
		// 모달 세부사항 조정(css, 모달창 바깥 클릭시 모달 off)
		// 에러 출력 css 추가
		// ### 05-12 todo ### 
		
		// 출발지, 도착지, 날짜 데이터 api 송수신(왕복)
		amadeusSearchRoundTrip() {
			const originQueryCode = this.originExchangeQueryData.airport_iata_code
			const originQueryName = this.originExchangeQueryData.airport_kr_city_name
			const destinationQueryCode = this.destinationExchangeQueryData.airport_iata_code
			const destinationQueryName = this.destinationExchangeQueryData.airport_kr_city_name

			if(originQueryCode !== destinationQueryCode && originQueryName !== destinationQueryName) {
				// Amadeus Parameter
				const amadeusToken = localStorage.getItem('setAmadeusToken');
				const URL = 'https://test.api.amadeus.com/v2/shopping/flight-offers';
				// const originLocationCode = this.originLocationCodeQuery; // 출발지
				// const destinationLocationCode = this.destinationLocationCodeQuery; // 도착지
				const originLocationCode = 'CJU'; // 출발지
				const destinationLocationCode = 'NRT'; // 도착지
				const departureDate = this.formatDate(this.roundTripDate[0]);
				const returnDate = this.formatDate(this.roundTripDate[1]);
				console.log(returnDate);
				// const departureDate = '2024-05-11';
				// const returnDate = '2024-05-12';
				const KRW = "KRW" // 원화
				const adultPassenger = 1;
				// const childrenPassenger = ;
				// const travelClass = ;			
				
				axios.get(URL, {
					headers: {
						'Authorization': `Bearer ${amadeusToken}`
					},
					params: {					
						// 출발지
						originLocationCode: originLocationCode, 
						// 도착지
						destinationLocationCode: destinationLocationCode,
						// 도착날짜
						departureDate: departureDate,
						// 돌아오는 날짜
						returnDate: returnDate,
						// 원화
						currencyCode: KRW,
						// 인원
						adults: adultPassenger
						// 좌석 등급
						// travelClass:
					},				
				})
				.then(response => {
					console.log(response.data);
				})
				.catch(error => {
					console.error(error);
				});
			} else {
				const error= "출발지와 도착지는 다르게 입력해주세요"
			}

		},

		// 출발지, 도착지, 날짜 데이터 api 송수신(편도)
		amadeusSearchOneWay() {
			const amadeusToken = localStorage.getItem('setAmadeusToken');
			console.log(amadeusToken);

			const URL = 'https://test.api.amadeus.com/v2/shopping/flight-offers';
			// const originLocationCode = this.originLocationCodeQuery; // 출발지
			// const destinationLocationCode = this.destinationLocationCodeQuery; // 도착지
			const originLocationCode = 'CJU'; // 출발지
			const destinationLocationCode = 'NRT'; // 도착지
			const departureDate = this.formatDate(this.oneWayDate[0]);
			console.log(departureDate);
			const KRW = "KRW" // 원화
			const adultPassenger = 1;
			// const childrenPassenger = ;
			// const travelClass = ;			
			
			axios.get(URL, {
				headers: {
					'Authorization': `Bearer ${amadeusToken}`
				},
				params: {					
					// 출발지
					originLocationCode: originLocationCode, 
					// 도착지
					destinationLocationCode: destinationLocationCode,
					// 도착날짜
					departureDate: departureDate,
					// 원화
					currencyCode: KRW,
					// 인원
					adults: adultPassenger
					// 좌석 등급
					// travelClass:
				},				
			})
			.then(response => {
				console.log(response.data);
			})
			.catch(error => {
				console.error(error);
			});
		}
	}
}
</script>

<style lang="scss">
	@import '../sass/_variables.scss';
    @import '../sass/main.scss';
	.dp__range_start,
	.dp__range_end {
		background-color: $logo-one-main-color !important;
	}

	.dp__input {
		width: 100% !important;
		height: 130px !important;
		border: none !important;
	}

	.dp__active_date {
		border-radius: 50% !important;
		background-color: $logo-one-main-color !important;
	}

	.dp__today {
		border: none !important;
	}

	.dp__date_hover_end:hover,
	.dp__date_hover:hover {
		background: $logo-one-main-color !important;
		color: $white !important;
		border-radius: 50% !important;
	}

	.dp__cell_inner {
		border-radius: 50% !important;
	}

	.calendar_select {
		border-radius: 50% !important;
	}
	.saturday {
		color: $logo-one-main-color !important;
	}
	.sunday {
		color: $red !important;
	}
</style>