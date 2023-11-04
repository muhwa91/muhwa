<?php

namespace controller;

use model\UserModel;

class UserController extends ParentsController{
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
		// 유저모델 클래스를 인스턴스 
		
		// 유저 유무 체크
		if(count($resultUserInfo) === 0) {
			$this->arrErrorMsg[] = "아이디와 비밀번호를 다시 확인해 주세요.";
			return "view/login.php"; // 로그인 페이지로 리턴
		} 
		
		// 세션에 u_id 정의
		$_SESSION["u_id"] = $resultUserInfo[0]["u_id"];
		return "Location: /board/list";
	}

	// 로그아웃 처리
	protected function logoutGet() {
		session_unset(); // 세션 요소 삭제
		session_destroy(); // 세션 고유 id 삭제

		// 로그인 페이지 리턴
		return "Location: /user/login";
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

// 부모클래스인 ParentsController를 상속받아 echo "ParentsController임".$action; 실행