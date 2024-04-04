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
							<option value="1">최신 가입 순</option>
							<option value="2">최신 결제 순</option>
						</select>
						<!-- Pagination -->
						<div class="relative admin_user_management_pagination_section">
							<!-- currentPage 1페이지 아닐 때 -->
							<div class="admin_user_management_pagination_left_button_area">
								<div class="admin_user_management_pagination_first_button_area" v-if="currentPage !== 1">
									<button class="admin_user_management_pagination_first_button" @click="firstPagination()">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
										</svg>
										<span class="font-bold">처음</span>
									</button>
								</div>
								<div class="ml-2 admin_user_management_pagination_prev_button_area" v-if="currentPage !== 1">
									<button class="admin_user_management_pagination_prev_button" @click="prevPagination()">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
										</svg>
										<span class="font-bold">이전</span>
									</button>
								</div>
							</div>
							<div class="mx-40 text-center admin_user_management_pagination_page_span_area">
								<span class="text-xl font-bold admin_user_management_pagination_page_span">{{ userManagementListData.current_page }} of {{ userManagementListData.last_page }}</span>
							</div>
							<!-- lastPage 아닐 때 -->
							<div class="admin_user_management_pagination_right_button_area">
								<div class="admin_user_management_pagination_next_button_area" v-if="currentPage < lastPage">
									<button class="admin_user_management_pagination_next_button" @click="nextpagination()">
										<span class="font-bold">다음</span>
										<svg v-if="currentPage !== lastPage" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
										</svg>
									</button>
								</div>						
								<div class="ml-2 admin_user_management_pagination_last_button_area" v-if="currentPage < lastPage">
									<button class="admin_user_management_pagination_last_button" @click="lastPagination()">
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
				<div v-if="userSelectOption === '1'">
					<!-- 이용자 탭 / 최신 가입 순 -->					
					<div class="admin_user_management_bottom_container">
						<ul class="admin_user_management_bottom_title_ul">
							<li class="font-semibold text-center admin_user_management_bottom_title_li">이름</li>
							<li class="font-semibold text-center admin_user_management_bottom_title_li">아이디</li>
							<li class="font-semibold text-center admin_user_management_bottom_title_li">휴대폰번호</li>
							<!-- <li class="font-semibold text-center admin_user_management_bottom_title_li">생년월일</li> -->
							<!-- <li class="font-semibold text-center admin_user_management_bottom_title_li">성별</li> -->
							<li class="font-semibold text-center admin_user_management_bottom_title_li">활동상태</li>
							<li class="font-semibold text-center admin_user_management_bottom_title_li">가입일자</li>
							<li class="font-semibold text-center admin_user_management_bottom_title_li">최근 로그인 이력</li>
						</ul>
						<a href="">
							<ul class="admin_user_management_bottom_content_ul" v-for="userList in userListData" :key="userList">
								<li class="text-center admin_user_management_bottom_content_li">{{ userList.user_name }}</li>
								<li class="text-center admin_user_management_bottom_content_li">{{ userList.user_email }}</li>
								<li class="text-center admin_user_management_bottom_content_li">{{ userList.user_tel }}</li>
								<!-- <li class="text-center admin_user_management_bottom_content_li">{{ userList.user_birthdate }}</li> -->
								<!-- <li class="text-center admin_user_management_bottom_content_li">{{ userList.user_gender }}</li> -->
								<li class="text-center admin_user_management_bottom_content_li">{{ userList.user_flg }}</li>
								<li class="text-center admin_user_management_bottom_content_li">{{ userList.user_created_at }}</li>
								<li class="text-center admin_user_management_bottom_content_li">2024-03-30 14:59:28</li>
							</ul>
						</a>
					</div>
				</div>
				<div v-else-if="userSelectOption === '2'">
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
							<ul class="admin_user_management_bottom_content_ul" v-for="userList in userListData" :key="userList">
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
				</div>
				<!-- 항공권 예매 탭(최신 결제 순) -->
				<!-- <ul class="admin_user_management_bottom_title_ul">
					<li class="admin_user_management_bottom_title_li">이름</li>
					<li class="admin_user_management_bottom_title_li">아이디</li>
					<li class="admin_user_management_bottom_title_li">결제금액</li>
					<li class="admin_user_management_bottom_title_li">결제일시</li>
					<li class="admin_user_management_bottom_title_li">출발공항</li>
					<li class="admin_user_management_bottom_title_li">출발시간</li>
					<li class="admin_user_management_bottom_title_li">도착공항</li>
					<li class="admin_user_management_bottom_title_li">도착시간</li>
				</ul> -->
				<!-- 호텔 예약 탭(최신 결제 순) -->
				<!-- <ul class="admin_user_management_bottom_title_ul">
					<li class="admin_user_management_bottom_title_li">이름</li>
					<li class="admin_user_management_bottom_title_li">아이디</li>						
					<li class="admin_user_management_bottom_title_li">예약금액</li>
					<li class="admin_user_management_bottom_title_li">예약일시</li>
					<li class="admin_user_management_bottom_title_li">호텔명</li>
					<li class="admin_user_management_bottom_title_li">위치</li>
					<li class="admin_user_management_bottom_title_li">체크인</li>
					<li class="admin_user_management_bottom_title_li">체크아웃</li>
				</ul> -->				
			</div>
		</div>
	</div>
