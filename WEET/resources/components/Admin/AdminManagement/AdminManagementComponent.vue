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
					<option value="0" selected>최신 등록 순</option>
					<option value="1">권한 순</option>
				</select>
				<!-- 최신 등록 순 Pagination -->
				<div class="relative admin_management_pagination_section">
					<!-- currentPage 1페이지 아닐 때 -->
					<div class="admin_management_pagination_left_button_area">
						<div class="admin_management_pagination_first_button_area" v-if="adminCurrentPage !== 1">
							<button class="admin_management_pagination_first_button" @click="firstPage()">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
								</svg>
								<span class="font-bold">처음</span>
							</button>
						</div>
						<div class="ml-2 admin_management_pagination_prev_button_area" v-if="adminCurrentPage !== 1">
							<button class="admin_management_pagination_prev_button" @click="prevPage()">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
								</svg>
								<span class="font-bold">이전</span>
							</button>
						</div>
					</div>
					<div class="mx-40 text-center admin_management_pagination_page_span_area">
						<span class="text-xl font-bold admin_management_pagination_page_span" 
						v-if="$store.state.adminManagementListData && adminSelectOption === '0'">
							{{ $store.state.adminManagementListData.current_page }} of {{ $store.state.adminManagementListData.last_page }}
						</span>
						<span class="text-xl font-bold admin_management_pagination_page_span" 
						v-else-if="$store.state.adminManagementListData && adminSelectOption === '1'">
							{{ $store.state.adminManagementListData.current_page }} of {{ $store.state.adminManagementListData.last_page }}
						</span>
					</div>
					<!-- lastPage 아닐 때 -->
					<div class="admin_management_pagination_right_button_area">
						<div class="admin_management_pagination_next_button_area" v-if="adminCurrentPage < adminLastPage">
							<button class="admin_management_pagination_next_button" @click="nextPage()">
								<span class="font-bold">다음</span>
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
								</svg>
							</button>
						</div>						
						<div class="ml-2 admin_management_pagination_last_button_area" v-if="adminCurrentPage < adminLastPage">
							<button class="admin_management_pagination_last_button" @click="lastPage()">
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
		<AdminListComponent v-if="adminSelectOption === '0'"></AdminListComponent>
		<AdminFlgListComponent v-if="adminSelectOption === '1'"></AdminFlgListComponent>
	</div>
</template>
<script>
import axios from 'axios';
import { mapState } from 'vuex';
import AdminListComponent from './AdminListComponent.vue';
import AdminFlgListComponent from './AdminFlgListComponent.vue';
export default {
    name:'AdminManagementComponent',

	components: {
		AdminListComponent,
		AdminFlgListComponent,
	},

	computed: {
		...mapState({
			adminCurrentPage: state => state.adminCurrentPage,
			adminLastPage: state => state.adminLastPage
		})
	},
    
	data() {
		return {
			adminSelectOption: '0',
		}
	},

	created() {
		this.$store.dispatch('adminManagementList', 1);
	},

	mounted() {
	},

	methods: {
		// Admin Management Option 핸들러
		adminDataOptionChange() {
			console.log(this.adminSelectOption);
			this.$store.commit('setAdminSelectOption', this.adminSelectOption);
			if (this.adminSelectOption === '0') {				
				this.$store.dispatch('adminManagementList', 1);
			} else if (this.adminSelectOption === '1') {
				this.$store.dispatch('adminManagementFlgList', 1);
			}
		},

		// Admin Management Pagination
		firstPage() {
			this.$store.dispatch('adminFirstPagination');
		},
		prevPage() {
			this.$store.dispatch('adminPrevPagination');
		},
		nextPage() {
			this.$store.dispatch('adminNextPagination');
		},
		lastPage() {
			this.$store.dispatch('adminLastPagination');
		},
	}
}
</script>
<style lang="scss">
    @import '../../../sass/Admin/admin_index.scss';
    @import '../../../sass/Admin/admin_management.scss';
</style>