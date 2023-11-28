// vuex 기본형태
import { createStore } from 'vuex';

const store = createStore({
	state() { // state : data 저장영역
		return {
			testStr: 'vuex 테스트용',
			laravelData : null, // 라라벨에서 받은 데이터 저장용
		}
	},

	// mutations : 데이터 수정용 함수 저장 영역
	// state에 작성시 mutations 필수 작성
	mutations: {
		setLaravelData(state, data) { // 라라벨에서 받은 초기 데이터 셋팅
			state.laravelData = data;
		},
	},

	// actions : ajax로 서버에 데이터를 요청할 때 or 시간 함수 등 비동기 처리 정의
	actions: {

	}
});

export default store;