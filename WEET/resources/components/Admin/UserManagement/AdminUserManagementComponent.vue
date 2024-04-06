<template>			
	<div class="admin_user_management_container">
		<div class="admin_user_management_top_container">
			<div class="admin_user_management_top_title_section">
				<span class="mb-5 text-xl font-bold">이용자 계정 관리</span>
				<span>이용자 계정에 대한 탈퇴처리 및 최근 로그인 이력을 확인할 수 있어요.</span>
			</div>
		</div>
		<div class="admin_user_management_middle_container">
			<div class="admin_user_management_middle_section">
				<span class="text-xl font-bold">이용자 목록</span>
				<select class="ml-5 text-center admin_user_management_select" 
				name="user_list_select" id="user_list_select"
				v-model="userSelectOption" @change="userDataOptionChange">
					<option value="0">최신 가입 순</option>
					<option value="1">최신 결제 순</option>
				</select>
				<!-- Pagination -->
				<div class="relative admin_user_management_pagination_section">
					<!-- currentPage 1페이지 아닐 때 -->
					<div class="admin_user_management_pagination_left_button_area">
						<div class="admin_user_management_pagination_first_button_area" v-if="userCurrentPage !== 1">
							<button class="admin_user_management_pagination_first_button" @click="firstPage()">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
								</svg>
								<span class="font-bold">처음</span>
							</button>
						</div>
						<div class="ml-2 admin_user_management_pagination_prev_button_area" v-if="userCurrentPage !== 1">
							<button class="admin_user_management_pagination_prev_button" @click="prevPage()">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
								</svg>
								<span class="font-bold">이전</span>
							</button>
						</div>
					</div>
					<div class="mx-40 text-center admin_user_management_pagination_page_span_area">
						<span class="text-xl font-bold admin_user_management_pagination_page_span"
						v-if="$store.state.userManagementListData && userSelectOption === '0'">
							{{ $store.state.userManagementListData.current_page }} of {{ $store.state.userManagementListData.last_page }}
						</span>
						<span class="text-xl font-bold admin_user_management_pagination_page_span"
						v-else-if="$store.state.userManagementListData && userSelectOption === '1'">
							{{ $store.state.userManagementListData.current_page }} of {{ $store.state.userManagementListData.last_page }}
						</span>
					</div>
					<!-- lastPage 아닐 때 -->
					<div class="admin_user_management_pagination_right_button_area">
						<div class="admin_user_management_pagination_next_button_area" v-if="userCurrentPage < userLastPage">
							<button class="admin_user_management_pagination_next_button" @click="nextPage()">
								<span class="font-bold">다음</span>
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
								</svg>
							</button>
						</div>						
						<div class="ml-2 admin_user_management_pagination_last_button_area" v-if="userCurrentPage < userLastPage">
							<button class="admin_user_management_pagination_last_button" @click="lastPage()">
								<span class="font-bold">끝</span>
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
								</svg>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>			
		<AdminUserListComponent v-if="userSelectOption === '0'"></AdminUserListComponent>
		<AdminUserPaymentListComponent v-if="userSelectOption === '1'"></AdminUserPaymentListComponent>
	</div>
</template>
<script>
import axios from 'axios';
import { mapState } from 'vuex';
import AdminUserListComponent from './AdminUserListComponent.vue';
import AdminUserPaymentListComponent from './AdminUserPaymentListComponent.vue';
export default {
    name:'AdminUserManagementComponent',

	components: {
		AdminUserListComponent,
		AdminUserPaymentListComponent,
	},

	computed: {
		...mapState({
			userCurrentPage: state => state.userCurrentPage,
			userLastPage: state => state.userLastPage
		})
	},
    
	data() {
		return {
			userSelectOption: '0',
		}
	},

	created() {
		this.$store.dispatch('userManagementList', 1);
	},

	mounted() {
	},

	methods: {		
		// User Management Option 핸들러
		userDataOptionChange() {
			console.log(this.userSelectOption);
			this.$store.commit('setUserSelectOption', this.userSelectOption);
			if (this.userSelectOption === '0') {
				this.$store.dispatch('userManagementList', 1);
			} else if (this.userSelectOption === '1') {
				this.$store.dispatch('userManagementPaymentList', 1);
			}
		},

		// User Management Pagination
		firstPage() {
			this.$store.dispatch('userFirstPagination');
		},
		prevPage() {
			this.$store.dispatch('userPrevPagination');
		},
		nextPage() {
			this.$store.dispatch('userNextPagination');
		},
		lastPage() {
			this.$store.dispatch('userLastPagination');
		},
	}
}
</script>
<style lang="scss">
    @import '../../../sass/Admin/admin_index.scss';
    @import '../../../sass/Admin/admin_user_management.scss';
</style>