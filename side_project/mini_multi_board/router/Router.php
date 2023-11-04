<?php

// <고유 식별자 제공>
namespace router;
// namespace : 클래스 간 이름 충돌 방지

// <사용할 컨트롤러 지정>
use controller\UserController;
// 부모컨트롤러에게 상속받는 유저컨트롤러는 1차적으로 자식컨트롤러에서 정의된 실행할 처리가
// 실행되고, 자식컨트롤러에서 실행할 처리가 없으면 부모컨트롤러에 정의된 실행할 처리가 처리됨\
// 일반적으로 부모클래스에 실행할 처리를 정의해줌
use controller\BoardController;
// use : namespace에 속하는 클래스, 함수, 상수 사용하여 참조가능
// UserController, BoardController 참조
// as 사용시 별칭으로 사용하면 되고, as 미사용시 본 이름 사용

// router : 유저의 요청을 분석해서 해당 컨트롤러로 연결해주는 클래스(안내해주는 도로 역할)
class Router {
	public function __construct() { // construct : 생성자
		
		// <URL 규칙>
		// 1. 회원 정보 관련 URL
		// user/[해당기능]
		// ex) 로그인 : 호스트/user/login
		// ex) 회원가입 : 호스트/user/regist
		
		// 2. 게시판 관련 URL
		// board/[해당기능]
		// ex) 리스트 : 호스트/board/list
		// ex) 수정 : 호스트/board/edit

		$url = $_GET["url"]; // 접속 url 획득
		$method = $_SERVER["REQUEST_METHOD"]; // 메소드 획득

		if($url === "user/login") { // user/[해당기능]
			if($method === "GET") { // GET 메소드로 로그인 했을 때
				new UserController("loginGet");
				// 유저컨트롤러 클래스에서 정의된 메소드 loginGet 인스턴스 생성
				// GET메소드로 로그인 시도 시 return "view/login.php"; 실행
			} else {  // POST 메소드로 로그인 했을 때
				new UserController("loginPost");
				// 유저컨트롤러 클래스에서 정의된 메소드 loginPost 인스턴스 생성
				// POST메소드로 로그인 시도 시 loginPost 메소드 실행
				// 유저컨트롤러 클래스는 UserModel 참조
				// 
				// 유저모델 클래스는 부모모델 클래스 상속받음
				// 유저모델 클래스에서 정의된 		
			}
		} else if($url === "user/logout") {
			if($method === "GET") {
				// 해당 컨트롤러 호출
				new UserController("logoutGet");
			}
		} else if($url === "user/regist") {
			if($method === "GET") {
				// 해당 컨트롤러 호출
				new UserController("registGet");
			} else {
				// 해당 컨트롤러 호출
			}
		} else if($url === "board/list")
			if($method === "GET") {
				new BoardController("listGet");
			}


			echo "이상한 URL : ".$url;
			exit();
		
	} 
}