</template>
<script>
import axios from 'axios';
export default {
    name:'AdminUserManagementComponent',
    
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
			// User Management List 데이터 저장용
			userListData: [],
			// Pagination 데이터 저장용
			userManagementListData: {},
			currentPage: null,
			lastPage: null,
			userSelectOption: '1',
		}
	},

	created() {
		this.userDataOptionChange();
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

		// User Management List 데이터 수신
		userManagementList(page) {
			const URL = '/admin/user/management/userManagementList?page=' + page;
			axios.get(URL)
				.then(response => {				
					if(response.data.code === "UML00") {
						this.userManagementListData = response.data.userManagementList;
						console.log(this.userManagementListData);
						this.userListData = response.data.userManagementList.data;						
						this.userListData.forEach(user => {
							// user_gender / M, F => 남자, 여자로 변경
							if (user.user_gender === 'M') {
								user.user_gender = '남';
							} else {
								user.user_gender = '여';
							}
							// user_flg / 0, 1 => 정상, 정지로 변경
							if (user.user_flg === 0) {
								user.user_flg = '정상';
							} else {
								// user_flg가 0이 아니면 '정지'로 변경
								user.user_flg = '정지';
							}
						});
						this.currentPage = response.data.userManagementList.current_page;
						this.lastPage = response.data.userManagementList.last_page;
					} else {
						console.error('서버 오류');
					}
				})
				.catch(error => {
					console.error(error);
				});
		},

		// User Management Payment List 데이터 수신
		userManagementPaymentList(page) {
			const URL = '/admin/user/management/userManagementPaymentList?page=' + page;
			axios.get(URL)
				.then(response => {				
					if(response.data.code === "UMPL00") {
						this.userManagementListData = response.data.userManagementPaymentList;
						console.log(this.userManagementListData);
						this.userListData = response.data.userManagementPaymentList.data;
						this.currentPage = response.data.userManagementPaymentList.current_page;
						this.lastPage = response.data.userManagementPaymentList.last_page;
					} else {
						console.error('서버 오류');
					}
				})
				.catch(error => {
					console.error(error);
				});
		},

		// User Management Option 핸들러
		userDataOptionChange() {
			if (this.userSelectOption === '1') {
				this.userManagementList();
			} else if (this.userSelectOption === '2') {
				this.userManagementPaymentList();
			} 
		},

		listOption() {
			this.userSelectOption = 1;
		},

		paymentListOption() {
			this.userSelectOption = 2;
		},

		// User Management Pagination 처리
		// 첫번째 페이지
		firstPagination() {
			if (this.userSelectOption === '1') {
				this.userManagementList(1);
			} else if (this.userSelectOption === '2') {
				this.userManagementPaymentList(1);
			} 
		},
		// 이전 페이지
		prevPagination() {
			if (this.userSelectOption === '1') {
				this.userManagementList(this.currentPage - 1);
			} else if (this.userSelectOption === '2') {
				this.userManagementPaymentList(this.currentPage - 1);
			} 
		},
		// 다음 페이지
		nextpagination() {
			if (this.userSelectOption === '1') {
				this.userManagementList(this.currentPage < this.lastPage ? this.currentPage + 1 : this.currentPage);
			} else if (this.userSelectOption === '2') {
				this.userManagementPaymentList(this.currentPage < this.lastPage ? this.currentPage + 1 : this.currentPage);
			} 
		},
		// 마지막 페이지
		lastPagination() {
			if (this.userSelectOption === '1') {
				this.userManagementList(this.lastPage);
			} else if (this.userSelectOption === '2') {
				this.userManagementPaymentList(this.lastPage);
			} 
		},
	}
}
</script>
<style lang="scss">
    @import '../../sass/Admin/admin_index.scss';
    @import '../../sass/Admin/admin_user_management.scss';
</style>