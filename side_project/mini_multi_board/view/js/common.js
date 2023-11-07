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

let test;

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

      TITLE.innerHTML = data.data.b_title;
      CONTENT.innerHTML = data.data.b_content;
      CREATEAT.innerHTML = data.data.create_at;
      UPDATEAT.innerHTML = data.data.updated_at;
      IMG.setAttribute("src", data.data.b_img);

      openModal(); // 모달 오픈
    })
    .catch((error) => console.log(error));
}

// 모달 오픈 함수
function openModal() {
  const MODAL = document.querySelector("#modalDetail");
  MODAL.classList.add("show");
  MODAL.style = "display: block; backgroun-color: rgba(0, 0, 0, 0.7);";
}

// 모달 클로즈 함수
function closeDetailModal() {
  const MODAL = document.querySelector("#modalDetail");
  MODAL.classList.remove("show");
  MODAL.style = "display: none;";
}
