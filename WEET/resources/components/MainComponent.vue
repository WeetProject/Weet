<template>
	<div class="box-border main_container">
		<div class="main_section">
			<div class="main_select_ticket_section">
				<div class="main_select_ticket_flex_first">
					<div class="main_select_ticket_flex_first_top">
						<div class="main_select_ticket_border main_select_ticket_starting_point_area">
							<p class="text-base font-semibold text-left main_select_ticket_title">출발지</p>
							<p class="text-sm text-left main_select_ticket_content">부산 김해</p>
						</div>
						<div class="main_select_ticket_border main_select_ticket_destination_area">
							<p class="text-base font-semibold text-left main_select_ticket_title">도착지</p>
							<p class="text-sm text-left main_select_ticket_content">일본 도쿄</p>
						</div>
					</div>
					<div class="main_select_ticket_flex_first_middle">
						<div class="main_select_ticket_border main_select_ticket_outbound_flight_area">
							<p class="text-base font-semibold text-left main_select_ticket_title">가는 편</p>
							<p class="text-sm text-left main_select_ticket_content">날짜 입력</p>
						</div>
						<div class="main_select_ticket_border main_select_ticket_inbound_flight_area">
							<p class="text-base font-semibold text-left main_select_ticket_title">오는 편</p>
							<p class="text-sm text-left main_select_ticket_content">날짜 입력</p>
						</div>
					</div>
					<div class="main_select_ticket_flex_first_bottom">
						<div class="main_select_ticket_border_bottom main_select_ticket_traveler_seatclass_area">
							<p class="text-base font-semibold text-left main_select_ticket_title">여행자 및 좌석 등급</p>
							<p class="text-sm text-left main_select_ticket_content">1 성인, 일반석</p>
						</div>
					</div>
				</div>
			</div>

			<div class="main_search_ticket_section">
				<div class="main_search_ticket_image_area">
					<img src="../../public/images/Main_search.png" alt="">
				</div>
				<div class="main_search_ticket_airline_area">
					<a class="text-center" href="#">검색하기</a>
				</div>
			</div>

			<div class="main_ad_slide_section">
				
			</div>

			<div class="main_search_tourist_spot_section">
				<input type="text" placeholder="여행지를 검색해보세요">
			</div>
			
			<div class="main_tourist_spot_recommendation_section">
				<div class="main_tourist_spot_recommendation_border main_tourist_spot_recommendation_title_area">
					<p class="text-xl">2024년도 추천 여행지가 궁금하다면</p>
				</div>
				<div class="main_tourist_spot_recommendation_border main_tourist_spot_recommendation_image_area">
					<p>image</p>
				</div>
			</div>

			<div class="main_monthly_tourist_spot_section">
				<div class="main_monthly_tourist_spot_flex_left">
					<div class="main_monthly_tourist_spot_title_area">
						<p>이달의 실속 여행지 TOP3</p>
					</div>
					<div class="main_monthly_tourist_spot_first_area">
						<img src="../../public/images/Admin_login.jpg" alt="">
					</div>
				</div>
				<div class="main_monthly_tourist_spot_flex_right">
					<div class="main_monthly_tourist_spot_second_area">
						<img src="../../public/images/Admin_login.jpg" alt="">
					</div>
					<div class="main_monthly_tourist_spot_third_area">
						<img src="../../public/images/Admin_login.jpg" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script >
import axios from 'axios';

export default {
	name: 'MainComponent',

	data() {
		return {

		}
	}
}
</script>

<style lang="scss">
    @import '../sass/main.scss';
</style>