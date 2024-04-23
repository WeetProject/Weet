<template lang="">
	<div class="wrapper">
		<header>
			<div class="nav">
				<button class="material-icons" id='calendar_prev' ref="calendarLeft"> < </button>
				<p class="current-date">test</p>
				<button class="material-icons" ref="calendarRight"> > </button>
			</div>
		</header>
		<div class="calendar">
			<ul class="weeks">
				<li>일</li>
				<li>월</li>
				<li>화</li>
				<li>수</li>
				<li>목</li>
				<li>금</li>
				<li>토</li>
			</ul>
			<ul class="days">
			</ul>
		</div>
	</div>
</template>
<script>
import { format,parse } from 'date-fns';
import { ko, th } from 'date-fns/locale';

export default {
	props: ['takeFlg','takeDate'],
	name:'MyCalendarComponent',
	data() {
		return {
			dataFormat:new Date(),
		}
	},
	mounted() {
		if(this.takeDate === '날짜를 선택해주세요'){
			var date = new Date;
		}else{
			const DateFormat = this.takeDate.replace(/(\d+)년(\d+)월(\d+)일.*/, '$1-$2-$3');
			this.dataFormat = parse(DateFormat, 'yyyy-MM-dd', new Date());
			date = this.dataFormat;
		}
		let currYear = date.getFullYear(),
			currMonth = date.getMonth();
		const months = [
			'01월',
			'02월',
			'03월',
			'04월',
			'05월',
			'06월',
			'07월',
			'08월',
			'09월',
			'10월',
			'11월',
			'12월',
		];
		const currentDate = document.querySelector('.current-date');
		const daysTag = document.querySelector('.days');
		const prevNextIcon = document.querySelectorAll('.material-icons');
		
		const renderCalendar = () => {
			currentDate.innerHTML = `${currYear+'년'} ${months[currMonth]}`;
			let lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(); 
			let firstDayofMonth = new Date(currYear, currMonth, 1).getDay();
			let lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(); 
			let lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate();
			let liTag = '';

			for (let i = firstDayofMonth; i > 0; i--) {
				liTag += `<li class = "inactive B${lastDateofLastMonth - i + 1}">${lastDateofLastMonth - i + 1}</li>`;
			}
			for (let i = 1; i <= lastDateofMonth; i++) {
				let isToday =
				i === this.dataFormat.getDate() &&
				currMonth === this.dataFormat.getMonth() &&
				currYear === this.dataFormat.getFullYear()
					? 'active'
					: '';
				liTag += `<li class="${isToday} N${i}">${i}</li>`;
			}
			for (let i = lastDayofMonth; i < 6; i++) {
				liTag += `<li class = "inactive A${i - lastDayofMonth + 1}">${i - lastDayofMonth + 1}</li>`;
			}
			daysTag.innerHTML = liTag;

			Array.from(daysTag.children).forEach((child) => {	
			child.addEventListener('click', () => {
				let lastyear = currYear
				let str = child.className
				if (str.includes('B')) {
					if(currMonth === 0 ){
						var lastMonth = '12'
						lastyear = lastyear-1
					}else{
						var lastMonth = months[currMonth-1].replace("월","")
					}
				} else if(str.includes('N')){
					var lastMonth = months[currMonth].replace("월","")
				} else {
					if(currMonth === 11 ){
						var lastMonth = '01'
						lastyear = lastyear+1
					}else{
						var lastMonth = months[currMonth+1].replace("월","")
					}
				}
				str = str.replace("inactive", "").trim();
				str = str.replace("active", "").trim();
				let laststr  =  str.substr(1);
				if(laststr < 10){
					laststr = '0'+laststr
				}	
				if(this.takeFlg===0){
					this.newDepartureDate = `${lastyear}/${lastMonth}/${laststr}`
					const data = format(this.newDepartureDate, "yyyy년MM월dd일(E)", { locale: ko })
					this.$emit('send_data',data);
				}else{
					this.newArrivalDate = `${lastyear}/${lastMonth}/${laststr}`
					const data = format(this.newArrivalDate, "yyyy년MM월dd일(E)", { locale: ko })
					this.$emit('send_data',data);
				}
			});
		});
		};
		renderCalendar();

		prevNextIcon.forEach((icon) => {
			icon.addEventListener('click', () => {
				currMonth = icon.id === 'calendar_prev' ? currMonth - 1 : currMonth + 1;
				if (currMonth < 0 || currMonth > 11) {
					date = new Date(currYear, currMonth);
					currYear = date.getFullYear(); 
					currMonth = date.getMonth(); 
				} else {
					date = new Date();
				}
				renderCalendar();
			});
		});
	},
}

</script>
<style lang="scss">
	@import '../../sass/Search/calendar.scss';
</style>