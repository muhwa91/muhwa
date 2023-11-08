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

// 아이디 체크 모달 제어
function openJoin() {
  const INPUTID = document.querySelector("#u_id").value;
  const URL = "/user/regist_chk?u_id=" + INPUTID;
  fetch(URL)
    .then((response) => response.json())
    .then((data) => {
      // console.log(data); date의 값 확인
      // 요소 데이터 세팅
      if (data.data.cnt >= 1) {
        window.alert("아이디 중복");
      } else {
        window.alert("중복된 아이디 없음");
      }
    })
    .catch((error) => console.log(error));
}
// onclick="openJoin(); return false;" return false php exit()기능

// 아이디 체크 POST 다른 방식

// router 조건 $url === "/user/idchk" else if문 작성
// else if($url === "/user/idchk") {
// if($method === "POST") {
// new BoardController("idchkGet");

//<유저컨트롤러>
// protected function idchkPOST() {
//   $errorMsg = "";
//   $inputData = [
//     "u_id" => $_POST["u_id"]
//   ];

// 유효성 체크
// if(!Validation::userChk($inputData)) { // 유효성 체크
// $errorflg = "1";
// $errorMsg = Validation::getArrErrorMsg()[0];
// }

// 중복 체크
// $userModel = new UserModel();
// $result = $userModel->getUserInfo($inputData);
// $userModel->destroy();

// if(count($result) > 0) {
//  $errorFlg = "1";
//  $errorMsg = "중복된 아이디 입니다.";
// }

// response 처리
// $response = [
//  "errflg" =>$errorFlg
//  ,"msg" => $errorMsg
//  ];
// header('Content-type: application/json');
// echo json_encode($inputData);
// exit();

// js 함수
// function idChk() {
//   const INPUTID = document.getElementById('u_id');
//   const URL = '/user/idchk';
//   const ID_CHK_MSG = document.getElementById('idChkMsg');
//   ID_CHK_MSG.innerHTML = ""; // 기존에 있을지도 모르는 메세지 비우는 처리
//   const formData = new FormData(); // 새로운 폼 객체 생성
//   FormData.append("u_id", INPUT_ID.value); // 유저 입력아이디 폼에 세팅

//   const HEADER = { // header정보 세팅
//     method: "POST"
//     ,body:FormData
//   };

// 에러메시지 출력용으로 span태그로 regist.php input주변에 작성
//   fetch(URL, HEADER)
//     .then( response => response.json())
//     .then( data => {
//   if(data.errflg === "") {
//     ID_CHK_MSG.innerHTML = "사용 가능한 아이디입니다."
//     ID_CHK_MSG.classList = 'text-success';
//   } else {
//     ID_CHK_MSG.innerHTML = "사용할 수 없는 아이디입니다."
//     ID_CHK_MSG.classList = 'text-danger';
//   }
// })
//     .catch((error) => console.log(error));
// }

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
