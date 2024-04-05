<template>			
	<div class="admin_index_right_container">
		<div class="admin_index_right_top_container">
			<div class="admin_index_right_top_title_section">
				<div class="admin_index_right_top_title_area">
					<span class="mb-5 text-xl font-bold">반가워요, 관리자님!</span>
					<span>시스템 관리를 간편하고 효율적으로 할 수 있도록 도와드릴게요.</span>
				</div>
			</div>	
		</div>
		<div class="admin_index_right_middle_container">
			<div class="mr-5 admin_index_right_middle_section">
				<div class="admin_index_right_middle_number_of_transactions">
					<div class="admin_index_right_middle_number_of_transactions_image">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
						</svg>							
					</div>
					<div class="admin_index_right_middle_number_of_transactions_text">
						<p class="font-semibold">총 결제 건수</p>
						<span class="text-3xl font-extrabold">{{ totalUserDataFormat(totalPayment) }} </span>
						<span class="font-semibold"> 건</span>
					</div>
				</div>
			</div>
			<div class="mr-5 admin_index_right_middle_section">
				<div class="admin_index_right_middle_paymont_amount">
					<div class="admin_index_right_middle_paymont_amount_image">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
							<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
						</svg>
					</div>
					<div class="admin_index_right_middle_paymont_amount_text">
						<p class="font-semibold">총 결제 금액</p>
						<span class="text-3xl font-extrabold">{{ totalUserDataFormat(totalPaymentAmount) }} </span>
						<span class="font-semibold"> 원</span>
					</div>
				</div>
			</div>
			<div class="admin_index_right_middle_section">
				<div class="admin_index_right_middle_register_users">
					<div class="admin_index_right_middle_register_users_image">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
							<path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
						</svg>
					</div>
					<div class="admin_index_right_middle_register_users_text">
						<p class="font-semibold">총 이용자 수</p>
						<span class="text-3xl font-extrabold">{{ totalUserDataFormat(totalUser) }} </span>
						<span class="font-semibold"> 명</span>
					</div>
				</div>
			</div>					
		</div>
		<div class="admin_index_right_bottom_container">
			<div class="admin_index_right_bottom_chart_section">
				<div class="admin_index_right_bottom_chart_area">
					<div id="chart">
						<apexchart type="bar" height="350" :options="chartOptions" :series="series"></apexchart>
					</div>
				</div>
			</div>
			<div class="admin_index_right_bottom_text_section">
				<div class="mr-5 admin_index_right_bottom_notice_section">
					<div class="admin_index_right_bottom_notice_title_area">
						<span class="mb-5 text-xl font-semibold">공지사항</span>
						<a class="admin_index_right_bottom_notice_title_a" href="#">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
										<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
							</svg>
						More
						</a>
					</div>
					<div class="admin_index_right_bottom_notice_content_area">
						
					</div>
				</div>
				<div class=" admin_index_right_bottom_latest_Posts_section">
					<div class="admin_index_right_bottom_latest_Posts_title_area">
						<span class="mb-5 text-xl font-semibold">최신 작성 글</span>
						<a class="admin_index_right_bottom_latest_Posts_title_a" href="#">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
										<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
							</svg>
						More
						</a>
					</div>
					<div class="admin_index_right_bottom_latest_Posts_content_area">
						
					</div>
				</div>						
			</div>
		</div>
	</div>
</template>
<script>
import axios from 'axios';
import VueApexCharts from "vue3-apexcharts";
export default {
    name:'AdminIndexComponent',

	components: {
		apexchart: VueApexCharts,
    },
    
	data() {
		return {
			userDropdown: false,
			adminDropdown: false,
			// Admin 로그인 데이터
			adminToken: '',
			adminFlgInfo: '',
			adminNameInfo: '',			
			adminAuthority: false, // Admin 메뉴 권한 확인용
			adminLogoutAlertError: '', // Admin 로그아웃 에러 Alert출력용
			// Total 데이터 저장용
			totalPayment: 0,
			totalPaymentAmount: 0,
			totalUser: 0,
			// 통합 데이터 저장용
			monthlyReservation: [],
			monthlyPaymentAmount: [],
			// Index 차트 데이터
			series: [{
				name: '예약 건수',
				color: '#FFB6C1',
				data: []
			}, {
				name: '결제 금액(단위:백만) ',
				color: '#FFD700',
				data: []
			}],
			chartOptions: {
				chart: {
					type: 'bar',
				},
				plotOptions: {
					bar: {
						horizontal: false,
						columnWidth: '55%',
						endingShape: 'rounded',						
					},
				},
				dataLabels: {
					enabled: false,					
				},
				stroke: {
					show: true,
					width: 2,
					colors: ['transparent']
				},
				xaxis: {
					categories: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
				},
				yaxis: {
				},
				fill: {
					opacity: 1,
					colors: ['#FFB6C1', '#FFD700'],
				},
				tooltip: {
				}
			},
			//
		}
	},

	created() {
		// 총 결제 건수, 총 결제 금액, 총 이용자 수
		this.totalUserData();
		// 통합 데이터(월별 예약, 월별 결제)
		this.monthlyData()
	},

	mounted() {
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
		// Total 데이터 수신
		totalUserData() {
			const URL = '/admin/dashboard/totalData';
			axios.get(URL)
				.then(response => {
					if(response.data.code === "TD00") {
						this.totalPayment = response.data.totalPayment;
						this.totalPaymentAmount = response.data.totalPaymentAmount;
						this.totalUser = response.data.totalUser;
					} else {
						console.error('서버 오류');
					}
				})
				.catch(error => {
					console.error(error);
				});
		},
		// Total 데이터 , 처리
		totalUserDataFormat(totalUserData) {
			if (totalUserData && totalUserData.toString().length > 3) {
				return totalUserData.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			} else {
				return totalUserData;
			}
		},
		// Monthly 데이터 수신
		monthlyData() {
			const URL = '/admin/dashboard/monthlyData';
			axios.get(URL)
				.then(response => {
					if(response.data.code === "MD00") {
						response.data.monthlyReservation.forEach(monthlyReservation => {
							this.monthlyReservation.push(monthlyReservation.reservation_count);
						});
						response.data.monthlyPaymentAmount.forEach(monthlyPaymentAmount => {
							// this.monthlyPaymentAmount.push(monthlyPaymentAmount.payment_count);
							this.series[1].data.push(Math.floor(monthlyPaymentAmount.total_payment));
						});
						// // 월별 예약 건수
						this.series[0].data = this.monthlyReservation;
						// // 월별 결제 금액
						// this.series[1].data = this.monthlyPaymentAmount;
					} else {
						console.error('서버 오류');
					}
				})
				.catch(error => {
					console.error(error);
				});
		},
	}
}
</script>
<style lang="scss">
    @import '../../sass/Admin/admin_index.scss';
</style>