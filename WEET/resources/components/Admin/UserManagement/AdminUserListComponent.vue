<template>
    <!-- 이용자 탭 / 최신 가입 순 -->	
    <div class="admin_user_management_bottom_container">
        <ul class="admin_user_management_bottom_title_ul">
            <li class="font-semibold text-center admin_user_management_bottom_title_li">회원번호</li>
            <li class="font-semibold text-center admin_user_management_bottom_title_li">이름</li>
            <li class="font-semibold text-center admin_user_management_bottom_title_li">아이디</li>
            <li class="font-semibold text-center admin_user_management_bottom_title_li">휴대폰번호</li>
            <li class="font-semibold text-center admin_user_management_bottom_title_li">활동상태</li>
            <li class="font-semibold text-center admin_user_management_bottom_title_li">가입일자</li>
            <li class="font-semibold text-center admin_user_management_bottom_title_li">최근 로그인 이력</li>
        </ul>
        <a href="">
            <ul class="admin_user_management_bottom_content_ul" v-for="userList in $store.state.userListData" :key="userList">
                <li class="text-center admin_user_management_bottom_content_li">{{ userList.user_id }}</li>
                <li class="text-center admin_user_management_bottom_content_li">{{ userList.user_name }}</li>
                <li class="text-center admin_user_management_bottom_content_li">{{ userList.user_email }}</li>
                <li class="text-center admin_user_management_bottom_content_li">{{ userList.user_tel }}</li>
                <li class="text-center admin_user_management_bottom_content_li">{{ userList.user_flg }}</li>
                <li class="text-center admin_user_management_bottom_content_li">{{ userList.user_created_at }}</li>
                <li class="text-center admin_user_management_bottom_content_li">{{ userList.last_login_at }}</li>
            </ul>
        </a>
    </div>
</template>
<script>
export default {
    name: 'AdminUserListComponent',
    
    data() {
        return {
        }
    },

    created() {},

    mounted() {},

    methods: {

    }
}
</script>
<style lang="scss">
    @import '../../../sass/Admin/admin_index.scss';
    @import '../../../sass/Admin/admin_user_management.scss';
</style>