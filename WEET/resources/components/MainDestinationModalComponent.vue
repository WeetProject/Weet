<template>
    <!-- desktop -->
    <div class="main_modal_container">
        <div class="main_modal_search_article">
            <!-- 검색어 입력 -->
            <div class="main_modal_search_section" :class="{ query_focus: isQueryFocus }">
                <input class="main_modal_search_input" type="text" 
                name="destination_input" id="destination_input" v-model="destinationQuery"
                autocomplete="off" spellcheck="false" placeholder="국가, 도시명 검색"
                maxlength="15" @input="destinationInput" @focus="destinationFocus" @blur="destinationBlur">
                <button class="main_modal_search_button" @click="searchQueryClear">
                    <svg class="w-5 h-5 fill-[#666666]" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"></path>
                    </svg>
                </button>
            </div>
            <!-- 가운데 영역 분할 선 -->
            <div class="main_modal_line" v-if="destinationQuery && destinationQuerySuggestion.length >= 1 && destinationFlg"></div>
            <!-- 연관 검색어 -->
            <div class="main_modal_suggetion_section" v-if="destinationQuery && destinationQuerySuggestion.length >= 1 && destinationFlg">
                <div class="main_modal_suggetion_area">
                    <div class="main_modal_suggetion_list" 
                        v-for="destinationSuggestion in destinationQuerySuggestion"
                        :key="destinationSuggestion.id"
                        @click="destinationSuggestionData(destinationSuggestion)">
                        <div class="main_modal_suggetion_list_city_country">
                            <svg class="mr-2 w-5 h-5 fill-[#666666]" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                <path d="M352 256c0 22.2-1.2 43.6-3.3 64H163.3c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64H348.7c2.2 20.4 3.3 41.8 3.3 64zm28.8-64H503.9c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64H380.8c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32H376.7c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0H167.7c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0H18.6C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192H131.2c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64H8.1C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6H344.3c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352H135.3zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6H493.4z"></path>
                            </svg>
                            <span class="main_modal_suggetion_list_city_country_span">
                                {{ destinationSuggestion.airport_kr_city_name }},
                                {{ destinationSuggestion.airport_kr_country_name }} 
                                {{ destinationSuggestion.airport_city_name }}
                            </span>
                        </div>
                        <div class="main_modal_suggetion_list_iatacode_airport">
                            <svg class="mr-2 w-5 h-5 fill-[#666666]" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                                <path d="M482.3 192c34.2 0 93.7 29 93.7 64c0 36-59.5 64-93.7 64l-116.6 0L265.2 495.9c-5.7 10-16.3 16.1-27.8 16.1l-56.2 0c-10.6 0-18.3-10.2-15.4-20.4l49-171.6L112 320 68.8 377.6c-3 4-7.8 6.4-12.8 6.4l-42 0c-7.8 0-14-6.3-14-14c0-1.3 .2-2.6 .5-3.9L32 256 .5 145.9c-.4-1.3-.5-2.6-.5-3.9c0-7.8 6.3-14 14-14l42 0c5 0 9.8 2.4 12.8 6.4L112 192l102.9 0-49-171.6C162.9 10.2 170.6 0 181.2 0l56.2 0c11.5 0 22.1 6.2 27.8 16.1L365.7 192l116.6 0z"></path>
                            </svg>
                            <span class="main_modal_suggetion_list_iatacode_airport_span">
                                {{ destinationSuggestion.airport_iata_code }} | 
                                {{ destinationSuggestion.airport_kr_name }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</template>
<script>
import axios from 'axios';
import { debounce } from 'lodash';

export default {
    name: 'MainDestinationModalComponent',    
    components: {
    },

    data() {
        return {
            isQueryFocus: false,
            previousDestinationQueryResult: [],
			destinationQuery: '',
			destinationQuerySuggestion: [],
			destinationFlg: false,
        }
    },

    created() {
        this.debouncAlgoliaDestinationQuery = debounce(this.algoliaDestinationQuery, 300);  
    },

    methods: {
        destinationFocus() {
            this.isQueryFocus = true;
        },
        destinationBlur() {
            this.isQueryFocus = false;
        },

        searchQueryClear() {
            this.destinationQuery = '';
        },

        destinationSuggestionData(destinationSuggestion) {
            this.$emit('destinationExchangeQueryData', destinationSuggestion);
        },

        // 도착지 검색어 저장
		destinationInput(event) {
			this.destinationQuery = event.target.value;
			if (!this.destinationQuery) {
				this.destinationQuerySuggestion = [];
				this.destinationFlg = false;
			} else {
				if (!this.destinationFlg) {
					this.debouncAlgoliaDestinationQuery();
				}
			}
		},

		// 도착지 연관 검색어 송수신
		algoliaDestinationQuery() {
			if (!this.destinationFlg) {
				const URL = '/search-destination';
				const query = this.destinationQuery;
				const previousResult = this.previousDestinationQueryResult.find(result => result.query === query);
					
				// 이전 검색 결과가 존재 시
				if (previousResult) {
					// 이전 검색 결과 사용
					this.destinationQuerySuggestion = previousResult.data;
                    this.destinationFlg = true;
				} else {
					// 이전 검색 결과 미 존재 시
					axios.get(URL, {
						params: {
							query: query
						}
					})
					.then(response => {
						if(response.data.code === "DS00") {
                            console.log("### 도착지 검색 데이터 ###" , response.data);
							// 새 검색 결과
							this.destinationQuerySuggestion = response.data.destinationQueryData;
							
							// 새 검색 결과 이전 검색 결과 추가
							this.previousDestinationQueryResult.push({ query: query, data: response.data.destinationQueryData });
							
							// 새 검색 결과 플래그 변경
							this.destinationFlg = true;
						}
					})
					.catch(error => {
						console.error(error);
					})
				}
			}
		},
    }
}
</script>
<style lang="scss">
    @import '../sass/mainModal.scss';
</style>