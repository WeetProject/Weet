<template>    
	<div class="admin_registration_container">
		<div class="admin_registration_top_container">
			<div class="admin_registration_top_title_section">
				<span class="mb-5 text-xl font-bold">어드민 계정 가입 승인</span>
				<span>어드민 계정에 대한 가입 승인 처리를 할 수 있어요.</span>
			</div>
		</div>
		<div class="admin_registration_middle_container">
			<div class="admin_registration_middle_section">
				<span class="text-xl font-bold">어드민 가입 대기 목록</span>
				<!-- Pagination -->
				<div class="relative admin_registration_pagination_section">
					<!-- currentPage 1페이지 아닐 때 -->
					<div class="admin_registration_pagination_left_button_area">
						<div class="admin_registration_pagination_first_button_area" v-if="currentPage !== 1">
							<button class="admin_registration_pagination_first_button" @click="adminRegistrationList(1)">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
								</svg>
								<span class="font-bold">처음</span>
							</button>
						</div>
						<div class="ml-2 admin_registration_pagination_prev_button_area" v-if="currentPage !== 1">
							<button class="admin_registration_pagination_prev_button" @click="adminRegistrationList(currentPage - 1)">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
								</svg>
								<span class="font-bold">이전</span>
							</button>
						</div>
					</div>
					<div class="mx-40 text-center admin_registration_pagination_page_span_area">
						<span class="text-xl font-bold admin_registration_pagination_page_span">{{ adminRegistrationListData.current_page }} of {{ adminRegistrationListData.last_page }}</span>
					</div>
					<!-- lastPage 아닐 때 -->
					<div class="admin_registration_pagination_right_button_area">
						<div class="admin_registration_pagination_next_button_area" v-if="currentPage < lastPage">
							<button class="admin_registration_pagination_next_button" @click="adminRegistrationList(currentPage < lastPage ? currentPage + 1 : currentPage)">
								<span class="font-bold">다음</span>
								<svg v-if="currentPage !== lastPage" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
								</svg>
							</button>
						</div>						
						<div class="ml-2 admin_registration_pagination_last_button_area" v-if="currentPage < lastPage">
							<button class="admin_registration_pagination_last_button" @click="adminRegistrationList(lastPage)">
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
		<div class="admin_registration_bottom_container">
			<!-- 이용자 탭 -->
			<ul class="admin_registration_bottom_title_ul">
				<li class="font-semibold text-center admin_registration_bottom_title_li">이름</li>
				<li class="font-semibold text-center admin_registration_bottom_title_li">사번</li>
				<li class="font-semibold text-center admin_registration_bottom_title_li">요청 일자</li>
				<li class="font-semibold text-center admin_registration_bottom_title_li">권한 선택</li>
				<li class="font-semibold text-center admin_registration_bottom_title_li">권한 변경</li>
				<li class="font-semibold text-center admin_registration_bottom_title_li">거부</li>
			</ul>
			<ul class="admin_registration_bottom_content_ul" v-for="adminList in adminListData" :key="adminList">
				<li class="text-center admin_registration_bottom_content_li">{{ adminList.admin_name }}</li>
				<li class="text-center admin_registration_bottom_content_li">{{ adminList.admin_number }}</li>
				<li class="text-center admin_registration_bottom_content_li">{{ adminList.admin_created_at }}</li>
				<li class="text-center admin_registration_bottom_content_li">
					<select class="text-center admin_registration_select" name="admin_flg" id="admin_flg">
						<option value="0" selected>{{ adminList.admin_flg }}</option>
						<option value="2" v-if="adminList.admin_flg === '권한 없음'">Root</option>
						<option value="1" v-if="adminList.admin_flg === '권한 없음'">Sub</option>
					</select>
				</li>
				<li class="text-center admin_registration_bottom_content_li">
					<button class="admin_registration_bottom_content_update_button" @click="adminRegistrationUpdate(adminList.admin_number)">변경</button>
				</li>
				<li class="text-center admin_registration_bottom_content_li">
					<button class="admin_registration_bottom_content_withdrawal_button" @click="adminRegistrationWithdrawal(adminList.admin_number)">거부</button>
				</li>
			</ul>          
		</div>
	</div>
</template>
<script>
import axios from 'axios';
export default {
    name:'AdminRegistrationComponent',
    
	data() {
		return {
			userDropdown: false,
			adminDropdown: false,
			adminToken: '',
			adminFlgInfo: '',
			adminNameInfo: '',			
			adminAuthority: false, // Admin 메뉴 권한 확인용
			// Admin Registration List 데이터 저장용
			adminListData: [],
			// Pagination 데이터 저장용
			adminRegistrationListData: {},
			currentPage: null,
			lastPage: null,
			// Admin Flg Value 데이터 저장용
			adminUpdateFlg: null,
		}
	},

	created() {
		this.adminRegistrationList();
	},

	mounted() {
	},

	methods: {
		// 0407 TODO
		// {1. 레지스트레이션 메소드 스토어 이관}
		// {2. 데이터 확인}
		
		// Admin Registration List 데이터 수신
		adminRegistrationList(page) {
			const URL = '/admin/dashboard/registration/adminList?page=' + page;
			axios.get(URL)
				.then(response => {				
					if(response.data.code === "ARL00") {
						this.adminRegistrationListData = response.data.adminRegistrationList;
						console.log(this.adminRegistrationListData);
						this.adminListData = response.data.adminRegistrationList.data;						
						this.adminListData.forEach(adminListData => {
							// admin_flg / 0 => 권한 없음으로 변경
							if (adminListData.admin_flg === 0) {
								adminListData.admin_flg = '권한 없음';
							}
						});
						this.currentPage = response.data.adminRegistrationList.current_page;
						this.lastPage = response.data.adminRegistrationList.last_page;
					} else {
						console.error('서버 오류');
					}
				})
				.catch(error => {
					console.error(error);
				});
		},

        // Admin 권한 변경
        adminRegistrationUpdate(admin_number) {
			const admin_flg = document.getElementById('admin_flg').value;

            // 권한 미선택 시 미전송 처리
            if (admin_flg === "0") {
                alert('권한을 선택해주세요.');
                return;
            }

            const URL = '/admin/dashboard/registration/update';            
            const formData = new FormData();
            formData.append('admin_number', admin_number);
            formData.append('admin_flg', admin_flg);

            axios.post(URL, formData)
				.then(response => {                
					if(response.data.code === "ARU00") {
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

        // Admin 거부
        adminRegistrationWithdrawal(admin_number) {
            const URL = '/admin/dashboard/registration/withdrawal';            
            const formData = new FormData();
            formData.append('admin_number', admin_number);
            axios.post(URL, formData)
				.then(response => {                
					if(response.data.code === "ARW00") {
						alert(response.data.success);
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
    @import '../../../sass/Admin/admin_registration.scss';
</style>