<template>
	<!-- desktop -->
	<div class="main_container">
		<div class="main_top_container">
			<div class="main_top_article">
				<img class="main_top_img" src="../../public/images/plane.png" alt="">
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
								<div class="main_top_reservation_select_detail_input_section">
									<p class="mb-2 text-3xl text-center">출발</p>
									<div class="main_top_originlocation_title">										
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
										</svg>
										<p>선택</p>
									</div>
								</div>
								<!-- 도착지 선택 -->
								<div class="main_top_reservation_select_detail_input_section">
									<p class="mb-2 text-3xl text-center main_top_destinationlocation_title">도착</p>
									<div class="main_top_destinationlocation_title">	
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
										</svg>
										<p>선택</p>
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
										range minMaxRawRange="1"
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

<script >
import axios from 'axios';
import { debounce } from 'lodash';
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import AOS from 'aos'
import 'aos/dist/aos.css'

export default {
	name: 'MainComponent',
	components: {
		VueDatePicker,
	},

	data() {
		return {
			clickTab: 0,
			adultPassenger: 1,
			childrenPassenger: 1,
			classSelectData: {
				ECONOMY: true,
				PREMIUM_ECONOMY: false,
				BUSINESS: false,
				FIRST: false,
			},
			selectClass: null,
			previousSearchResults: [],
			startingPointQuery: '',
			startingPointQuerySuggestion: [],
			startingPointFlg: false,
			destinationQuery: '',
			destinationQuerySuggestion: [],
			destinationFlg: false,
			roundTripDate: [],
			oneWayDate:[],
			originLocationCodeQuery: null,
			destinationLocationCodeQuery: null,
		}
	},

	mounted() {
		AOS.init();
		const startDate = new Date();
        const endDate = new Date(startDate);
        endDate.setDate(startDate.getDate() + 1);
        this.roundTripDate = [startDate, endDate];
        this.oneWayDate = [startDate];
		this.amadeusToken()
	},

	methods: {
		// Amadeus 토큰 획득
		amadeusToken() {
			this.$store.dispatch('amadeusToken');
		},

		// 출발지 검색어 저장
		handleStartingPointInput(event) {
			this.startingPointQuery = event.target.value;
			if (!this.startingPointQuery) {
				this.startingPointQuerySuggestion = null;
				this.startingPointFlg = false;
			} else {
				if (!this.startingPointFlg) {
					this.algoliaStartingPointQuery();
				}
			}
		},

		// 출발지 연관검색어 클릭 후 input 삽입
		applySuggestionStartingPointInput(originSuggestion) {
			this.startingPointQuery = originSuggestion.airport_kr_city_name + '(' + originSuggestion.airport_city_name + ')';
			this.startingPointQuerySuggestion = null;
			this.startingPointFlg = true;
			this.originLocationCodeQuery = originSuggestion.airport_iata_code;
		},

		// 출발지 연관 검색어 송수신
		algoliaStartingPointQuery: debounce(function() {
			if (!this.startingPointFlg) {
				const URL = '/search-startingpoint';
				const query = this.startingPointQuery;
				const previousResult = this.previousSearchResults.find(result => result.query === query);
				
				// 이전 검색 결과 존재 시
				if (previousResult) {
					// 이전 검색 결과 사용
					this.startingPointQuerySuggestion = previousResult.data;
				} else {
					// 이전 검색 결과 미 존재 시
					axios.get(URL, {
						params: {
							query: this.startingPointQuery
						}
					})
					.then(response => {
						if(response.data.code === "SPS00") {
							// 새 검색 결과
							this.startingPointQuerySuggestion = response.data.startingPointQueryData;
							
							// 새 검색 결과 이전 검색 결과 추가
							this.previousSearchResults.push({ query: query, data: response.data.startingPointQueryData });
							
							// 새 검색 결과 플래그 변경
							this.startingPointFlg = true;
						}
					})
					.catch(error => {
						console.error(error);
					})
					.finally(() => {
						this.startingPointFlg = true;
					});         
				}
			}
		}, 500),

		// 도착지 검색어 저장
		handleDestinationInput(event) {
			this.destinationQuery = event.target.value;
			if (!this.destinationQuery) {
				this.destinationSuggestion = null;
				this.destinationFlg = false;
			} else {
				if (!this.destinationFlg) {
					this.algoliaDestinationQuery();
				}
			}
		},

		// 도착지 연관검색어 클릭 후 input 삽입
		applySuggestionDestinationInput(destinationSuggestion) {
			this.destinationQuery = destinationSuggestion.airport_kr_city_name + '(' + destinationSuggestion.airport_city_name + ')';
			this.destinationQuerySuggestion = null;
			this.destinationFlg = true;
			this.destinationLocationCodeQuery = destinationSuggestion.airport_iata_code;
		},

		// 도착지 연관 검색어 송수신
		algoliaDestinationQuery: debounce(function() {
			if (!this.destinationFlg) {
				const URL = '/search-destination';
				const query = this.destinationQuery;
				const previousResult = this.previousSearchResults.find(result => result.query === query);
					
				// 이전 검색 결과가 존재 시
				if (previousResult) {
					// 이전 검색 결과 사용
					this.destinationQuerySuggestion = previousResult.data;
				} else {
					// 이전 검색 결과 미 존재 시
					axios.get(URL, {
						params: {
							query: this.destinationQuery
						}
					})
					.then(response => {
						if(response.data.code === "DS00") {
							// 새 검색 결과
							this.destinationQuerySuggestion = response.data.destinationQueryData;
							
							// 새 검색 결과 이전 검색 결과 추가
							this.previousSearchResults.push({ query: query, data: response.data.destinationQueryData });
							
							// 새 검색 결과 플래그 변경
							this.destinationFlg = true;
						}
					})
					.catch(error => {
						console.error(error);
					})
					.finally(() => {
						this.destinationFlg = true;
					});
				}
			}
		}, 500),
		
		// date format(왕복)
		formatDateRoundTrip(roundTripDate) {
			const addZero = (num) => (num < 10 ? "0" + num : num);
			if (Array.isArray(roundTripDate)) {
				const startDate = roundTripDate[0];
				const endDate = roundTripDate[1];
				const startYear = startDate.getFullYear();
				const startMonth = addZero(startDate.getMonth() + 1);
				const startDay = addZero(startDate.getDate());
				const endYear = endDate.getFullYear();
				const endMonth = addZero(endDate.getMonth() + 1);
				const endDay = addZero(endDate.getDate());
				return `${startYear}-${startMonth}-${startDay} ~ ${endYear}-${endMonth}-${endDay}`;
			} else {
				const year = roundTripDate.getFullYear();
				const month = addZero(roundTripDate.getMonth() + 1);
				const day = addZero(roundTripDate.getDate());
				return `${year}-${month}-${day}`;
			}
		},

		// date format(편도)
		formatDateOneWay(oneWayDate) {
			const addZero = (num) => (num < 10 ? "0" + num : num);
			if (Array.isArray(oneWayDate)) {
				const startDate = oneWayDate[0];
				const startYear = startDate.getFullYear();
				const startMonth = addZero(startDate.getMonth() + 1);
				const startDay = addZero(startDate.getDate());
				return `${startYear}-${startMonth}-${startDay}`;
			} else {
				const year = oneWayDate.getFullYear();
				const month = addZero(oneWayDate.getMonth() + 1);
				const day = addZero(oneWayDate.getDate());
				return `${year}-${month}-${day}`;
			}
		},

		// 성인, 소아 인원 감소
		passengerMiuns(passengerType) {
			if (passengerType === 'adult' && this.adultPassenger > 1) {
				this.adultPassenger--;
			} else if (passengerType === 'children' && this.childrenPassenger > 1) {
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

		

		// 출발지, 도착지, 날짜 데이터 api 송수신(왕복)
		amadeusSearchRoundTrip() {
			const amadeusToken = localStorage.getItem('setAmadeusToken');
			console.log(amadeusToken);

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
    @import '../sass/main.test.scss';
	.dp__range_start,
	.dp__range_end {
		background-color: $main-font-color !important;
	}

	.dp__input {
		width: 100%;
		height: 130px;
		border: none !important;
	}

	.dp__today {
		border: none !important;
	}
	.calendar_select {
		border-radius: 50%;
	}
	.saturday {
		color: $logo-one-main-color;
	}
	.sunday {
		color: $red;
	}
</style>