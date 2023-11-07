<?php

// <고유 식별자 제공>
namespace controller;
// namespace : 클래스 간 이름 충돌 방지

use model\BoardNameModel;
// use : namespace에 속하는 클래스 참조가능 
// 부모모델 클래스에게 상속받는 보드네임모델 클래스는 일차적으로 보드네임 클래스에서 정의된 실행할 처리가
// 실행되고, 보드네임 클래스에서 실행할 처리가 없으면 부모모델 클래스에 정의된 실행할 처리가 처리됨
// 일반적으로 부모클래스에 실행할 처리를 정의해줌

class ParentsController {
	protected $controllerChkUrl; // 헤더 표시 제어용 문자열
	protected $arrErrorMsg = []; // 화면에 표시할 에러메세지 리스트	
	protected $arrBoardNameInfo; // 헤더 게시판 드롭다운 표시용
	private $arrNeedAuth = [
		"board/list"
		,"board/add"
		,"board/detail"
	]; // 비로그인 시 접속 불가능한 url 리스트	

	public function __construct($action) { // 생성자/파라미터 $action loginGet
		$this->controllerChkUrl = $_GET["url"]; // 프로퍼티 controllerChkUrl 값 $_GET["url"] 으로 변경
		// 뷰관련 체크 접속 url 셋팅
		
		if(!isset($_SESSION)) { // 세션이 설정되지 않았을 때($_SESSION = 슈퍼글로벌변수)
			session_start();
			// 세션시작 함수
		}
		
		$this->chkAuthorization(); // 메소드 chkAuthorization 호출
		// 유저 로그인 및 권한 체크 

		$boardNameModel = new BoardNameModel();
		// 보드네임모델 클래스 인스턴스 시, 자동으로 부모모델 클래스의 생성자 호출
		// db연결 내용의 생성자 실행하고 보드네임모델 클래스 인스턴스 한 객체 $boardNameModel에 저장
		// 즉 $boardNameModel = db연결 + 보드네임모델 인스턴스
		$this->arrBoardNameInfo = $boardNameModel->getBoardNameList();
		// 헤더 게시판 드롭박스 데이터 획득
		// protected $arrBoardNameInfo; 의 값 변경
		// $boardNameModel에서 getBoardNameList() 메소드 호출 > 
		// boardname에서 b_type 순서대로 b_type, b_name 출력한 내용에 대한 것을 $result에 저장
		// return $result;
		// protected $arrBoardNameInfo; = b_type 순서대로 b_type, b_name 출력한 내용에 대한 것으로 값 변경
		// header.php foreach문으로 활용		

		$boardNameModel->destroy();
		// db연결 + 보드네임모델 인스턴스 저장한 내용 파기
		// cf)$boardNameModel 지역변수로써 메소드가 종료되면 파기

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

		// 접속권한이 없는 페이지 접속차단
		if(!isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth)) {
			// 세션에 u_id가 없고 GET 메소드 받은 url이 arrNeedAuth[]에 있는 경우 
			header("Location: /user/login");
			// /user/login 로케이션
			exit();
			// 처리종료
		}

		// 로그인한 상태에서 로그인 페이지 접속시 board/list 이동처리
		if(isset($_SESSION["u_pk"]) && $url === "user/login") {
			// 세션에 u_id가 있고 GET 메소드 받은 url이 user/login 일 때
			header("Location: /board/list");
			// /board/list 로케이션
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
