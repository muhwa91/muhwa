<template>
	<div>
		<h1>로그인 VUE 컴포넌트!!!</h1>
		<h2>스토어에 있는 라라벨 데이터 name : {{ $store.state.laravelData.name }}</h2>
	</div>
	
</template>
<script>
export default {
	name: 'LoginComponent',
	props: {

	},
	
	components: {

	},

	data() {
		return {
			setting: '',
		}
	},

	created() {},

	mounted() {},

	methods: {

	}
}
</script>