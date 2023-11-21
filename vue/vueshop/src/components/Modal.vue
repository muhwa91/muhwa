<template>
	<div class="bg_black">
      <div class="bg_white">
        <img :src="data.img" :style="data1" alt=""><br>
        <h4>{{ data.name }}</h4>
        <p>{{ data.content }}</p>
        <p>{{ data.salary }}</p>
		<input type="text" v-model="productCnt">
		<p>총 가격 : {{ productCnt * data.salary }}</p>
        <p>신고 수 : {{ data.reportCnt}}</p>
        <button class="close" @click="$emit('closeModal')">닫기</button>
      </div>
    </div>
</template>
<script>
export default {
	name: 'Modal',
	data() {
		return {
			productCnt: 0,
		}
	},
	watch: { // watch : data 감시하는 함수 정의 영역
		productCnt(input) { // 데이터바인딩명과 동일하게 함수정의 해야 감시가능
			if(input > 10) {
				alert('회사망한다');
				this.productCnt = 10;
			} else if(input < 0) {
				alert('노예하고싶음?')
				this.productCnt = 0;
			}
		}
	},
	props: {
		data: Object,
		data1: String,
	}
}
</script>
<style>
	
</style>