<template lang="">
    <div class="search_bg pt-1" @click="closeCalendar($event)">
        <div class="search_menu">
            <div class="search_menu_bottom">
                <div v-if="pageflg===0" class="search_menu_flight">
                    <!-- 여행지역 -->
                    <div class="search_menu_flight_state">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search cursor-pointer ml-2" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                        <div class="search_menu_flight_state_text">
                            부산(PUS)
                        </div>
                        <hr>
                        <div class="search_menu_flight_state_text">
                            제주(CJU)
                        </div>
                    </div>
                    <!-- 인원 및 좌석등금 -->
                    <div class="search_menu_flight_box">
                        <div>1성인</div>
                        <div class="search_menu_flight_box_line"/>
                        <div>일반석</div>
                    </div>
                    <div class="search_menu_flight_box">
                        <div @click=openCalendar(1) class="relative" ref="calendar1">
                            <div>{{departureDate}}</div>
                            <MyCalendarComponent v-if="calFlg===1" class="absolute top-10 left-0":takeFlg="0" :takeDate="departureDate" @send_data="getCalendarDate" @click.stop/>
                        </div>
                        <div class="search_menu_flight_box_line"/>
                        <div @click=openCalendar(2) class="relative" ref="calendar2">
                            <div>{{arrivalDate}}</div>
                            <MyCalendarComponent v-if="calFlg===2" class="absolute top-10 left-0" :takeFlg="1" :takeDate="arrivalDate" @send_data="getCalendarDate" @click.stop/>
                        </div>
                    </div>
                    <div class="search_menu_top">
                        <div class="cursor-pointer" @click="changeFlg(0)" :class=" pageflg===0 ? 'font-bold' : ''">항공편</div>
                        <div class="cursor-pointer" @click="changeFlg(1)" :class=" pageflg===1 ? 'font-bold' : ''">추천 여행지</div>
                    </div>
                </div>
                <div v-if="pageflg===1" class="search_menu_recommend">
                    <input type="text" placeholder="제목,내용등 검색"/>
                    <button>검색</button>
                    <div class="search_menu_top2">
                        <div class="cursor-pointer" @click="changeFlg(0)" :class=" pageflg===0 ? 'font-bold' : ''">항공편</div>
                        <div class="cursor-pointer" @click="changeFlg(1)" :class=" pageflg===1 ? 'font-bold' : ''">추천 여행지</div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <SearchFlightComponent v-if="pageflg===0"/>
            <SearchRecommendComponent v-if="pageflg===1"/>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import SearchFlightComponent from './SearchFlightComponent.vue';
import SearchRecommendComponent from './SearchRecommendComponent.vue';
import MyCalendarComponent from './MyCalendarComponent.vue';


export default {
    name:'SearchComponent',

    components: {
        SearchFlightComponent,
        SearchRecommendComponent,
        MyCalendarComponent,
    },

    data() {
        return {
            pageflg:0,
            calFlg:0,
            departureDate:'날짜를 선택해주세요',
            arrivalDate:'날짜를 선택해주세요',
        }   
    },
    methods: {
        changeFlg(i){
            this.pageflg=i
        },
        openCalendar(i){
            if((this.calFlg===1&&i===1)||(this.calFlg===2&&i===2)){
                this.calFlg=0
            }else{
                this.calFlg=i
            }
        },
        closeCalendar(event) {
            if ((!this.$refs.calendar1.contains(event.target)&&!this.$refs.calendar2.contains(event.target))) {
                this.calFlg = 0;
            }
        },
        getCalendarDate(data){
            if(this.calFlg===1){
                this.departureDate=data
            }else{
                this.arrivalDate=data
            }
            this.calFlg = 0;
        }
    },
}
</script>
<style lang="scss">
	@import '../../sass/Search/search.scss';
</style>
