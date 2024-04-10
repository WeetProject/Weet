<template lang="">
<div class='my_calendar'>
	<div class="wrapper">
		<header>
			<div class="nav">
				<button class="material-icons" id='calendar_prev'> < </button>
				<p class="current-date">test</p>
				<button class="material-icons"> > </button>
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
</div>
</template>
<script>

export default {
	name:'MyCalendarComponent',
	
	mounted() {
		let date = new Date();
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
				liTag += `<li class="N${i}">${i}</li>`;
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
				this.date = `${lastyear}/${lastMonth}/${laststr}`
				console.log(this.date)
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
	data() {
		return {
			date:'',
		}
	},
}

</script>
<style lang="scss">
	@import '../../sass/Search/calendar.scss';
</style>