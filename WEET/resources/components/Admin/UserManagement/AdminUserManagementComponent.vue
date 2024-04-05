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
						<div class="admin_user_management_pagination_first_button_area" v-if="currentPage !== 1">
							<button class="admin_user_management_pagination_first_button" @click="moveFirstPage()">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
								</svg>
								<span class="font-bold">처음</span>
							</button>
						</div>
						<div class="ml-2 admin_user_management_pagination_prev_button_area" v-if="currentPage !== 1">
							<button class="admin_user_management_pagination_prev_button" @click="movePrevPage()">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
								</svg>
								<span class="font-bold">이전</span>
							</button>
						</div>
					</div>
					<div class="mx-40 text-center admin_user_management_pagination_page_span_area">
						<span class="text-xl font-bold admin_user_management_pagination_page_span">
							{{ $store.state.userManagementListData.current_page }} of {{ $store.state.userManagementListData.last_page }}
						</span>
					</div>
					<!-- lastPage 아닐 때 -->
					<div class="admin_user_management_pagination_right_button_area">
						<div class="admin_user_management_pagination_next_button_area" v-if="currentPage < lastPage">
							<button class="admin_user_management_pagination_next_button" @click="moveNextPage()">
								<span class="font-bold">다음</span>
								<svg v-if="currentPage !== lastPage" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
								</svg>
							</button>
						</div>						
						<div class="ml-2 admin_user_management_pagination_last_button_area" v-if="currentPage < lastPage">
							<button class="admin_user_management_pagination_last_button" @click="moveLastPage()">
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
    
	data() {
		return {
			userDropdown: false,
			adminDropdown: false,
			adminToken: '',
			adminFlgInfo: '',
			adminNameInfo: '',			
			adminAuthority: false, // Admin 메뉴 권한 확인용
			userGenderInfo: '',
			userFlgInfo: '',
			userSelectOption: '0',
		}
	},

	created() {
		this.$store.dispatch('userManagementList', 1);
	},

	computed: {
		...mapState({
			currentPage: state => state.currentPage,
			lastPage: state => state.lastPage
		})
	},

	mounted() {
		this.adminToken = localStorage.getItem('token');
		this.adminFlgInfo = localStorage.getItem('adminFlg');
		this.adminNameInfo = localStorage.getItem('adminName');

		if(this.adminToken && this.adminFlgInfo && this.adminNameInfo) {
			if(this.adminFlgInfo === '1') {
				this.adminFlgInfo = 'Sub Admin';
				this.adminAuthority = false;
			} else if(this.adminFlgInfo === '2') {
				this.adminFlgInfo = 'Root Admin';
				this.adminAuthority = true;
			} else {
				alert("로그인을 다시 해주세요.");
				this.$router.push('/admin');
			}
		}
	},

	methods: {
		// User 드롭다운
		toggleUserDropdown() {
			this.userDropdown = !this.userDropdown;
		},
		// Admin 드롭다운
		toggleAdminDropdown() {
			this.adminDropdown = !this.adminDropdown;
		},
		// Admin 로그아웃
		adminLogout() {
			const URL = '/admin/logout';
			const token = localStorage.getItem('token');
			const header = {
                headers: {
                    "Authorization": `Bearer ${token}`,
                },
            };
			console.log(header);
			axios.post(URL, null ,header)
				.then(response => {
					if(response.data.code === "ALO00") {
							localStorage.clear();
							alert('로그아웃 되었습니다.');
							this.$router.push('/admin');
						} else {                
							this.adminLogoutAlertError = response.data.error
							alert(this.adminLogoutAlertError);
						}
				})
				.catch(error => {
					this.adminLogoutAlertError = error.response.data.error
					alert(this.adminLogoutAlertError);
				});
		},
		// User Management Option 핸들러
		userDataOptionChange() {
			if (this.userSelectOption === '0') {
				this.$store.dispatch('userManagementList', 1);
			} else if (this.userSelectOption === '1') {
				this.$store.dispatch('userManagementPaymentList', 1);
			}
		},
		moveFirstPage() {
			this.$store.dispatch('firstPagination');
		},
		movePrevPage() {
			this.$store.dispatch('prevPagination');
		},
		moveNextPage() {
			this.$store.dispatch('nextPagination');
		},
		moveLastPage() {
			this.$store.dispatch('lastPagination');
		},
	}
}
</script>
<style lang="scss">
    @import '../../../sass/Admin/admin_index.scss';
    @import '../../../sass/Admin/admin_user_management.scss';
</style>