<?php

// <고유 식별자 제공>
namespace router;
// namespace : 클래스 간 이름 충돌 방지

// <사용할 클래스 지정 - 컨트롤러>
use controller\UserController;
// use : namespace에 속하는 클래스 참조가능 
// 부모컨트롤러 클래스에게 상속받는 유저컨트롤러 클래스는 일차적으로 자식컨트롤러에서 정의된 실행할 처리가
// 실행되고, 자식컨트롤러에서 실행할 처리가 없으면 부모컨트롤러에 정의된 실행할 처리가 처리됨
// 일반적으로 부모클래스에 실행할 처리를 정의해줌
use controller\BoardController;

// namespace 설정한 controller에는 ParentsController,
// ParentsController클래스를 상속받은 UserController, BoardController 총 3개의 클래스가 있음

// ParentsController클래스를 use에 쓰지 않은 이유 : 자식 클래스를 use하면 상속된 부모 클래스도 가져옴
// 즉, 유저컨트롤러, 보드컨트롤러만 use하면 부모 컨트롤러까지 use
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
				// UserController 인스턴트 생성으로 생성자 먼저 실행이 되고, 유저컨트롤러 보다 생성자가 먼저 실행이 됨
			} else {  // POST 메소드로 로그인 했을 때
				new UserController("loginPost");
				// 유저컨트롤러 클래스 인스턴스 생성하여 정의된 메소드 loginPost 호출
				// POST메소드로 로그인 시도 시 loginPost 메소드 실행
				// 유저컨트롤러 클래스는 UserModel 참조
				// 유저모델 클래스 인스턴스 생성하여 $modelUser에 저장
				// 유저모델 클래스의 메소드 getUserInfo 호출하여 아규먼트($arrInput, true) 파라미터로 전달
				// 메소드 getUserInfo($arrInput, true) if문까지 실행하여 결과 값을 배열형태로 저장한 $result를 
				// $resultUserInfo에 저장
				// 유저 유무 체크하여 유저O > return "view/login.php"; 실행
				// 유저X > return "Location: /board/list"; 실행
			}
		} else if($url === "user/logout") { // user/[해당기능]
			if($method === "GET") { // GET 메소드로 로그아웃 했을 때
				new UserController("logoutGet");
				// 유저컨트롤러 클래스 인스턴스 생성하여 정의된 메소드 logoutGet 호출
				// 세션 변수 제거(세션에 저장된 데이터 삭제)
				// 세션 고유 id 삭제(세션 완전 제거)
				// return "Location: /user/login";
			}
		} else if($url === "user/regist") { // user/[해당기능]
			if($method === "GET") { // GET 메소드로 회원가입 했을 때
				new UserController("registGet");
				// 유저컨트롤러 클래스 인스턴스 생성하여 정의된 메소드 registGet 호출
				// return "view/regist.php"._EXTENSION_PHP;

			} else {
				// 해당 컨트롤러 호출
			}
		} else if($url === "board/list")
			if($method === "GET") { // GET 메소드로 리스트로 갈 때
				new BoardController("listGet");
				// 보드컨트롤러 클래스 인스턴스 생성하여 정의된 메소드 listGet 호출
				// return "view/list.php";
			}

			echo "이상한 URL : ".$url;
			exit();
		
	} 
}
