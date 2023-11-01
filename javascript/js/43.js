// 1. HTTP(Hypertext Transfer Protocol)
// 어떻게 Hypertext를 주고 받을 지 규약한 프로토콜로,
// 클라이언트가 서버에 데이터를 리퀘스트를 하고, 
// 서버가 해당 리퀘스트에 따라 리스폰스를 클라이언트에 보내주는 방식
// Hypertext는 웹사이트에서 이용되는 하이퍼 링크나 리소스, 문서, 이미지 등을 모두 포함.


// 2. AJAX(Asynchronous JavaScript And XML)
// cf)AJAX 통신 시 주소 바뀌지 않음
// 웹페이지에서 비동기 방식으로 서버에게 데이터를 리퀘스트하고, 
// 서버의 리스폰스를 받아 동적으로 웹페이지를 갱신하는 프로그래밍 방식
// 즉, 웹 페이지 전체를 다시 로딩하지 않고도 일부분만을 갱신할 수 있음.
// AJAX 자체가 비동기 처리
// 대표적으로 XMLHttpRequest 방식과 Fetch Api 방식이 있음.


// 3. JSON(JavaScript Object Notation)
// 서버간의 HTTP 통신을 위한 텍스트 데이터 포맷(문자열)
// 데이터 주고 받을 때 쓸 수 있는 가장 간단한 파일 포맷(자바스크립트 객체와 유사)
// 가벼운 텍스트 기반
// 가독성 좋음
// key와 value로 이루어져있음
// 데이터를 서버와 주고 받을 때 직렬화하기 위해 사용
// 프로그래밍 언어나 플랫폼에 상관없이 사용 가능
// JSON.stringify( obj ) : Object를 JSON 포맷의 String으로 변환(Serializing)해주는 메소드
// JSON.parse( json ) : JSON 포맷의 String을 Object로 변환(Deser)해주는 메소드




// <xml>
// 	<data>
// 		<id>56</id>
// 		<name>홍길동</name>
// 	</data>
// </xml>

// json
// {
// 	data : {
// 		id: 56
// 		,name: '홍길동'
// 	}
// }

// 4. API 예제 사이트
// https://picsum.photos/


//  
const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', my_fetch);

function my_fetch(){
	const INPUT_URL = document.querySelector('#input-url');
	
	fetch(INPUT_URL.value.trim()) // fetch : 서버로 리퀘스트->서버에서 다시 리스폰스/ 성공시 변수 response에 저장
	.then(response => {
		if(response.status >= 200 && response.status < 300) {
	// status: 200번대(200~299 정상처리), 300번대(서버 예외처리), 400번대(서버 통신 오류)
			return response.json();
		} else {
			throw new Error('에러'); // status 200~299 정상처리가 안될 시에는 에러를 던짐->캐치문으로 이동
		}
	})
	.then(data => makeImg(data)) // response.json()이 data로 들어감 // 리턴값은 배열로 옴
	// .then( response => console.log(response) )
	.catch(error => console.log(error))
}

function makeImg(data) {
	data.forEach(item => { // foreach(배열 객체 루프) 돌때 마다 item에 저장
		const NEW_IMG = document.createElement('img');
		const DIV_IMG = document.querySelector('#div-img')

		NEW_IMG.setAttribute('src', item.download_url)
		NEW_IMG.style.width = '200px';
		NEW_IMG.style.height = '200px';
		DIV_IMG.appendChild(NEW_IMG);
	});
}

const BTN_CLEAR = document.querySelector('#btn-clear');
BTN_CLEAR.addEventListener('click', imgClear);


// 방법 1
// function imgClear() {
// 	window.location.reload(); // 페이지 리로드
// }

// 방법 2
// function imgClear() {
// 	const IMG = document.querySelectorAll('img');
// 	for(let i = 0; i < IMG.length; i++) { // index 0번방부터 돌리려면 i를 0으로 설정
// 		IMG[i].remove();
// 	}
// } // for of나 for in으로 돌리면 프로토타입까지 모두 루프돌아서 for로 돌리는게 좋음

// 방법 3
// function imgClear() {
// const DIV_IMG = document.querySelector('#div-img');
// DIV_IMG.remove();
// }

// 방법 4
// function imgClear() {
// 	const DIV_IMG = document.querySelector('#div-img');
// 	DIV_IMG.replaceChildren(); // 아무것도 없는 것으로 대체되어 지워짐
// }

// 방법 5
function imgClear() {
	const DIV_IMG = document.querySelector('#div-img');
	DIV_IMG.innerHTML = "";
}

