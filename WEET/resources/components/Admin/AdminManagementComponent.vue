<template>
    <div class="border-box admin_index_container">
		<div class="admin_index_section">
			<div class="admin_index_left_container">
				<div class="admin_index_left_info_section">
					<span class="text-xl font-semibold admin_index_left_info_name_area">
						<img class="admin_index_left_info_image" src="../../../public/images/WEET_logo.png" alt="">
						{{ adminNameInfo }} 님
					</span>
				</div>
				<p class="mb-5 font-semibold text-center">권한 : {{ adminFlgInfo }}</p>
				<div class="admin_index_left_logout_section">
					<a class="font-semibold admin_index_left_logout_a" href="/admin" @click="adminLogout" v-if="adminToken">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
							<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
						</svg>
						Log Out
					</a>
				</div>
				<hr>
				<div class="admin_index_left_search_section">
					<input class="admin_index_left_search_input" type="search" name="" id="" placeholder="Search here">
				</div>
				<div class="admin_index_left_nav_section">
					<ul class="admin_index_left_nav_ul">
						<li class="admin_index_left_nav_li">
							<a class="admin_index_left_nav_a" href="#">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
								</svg>
								Chart
							</a>
						</li>
						<li class="admin_index_left_nav_li">
							<a class="admin_index_left_nav_a" href="#">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
								</svg>
								Calender
							</a>
						</li>
						<li class="admin_index_left_nav_li">
							<a class="admin_index_left_nav_dropdown_a" href="#" @click="toggleUserDropdown">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 admin_index_left_nav_dropdown_left_svg">
									<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
								</svg>
								User
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 admin_index_left_nav_dropdown_right_svg">
									<path stroke-linecap="round" stroke-linejoin="round" d="m4.5 5.25 7.5 7.5 7.5-7.5m-15 6 7.5 7.5 7.5-7.5" />
								</svg>
							</a>
							<ul class="admin_index_left_nav_dropdown_ul" v-if="userDropdown">
								<li>
									<router-link to="/admin/user/management" class="admin_index_left_nav_a">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
										</svg>
										Management
									</router-link>
								</li>
								<li>
									<a class="admin_index_left_nav_a" href="#">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
										</svg>
										Report
									</a>
								</li>
							</ul>
						</li>
						<li class="admin_index_left_nav_li" v-if="adminAuthority">
							<a class="admin_index_left_nav_dropdown_a" href="#" @click="toggleAdminDropdown">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 admin_index_left_nav_dropdown_left_svg">
									<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
								</svg>
								Administrator
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 admin_index_left_nav_dropdown_right_svg">
									<path stroke-linecap="round" stroke-linejoin="round" d="m4.5 5.25 7.5 7.5 7.5-7.5m-15 6 7.5 7.5 7.5-7.5" />
								</svg>
							</a>
							<ul class="admin_index_left_nav_dropdown_ul" v-if="adminDropdown">
								<li>
									<a class="admin_index_left_nav_a" href="#">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 0 1 0 3.46" />
										</svg>
									Notice
									</a>
								</li>
								<li>
									<router-link to="/admin/management" class="admin_index_left_nav_a">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
										</svg>
										Management
									</router-link>
								</li>
								<li>
									<router-link to="/admin/registration" class="admin_index_left_nav_a">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
										</svg>
										Registration
									</router-link>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
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
    @import '../../sass/Admin/admin_index.scss';
    @import '../../sass/Admin/admin_management.scss';
</style>