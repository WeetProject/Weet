<template>
    <div class="search_recommenmd_container">
        <div class="search_recommenmd_header"> 
            <div class="search_recommenmd_menu_box">인기여행지</div>
            <div class="search_recommenmd_choice_box">
                <div>국내</div>
                <div>해외</div>
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
                <div>국내</div>
                <div>해외</div>
            </div>
            <div class="search_recommenmd_menu_line"/>
        </div>
        <div class="search_recommenmd_review_body">
            <div class="search_recommenmd_review_box">
                <div class="search_recommenmd_review_body_content">
                    <div class="search_recommenmd_review_body_content_img">이미지</div>
                    <div class="search_recommenmd_review_body_content_main"></div>
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
            
        }
    },
    
    methods: {
        
    },
}
</script>
<style lang="scss">
    @import '../../sass/Search/recommend.scss';
</style>