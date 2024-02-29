<template>
  	<div>
		<p class="text-8xl test-p">test</p>
		<p class="test-p no-underline hover:underline text-2xl">가보자구</p>
	</div>
		
	<div class="demo-box">
		<div class="flight-info">
			<div class="segments">
				<div class="segment departure">
					<time>06:30</time>
					<span class="airport">ALC</span>
				</div>
				<div class="divider"><span class="plane"></span></div>
				<div class="segment adaptive">
					<span class="airport">MAD</span>
				</div>
				<div class="divider adaptive">
					<span class="plane"></span>
				</div>
				<div class="segment destination">
					<time>11:40</time>
					<span class="airport">VIE</span>
				</div>
			</div>
		</div>
		<div class="flight-duration">   
			<p>8h 40min Length of trip</p>
		</div>
	</div>
	<span class="info">Adaptive fluid flight info</span>
</template>

<script >
  export default {
		name: 'MainComponent',
	}
</script>

<style>
  
</style>