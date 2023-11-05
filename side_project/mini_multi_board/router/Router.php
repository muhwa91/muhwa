<?php

// <URL 규칙>
	// 1. 회원 정보 관련 URL
	// user/[해당기능]
	// ex) 로그인 : 호스트/user/login
	// ex) 회원가입 : 호스트/user/regist
	
	// 2. 게시판 관련 URL
	// board/[해당기능]
	// ex) 리스트 : 호스트/board/list
	// ex) 수정 : 호스트/board/edit

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

		$url = $_GET["url"]; // 접속 url 획득
		$method = $_SERVER["REQUEST_METHOD"]; // 메소드 획득

		if($url === "user/login") { // 접속 url이 user/login일 때
			if($method === "GET") { // get일 때 
				new UserController("loginGet");				
				// 1. 유저컨트롤러 클래스 인스턴스화 시, 자동으로 부모컨트롤러 클래스의 생성자 호출
				// 2. 부모컨트롤러 클래스에서 construct($action) = construct(loginGet)
				// 3. $this->controllerChkUrl = user/login;
				// 4. 세션설정(세션이 없으므로, session_start(); 실행)
				// 5. chkAuthorization() 메소드 호출 > $url = user/login > if문 조건 판단
				// private $arrNeedAuth = ["board/list"];
				// if(!isset($_SESSION["u_id"]) && in_array($url, $this->arrNeedAuth))
				// in_array(user/login, ["board/list"]) 배열 안에 특정 값인 $url(=user/login) 존재하는지 판단
				// 충족하지 않으므로 if문 실행X
				// 6. $action=loginGet이므로, 
				// <유저컨트롤러>loginGet() 메소드 호출 > return "view/login.php"; > 
				// <부모컨트롤러>$resultAction = "view/login.php"
				// 7. callView($resultAction) 메소드 호출 > require_once($resultAction) >
				// require_once(view/login.php); 실행
				// 처리종료

			} else {  // POST 메소드로 로그인 했을 때
				new UserController("loginPost");
				// 1. 유저컨트롤러 클래스 인스턴스화 시, 자동으로 부모컨트롤러 클래스의 생성자 호출
				// 2. 부모컨트롤러 클래스에서 construct($action) = construct(loginPost)
				// 3. $this->controllerChkUrl = user/login;
				// 4. 세션설정(세션이 없으므로, session_start(); 실행)
				// 5. chkAuthorization() 메소드 호출 > $url = user/login > if문 조건 판단
				// private $arrNeedAuth = ["board/list"];
				// if(!isset($_SESSION["u_id"]) && in_array($url, $this->arrNeedAuth))
				// in_array(user/login, ["board/list"]) 배열 안에 특정 값인 $url(=user/login) 존재하는지 판단
				// 충족하지 않으므로 if문 실행X
				// 6. $action=loginPost이므로, 
				// <유저컨트롤러>loginPost() 메소드 호출 > $arrInput 빈 배열 세팅, POST 제출받은 값 저장(u_id, 암호화된 u_pw)
				// 유저모델 클래스 인스턴스 시, 자동으로 부모모델 클래스의 생성자 호출
				// 7. <부모모델>생성자 내에서 DB연결 실행 후 인스턴스 생성한 유저 모델을 $modelUser에 저장
				// 8. <유저모델>getUserInfo 메소드 호출하여 아규먼트 $arrInput, true를 파라미터에 전달
				// 9. <유저모델>getUserInfo($arrUserInfo, true)로 실행하여 if문 ($pwFlg) 조건 충족되어 if문 실행
				// 10. <유저모델>$sql(AND u_pw = :u_pw), $prepare($arrUserInfo["u_pw"]) 내용 추가
				// 11. <유저모델>결과 값을 fetchAll() 하여 배열로 변환한 값을 $result에 저장하여 리턴
				// 12. <유저컨트롤러> 리턴 받은 결과 값을 $resultUserInfo에 저장

				// [유저 post 제출한 값이 DB와 일치하지 않을 때]
				// 13. <유저컨트롤러> $resultUserInfo 결과 값이 0 > 부모컨트롤러에 선언해둔 $arrErrorMsg = [];에 문자열 저장 >
				// return "view/login.php";
				// 14. <부모컨트롤러>$resultAction = "view/login.php"
				// 15. callView($resultAction) 메소드 호출 > require_once($resultAction) >
				// require_once(view/login.php); 실행
				// 처리종료

				// [유저 post 제출한 값이 DB와 일치할 때]
				// 13. 슈퍼글로벌변수 $_SESSION[u_id]에 리턴 받은 결과 값 $resultUserInfo[0]["u_id"]을 저장>
				// return "Location: /board/list"; 
				// 14. <부모컨트롤러>$resultAction = "Location: /board/list"
				// 15. callView($resultAction) 메소드 호출 > if문 실행
				// 함수 strpos 사용하여 $resultAction 문자열에서 "Location:" 문자열을 찾아서 처음에 위치한다면 true
				// 조건 충족 되어 header("Location: /board/list"); 실행
				// 처리종료
			}				

		} else if($url === "user/logout") { // user/[해당기능]
			if($method === "GET") { // GET 메소드로 로그아웃 했을 때
				new UserController("logoutGet");
				// 1. 유저컨트롤러 클래스 인스턴스화 시, 자동으로 부모컨트롤러 클래스의 생성자 호출
				// 2. 부모컨트롤러 클래스에서 construct($action) = construct(logoutGet)
				// 3. $this->controllerChkUrl = user/logout;
				// 4. chkAuthorization() 메소드 호출 > $url = user/logout > if문 조건 판단
				// private $arrNeedAuth = ["board/list"];
				// if(!isset($_SESSION["u_id"]) && in_array($url, $this->arrNeedAuth))
				// 슈퍼글로벌변수 $_SESSION에 u_id 값을 가지고 있고, in_array(user/logout, ["board/list"]) 배열 안에 특정 값인 $url(=user/regist) 존재하는지 판단
				// 1조건 충족, 2조건 불충족으로 if문 실행X
				// 5. $action=logoutGet이므로, 
				// <유저컨트롤러>logoutGet() 메소드 호출 > session_unset(); 세션 변수 삭제 >
				// session_destroy(); 세션 고유 ID 삭제 > return "Location: /user/login";
				// <부모컨트롤러>$resultAction = "Location: /user/login"
				// 6. callView($resultAction) 메소드 호출 > if문 실행
				// 함수 strpos 사용하여 $resultAction 문자열에서 "Location:" 문자열을 찾아서 처음에 위치한다면 true
				// 조건 충족 되어 header("Location: /user/login"); 실행
				// 처리종료				
			}				
			
		} else if($url === "user/regist") { // user/[해당기능]
			if($method === "GET") { // GET 메소드로 회원가입 했을 때
				new UserController("registGet");
				// 1. 유저컨트롤러 클래스 인스턴스화 시, 자동으로 부모컨트롤러 클래스의 생성자 호출
				// 2. 부모컨트롤러 클래스에서 construct($action) = construct(registGet)
				// 3. $this->controllerChkUrl = user/regist;
				// 4. 세션설정(세션이 없으므로, session_start(); 실행)
				// 5. chkAuthorization() 메소드 호출 > $url = user/login > if문 조건 판단
				// private $arrNeedAuth = ["board/list"];
				// if(!isset($_SESSION["u_id"]) && in_array($url, $this->arrNeedAuth))
				// in_array(user/regist, ["board/list"]) 배열 안에 특정 값인 $url(=user/regist) 존재하는지 판단
				// 충족하지 않으므로 if문 실행X
				// 6. $action=registGet이므로, 
				// <유저컨트롤러>registGet() 메소드 호출 > return "view/regist.php"._EXTENSION_PHP; > 
				// <부모컨트롤러>$resultAction = return "view/regist.php"._EXTENSION_PHP;
				// 7. callView($resultAction) 메소드 호출 > require_once($resultAction) >
				// require_once(view/regist.php"._EXTENSION_PHP); 실행
				// 처리종료

			} else {

			}
		} else if($url === "board/list") {
			if($method === "GET") { // GET 메소드로 리스트로 갈 때
				new BoardController("listGet");	
				// 1. 보드컨트롤러 클래스 인스턴스화 시, 자동으로 부모컨트롤러 클래스의 생성자 호출
				// 2. 부모컨트롤러 클래스에서 construct($action) = construct(listGet)
				// 3. $this->controllerChkUrl = board/list;
				// 4. 세션설정

				// [세션 존재하는 경우]
				// if(!isset($_SESSION))
				// if문 실행X
				// 5. chkAuthorization() 메소드 호출 > $url = board/list > if문 조건 판단
				// private $arrNeedAuth = ["board/list"];
				// if(!isset($_SESSION["u_id"]) && in_array($url, $this->arrNeedAuth))
				// 슈퍼글로벌변수 $_SESSION에 u_id 값이 없고, in_array(board/list, ["board/list"]) 배열 안에 특정 값인 $url(=board/list) 존재하는지 판단
				// 1조건 불충족, 2조건 충족으로 if문 실행X
				// 6. $action=listGet이므로, 
				// <보드컨트롤러>listGet() 메소드 호출 > return "view/list.php";
				// <부모컨트롤러>$resultAction = "view/list.php"
				// 7. callView($resultAction) 메소드 호출 > require_once($resultAction)
				// require_once(view/list.php);
				// 처리종료		

				// [세션 존재하지 않는 경우]
				// 세션이 없으므로, session_start(); 실행
				// 5. chkAuthorization() 메소드 호출 > $url = board/list > if문 조건 판단
				// private $arrNeedAuth = ["board/list"];
				// if(!isset($_SESSION["u_id"]) && in_array($url, $this->arrNeedAuth))
				// 슈퍼글로벌변수 $_SESSION에 u_id 값을 가지고 있고, 
				// in_array(board/list, ["board/list"]) 배열 안에 특정 값인 $url(=board/list) 존재하는지 판단
				// 충족하므로 if문 실행 > header("Location: /user/login"); 실행
				// 처리종료
				// cf) chkAuthorization 메소드 호출하여 if문 조건 충족하여 실행하고, if문 내에 exit(); 실행 시
				// 이후의 코드나 처리는 실행되지 않음
				// 즉, $this->chkAuthorization(); 에서 처리종료
			}

			// 없는 경로일 경우
			echo "이상한 URL : ".$url;
			exit();
		}
	} 
}
