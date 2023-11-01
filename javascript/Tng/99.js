const MY_URL = "https://picsum.photos/v2/list?page=2&limit=5";
const BTN_API = document.querySelector('#call');
BTN_API.addEventListener('click', my_fetch);

function my_fetch(){
	const INPUT_URL = document.querySelector('#search');	
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
		const DIV_IMG = document.querySelector('#img_area')
		const NEW_DIV = document.createElement('div');
		const NEW_P = document.createElement('p');

		NEW_IMG.setAttribute('src', item.download_url);
		NEW_DIV.setAttribute('class', 'div1');
		NEW_IMG.style.width = '90%';
		NEW_P.innerHTML=item.id;
		NEW_DIV.appendChild(NEW_P);
		NEW_DIV.appendChild(NEW_IMG);
		DIV_IMG.appendChild(NEW_DIV);		
	});
}

const BTN_CLEAR = document.querySelector('#clear');
BTN_CLEAR.addEventListener('click', imgClear);

function imgClear() {
	const DIV_IMG = document.querySelector('#img_area');
	DIV_IMG.innerHTML = "";
}
