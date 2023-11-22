<template>
  <!-- 헤더 -->
  <div class="header">
    <ul>     
      <li v-if="$store.state.flgTabUI !== 0" class="header-button header-button-left" @click="listMove()">취소</li>      
      <li><img class="logo" alt="Vue logo" src="./assets/logo.png"></li>
      <li v-if="$store.state.flgTabUI === 1"
      @click="addBoard()"
      class="header-button header-button-right">작성</li>
    </ul>
  </div>
  <!-- <p>{{ $store.state.phptest }}</p> vuex 연동 확인용 -->

  <!-- 컨테이너 -->
  <ContainerComponent></ContainerComponent>

  <!-- 더보기 버튼 -->
  <button @click="listadd()">더보기</button>

  <!-- 푸터 -->
  <div class="footer">
    <div class="footer-button-store">
      <label for="file" class="label-store">+</label>
      <input @change="updateImg" accept="image/*" type="file" id="file" class="input-file">
    </div>
  </div>
  

</template>

<script>
import ContainerComponent from './components/ContainerComponent.vue';

export default {
  name: 'App',
  components: {
    ContainerComponent,
  },
  created() {
    // store actions 함수 호출
    this.$store.dispatch('actionGetBoardList');
  },
  methods: {
    updateImg(e) { // 작성 페이지 이동 및 이미지 관리
      const file = e.target.files;
      const imgURL = URL.createObjectURL(file[0]); // 브라우저에 임시저장      
      this.$store.commit('setImgURL', imgURL); // 작성 영역에 이미지를 표시하기 위한 데이터 저장
      this.$store.commit('setPostFileData', file[0]); // 작성 처리 시 보낼 파일 데이터 저장
      this.$store.commit('setFlgTabUI', 1); // 작성 ui 변경을 위한 플래그 수정
      e.target.value = ''; // 이벤트 타겟 초기화
    },
    listMove() {
      this.$store.commit('setFlgTabUI', 0);
    },
    addBoard() { // 글 작성 처리
      this.$store.dispatch('actionPostBoardAdd');
    },
    listadd() { // 더보기 처리
      this.$store.dispatch('actionGetBoardListAdd');
    },
  }
}
</script>

<style>
@import url('./assets/css/common.css');
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
