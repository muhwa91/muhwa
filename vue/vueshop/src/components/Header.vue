<template>
	<div class="nav">
		<a v-for="item in data" :key="item">{{ item }}</a>
	</div>
</template>
<script>
export default {
	name: 'Header',
	props: { // props 상위 컴포넌트 데이터를 하위 컴포넌트가 사용하기 위한 영역
		data: Array,
	}
}
</script>
<style>
	
</style>