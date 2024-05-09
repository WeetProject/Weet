<template>
	<!-- desktop -->
	<div class="main_container">
		<div class="main_top_container">
			<div class="main_top_img_section">
				<div class="main_top_originlacation_input_container">
					<!-- 출발지 -->
					<div class="mr-5 top_originlacation_input_article">
						<div class="main_top_originlocation_input_section">
							<div class="main_top_originlocation_input_area">
								<p class="text-base font-semibold text-left main_top_originlocation_title">출발지</p>
								<input class="main_top_originlocation_input" type="text" 
								name="originlocation_input" id="originlocation_input" v-model="startingPointQuery"
								autocomplete="off" spellcheck="false" placeholder="출발지"
								maxlength="15" @input="handleStartingPointInput">
							</div>
							
							<!-- 연관 검색어 -->
							<div class="main_top_suggetion_area" v-if="startingPointQuerySuggestion && startingPointQuery.length && startingPointFlg">
								<ul class="suggetion_ul">
									<li class="suggetion_li" v-for="originSuggestion in startingPointQuerySuggestion" :key="originSuggestion" 
										@click="applySuggestionStartingPointInput(originSuggestion)">
										<div class="suggtion_li_article">
											<div class="suggetion_li_city">
												<svg class="mr-1 w-6 h-6 fill-[#000000]" viewBox="0 0 384 512" xmlns="http://www.w3.org/2000/svg">
													<path d="M64 48c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16h80V400c0-26.5 21.5-48 48-48s48 21.5 48 48v64h80c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64zM0 64C0 28.7 28.7 0 64 0H320c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm88 40c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V104zM232 88h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V104c0-8.8 7.2-16 16-16zM88 232c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V232zm144-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V232c0-8.8 7.2-16 16-16z"></path>
												</svg>
												<span class="my-2 suggetion_li_city_span">
													{{ originSuggestion.airport_kr_city_name }} ({{ originSuggestion.airport_city_name }}) 											
												</span>
											</div>
											<div class="suggetion_li_airport">
												<svg class="mr-1 w-6 h-6 fill-[#000000]" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
													<path d="M482.3 192c34.2 0 93.7 29 93.7 64c0 36-59.5 64-93.7 64l-116.6 0L265.2 495.9c-5.7 10-16.3 16.1-27.8 16.1l-56.2 0c-10.6 0-18.3-10.2-15.4-20.4l49-171.6L112 320 68.8 377.6c-3 4-7.8 6.4-12.8 6.4l-42 0c-7.8 0-14-6.3-14-14c0-1.3 .2-2.6 .5-3.9L32 256 .5 145.9c-.4-1.3-.5-2.6-.5-3.9c0-7.8 6.3-14 14-14l42 0c5 0 9.8 2.4 12.8 6.4L112 192l102.9 0-49-171.6C162.9 10.2 170.6 0 181.2 0l56.2 0c11.5 0 22.1 6.2 27.8 16.1L365.7 192l116.6 0z"></path>
												</svg>
												<span class="my-2 suggetion_li_airport_span">
													{{ originSuggestion.airport_kr_name }} ({{ originSuggestion.airport_iata_code }})
												</span>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>						
					</div>
	
					<!-- 도착지 -->
					<div class="ml-5 top_destinationlocation_input_article">
						<div class="main_top_destinationlocation_input_section">
							<div class="main_top_destinationlocation_input_area">
								<p class="text-base font-semibold text-left main_top_destinationlocation_title">도착지</p>
								<input class="main_top_destinationlocation_input" type="text" 
								name="destinationlocation_input" id="destinationlocation_input" v-model="destinationQuery"
								autocomplete="off" spellcheck="false" placeholder="도착지"
								maxlength="15" @input="handleDestinationInput">
							</div>

							<!-- 연관 검색어 -->
							<div class="main_top_suggetion_area" v-if="destinationQuerySuggestion && destinationQuery.length && destinationFlg">
								<ul class="suggetion_ul">
									<li class="suggetion_li" v-for="destinationSuggestion in destinationQuerySuggestion" :key="destinationSuggestion" 
									@click="applySuggestionDestinationInput(destinationSuggestion)">
										<div class="suggtion_li_article">
											<div class="suggetion_li_city">
												<svg class="mr-1 w-6 h-6 fill-[#000000]" viewBox="0 0 384 512" xmlns="http://www.w3.org/2000/svg">
													<path d="M64 48c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16h80V400c0-26.5 21.5-48 48-48s48 21.5 48 48v64h80c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64zM0 64C0 28.7 28.7 0 64 0H320c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm88 40c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V104zM232 88h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V104c0-8.8 7.2-16 16-16zM88 232c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V232zm144-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V232c0-8.8 7.2-16 16-16z"></path>
												</svg>
												<span class="my-2 suggetion_li_city_span">
													{{ destinationSuggestion.airport_kr_city_name }} ({{ destinationSuggestion.airport_city_name }}) 											
												</span>
											</div>
											<div class="suggetion_li_airport">
												<svg class="mr-1 w-6 h-6 fill-[#000000]" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
													<path d="M482.3 192c34.2 0 93.7 29 93.7 64c0 36-59.5 64-93.7 64l-116.6 0L265.2 495.9c-5.7 10-16.3 16.1-27.8 16.1l-56.2 0c-10.6 0-18.3-10.2-15.4-20.4l49-171.6L112 320 68.8 377.6c-3 4-7.8 6.4-12.8 6.4l-42 0c-7.8 0-14-6.3-14-14c0-1.3 .2-2.6 .5-3.9L32 256 .5 145.9c-.4-1.3-.5-2.6-.5-3.9c0-7.8 6.3-14 14-14l42 0c5 0 9.8 2.4 12.8 6.4L112 192l102.9 0-49-171.6C162.9 10.2 170.6 0 181.2 0l56.2 0c11.5 0 22.1 6.2 27.8 16.1L365.7 192l116.6 0z"></path>
												</svg>
												<span class="my-2 suggetion_li_airport_span">
													{{ destinationSuggestion.airport_kr_name }} ({{ destinationSuggestion.airport_iata_code }})
												</span>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- todo -->
				<!-- 날짜(범위선택, 단일선택 컴포넌트 생성), 탑승객정보(성인, 유아, 좌석등급) -->
				<!-- 편도, 왕복 선택 div영역 -->
				
				<!-- 날짜 -->
				<div class="mt-5 main_top_date_section">
					<p class="text-base font-semibold text-left main_top_date_title">날짜 선택</p>
					<!-- 달력 라이브러리 -->					
				</div>

				<!-- 탑승객 정보 -->
				<div class="mt-5 main_top_passenger_section">
					<p class="text-base font-semibold text-left main_top_passenger_title">여행자 및 좌석등급</p>
				</div>
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
			previousSearchResults: [],
			startingPointQuery: '',
			startingPointQuerySuggestion: [],
			startingPointFlg: false,
			destinationQuery: '',
			destinationQuerySuggestion: [],
			destinationFlg: false,
			date: [],
			originLocationCodeQuery: null,
			destinationLocationCodeQuery: null,
		}
	},

	mounted() {
		AOS.init()
		const startDate = new Date();
        const endDate = new Date(startDate);
        endDate.setDate(startDate.getDate() + 1);
        this.date = [startDate, endDate];
		this.amadeusToken()
	},

	methods: {
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
		
		// date format
		formatDate(date) {
			const addZero = (num) => (num < 10 ? "0" + num : num);
			if (Array.isArray(date)) {
				const startDate = date[0];
				const endDate = date[1];
				const startYear = startDate.getFullYear();
				const startMonth = addZero(startDate.getMonth() + 1);
				const startDay = addZero(startDate.getDate());
				const endYear = endDate.getFullYear();
				const endMonth = addZero(endDate.getMonth() + 1);
				const endDay = addZero(endDate.getDate());
				return `${startYear}-${startMonth}-${startDay} ~ ${endYear}-${endMonth}-${endDay}`;
			} else {
				const year = date.getFullYear();
				const month = addZero(date.getMonth() + 1);
				const day = addZero(date.getDate());
				return `${year}-${month}-${day}`;
			}
		},

		// 3. 여행자 및 좌석 등급 input 값 설정
		// 4. 파라미터 설정 후 api 호출(데이터 확인)

		amadeusToken() {
			this.$store.dispatch('amadeusToken');
		},

		// 출발지, 도착지, 날짜 데이터 api 송수신
		amadeusSearch() {
			const amadeusToken = localStorage.getItem('setAmadeusToken');
			console.log(amadeusToken);

			const URL = 'https://test.api.amadeus.com/v2/shopping/flight-offers';
			const originLocationCode = this.originLocationCodeQuery; // 출발지
			const destinationLocationCode = this.destinationLocationCodeQuery; // 도착지
			const departureDate = this.formatDate(this.date[0]);
			const returnDate = this.formatDate(this.date[1]);
			// const departureDate = '2024-05-08';
			// const returnDate = '2024-05-11';
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