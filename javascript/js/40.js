// 인라인 이벤트
// html 9~10 라인 확인


// 프로퍼티 리스너
const BTNGOOGLE = document.getElementById('btn_google');
BTNGOOGLE.onclick = function() {
	location.href = 'http:\/\/google.com';
}

// addEventListener(eventType, function)
// 팝업창 열기
const BTNDAUM = document.getElementById('btn_daum');
let winOpen;
BTNDAUM.addEventListener('click', popOpen);
// 콜백 함수를 사용할 때에는 함수명만 입력하고
// 함수를 사용하는 것처럼 popOpen()을 입력하면 함수를 객체로 보는 js에서는 두번 실행이 되는 결과가 되어
// 에러발생
// 콜백 함수를 쓸 때에는 () 제외하고 함수명만 기입하여 사용하기
// 함수는 정의를 해놓는 것이고, 실행을 시키는 것이 아니기 때문에 객체로 사용할 때에는 실행하는 
// ()를 제외한다.
// addEventListener('click', 함수);
// click을 했을 때 함수명 popOpen으로 정의해둔 내용을 실행하는 것 

// '' : 새 창으로 열기
// target : _self / 현재 창에서 이동
// target : _blank / 새 창에서 이동(디폴트)

// 이벤트 삭제
// BTNDAUM.removeEventListener('click', popOpen);

function popOpen() {	
	winOpen = open('http:\/\/www.daum.net', '', 'width=1000 height=1000');
}

// 팝업창 닫기
const BTNCLOSE = document.getElementById('btn_close');  
// BTNCLOSE.addEventListener('click', () => winOpen.close());
BTNCLOSE.addEventListener('click', popClose);
BTNCLOSE.removeEventListener('click', popClose);
// addEventListener('click', popClose) removeEventListener('click', popClose) 
// () 동일하게 설정해주기
function popClose() {
	winOpen.close();
}

// 영역에 마우스 올라갔을때 alert와 백그라운드 색상변경
const DIV1 = document.querySelector('#div1');
DIV1.addEventListener('mouseenter', () => {
	// alert('DIV1에 들어옴');
	prompt('삭제하시겠습니까?')
	DIV1.style.backgroundColor = '#1243';
});











