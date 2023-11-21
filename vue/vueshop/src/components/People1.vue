<template>
	<div>
		<div>
			<h4 @click="$emit('openModal', data)" :style="data1">{{ data.name }}</h4>
			<p :style="data2">연봉 : {{ data.salary }}</p>
			<button @click="$emit('plusOne', key1)">허위 연봉 신고</button><br>
			<span>신고 수 : {{ data.reportCnt }}</span>        
		</div>
	</div>
</template>
<script>
export default {
	name: 'People1',
	props: { // 부모에게 전달 받는 데이터명, 데이터타입
		data: Object,
		key1: Number,
		data1: String,
		data2: String,
	}
}
</script>
<style>
	
</style>