<?php

namespace router;
// router 네임스페이스 지정하여 고유 식별자 제공
// 사용할 컨트롤러 지정
use controller\UserController;
use controller\BoardController;
// as 사용시 별칭으로 사용하면 되고, as 미사용시 본 이름 사용


// 라우터 : 유저의 요청을 분석해서 해당 controller로 연결해주는 클래스
// 안내해주는 도로 역할

class Router {
	public function __construct() {
		//url 규칙
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
			if($method === "GET") { // GET인지 확인
				new UserController("loginGet");
				// 클래스() : 실행하는 문/ construct 실행 
				// 자식클래스에 실행할 처리가 없으면 부모클래스에 실행할 처리가 실행됨
				// 일반적으로 부모클래스에 정의해줌
			} else {  // POST인지 확인
				new UserController("loginPost");			
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
