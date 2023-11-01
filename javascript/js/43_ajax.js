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
// 대표적으로 Fetch Api 방식이 있음.


// 3. JSON(JavaScript Object Notation)
// 데이터 주고 받을 때 쓸 수 있는 가장 간단한 파일 포맷
// 가벼운 텍스트 기반
// 가독성 좋음
// key와 value로 이루어져있음
// 데이터를 서버와 주고 받을 때 직렬화하기 위해 사용
// 프로그래밍 언어나 플랫폼에 상관없이 사용 가능


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


// const MY_URL = "https://picsum.photos/v2/list?page=2&limit=5";
const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', my_fetch);

function my_fetch() {
	const INPUT_URL = document.querySelector('#input-url');

	fetch(INPUT_URL.value.trim())
	.then( response => {
		if( response.status >= 200 && response.status < 300 ){
			return response.json();
		} else {
			throw new Error('에러에러');
		}
	} )
	.then( data => makeImg(data) )
	.catch( error => console.log(error) );
}

function makeImg(data) {
	data.forEach( item => {
		const NEW_IMG = document.createElement('img');
		const DIV_IMG = document.querySelector('#div-img');

		NEW_IMG.setAttribute('src', item.download_url);
		NEW_IMG.style.width = '200px';
		NEW_IMG.style.height = '200px';
		DIV_IMG.appendChild(NEW_IMG);
	});
}

const BTN_CLEAR = document.querySelector('#btn-clear');
BTN_CLEAR.addEventListener('click', imgClear);

function imgClear() {
	// ---- 방법 1
	// window.location.reload(); // 51 / 100
	// ---- 방법 1

	// ---- 방법 2
	// const IMG = document.querySelectorAll('img');

	// for(let i = 0; i < IMG.length; i++) {
	// 	IMG[i].remove();
	// } // 80 / 100
	// ---- 방법 2

	
	// ---- 방법 3
	// const DIV_IMG = document.querySelector('#div-img');
	// DIV_IMG.remove();
	// ---- 방법 3 // 20 / 100


	// ---- 방법 4
	// const DIV_IMG = document.querySelector('#div-img');
	// DIV_IMG.replaceChildren();
	// ---- 방법 4 90/100

	// ---- 방법 5
	const DIV_IMG = document.querySelector('#div-img');
	DIV_IMG.innerHTML = "";
	// ---- 방법 5 90/100

}


// fetch 2번째 아규먼트 셋팅 방법
function infinityLoop() {
	let apiUrl = "http://192.168.0.82:6001/03_insert.php"
	let init = {
		method: "POST"
		, body: {
			title: "제목이야"
			,content: "내용이야"
			,em_id: "2"
		}
	};
	fetch(apiUrl, init)
	.then(response => console.log(response))
	.catch(error => console.log(error));
}