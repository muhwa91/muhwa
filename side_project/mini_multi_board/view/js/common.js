// 모달 테스트
// const BTN_DETAIL = document.querySelector('#btnDetail');
// const BTN_MODAL_CLOSE = document.querySelector('#btnModalClose');

// BTN_DETAIL.addEventListener('click', () => {
// 	const MODAL = document.querySelector('#modal');
// 	MODAL.classList.remove('displayNone');
// });

// BTN_MODAL_CLOSE.addEventListener('click', () => {
// 	const MODAL = document.querySelector('#modal');
// 	MODAL.classList.add('displayNone');
// });

// 상세 모달 제어
// onclick="openDetail(); return false;
// openDetail(); 함수 실행후 return false; 실행종료
function openDetail(id) {
  const URL = "/board/detail?id=" + id;

  fetch(URL)
    .then((response) => response.json())
    .then((data) => {
      // console.log(data); date의 값 확인
      // 요소 데이터 세팅
      const TITLE = document.querySelector("#b_title");
      const CONTENT = document.querySelector("#b_content");
      const IMG = document.querySelector("#b_img");
      const CREATEAT = document.querySelector("#create_at");
      const UPDATEAT = document.querySelector("#updated_at");
      const DEL_INPUT = document.querySelector("#del_id"); // 강사님 방법
      const BTN_DEL = document.querySelector("#btn_del");
      // const DELETEAT = document.querySelector("#detail_content"); // 성찬이 방법

      TITLE.innerHTML = data.data.b_title;
      CONTENT.innerHTML = data.data.b_content;
      CREATEAT.innerHTML = data.data.create_at;
      UPDATEAT.innerHTML = data.data.updated_at;
      IMG.setAttribute("src", data.data.b_img);
      DEL_INPUT.value = data.data.id; // 강사님 방법
      // DELETEAT.value = data.data.id; // 성찬이 방법
      // .value value 값 설정, db에 요청해서 받는 게시글의 상세정보

      // 삭제 버튼 표시 처리
      if (data.data.uflg === "1") {
        BTN_DEL.classList.remove("d-none");
      } else {
        BTN_DEL.classList.add("d-none");
      }

      openModal(); // 모달 오픈
    })
    .catch((error) => console.log(error));
}

// 모달 오픈 함수
function openModal() {
  const MODAL = document.querySelector("#modalDetail");
  MODAL.classList.add("show");
  MODAL.style = "display: block; background-color: rgba(0, 0, 0, 0.5);";
}

// 모달 클로즈 함수
function closeDetailModal() {
  const MODAL = document.querySelector("#modalDetail");
  MODAL.classList.remove("show");
  MODAL.style = "display: none;";
}

// 아이디 체크 제어
function openJoin() {
  const ID_CHK_MSG = document.getElementById('errorMsg');
	ID_CHK_MSG.innerHTML = ""; // 기존에 있을지도 모르는 메세지를 비우는 처리

	const INPUT_ID = document.getElementById('u_id');
	const URL = '/user/regist_chk';
	
	// POST로 fetch하는 방법
	// 새로운 폼객체 생성
	const formData = new FormData();
	formData.append("u_id", INPUT_ID.value); // 유저가 입력한 아이디 폼에 셋팅

	// header정보 셋팅
	const HEADER = {
		method: "POST"
    ,body: formData
	};

	fetch(URL, HEADER)
	.then( response => response.json())
	.then( data => {
		if(data.errflg === "0") 
      window.alert("중복된 아이디 없음");
		 else 
			window.alert("아이디 중복");		
	 })
	.catch( error => console.log(error) );
}

function deleteCard() {
  // 강사님 방법
  const B_PK = document.querySelector("#del_id").value;
  const URL = "/board/remove?id=" + B_PK;
  fetch(URL)
    .then((response) => response.json())
    .then((data) => {
      if (data.errflg === "0") {
        // 모달 닫기
        closeDetailModal();
        // 카드 삭제
        const MAIN = document.querySelector("main");
        const CARD_NAME = "#card" + data.id;
        const DEL_CARD = document.querySelector(CARD_NAME);
        MAIN.removeChild(DEL_CARD);
      } else {
        alert(data.msg);
      }
    })
    .catch((error) => console.log(error));
}

// onclick="openJoin(); return false;" return false php exit()기능


// 모달 오픈 함수
function openModalChk() {
  const MODAL = document.querySelector("#modalIdchk");
  MODAL.classList.add("show");
  MODAL.style = "display: block; backgroun-color: rgba(0, 0, 0, 0.7);";
}

// 모달 클로즈 함수
function closeIdchkModal() {
  const MODAL = document.querySelector("#modalIdchk");
  MODAL.classList.remove("show");
  MODAL.style = "display: none;";
}
