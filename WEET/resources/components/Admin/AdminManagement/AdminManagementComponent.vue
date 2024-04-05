<template>    
	<div class="admin_management_container">
		<div class="admin_management_top_container">
			<div class="admin_management_top_title_section">
				<span class="mb-5 text-xl font-bold">어드민 계정 관리</span>
				<span>어드민 계정에 대한 권한 변경 및 탈퇴 처리를 할 수 있어요.</span>
			</div>
		</div>
		<div class="admin_management_middle_container">
			<div class="admin_management_middle_section">
				<span class="text-xl font-bold">어드민 계정 목록</span>
				<select class="ml-5 text-center admin_management_select" 
				name="admin_list_select" id="admin_list_select"
				v-model="adminSelectOption" @change="adminDataOptionChange">
					<option value="1" selected>최신 등록 순</option>
					<option value="2">권한 순</option>
				</select>
				<!-- 최신 등록 순 Pagination -->
				<div class="relative admin_management_pagination_section">
					<!-- currentPage 1페이지 아닐 때 -->
					<div class="admin_management_pagination_left_button_area">
						<div class="admin_management_pagination_first_button_area" v-if="currentPage !== 1">
							<button class="admin_management_pagination_first_button" @click="firstPagination()">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
								</svg>
								<span class="font-bold">처음</span>
							</button>
						</div>
						<div class="ml-2 admin_management_pagination_prev_button_area" v-if="currentPage !== 1">
							<button class="admin_management_pagination_prev_button" @click="prevPagination()">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
								</svg>
								<span class="font-bold">이전</span>
							</button>
						</div>
					</div>
					<div class="mx-40 text-center admin_management_pagination_page_span_area">
						<span class="text-xl font-bold admin_management_pagination_page_span">{{ adminManagementListData.current_page }} of {{ adminManagementListData.last_page }}</span>
					</div>
					<!-- lastPage 아닐 때 -->
					<div class="admin_management_pagination_right_button_area">
						<div class="admin_management_pagination_next_button_area" v-if="currentPage < lastPage">
							<button class="admin_management_pagination_next_button" @click="nextpagination()">
								<span class="font-bold">다음</span>
								<svg v-if="currentPage !== lastPage" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
								</svg>
							</button>
						</div>						
						<div class="ml-2 admin_management_pagination_last_button_area" v-if="currentPage < lastPage">
							<button class="admin_management_pagination_last_button" @click="lastPagination()">
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
			<ul class="admin_management_bottom_content_ul" v-for="adminList in adminListData" :key="adminList">
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
	</div>
</template>
<script>
import axios from 'axios';
export default {
    name:'AdminManagementComponent',
    
	data() {
		return {
			userDropdown: false,
			adminDropdown: false,
			adminToken: '',
			adminFlgInfo: '',
			adminNameInfo: '',			
			adminAuthority: false, // Admin 메뉴 권한 확인용
			// Admin Management 데이터 저장용
			adminListData: [],
			// Pagination 데이터 저장용
			adminManagementListData: {},
			currentPage: null,
			lastPage: null,
			adminSelectOption: 1,
		}
	},

	created() {
		this.adminDataOptionChange();
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

		// Admin Management List 데이터 수신
		adminManagementList(page) {
			const URL = '/admin/management/adminManagementList?page=' + page;
			axios.get(URL)
				.then(response => {				
					if(response.data.code === "AML00") {
						this.adminManagementListData = response.data.adminManagementList;
						this.adminListData = response.data.adminManagementList.data;						
						this.adminListData.forEach(admin => {
							// admin_flg / 1, 2 => Sub, Root로 변경
							if (admin.admin_flg === 1) {
								admin.admin_flg = 'Sub';
							} else {
								admin.admin_flg = 'Root';
							}
						});
						this.currentPage = response.data.adminManagementList.current_page;
						this.lastPage = response.data.adminManagementList.last_page;
					} else {
						console.error('서버 오류');
					}
				})
				.catch(error => {
					console.error(error);
				});
		},

		// Admin Management Flg List 데이터 수신
		adminManagementFlgList(page) {
			const URL = '/admin/management/adminManagementFlgList?page=' + page;
			axios.get(URL)
				.then(response => {				
					if(response.data.code === "AMFL00") {
						this.adminManagementListData = response.data.adminManagementFlgList;
						this.adminListData = response.data.adminManagementFlgList.data;						
						this.adminListData.forEach(admin => {
							// admin_flg / 1, 2 => Sub, Root로 변경
							if (admin.admin_flg === 1) {
								admin.admin_flg = 'Sub';
							} else {
								admin.admin_flg = 'Root';
							}
						});
						this.currentPage = response.data.adminManagementFlgList.current_page;
						this.lastPage = response.data.adminManagementFlgList.last_page;
					}  else {
						console.error('서버 오류');
					}
				})
				.catch(error => {
					console.error(error);
				});
		},

		// Admin Management Option 핸들러
		adminDataOptionChange() {
			if (this.adminSelectOption === '1') {
				this.adminManagementList();
			} else {
				this.adminManagementFlgList();
			}
		},

		// Admin Management Pagination 처리
		// 첫번째 페이지
		firstPagination() {
			if (this.adminSelectOption === '1') {
				this.adminManagementList(1);
			} else {
				this.adminManagementFlgList(1);
			}
		},
		// 이전 페이지
		prevPagination() {
			if (this.adminSelectOption === '1') {
				this.adminManagementList(this.currentPage - 1);
			} else {
				this.adminManagementFlgList(this.currentPage - 1);
			}
		},
		// 다음 페이지
		nextpagination() {
			if (this.adminSelectOption === '1') {
				this.adminManagementList(this.currentPage < this.lastPage ? this.currentPage + 1 : this.currentPage);
			} else {
				this.adminManagementFlgList(this.currentPage < this.lastPage ? this.currentPage + 1 : this.currentPage);
			}
		},
		// 마지막 페이지
		lastPagination() {
			if (this.adminSelectOption === '1') {
				this.adminManagementList(this.lastPage);
			} else {
				this.adminManagementFlgList(this.lastPage);
			}
		},

        // Admin 권한 변경
        adminManagementUpdate(admin_number) {
            const URL = '/admin/management/update';            
            const formData = new FormData();
            formData.append('admin_number', admin_number);

            axios.post(URL, formData)
				.then(response => {                
					if(response.data.code === "AU00") {
						alert('권한이 변경되었습니다.');
                        window.location.reload();
					} else {                
						alert(response.data.error);
					}
				})
				.catch(error => {                
					alert(error.response.data.error);
				});
        },

        // Admin 탈퇴
        adminManagementWithdrawal(admin_number) {
            const URL = '/admin/management/withdrawal';            
            const formData = new FormData();
            formData.append('admin_number', admin_number);
            axios.post(URL, formData)
				.then(response => {                
					if(response.data.code === "AW00") {
						alert('계정이 탈퇴되었습니다.');
                        window.location.reload();
					} else {                
						alert(response.data.error);
					}
				})
				.catch(error => {                
					alert(error.response.data.error);
				});
        },
	}
}
</script>
<style lang="scss">
    @import '../../../sass/Admin/admin_index.scss';
    @import '../../../sass/Admin/admin_management.scss';
</style>