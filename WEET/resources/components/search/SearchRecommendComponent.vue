<template>
    <div class="search_recommenmd_container">
        <div class="search_recommenmd_header"> 
            <div class="search_recommenmd_menu_box">인기여행지</div>
            <div class="search_recommenmd_choice_box">
                <div :class="areaFlg===0 ? 'text-black font-bold' : ''" @click="changeFlg('area',0)">국내</div>
                <div :class="areaFlg!==0 ? 'text-black font-bold' : ''" @click="changeFlg('area',1)">해외</div>
            </div>
            <div class="search_recommenmd_menu_line"/>
        </div>
        <div class="search_recommenmd_body">
            <div class="search_recommenmd_body_content"> 
                <div>테스트</div>
                <div>테스트</div>
                <div>테스트</div>
            </div>
            <div class="search_recommenmd_body_btn">더보기</div>
        </div>
    </div>
    <div class="search_recommenmd_container">
        <div class="search_recommenmd_header"> 
            <div class="search_recommenmd_menu_box">여행리뷰</div>
            <div class="search_recommenmd_choice_box">
                <div :class="reviewAreaFlg===0 ? 'text-black font-bold' : ''" @click="changeFlg('review',0)">국내</div>
                <div :class="reviewAreaFlg!==0 ? 'text-black font-bold' : ''" @click="changeFlg('review',1)">해외</div>
            </div>
            <div class="search_recommenmd_menu_line"/>
        </div>
        <div class="search_recommenmd_review_body">
            <div class="search_recommenmd_review_box">
                <div class="search_recommenmd_review_body_content">
                    <div class="search_recommenmd_review_body_content_img">이미지</div>
                    <div class="search_recommenmd_review_body_content_main">
                        <div class="font-bold">제주 애월 맛집 부수기</div>
                        <div class="search_recommenmd_review_body_content_main_grade_box">
                            <div>여행지평점</div>
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path class="search_recommenmd_star_icon" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path class="search_recommenmd_star_icon" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path class="search_recommenmd_star_icon" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path class="search_recommenmd_star_icon" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="search_recommenmd_review_body_content_main_text_box">
                            <div>동해붐ㅁ메하무후멓모험노륨ㄹ너ㅠㅁㄴㄻ너ㅜㄹ넘뤄ㅜ</div>
                            <div>
                                <div class="cursor-pointer">상세보기</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="search_recommenmd_review_body_content_tag">
                    <div class="search_recommenmd_review_body_content_tag_box">
                        <div>
                            <!-- 빈하트 -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart text-red-500" viewBox="0 0 16 16">
                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                            </svg>
                            <!-- 꽉찬하트 -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart text-red-500" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                            </svg>
                        </div>
                        <div>
                            <div>#태그</div>
                            <div>#태그1</div>
                            <div>#태그112414</div>
                            <div>#태그1124</div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</template>
<script>
export default {
    name:'SearchRecommendComponent',

    data() {
        return {
            areaFlg:0,
            reviewAreaFlg:0,
        }
    },
    
    methods: {
        changeFlg(flg,i){
            if(flg==='area'){
                this.areaFlg = i
            }else{
                this.reviewAreaFlg = i
            }
        }
    },
}
</script>
<style lang="scss">
    @import '../../sass/Search/recommend.scss';
</style>