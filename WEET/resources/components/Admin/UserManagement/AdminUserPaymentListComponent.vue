<template>
    <!-- 이용자 탭 / 최신 결제 순 -->
    <div class="admin_user_management_bottom_container">
        <ul class="admin_user_management_bottom_title_ul">
            <li class="font-semibold text-center admin_user_management_bottom_title_li">이름</li>
            <li class="font-semibold text-center admin_user_management_bottom_title_li">아이디</li>
            <li class="font-semibold text-center admin_user_management_bottom_title_li">휴대폰번호</li>
            <li class="font-semibold text-center admin_user_management_bottom_title_li">결제 금액</li>
            <li class="font-semibold text-center admin_user_management_bottom_title_li">출발 정보</li>
            <li class="font-semibold text-center admin_user_management_bottom_title_li">도착 정보</li>
            <li class="font-semibold text-center admin_user_management_bottom_title_li">결제 시간</li>
        </ul>
        <a href="">
            <ul class="admin_user_management_bottom_content_ul" v-for="userList in $store.state.userListData" :key="userList">
                <li class="text-center admin_user_management_bottom_content_li">{{ userList.user_name }}</li>
                <li class="text-center admin_user_management_bottom_content_li">{{ userList.user_email }}</li>
                <li class="text-center admin_user_management_bottom_content_li">{{ userList.user_tel }}</li>
                <li class="text-center admin_user_management_bottom_content_li">{{ userList.payment_price }}</li>
                <li class="text-center admin_user_management_bottom_content_li">
                    {{ userList.reservation_departure_airport }}
                    {{ userList.reservation_departure_time }}
                </li>
                <li class="text-center admin_user_management_bottom_content_li">
                    {{ userList.reservation_arrival_airport }}
                    {{ userList.reservation_arrival_time }}
                </li>
                <li class="text-center admin_user_management_bottom_content_li">{{ userList.payment_created_at }}</li>
            </ul>
        </a>
    </div> 
</template>
<script>
export default {
    name: 'AdminUserPaymentListComponent',

    data() {
        return {
            setting: '',
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