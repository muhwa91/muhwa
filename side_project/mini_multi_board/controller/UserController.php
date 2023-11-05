<?php

// <고유 식별자 제공>
namespace controller;
// namespace : 클래스간 이름 충돌 방지

// <사용할 모델 지정>
use model\UserModel;
// 부모컨트롤러 클래스에게 상속받는 유저컨트롤러 클래스는 일차적으로 자식컨트롤러에서 정의된 실행할 처리가
// 실행되고, 자식컨트롤러에서 실행할 처리가 없으면 부모컨트롤러에 정의된 실행할 처리가 처리됨
// 일반적으로 부모클래스에 실행할 처리를 정의해줌

class UserController extends ParentsController{ // 부모 컨트롤러 클래스에게 상속받는 유저컨트롤러 클래스
	// 로그인 페이지 이동
	protected function loginGet() {
		return "view/login.php";
	}

	// 로그인 처리
	protected function loginPost() {
		// ID, PW 설정(DB에서 사용할 데이터 가공)
		$arrInput = [];
		// $arrInput은 배열형태로 세팅
		$arrInput["u_id"] = $_POST["u_id"];
		// POST로 제출된 u_id를 $arrInput["u_id"]에 저장
		$arrInput["u_pw"] = $this->encrtptionPassword($_POST["u_pw"]);
		// 하단에 정의해 둔 encrtptionPassword 메소드 이용하여
		// ($_POST["u_pw"])아규먼트를 encrtptionPassword 메소드 파라미터에 전달
		// return 암호화 된 비밀번호(base64_encode)
		// 즉, post로 제출 된 비밀번호를 암호화하여 $arrInput["u_pw"]에 저장

		$modelUser = new UserModel();
		// 유저모델 클래스 인스턴스 생성하여 $modelUser에 저장
		$resultUserInfo =  $modelUser->getUserInfo($arrInput, true);
		// 유저모델 클래스의 메소드 getUserInfo 호출하여 아규먼트($arrInput, true) 파라미터로 전달
		// 메소드 getUserInfo($arrInput, true) if문까지 실행하여 결과 값을 배열형태로 저장한 $result를 
		// $resultUserInfo에 저장
		
		// 유저 유무 체크 
		if(count($resultUserInfo) === 0) { // DB의 ID,PW와 유저가 입력한 ID, PW가 일치하지 않을때
			$this->arrErrorMsg[] = "아이디와 비밀번호를 다시 확인해 주세요."; // 에러메세지 저장
			return "view/login.php"; // 로그인 페이지로 리턴
		} 
		
		// 세션에 u_id 정의
		$_SESSION["u_id"] = $resultUserInfo[0]["u_id"]; // DB의 ID, PW와 유저가 입력한 ID, PW가 일치할 때
		// 인덱스 0번에 있는 u_id 데이터를 세션에 저장
		return "Location: /board/list";
	}

	// 로그아웃 처리
	protected function logoutGet() {
		session_unset(); 
		//세션 변수 제거(세션에 저장된 데이터 삭제)
		session_destroy(); 
		// 세션 고유 id 삭제	
		return "Location: /user/login";
		// 로그인 페이지 리턴
	}


	// 회원가입 페이지 이동
	protected function registGet() {
		return "view/regist.php"._EXTENSION_PHP;
	}

	// 비밀번호 암호화
	private function encrtptionPassword($pw) {  
		return base64_encode($pw);
	}
}
