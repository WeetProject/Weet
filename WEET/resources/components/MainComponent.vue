<template>
	<div class="box-border main_container">
		<div class="main_section">
			<div class="main_select_ticket_section">
				<div class="main_select_ticket_flex_first">
					<div class="main_select_ticket_flex_first_top">
						<div class="main_select_ticket_border main_select_ticket_starting_point_area">
							<p class="text-base font-semibold text-left main_select_ticket_title">출발지</p>
							<input class="main_select_ticket_area_input" type="text" 
							name="starting_point_input" id="starting_point_input" v-model="startingPointQuery"
							autocomplete="off" spellcheck="false" placeholder="출발지"
							maxlength="15" @input="handleStartingPointInput">
							<!-- 연관 검색어 출력부분 -->
							<ul v-if="startingPointQuerySuggestion && startingPointQuery.length" class="suggetion_ul">
								<li class="suggetion_li" v-for="suggestion in startingPointQuerySuggestion" :key="suggestion" @click="applySuggestionStartingPointInput(suggestion)">
									<span>{{ suggestion.airport_kr_city_name }}({{ suggestion.airport_city_name }})</span>
								</li>
							</ul>						
						</div>
						<div class="main_select_ticket_border main_select_ticket_destination_area">
							<p class="text-base font-semibold text-left main_select_ticket_title">도착지</p>
							<input class="main_select_ticket_area_input" type="text" 
							name="destination_input" id="destination_input" v-model="destinationQuery"
							autocomplete="off" spellcheck="false" placeholder="도착지"
							maxlength="15" @input="handleDestinationInput">
							<!-- 연관 검색어 출력부분 -->
							<ul v-if="destinationSuggestion && destinationQuery.length" class="suggetion_ul">
								<li class="suggetion_li" v-for="suggestion in destinationSuggestion" :key="suggestion" @click="applySuggestionDestinationInput(suggestion)">
									<span>{{ suggestion.airport_kr_city_name }}({{ suggestion.airport_city_name }})</span>
								</li>
							</ul>
						</div>
					</div>
					<div class="main_select_ticket_flex_first_middle">
						<div class="main_select_ticket_border_bottom main_select_ticket_outbound_flight_area">
							<p class="text-base font-semibold text-left main_select_ticket_title">날짜 선택</p>
							<!-- 달력 라이브러리 출력부분 -->
							<VueDatePicker 
								v-model="date" 
								locale="ko" 
								select-text="선택" 
								cancel-text="취소"
								range multi-calendars
								calendar-cell-class-name="calendar_select"
								placeholder="날짜 선택"
								position="left"
								:min-date="new Date()"
								:enable-time-picker=false
								:format="formatDate">
								
								<template #calendar-header="{ index, day }">
									<div :class="[index === 5 ? 'saturday' : '', index === 6 ? 'sunday' : '']">
										{{ day }}
									</div>
								</template>
								<template #action-preview>
								</template>

							</VueDatePicker>
						</div>
					</div>
					<div class="main_select_ticket_flex_first_bottom">
						<div class="main_select_ticket_border_bottom main_select_ticket_traveler_seatclass_area">
							<p class="text-base font-semibold text-left main_select_ticket_title">여행자 및 좌석 등급</p>
							<p class="text-sm text-left main_select_ticket_content">1 성인, 일반석</p>
						</div>
					</div>
				</div>
			</div>

			<div class="main_search_ticket_section">
				<div class="main_search_ticket_image_area">
					<img src="../../public/images/Main_search.png" alt="">
				</div>
				<div class="main_search_ticket_airline_area">
					<a class="text-center" href="#">검색하기</a>
				</div>
			</div>

			<div class="main_ad_slide_section">
				
			</div>

			<div class="main_search_tourist_spot_section">
				<input type="text" placeholder="여행지를 검색해보세요">
			</div>
			
			<div class="main_tourist_spot_recommendation_section">
				<div class="main_tourist_spot_recommendation_border main_tourist_spot_recommendation_title_area">
					<p class="text-xl">2024년도 추천 여행지가 궁금하다면</p>
				</div>
				<div class="main_tourist_spot_recommendation_border main_tourist_spot_recommendation_image_area">
					<p>image</p>
				</div>
			</div>

			<div class="main_monthly_tourist_spot_section">
				<div class="main_monthly_tourist_spot_flex_left">
					<div class="main_monthly_tourist_spot_title_area">
						<p>이달의 실속 여행지 TOP3</p>
					</div>
					<div class="main_monthly_tourist_spot_first_area">
						<img src="../../public/images/Admin_login.jpg" alt="">
					</div>
				</div>
				<div class="main_monthly_tourist_spot_flex_right">
					<div class="main_monthly_tourist_spot_second_area">
						<img src="../../public/images/Admin_login.jpg" alt="">
					</div>
					<div class="main_monthly_tourist_spot_third_area">
						<img src="../../public/images/Admin_login.jpg" alt="">
					</div>
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
import { format } from 'date-fns';

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
			destinationSuggestion: [],
			destinationFlg: false,
			date: [],
		}
	},

	mounted() {
		const startDate = new Date();
        const endDate = new Date(startDate);
        endDate.setDate(startDate.getDate() + 1);
        this.date = [startDate, endDate];
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
		applySuggestionStartingPointInput(suggestion) {
			this.startingPointQuery = suggestion.airport_kr_city_name + '(' + suggestion.airport_city_name + ')';
			this.startingPointQuerySuggestion = null;
			this.startingPointFlg = true;
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
		applySuggestionDestinationInput(suggestion) {
			this.destinationQuery = suggestion.airport_kr_city_name + '(' + suggestion.airport_city_name + ')';
			this.destinationSuggestion = null;
			this.destinationFlg = true;
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
					this.destinationSuggestion = previousResult.data;
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
							this.destinationSuggestion = response.data.destinationQueryData;
							
							// 새 검색 결과 이전 검색 결과 추가
							this.previousSearchResults.push({ query: query, data: response.data.destinationQueryData });
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
			if (Array.isArray(date)) {
				const startDate = date[0];
				const endDate = date[1];
				const startYear = startDate.getFullYear();
				const startMonth = startDate.getMonth() + 1;
				const startDay = startDate.getDate();
				const endYear = endDate.getFullYear();
				const endMonth = endDate.getMonth() + 1;
				const endDay = endDate.getDate();
				return `${startYear}년 ${startMonth}월 ${startDay}일 - ${endYear}년 ${endMonth}월 ${endDay}일`;
			} else {
				const year = date.getFullYear();
				const month = date.getMonth() + 1;
				const day = date.getDate();
				return `${year}년 ${month}월 ${day}일`;
			}
		},
	}
}
</script>

<style lang="scss">
	@import '../sass/_variables.scss';
    @import '../sass/main.scss';
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