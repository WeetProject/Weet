<template lang="">
    <div class="search_bg pt-1">
        <div class="search_menu">
            <div class="search_menu_top">
                <div class="cursor-pointer" @click="changeFlg(0)" :class=" pageflg===0 ? 'font-bold' : ''">항공편</div>
                <div class="cursor-pointer" @click="changeFlg(1)" :class=" pageflg===1 ? 'font-bold' : ''">추천 여행지</div>
            </div>
            <div class="search_menu_bottom">
                <div v-if="pageflg===0" class="search_menu_flight">
                    <div>
                
                    </div>
                </div>
                <div v-if="pageflg===1" class="search_menu_recommend">
                    <input type="text" placeholder="제목,내용등 검색"/>
                    <button>검색</button>
                </div>
            </div>
            <!-- 달력 -->
            <div class="search_carlendar" v-if="calFlg">
                <MyCalendarComponent/>
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
            calFlg:false,
        }   
    },

    methods: {
        changeFlg(i){
            this.pageflg=i
        }
    },
}
</script>
<style lang="scss">
	@import '../../sass/Search/search.scss';
</style>
