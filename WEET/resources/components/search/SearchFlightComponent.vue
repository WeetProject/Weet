<template lang="">
    <div class="search_flight_layout">
        <div class="search_flight_sidebar">
            <div class="search_flight_accordion">
                <div class="search_flight_accordion_item">
                    <input type="checkbox" id="search_flight_accordion_item_1" name="search_flight_accordion_item" checked @change="changeAccordion(1)">
                    <label for="search_flight_accordion_item_1" class="search_flight_accordion_title">
                        <div class="search_flight_accordion_title_flex">
                            <div>경유</div>
                            <div v-if="accordion1">▲</div>
                            <div v-if="!accordion1">▼</div>
                        </div>
                    </label>
                    <div class="search_flight_accordion_content">
                        <div>
                            <input type="radio" id="oneway" name="way">
                            <label for="oneway">직항</label>
                        </div>
                        <div>
                            <input type="radio" id="1stop" name="way">
                            <label for="1stop">1회 경유</label>
                        </div>
                        <div>
                            <input type="radio" id="2stop" name="way">
                            <label for="2stop">2회 경유</label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="search_flight_accordion_item">
                    <input type="checkbox" id="search_flight_accordion_item_2" name="search_flight_accordion_item" checked @change="changeAccordion(2)">
                    <label for="search_flight_accordion_item_2" class="search_flight_accordion_title">
                        <div class="search_flight_accordion_title_flex">
                            <div>출발 시간대 설정</div>
                            <div v-if="accordion2">▲</div>
                            <div v-if="!accordion2">▼</div>
                        </div>
                    </label>
                    <div class="search_flight_accordion_content">
                        <div>
                            {{departureTime}}
                        </div>
                        <v-range-slider
                            v-model="departureTime"
                            strict
                        ></v-range-slider>
                    </div>
                </div>
                <hr>
                <div class="search_flight_accordion_item">
                    <input type="checkbox" id="search_flight_accordion_item_3" name="search_flight_accordion_item" checked @change="changeAccordion(3)">
                    <label for="search_flight_accordion_item_3" class="search_flight_accordion_title">
                        <div class="search_flight_accordion_title_flex">
                            <div>최저 가격 조회</div>
                            <div v-if="accordion3">▲</div>
                            <div v-if="!accordion3">▼</div>
                        </div>
                    </label>
                    <div class="search_flight_accordion_content">
                        Content of Section 3
                    </div>
                </div>
                <hr>
                <div class="search_flight_accordion_item">
                    <input type="checkbox" id="search_flight_accordion_item_4" name="search_flight_accordion_item" checked @change="changeAccordion(4)">
                    <label for="search_flight_accordion_item_4" class="search_flight_accordion_title">
                        <div class="search_flight_accordion_title_flex">
                            <div>항공사</div>
                            <div v-if="accordion4">▲</div>
                            <div v-if="!accordion4">▼</div>
                        </div>
                    </label>
                    <div class="search_flight_accordion_content">
                        Content of Section 4
                    </div>
                </div>
            </div>
        </div>
        <div class="search_flight_main">2번영역</div>
    </div>
</template>
<script>
export default {
    name:'SearchFlightComponent',

    data() {
        return {
            accordion1:true,
            accordion2:true,
            accordion3:true,
            accordion4:true,
            departureTime:[0,100],
        }
    },
    methods: {
        changeAccordion(i){
            this['accordion' + i] = !this['accordion' + i];
        },
    },
}


</script>
<style lang="scss">
	@import '../../sass/Search/flight.scss';
</style>