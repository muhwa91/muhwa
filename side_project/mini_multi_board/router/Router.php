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
				// if(!isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth))
				// in_array(user/login, ["board/list"]) 배열 안에 특정 값인 $url(=user/login) 존재하는지 판단
				// 충족하지 않으므로 if문 실행X
				// 6. $action=loginGet이므로, 
				// <유저컨트롤러>loginGet() 메소드 호출 > return "view/login.php"; > 
				// <부모컨트롤러>$resultAction = "view/login.php"
				// 7. callView($resultAction) 메소드 호출 > require_once($resultAction) >
				// require_once(view/login.php); 실행
				// 처리종료

			} else {  // POST일 때
				new UserController("loginPost");
				// 1. 유저컨트롤러 클래스 인스턴스화 시, 자동으로 부모컨트롤러 클래스의 생성자 호출
				// 2. 부모컨트롤러 클래스에서 construct($action) = construct(loginPost)
				// 3. $this->controllerChkUrl = user/login;
				// 4. 세션설정(세션이 없으므로, session_start(); 실행)
				// 5. chkAuthorization() 메소드 호출 > $url = user/login > if문 조건 판단
				// private $arrNeedAuth = ["board/list"];
				// if(!isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth))
				// in_array(user/login, ["board/list"]) 배열 안에 특정 값인 $url(=user/login) 존재하는지 판단
				// 충족하지 않으므로 if문 실행X
				// 6. $action=loginPost이므로, 
				// <유저컨트롤러>loginPost() 메소드 호출 > $arrInput 빈 배열 세팅, POST 제출받은 값 저장(u_id, 암호화된 u_pw)
				// 유저모델 클래스 인스턴스 시, 부모모델 클래스의 생성자 호출
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
				// if(!isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth))
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
				// if(!isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth))
				// in_array(user/regist, ["board/list"]) 배열 안에 특정 값인 $url(=user/regist) 존재하는지 판단
				// 충족하지 않으므로 if문 실행X
				// 6. $action=registGet이므로, 
				// <유저컨트롤러>registGet() 메소드 호출 > return "view/regist.php"; > 
				// <부모컨트롤러>$resultAction = return "view/regist.php";
				// 7. callView($resultAction) 메소드 호출 > require_once($resultAction) >
				// require_once(view/regist.php"._EXTENSION_PHP); 실행
				// 처리종료

			} else {
				new UserController("registPost");
				// 1. 유저컨트롤러 클래스 인스턴스화 시, 자동으로 부모컨트롤러 클래스의 생성자 호출
				// 2. 부모컨트롤러 클래스에서 construct($action) = construct(registPost)
				// 3. $this->controllerChkUrl = user/regist;
				// 4. 세션설정(세션이 없으므로, session_start(); 실행)
				// 5. chkAuthorization() 메소드 호출 > $url = user/regist > if문 조건 판단
				// private $arrNeedAuth = ["board/list","board/add","board/detail"];
				// if(!isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth))
				// in_array(user/regist, ["board/list","board/add","board/detail"]) 배열 안에 
				// 특정 값인 $url(=user/regist) 존재하는지 판단
				// 충족하지 않으므로 if문 실행X
				// 보드네임모델 클래스 인스턴스화 시, 부모모델 클래스의 생성자 호출
				// 6. <부모모델>생성자 내에서 DB연결 실행 후 인스턴스 생성한 보드네임모델을 $boardNameModel에 저장
				// 7. $boardNameModel의 getBoardNameList() 메소드 호출
				// 8. b_type, b_name 출력하는 쿼리문의 실행결과를 배열형태로 저장하여 $result에 저장하여 리턴
				// 9. 리턴받은 값을 멤버변수 arrBoardNameInfo의 값 변경
				// 10. $boardNameModel 데이터 파기
				// 11. $action=registPost이므로,
				// <유저컨트롤러>registPost() 메소드 호출 >
				// post로 제출받은 데이터(u_id, u_pw, u_name)를 지역변수$arrAddUserInfo 배열형태로 변환
				// Id, Pw, Name 정규표현식 선언
				// if문 사용하여 조건 판단
				// preg_match 함수 이용하여 정규표현식, post로 제출받은 데이터와 비교하여 매칭하는 값을 가져옴
				// 1)정규표현식과 u_id 비교하여 0일 때 에러메세지 출력(true = 1, false = 0)
				// 2)정규표현식과 u_pw 비교하여 0일 때 에러메세지 출력(true = 1, false = 0)
				// 3)u_pw와 u_pw_chk 비교하여 일치하지 않을 때 에러메세지 출력
				// 4)정규표현식과 u_name 비교하여 0일 때 에러메세지 출력(true = 1, false = 0)

				// if문 사용하여 조건 판단
				// 1)에러메세지가 0 초과일 때 return "view/regist.php";
				// 2)<부모컨트롤러>리턴 받은 값을 $resultAction에 저장
				// 3)$resultAction = "view/regist.php"
				// 4)callView($resultAction) 메소드 호출 > require_once($resultAction) >
				// require_once(view/regist.php); 실행
				// 처리종료

				// if문 사용하여 조건 판단
				// 1)에러메세지가 0 일 때 if문 실행X
				// 유저모델 클래스 인스턴스화 시, 부모모델 클래스의 생성자 호출
				// 2)<부모모델>생성자 내에서 DB연결 실행 후 인스턴스 생성한 유저모델을 $userModel에 저장
				// 3)트랜잭션 시작
				// 4)<유저모델>addUserInfo($arrAddUserInfo) 메소드 호출 >				
				// 5)(지역변수 $arrAddUserInfo에는 $_POST["u_id"], $_POST["u_pw"], $_POST["u_name"]의 값이 저장되어있음)
				// 6)지역변수 $arrAddBoardInfo에 저장되어 있는 값을 insert 처리한 결과를 $result에 저장 후 리턴
				// 7)<유저컨트롤러>리턴 받은 값을 $result에 저장
				// 8)if문 조건판단
				// $result가 true가 아닐 때 롤백
				// true일 때 커밋
				// 9)DB연결 후 유저모델 클래스 인스턴스 저장한 $userModel 파기
				// 10)return "Location: /user/login";
				// 11)<부모컨트롤러>$resultAction = return "Location: /user/login";
				// 12)callView($resultAction) 메소드 호출 > if문 실행
				// 함수 strpos 사용하여 $resultAction 문자열에서 "Location:" 문자열을 찾아서 처음에 위치한다면 true
				// 조건 충족 되어 header("Location: /user/login"); 실행
				// 처리종료		






				// (지역변수 $arrBoardDetailInfo에는 $_GET["id"]의 값이 저장되어있음)
				// id...updated_at 출력하는 sql 쿼리 준비문 생성하여 $stmt에 저장
				// $prepare에 세팅해둔 지역변수 $arrBoardDetailInfo에 저장되어 있는 $_GET["id"]의 값을 변경하여 처리한 결과를 배열 변환하여 $result에 저장 후 리턴
				// <보드컨트롤러>리턴 받은 값을 $result에 저장
				// 에러플래그, 메세지, 데이터 담기위해 $arrTmp 배열형태로 response 데이터 작성
				// json_encode 사용하여 $arrTmp를 변환하여 $response에 저장				
			}
		} else if($url === "user/regist_chk") {
			if($method === "GET") {
				new UserController("regist_ChkGet");
			}
		
		
		} else if($url === "board/list") {
			if($method === "GET") { // GET 메소드로 리스트로 갈 때
				new BoardController("listGet");	
				// 1. 보드컨트롤러 클래스 인스턴스화 시, 자동으로 부모컨트롤러 클래스의 생성자 호출
				// 2. 부모컨트롤러 클래스에서 construct($action) = construct(listGet)
				// 3. $this->controllerChkUrl = board/list;
				// 4. 이미 세션이 설정되어 있기 때문에 if문 실행X
				// 5. chkAuthorization() 메소드 호출 > $url = board/list > if문 조건 판단
				// private $arrNeedAuth = ["board/list"];
				// 1)if(!isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth))
				// 세션 내에 u_pk 값이 있고, $url이 [board/list] 배열 내 존재하는지 판단 / 두가지 모두 충족하지 않을 시 if문 실행
				// 충족할 시 header("Location: /user/login"); 실행 후 처리종료
				// 2)if(isset($_SESSION["u_pk"]) && $url === "user/login")
				// 세션 내에 u_pk 값이 있고, $url이 user/login인지 판단 / 두가지 모두 충족할 시 if문 실행
				// 충족할 시 header("Location: /board/list"); 실행 후 처리종료
				// 6. GET메소드로 접속하여 if문 2개 모두 실행되지 않아 리디렉션(현재 페이지에서 다른 페이지로 이동) 발생X
				// 7. 보드네임모델 클래스 인스턴스화 시 자동으로 부모모델 클래스의 생성자 호출
				// 8. <부모모델>DB연결 후 보드네임모델 클래스를 $boardNameModel에 인스턴스 저장
				// 9. $boardNameModel에서 getBoardNameList() 메소드 호출
				// 10. <보드네임모델>boardname에서 b_type, b_name 출력
				// 11. 출력한 값을 배열형태로 변환하여 $result에 저장 후 리턴
				// 12. <부모컨트롤러>리턴 받은 값을 프로퍼티 $arrBoardNameInfo에 저장
				// 13. $boardNameModel(DB연결+보드네임모델 인스턴스 저장내용) 파기
				// 14. $action=listGet이므로,
				// <보드컨트롤러>listGet() 메소드 호출 > GET메소드 내 b_type 존재여부 판단
				// true = $_GET["b_type"] / false = "0" 으로 설정하여 파라미터 세팅하여 $b_type에 저장
				// 지역변수 $arrBoardInfo 내에 배열형태로 저장
				// 배열형태의 프로퍼티 $arrBoardNameInfo를 루프시키기 위하여 foreach문 실행
				// 12번에서 변경해두었던 프로퍼티 $arrBoardNameInfo(boardname에서 b_type, b_name 출력한 값의 배열형태)의 값을 $item에 저장
				// $item에 저장된 b_type이 $b_type($_GET["b_type"]의 값)과 동일할 때
				// 프로퍼티 protected $titleBoardName의 값을 $item["b_name"]으로 변경하고
				// 프로퍼티 protected $boardType의 값을 $item["b_type"]으로 변경하고 break
				// 보드모델 클래스 인스턴스화 시 자동으로 부모모델 클래스의 생성자 호출
				// <부모모델>DB연결 후 보드모델 클래스를 $boardModel에 인스턴스 저장
				// <보드모델>getBoardList($arrBoardInfo) 메소드 호출(지역변수 $arrBoardInfo에는 $_GET["b_type"]의 값이 저장되어있음)
				// 지역변수 $arrBoardInfo에 저장되어 있는 ["b_type"]과 일치하는 결과를 배열로 변환하여 $result에 저장 후 리턴
				// <보드컨트롤러>리턴 받은 값을 프로퍼티 $arrBoardInfo에 저장
				// 15. DB연결 후 보드모델 클래스 인스턴스 저장한 $boardModel 파기
				// 16. return "view/list.php";
				// 17. <부모컨트롤러>리턴 받은 값을 $resultAction에 저장
				// 18. callView($resultAction) 메소드 호출 > require_once($resultAction) >
				// require_once(view/list.php); 실행
				// 처리종료
			}	
				
		} else if($url === "board/add") {
			if($method === "GET") {
				// 처리 없음
			} else {
				new BoardController("addPost");
				// 1. 보드컨트롤러 클래스 인스턴스화 시, 자동으로 부모컨트롤러 클래스의 생성자 호출
				// 2. 부모컨트롤러 클래스에서 construct($action) = construct(addPost)
				// 3. $this->controllerChkUrl = board/add;
				// 4. 슈퍼글로벌 변수 $_SESSION이 설정되어 있는지 확인
				// 설정되어 있으면 if문 실행X, 설정되어 있지 않으면 세션시작
				// 5. chkAuthorization() 메소드 호출 > $url = board/add > if문 조건 판단
				// private $arrNeedAuth = ["board/list"];
				// 1)if(!isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth))
				// 세션 내에 u_pk 값이 있고, $url이 [board/list] 배열 내 존재하는지 판단 / 두가지 모두 충족하지 않을 시 if문 실행
				// 충족할 시 header("Location: /user/login"); 실행 후 처리종료
				// 2)if(isset($_SESSION["u_pk"]) && $url === "user/login")
				// 세션 내에 u_pk 값이 있고, $url이 user/login인지 판단 / 두가지 모두 충족할 시 if문 실행
				// 충족할 시 header("Location: /board/list"); 실행 후 처리종료
				// 6. if문 2개 모두 실행되지 않아 리디렉션(현재 페이지에서 다른 페이지로 이동) 발생X
				// 7. 보드네임모델 클래스 인스턴스화 시 자동으로 부모모델 클래스의 생성자 호출
				// 8. <부모모델>DB연결 후 보드네임모델 클래스를 $boardNameModel에 인스턴스 저장
				// 9. $boardNameModel에서 getBoardNameList() 메소드 호출
				// 10. <보드네임모델>boardname에서 b_type, b_name 출력
				// 11. 출력한 값을 배열형태로 변환하여 $result에 저장 후 리턴
				// 12. <부모컨트롤러>리턴 받은 값을 프로퍼티 $arrBoardNameInfo에 저장
				// 13. $boardNameModel(DB연결+보드네임모델 인스턴스 저장내용) 파기
				// 14. $action=addPost이므로,
				// <보드컨트롤러>addPost() 메소드 호출 > 
				// $_POST["b_type"]...$_FILES["b_img"]["name"] 을 지역변수 $b_type...$b_img에 저장
				// 지역변수 $arrAddBoardInfo 내에 배열형태로 저장
				// move_uploaded_file 함수로 이미지 파일 저장
				// cf)move_uploaded_file(업로드된 파일 임시경로, 이동하거나 저장하려는 대상 경로); /boolean
				// 15. 보드모델 클래스 인스턴스화 시 자동으로 부모모델 클래스의 생성자 호출
				// <부모모델>DB연결 후 보드모델 클래스를 $boardModel에 인스턴스 저장
				// 트랜잭션 시작
				// <보드모델>addBoard($arrAddBoardInfo) 메소드 호출
				// (지역변수 $arrAddBoardInfo에는 $_POST["b_type"]...$_FILES["b_img"]["name"]의 값이 저장되어있음)
				// 지역변수 $arrAddBoardInfo에 저장되어 있는 u_pk...b_img 변경하여 insert 처리한 결과를 배열 변환하여 $result에 저장 후 리턴
				// <보드컨트롤러>리턴 받은 값을 $result에 저장
				// insert처리여부 if문 조건 판단
				// $result가 true아닐 시 트랜잭션 시작한 곳으로 롤백
				// $result가 true일 시 커밋
				// 16. DB연결 후 보드모델 클래스 인스턴스 저장한 $boardModel 파기
				// 17. return "Location: /board/list?b_type=".$b_type;
				// 18. <부모컨트롤러>리턴 받은 값을 $resultAction에 저장
				// 18. callView($resultAction) 메소드 호출 > 
				// 함수 strpos 사용하여 $resultAction 문자열에서 "Location:" 문자열을 찾아서 처음에 위치한다면 true
				// 조건 충족 되어 header("Location: /board/list?b_type=".$b_type;); 실행
				// 처리종료
			}
		} else if($url === "board/detail")
			if($method === "GET") {
				new BoardController("detailGet");
				// 1. 보드컨트롤러 클래스 인스턴스화 시, 자동으로 부모컨트롤러 클래스의 생성자 호출
				// 2. 부모컨트롤러 클래스에서 construct($action) = construct(detailGet)
				// 3. $this->controllerChkUrl = board/detail;
				// 4. 슈퍼글로벌 변수 $_SESSION이 설정되어 있는지 확인
				// 설정되어 있으면 if문 실행X, 설정되어 있지 않으면 세션시작
				// 5. chkAuthorization() 메소드 호출 > $url = board/detail > if문 조건 판단
				// private $arrNeedAuth = ["board/list"];
				// 1)if(!isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth))
				// 세션 내에 u_pk 값이 있고, $url이 [board/list] 배열 내 존재하는지 판단 / 두가지 모두 충족하지 않을 시 if문 실행
				// 충족할 시 header("Location: /user/login"); 실행 후 처리종료
				// 2)if(isset($_SESSION["u_pk"]) && $url === "user/login")
				// 세션 내에 u_pk 값이 있고, $url이 user/login인지 판단 / 두가지 모두 충족할 시 if문 실행
				// 충족할 시 header("Location: /board/list"); 실행 후 처리종료
				// 6. GET메소드로 접속하여 if문 2개 모두 실행되지 않아 리디렉션(현재 페이지에서 다른 페이지로 이동) 발생X
				// 7. 보드네임모델 클래스 인스턴스화 시 자동으로 부모모델 클래스의 생성자 호출
				// 8. <부모모델>DB연결 후 보드네임모델 클래스를 $boardNameModel에 인스턴스 저장
				// 9. $boardNameModel에서 getBoardNameList() 메소드 호출
				// 10. <보드네임모델>boardname에서 b_type, b_name 출력
				// 11. 출력한 값을 배열형태로 변환하여 $result에 저장 후 리턴
				// 12. <부모컨트롤러>리턴 받은 값을 프로퍼티 $arrBoardNameInfo에 저장
				// 13. $boardNameModel(DB연결+보드네임모델 인스턴스 저장내용) 파기
				// 14. $action=detailGet이므로,
				// // <보드컨트롤러>detailGet() 메소드 호출 > GET메소드 내 id 값 $id에 저장
				// 지역변수 $arrBoardDetailInfo 내에 배열형태로 저장
				// 15. 보드모델 클래스 인스턴스화 시 자동으로 부모모델 클래스의 생성자 호출
				// <부모모델>DB연결 후 보드모델 클래스를 $boardModel에 인스턴스 
				// 16. <보드모델>getBoardDetail($arrBoardDetailInfo) 메소드 호출 >
				// (지역변수 $arrBoardDetailInfo에는 $_GET["id"]의 값이 저장되어있음)
				// id...updated_at 출력하는 sql 쿼리 준비문 생성하여 $stmt에 저장
				// $prepare에 세팅해둔 지역변수 $arrBoardDetailInfo에 저장되어 있는 $_GET["id"]의 값을 변경하여 처리한 결과를 배열 변환하여 $result에 저장 후 리턴
				// <보드컨트롤러>리턴 받은 값을 $result에 저장
				// 에러플래그, 메세지, 데이터 담기위해 $arrTmp 배열형태로 response 데이터 작성
				// json_encode 사용하여 $arrTmp를 변환하여 $response에 저장
				








				// 12번에서 변경해두었던 프로퍼티 $arrBoardNameInfo(boardname에서 b_type, b_name 출력한 값의 배열형태)의 값을 $item에 저장
				// $item에 저장된 b_type이 $b_type($_GET["b_type"]의 값)과 동일할 때
				// 프로퍼티 protected $titleBoardName의 값을 $item["b_name"]으로 변경하고
				// 프로퍼티 protected $boardType의 값을 $item["b_type"]으로 변경하고 break
				
			} 				

		// 없는 경로일 경우
		echo "이상한 URL : ".$url;
		exit();
	
	} 
}
