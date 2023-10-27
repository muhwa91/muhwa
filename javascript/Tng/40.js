const DIV1 = document.querySelector('#div1');
DIV1.addEventListener('mouseenter', popOpen); // 클릭시 함수 popOpen 실행
// 영역 마우스 위치 팝업창
function popOpen() {	
	alert('두근두근!'); // 영역 마우스 위치 '두근두근!' 출력
}

const DIV2 = document.querySelector('#div2');
DIV2.addEventListener('click', popOpen1); // 클릭시 함수 popOpen1 실행 
// 클릭시 '들켰다!'출력>영역 마우스 위치 팝업창 제거>클릭시 함수 popOpen1 실행 제거>
// 백그라운드 컬러 설정>클릭시 함수 popOpen2 실행
function popOpen1() {	
	alert('들켰다!'); // 클릭시 '들켰다!' 출력
	DIV1.removeEventListener('mouseenter', popOpen); // 영역 마우스 위치 팝업창 제거
	DIV2.removeEventListener('click', popOpen1); // 클릭 팝업창 제거
	DIV2.style.backgroundColor = 'beige'; // 클릭시 백그라운드 컬러 설정
    DIV2.addEventListener('click', popOpen2); // 클릭시 함수 popOpen2 실행
}

function popOpen2() {
	alert('다시 숨는다!'); // 클릭시 '다시 숨는다!' 출력
    DIV2.removeEventListener('click', popOpen2); // 클릭시 '다시 숨는다!' 출력 제거
	DIV2.style.backgroundColor = 'white'; // 클릭시 백그라운드 컬러 설정
	DIV1.addEventListener('mouseenter', popOpen); // 영역 마우스 위치 팝업창
	DIV2.addEventListener('click', popOpen1); // 클릭시 함수 popOpen1 실행
}










