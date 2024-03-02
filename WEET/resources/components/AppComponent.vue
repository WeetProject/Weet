<template>
	<!-- 호출된 앱컴포넌트는 나머지 router로 연결된 컴포넌트들을 호출해줌 -->
	<!-- router.js 연결 -->
	<router-view></router-view>

</template>

<script>
export default {
		name: 'AppComponent',
		
	}
</script>

<style lang="scss">
	@import '../sass/app.scss';
</style>