<template>
  <!-- 헤더 -->
  <Header :data="navList"></Header>
  <!-- 컴포넌트로 이관 -->
  <!-- <div class="nav"> -->

    <!-- 반복문 -->
    <!-- <a v-for="item in navList" :key="item">{{ item }}</a> -->
    <!-- 데이터 바인딩 해준 리턴값 반복하여 출력 -->
  <!-- </div> -->

  <!-- 할인 배너 -->
  <Discount></Discount>
  <!-- 컴포넌트로 이관 -->
  <!-- <div class="discount">
    <p>지금 당장 구매하시면, 30%</p>
  </div> -->

  <!-- 모달 -->

  <transition name="modalAni">  
    <Modal
      v-if = "modalFlg"
      :data = "modalPeople"
      :data1 = "img_size"      
      @closeModal = "modalClose"
    ></Modal>
  </transition>

    
  <!-- 상품 리스트 -->
  <div>
    <People1
      v-for = "(item, i) in people1" :key="i"    
      :data = "item"
      :key1 = "i"
      :data1 = "sty_color_blue"
      :data2 = "sty_color_red"
      @openModal = "modalOpen"
      @plusOne = "plusOne">
    </People1>
  </div>
  <!-- 컴포넌트로 이관 -->
  <!-- <div>
    <div v-for="(item, i) in people1" :key="i">
      <h4 @click="modalOpen(item)" :style="sty_color_blue">{{ item.name }}</h4>
      <p :style="sty_color_red">연봉 : {{ item.salary }}</p>
        <button @click="plusOne(i)">허위 연봉 신고</button><br>
        <span>신고 수 : {{ item.reportCnt }}</span>        
    </div>
  </div> -->


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

import Discount from './components/Discount.vue';
import Header from './components/Header.vue';
import Modal from './components/Modal.vue';
import People1 from './components/People1.vue';

export default {
  name: 'App',
  data() { // 데이터 바인딩(사용할 데이터 저장공간) : 변동값에 대해 변경 용이
    return {
      navList: ['홈', '사원', '연봉', '기타'],
      sty_color_blue : 'color: blue; font-size: 15px;', // 글자 색 변경
      // person1 : 호철,
      sty_color_red : 'color: red',
      img_size : 'width: 300px; height: 300px;',
      salary : [100000000000, 5000000000, 100000000000, 10],
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
    modalClose() {
      this.modalFlg = false;
    }
  },

  components: { // components : 컴포넌트 등록영역
    Discount, 
    Header,
    Modal,
    People1,
  }
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
