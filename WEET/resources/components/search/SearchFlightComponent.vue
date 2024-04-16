<template lang="">
    <div class="search_flight_layout">
        <div class="search_flight_sidebar">
            <div class="search_flight_accordion">
                <div class="search_flight_accordion_item">
                    <input type="checkbox" id="search_flight_accordion_item_1" name="search_flight_accordion_item" checked @change="changeAccordion(1)">
                    <label for="search_flight_accordion_item_1" class="search_flight_accordion_title">
                        <div class="search_flight_accordion_title_flex">
                            <div>경유</div>
                            <div v-if="accordion.accordion1">▲</div>
                            <div v-if="!accordion.accordion1">▼</div>
                        </div>
                    </label>
                    <div class="search_flight_accordion_content">
                        <div class="search_flight_flex_align_center">
                            <input type="radio" id="oneway" name="way" value="0" v-model="way" class="cursor-pointer">
                            <label for="oneway" :class="way==='0' ? 'text-black font-bold' : ''" class="cursor-pointer">직항</label>
                        </div>
                        <div class="search_flight_flex_align_center">
                            <input type="radio" id="1stop" name="way" value="1" v-model="way" class="cursor-pointer">
                            <label for="1stop" :class="way==='1' ? 'text-black font-bold' : ''" class="cursor-pointer">1회 경유</label>
                        </div>
                        <div class="search_flight_flex_align_center">
                            <input type="radio" id="2stop" name="way" value="2" v-model="way" class="cursor-pointer">
                            <label for="2stop" :class="way==='2' ? 'text-black font-bold' : ''" class="cursor-pointer">2회 경유</label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="search_flight_accordion_item">
                    <input type="checkbox" id="search_flight_accordion_item_2" name="search_flight_accordion_item" checked @change="changeAccordion(2)">
                    <label for="search_flight_accordion_item_2" class="search_flight_accordion_title">
                        <div class="search_flight_accordion_title_flex">
                            <div>출발 시간대 설정</div>
                            <div v-if="accordion.accordion2">▲</div>
                            <div v-if="!accordion.accordion2">▼</div>
                        </div>
                    </label>
                    <div class="search_flight_accordion_content">
                        <div>
                            <div class="search_flight_accordion_title_flex">
                                <div>
                                    가는날 출발시간
                                </div>
                                <div>
                                    {{departure[0]}} ~ {{departure[1]}}
                                </div>
                            </div>
                            <v-range-slider class="search_flight_slider_bar"
                                v-model="departureTimeBar"
                                strict
                            ></v-range-slider>
                        </div>
                        <div>
                            <div class="search_flight_accordion_title_flex">
                                <div>
                                    오는날 출발시간
                                </div>
                                <div>
                                    {{arrive[0]}} ~ {{arrive[1]}}
                                </div>
                            </div>
                            <v-range-slider class="search_flight_slider_bar"
                                v-model="arriveTimeBar"
                                strict
                            ></v-range-slider>
                        </div>
                
                    </div>
                </div>
                <hr>
                <div class="search_flight_accordion_item">
                    <input type="checkbox" id="search_flight_accordion_item_3" name="search_flight_accordion_item" checked @change="changeAccordion(3)">
                    <label for="search_flight_accordion_item_3" class="search_flight_accordion_title">
                        <div class="search_flight_accordion_title_flex">
                            <div>최저 가격 조회</div>
                            <div v-if="accordion.accordion3">▲</div>
                            <div v-if="!accordion.accordion3">▼</div>
                        </div>
                    </label>
                    <div class="search_flight_accordion_content">
                        <div>
                            {{price[0]}}원 ~ {{price[1]}}원
                        </div>
                        <v-range-slider class="search_flight_slider_bar"
                            v-model="priceBar"
                            strict
                        ></v-range-slider>
                    </div>
                </div>
                <hr>
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
            accordion:{
                accordion1:true,
                accordion2:true,
                accordion3:true,
                accordion4:true,
            },
            way:'0',
            departure:['00:00','24:00'],
            departureTimeBar:[0,100],
            arrive:['00:00','24:00'],
            arriveTimeBar:[0,100],
            minPrice:211160,
            maxPrice:354250,
            price:[0,0],
            priceBar: [0, 100],
        }
    },
    created() {
        this.setting();
    },
    watch:{
        priceBar: {
            handler(val, oldVal) {
                if(val[0] !== oldVal[0]){
                    this.priceChange('min');
                }else if(val[1] !== oldVal[1]){
                    this.priceChange('max');
                }
            },
            deep: true
        },
        departureTimeBar: {
            handler(val, oldVal) {
                if(val[0] !== oldVal[0]){
                    this.watchTimeChange('dep',0);
                }else if(val[1] !== oldVal[1]){
                    this.watchTimeChange('arr',0);
                }
            },
            deep: true
        },
        arriveTimeBar: {
            handler(val, oldVal) {
                if(val[0] !== oldVal[0]){
                    this.watchTimeChange('dep',1);
                }else if(val[1] !== oldVal[1]){
                    this.watchTimeChange('arr',1);
                }
            },
            deep: true
        },
    },
    methods: {
        setting(){
            this.price[0] = this.minPrice
            this.price[1] = this.maxPrice
        },
        changeAccordion(i){
            this.accordion['accordion' + i] = !this.accordion['accordion' + i];
        },
        priceChange(str){
            let i = this.maxPrice - this.minPrice
            let per = Math.ceil(this.priceBar[0])/100;
            let per2 = Math.ceil(this.priceBar[1])/100;
            if(str==='min'){
                this.price[0] = Math.ceil(this.minPrice + i*per)
            }else if(str==='max'){
                this.price[1] = Math.ceil(this.minPrice + i*per2)
            }
        },
        watchTimeChange(str,flg){
            if(flg===0){
                let per = Math.ceil(this.departureTimeBar[0]*0.48);
                let per2 = Math.ceil(this.departureTimeBar[1]*0.48);
                if(str==='dep'){
                    this.departure[0] = Math.floor(per%2 === 1) ? Math.floor(per/2)+':30' : Math.floor(per/2)+':00'
                }else if(str==='arr'){
                    this.departure[1] = Math.floor(per2%2 === 1) ? Math.floor(per2/2)+':30' : Math.floor(per2/2)+':00'
                }
            }else{
                let per = Math.ceil(this.arriveTimeBar[0]*0.48);
                let per2 = Math.ceil(this.arriveTimeBar[1]*0.48);
                if(str==='dep'){
                    this.arrive[0] = Math.floor(per%2 === 1) ? Math.floor(per/2)+':30' : Math.floor(per/2)+':00'
                }else if(str==='arr'){
                    this.arrive[1] = Math.floor(per2%2 === 1) ? Math.floor(per2/2)+':30' : Math.floor(per2/2)+':00'
                }
            }
        },
    },
}


</script>
<style lang="scss">
	@import '../../sass/Search/flight.scss';
	@import '../../sass/_variables.scss';
    .v-slider-track__fill {
        background-color: #0B4AFF !important;
        /* background-color: #2E9AFE !important;     */
    }
    .v-slider-thumb__surface{
        background-color: #0B2161 !important;
        /* background-color: #3b82f6 !important; */
    }
</style>