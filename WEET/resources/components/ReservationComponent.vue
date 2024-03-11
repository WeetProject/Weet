<template>
    <div class="reservation_layout text-center mx-auto">
        <div class="reservation_header">
            <div class="reservation_header_box">
                <span>예약정보확인</span>    
                <div class="reservation_header_ball">1</div>
            </div>
            <div class="reservation_header_box">
                <span>결제 준비</span>    
                <div class="reservation_header_ball">2</div>
            </div>
            <div class="reservation_header_box">
                <span>결제 완료</span>    
                <div class="reservation_header_ball">3</div>
            </div>
        </div>
        <div class="reservation_progress_box">
            <div class="h-4 w-900 bg-gray-200 rounded reservation_progress_gray">
            <div class="h-full rounded reservation_progress_blue w-1/4"></div>
            <!-- w-1/4 w-3/4 -->
        </div>
</div>
    </div>
</template>
<script>
export default {
    
}
</script>
<style lang="scss">
	// @import '../sass/Reservation/reservation.scss';
</style>
