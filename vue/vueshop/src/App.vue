<template>
  <img alt="Vue logo" src="./assets/logo.png">

  <!-- 헤더 -->
  <div class="nav">
    <!-- <a href="#">홈</a>
    <a href="#">사원</a>
    <a href="#">기타</a> -->

    <!-- 반복문 -->
    <a v-for="item in navList" :key="item">{{ item }}</a>
    <!-- 데이터 바인딩 해준 리턴값 반복하여 출력 -->
  </div>

  <!-- 모달 -->

  <transition name="modalAni">  
    <div class="bg_black" v-if="modalFlg">
      <div class="bg_white">
        <img :src="modalPeople.img" :style="img_size" alt="">
        <h4>{{ modalPeople.name }}</h4>
        <p>{{ modalPeople.content }}</p>
        <p>{{ modalPeople.salary }}</p>
        <p>신고 수 : {{ modalPeople.reportCnt}}</p>
        <button class="close" type="button" @click="modalFlg = false">닫기</button>
      </div>
    </div>
  </transition>

    
  <!-- 상품 리스트 -->
  <div>
    <div v-for="(item, i) in people1" :key="i">
      <h4 @click="modalOpen(item);" :style="sty_color_blue">{{ item.name }}</h4>
      <p :style="sty_color_red">연봉 : {{ item.salary }}</p>
        <button @click="plusOne(i)">허위 연봉 신고</button><br>
        <span>신고 수 : {{ item.reportCnt }}</span>        
    </div>
  </div>
  <!-- <div>
    <div>
      <h4 :style="sty_color_blue"> {{ people[0] }}</h4>
      <p :style="sty_color_red">연봉 : {{ salary[0] }} </p>
    </div>
  </div>
  <div>
    <h4 :style="sty_color_blue">{{ people[1] }}</h4>
    <p :style="sty_color_red">연봉 : {{ salary[1] }}</p>
  </div>
  <div>
    <h4 :style="sty_color_blue">{{ people[2] }}</h4>
    <p :style="sty_color_red">연봉 : {{ salary[2] }}</p>
  </div>
  <div>
    <h4 :style="sty_color_blue">{{ people[3] }}</h4>
    <p :style="sty_color_red">연봉 : {{ salary[3] }}</p>
  </div> -->
</template>

<script>
import data from './assets/js/data.js';

export default {
  name: 'App',
  data() { // 데이터 바인딩(사용할 데이터 저장공간) : 변동값에 대해 변경 용이
    return {
      navList: ['홈', '사원', '연봉', '기타'],
      sty_color_blue : 'color: blue; font-size: 15px;', // 글자 색 변경
      // person1 : 호철,
      sty_color_red : 'color: red',
      img_size : 'width: 600px; height: 600px;',
      salary : [100000000000, 5000000000, 100000000000, '????'],
      content : ['으억'],
      people : ['호철', '지웅', '성찬', '주은'],
      people1 : data,
      modalFlg : false, // true : 모달 생성(O) / false : 모달 생성(X)
      modalPeople : {},
    }
  },



  methods: { // methods : 함수 정의영역
    plusOne(i) {
      this.people1[i].reportCnt++;
    },
    modalOpen(item) {
      this.modalFlg = true;
      this.modalPeople = item; 
    },
  },
}
</script>

<style>
@import url(./assets/css/common.css);

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}


/* css 파일 이관 */
/* .nav {
  background-color: #2c3e50;
  padding: 15px;
  border-radius: 10px;
}

.nav a {
  text-decoration: none;
  color: #fff;
  padding: 10px;
} */
</style>
