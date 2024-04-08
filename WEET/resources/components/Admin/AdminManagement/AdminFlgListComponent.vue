<template>    
    <div class="admin_management_bottom_container">
        <!-- 이용자 탭 -->
        <ul class="admin_management_bottom_title_ul">
            <li class="font-semibold text-center admin_management_bottom_title_li">사원번호</li>
            <li class="font-semibold text-center admin_management_bottom_title_li">이름</li>
            <li class="font-semibold text-center admin_management_bottom_title_li">등록일자</li>
            <li class="font-semibold text-center admin_management_bottom_title_li">권한</li>
            <li class="font-semibold text-center admin_management_bottom_title_li">변경</li>
            <li class="font-semibold text-center admin_management_bottom_title_li">탈퇴</li>
        </ul>
        <ul class="admin_management_bottom_content_ul" v-for="adminList in $store.state.adminListData" :key="adminList">
            <li class="text-center admin_management_bottom_content_li">{{ adminList.admin_number }}</li>
            <li class="text-center admin_management_bottom_content_li">{{ adminList.admin_name }}</li>
            <li class="text-center admin_management_bottom_content_li">{{ adminList.admin_created_at }}</li>
            <li class="text-center admin_management_bottom_content_li">
                <div>
                    <select class="text-center admin_management_select" name="admin_flg" id="admin_flg">
                        <option :selected="adminList.admin_flg === 'Root'" value="2">Root</option>
                        <option :selected="adminList.admin_flg === 'Sub'" value="1">Sub</option>
                    </select>
                </div>
            </li>
            <li class="text-center admin_management_bottom_content_li">
                <button class="admin_management_bottom_content_update_button" @click="adminManagementUpdate(adminList.admin_number)">변경</button>
            </li>
            <li class="text-center admin_management_bottom_content_li">
                <button class="admin_management_bottom_content_withdrawal_button" @click="adminManagementWithdrawal(adminList.admin_number)">탈퇴</button>
            </li>
        </ul>          
    </div>
</template>
<script>
export default {
    name:'AdminFlgListComponent',
    
	data() {
		return {

		}
	},

	created() {
	},

	mounted() {
	},

	methods: {
        // Admin 권한 변경
        adminManagementUpdate(admin_number) {
            this.$store.dispatch('adminManagementUpdate', admin_number);
        },

        // Admin 계정 탈퇴
        adminManagementWithdrawal(admin_number) {
            // console.log(admin_number);
            this.$store.dispatch('adminManagementWithdrawal', admin_number);
        },
    },
}
</script>
<style lang="scss">
    @import '../../../sass/Admin/admin_index.scss';
    @import '../../../sass/Admin/admin_management.scss';
</style>