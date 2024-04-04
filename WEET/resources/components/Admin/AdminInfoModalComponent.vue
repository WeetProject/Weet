<template>
    <div class="modal_container">
        <div class="modal_top_container">
            <div class="modal_top_title_section">
                <p>여중기 님 상세정보</p>
            </div>
            <div class="modal_top_cencel_section">
                X
            </div>
        </div>
        <div class="modal_middle_container">
            <div class="modal_middle_title_section">
                <div class="modal_middle_title_area">이름</div>
                <div class="modal_middle_title_area">아이디</div>
                <div class="modal_middle_title_area">휴대폰번호</div>
                <div class="modal_middle_title_area">생년월일</div>
                <div class="modal_middle_title_area">성별</div>
                <div class="modal_middle_title_area">우편번호</div>
                <div class="modal_middle_title_area">기본주소</div>
                <div class="modal_middle_title_area">상세주소</div>
            </div>
            <div class="modal_middle_content_section">
                <div class="modal_middle_content_area">여중기</div>
                <div class="modal_middle_content_area">admin@admin.com</div>
                <div class="modal_middle_content_area">010-5847-1671</div>
                <div class="modal_middle_content_area">1991-10-01</div>
                <div class="modal_middle_content_area">남자</div>
                <div class="modal_middle_content_area">12345</div>
                <div class="modal_middle_content_area">대구시 중구 봉산문화길 69</div>
                <div class="modal_middle_content_area">101동 1103호</div>
            </div>
        </div>
        <div class="modal_bottom_container">
            <button class="modal_button" type="submit">
                <div class="modal_bottom_button_section">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM4 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 10.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                    </svg>
                    <span class="font-bold">탈퇴</span>
                </div>
            </button>
            <button class="modal_button">
                <div class="modal_bottom_button_section">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                    </svg>
                    <span class="font-bold">취소</span>
                </div>
            </button>
        </div>
    </div>
    
</template>
<script>
import store from '../../js/store.js';
import AdminInfoModalComponent from '../Admin/AdminInfoModalComponent.vue';
export default {
    name: 'AdminInfoModalComponent',

    data() {
        return {
            setting: '',
        }
    },

    created() {},

    mounted() {},

    methods: {
        userListModalOpen() {
            this.$store.commit('userListModalOpen');
            this.userListModal = true;
        },
        userListModalClose() {
            this.$store.commit('userListModalClose');
            this.userListModal = false;
        },
    }
}
</script>
<style lang="scss">
    @import '../../sass/Admin/admin_modal.scss';
</style>