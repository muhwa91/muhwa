<?php

// <고유 식별자 제공>
namespace controller;
// namespace : 클래스 간 이름 충돌 방지

class ParentsController {
	protected $controllerChkUrl; // 헤더 표시 제어용 문자열
	protected $arrErrorMsg = []; // 화면에 표시할 에러메세지 리스트	
	private $arrNeedAuth = ["board/list"]; // 비로그인 시 접속 불가능한 url 리스트	

	public function __construct($action) { // 생성자/파라미터 $action loginGet
		$this->controllerChkUrl = $_GET["url"]; // 프로퍼티 controllerChkUrl 값 $_GET["url"] 으로 변경
		// 뷰관련 체크 접속 url 셋팅
		
		if(!isset($_SESSION)) { // 세션이 설정되지 않았을 때($_SESSION = 슈퍼글로벌변수)
			session_start();
			// 세션시작 함수
		}
		
		$this->chkAuthorization(); // 메소드 chkAuthorization 호출
		// 유저 로그인 및 권한 체크 

		$resultAction = $this->$action();
		// controller 메소드 호출
		
		$this->callView($resultAction);
		// view 호출

		exit();
	}

	// 유저 권한 체크 
	private function chkAuthorization() {
		$url = $_GET["url"];
		// GET 메소드 받은 url을 $url 저장
		// user/login, board/list 비교했을 때 false = if문 실행X
		if(!isset($_SESSION["u_id"]) && in_array($url, $this->arrNeedAuth)) {
			// 세션에 u_id가 없고 GET 메소드 받은 url이 arrNeedAuth[]에 있는 경우 
			header("Location: /user/login");
			// /user/login 로케이션
			exit();
			// 처리종료
		}
	}

	// view 호출용 메소드
	private function callView($path) { // 
		// view/list.php
		// Location: /board/list
		// 패턴 2개로 옴
		if(strpos($path, "Location:") === 0) { 
			// 함수 strpos를 사용해서 $path(=유저가 보내온 주소에 대해서 처리한 값)에서 시작하는 문자열이 Location:를 판단
			header($path);
			// 유저가 보내온 주소에 대해서 처리한 값으로 처리(location)
		} else {
		require_once($path);
		// 유저가 보내온 주소에 대해서 처리한 값으로 처리
		}
	}
}
