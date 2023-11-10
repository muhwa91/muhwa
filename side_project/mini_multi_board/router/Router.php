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

		if($url === "user/login") {
			if($method === "GET") {				
				new UserController("loginGet");
				//1. [유저컨트롤러]인스턴스 생성>[부모컨트롤러] 생성자 호출
				//2. [부모컨트롤러] __construct("loginGet")
				//2-1. controllerChkUrl = user/login
				//2-2. 세션 없으므로 세션시작 함수 실행
				//2-3. chkAuthorization() 메소드 호출
				//2-4. $url = user/login
				//2-5. if 조건문 2개 판단
				//1)(!isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth))
				//$_SESSION 내 u_pk 값이 없음+함수 in_array 사용하여 user/login
				//"board/list","board/add","board/detail" 배열 내 값과 비교했을 때 포함(X)
				//조건 불충족>>if문 실행(X)
				//2)(isset($_SESSION["u_pk"]) && $url === "user/login")
				//$_SESSION 내 u_pk 값이 없음+$url = user/login
				//조건 불충족>>if문 실행(X)
				//3. [보드네임모델]인스턴스 생성>[부모모델]생성자 호출
				//4. [부모모델]생성자 실행하여 DB연결+[보드네임모델]인스턴스를 [부모컨트롤러]$boardNameModel에 저장
				//5. [보드네임모델]의 getBoardNameList() 메소드 호출
				//5-1. [보드네임모델]b_type, b_name 출력 쿼리문 실행하여 해당 값 배열형태로 $result에 저장하여 리턴
				//6. [부모컨트롤러]프로퍼티 arrBoardNameInfo에 리턴 받은 값 저장
				//cf)프로퍼티 arrBoardNameInfo header.php 내 if문 내 foreach문에서 사용
				//if 조건문 판단
				//($this->controllerChkUrl !== "user/login" && $this->controllerChkUrl !== "user/regist")
				//user/login이 아닌 경우+user/regist가 아닌 경우 / user/login 해당
				//조건 불충족>>if문 실행(X)
				//if문 내 foreach 실행X
				//6-1. $boardNameModel([부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스) 파기
				//6-2. $action("loginGet") 메소드 호출
				//7. [유저컨트롤러] return "view/login.php";
				//8. [부모컨트롤러] $resultAction에 리턴 받은 값 저장
				//8-1. callView("view/login.php") 메소드 호출
				//8-2. 함수 strpos 사용하여 "view/login.php"에서 첫 문자열이 "Location:"으로 시작되는지 판단
				//조건 불충족>>if문 실행(X)
				//8-3. require_once("view/login.php") 실행
				//8-4. 처리종료
			} else {				
				new UserController("loginPost");
				//1. [유저컨트롤러]인스턴스 생성>[부모컨트롤러] 생성자 호출
				//2. [부모컨트롤러]__construct("loginGet")
				//2-1. controllerChkUrl = user/login
				//2-2. 세션 없으므로 세션시작 함수 실행
				//2-3. chkAuthorization() 메소드 호출
				//2-4. $url = user/login
				//2-5. if 조건문 2개 판단
				//1)(!isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth))
				//$_SESSION 내 u_pk 값이 없음+함수 in_array 사용하여 user/login
				//"board/list","board/add","board/detail" 배열 내 값과 비교했을 때 포함(X)
				//조건 불충족>>if문 실행(X)
				//2)(isset($_SESSION["u_pk"]) && $url === "user/login")
				//$_SESSION 내 u_pk 값이 없음+$url = user/login
				//조건 불충족>>if문 실행(X)
				//3. [보드네임모델]인스턴스 생성>[부모모델]생성자 호출
				//4. [부모모델]생성자 실행하여 DB연결+[보드네임모델]인스턴스를 [부모컨트롤러]$boardNameModel에 저장
				//5. [보드네임모델]의 getBoardNameList() 메소드 호출
				//5-1. [보드네임모델]b_type, b_name 출력 쿼리문 실행하여 해당 값 배열형태로 $result에 저장하여 리턴
				//6. [부모컨트롤러]프로퍼티 arrBoardNameInfo에 리턴 받은 값 저장
				//cf)프로퍼티 arrBoardNameInfo header.php 내 if문 내 foreach문에서 사용
				//if 조건문 판단
				//($this->controllerChkUrl !== "user/login" && $this->controllerChkUrl !== "user/regist")
				//user/login이 아닌 경우+user/regist가 아닌 경우 / user/login 해당
				//조건 불충족>>if문 실행(X)
				//if문 내 foreach 실행X
				//6-1. $boardNameModel([부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스) 파기
				//6-2. $action("loginPost") 메소드 호출
				//7. [유저컨트롤러]POST 요청받은 u_id, u_pw 값을 배열형태 변수 $inputData에 저장
				//8. [발리데이션]의 userChk($inputData) 메소드 호출
				//8-1. [발리데이션]정규식 패턴을 $pattern에 저장하여 유효성 체크 진행
				//if 조건문 판단(u_pw 동일)
				//(array_key_exists("u_id", $inputData))
				//함수 array_key_exists 사용하여 u_id 키가 $inputData에 존재하는지 판단
				//존재 시 if 조건문 판단
				//(preg_match($patternId, $inputData["u_id"], $match) === 0) 
				//정규식 패턴과 $inputData 배열 내 u_id와 비교해서 $match에 저장하여 
				//매치된 횟수가 0이면 정규식 패턴에 일치하지 않는 것에 해당
				//일치한다면 에러처리 하지 않고, 일치하지 않는다면 프로퍼티 setArrErrorMsg($msg)에 문자열 저장
				//에러메세지가 없다면 return true; 에러메세지가 있다면 return false;
				
				//[에러메세지가 없는 경우] 
				//9. [유저컨트롤러]return true;
				//조건 불충족>>if문 실행(X)
				//10. [유저모델]인스턴스 생성>[부모모델]생성자 호출
				//11. [부모모델]생성자 실행하여 DB연결+[유저모델]인스턴스를 [유저컨트롤러]$modelUser에 저장
				//12. [유저모델]getUserInfo($arrInput, true) 메소드 호출
				//12-1. user테이블에서 POST 요청받은 u_id와 동일한 값의 모든 데이터 출력한 결과를 배열형태로 $result에 저장하여 리턴
				//13. [유저컨트롤러]리턴 받은 값을 $resultUserInfo에 저장
				//13-1. if 조건문 판단
				//(count($resultUserInfo) === 0)
				//[아이디 일치한 경우] if문 실행(X)
				//13-2$resultUserInfo에 저장된 0번 인덱스의 id의 값을 $_SESSION["u_pk]에 저장
				//return "Location: /board/list?b_type=0";
				//[부모컨트롤러]리턴받은 값 $resultAction에 저장
				//14. callView("Location: /board/list?b_type=0") 메소드 호출
				//14-1. if 조건문 판단
				//(strpos($path, "Location:") === 0)
				//함수 strpos 사용하여 "Location: /board/list?b_type=0"와 "Location:" 비교하여 문자열 시작이 
				//"Location:" 이므로, header("Location: /board/list?b_type=0");
				//처리종료
				//[아이디 일치 하지 않는 경우] if문 실행(O)
				//데이터 출력한 결과가 0이면 프로퍼티 arrErrorMsg[]에 에러메세지 저장하여 return "view/login.php";
				//[부모컨트롤러]리턴받은 값 $resultAction에 저장
				//14. callView("view/login.php") 메소드 호출
				//14-1. 함수 strpos 사용하여 "view/login.php"에서 첫 문자열이 "Location:"으로 시작되는지 판단
				//조건 불충족>>if문 실행(X)
				//14-2. require_once("view/login.php") 실행
				//처리종료

				//[에러메세지가 있는 경우]
				//9. [유저컨트롤러]return false;
				//9-1. [발리데이션]의 getArrErrorMsg() 메소드 호출
				//9-2. u_id, u_pw 유효성 체크 후 저장한 에러메세지를 [부모컨트롤러]프로퍼티 arrErrorMsg에 저장하여 return "view/login.php";
				//[부모컨트롤러]리턴받은 값 $resultAction에 저장
				//10. callView("view/login.php") 메소드 호출
				//10-1. 함수 strpos 사용하여 "view/login.php"에서 첫 문자열이 "Location:"으로 시작되는지 판단
				//조건 불충족>>if문 실행(X)
				//14-2. require_once("view/login.php") 실행
				//14-3. login.php 내 php 에러메세지 출력
				//처리종료
			}
		} else if($url === "user/logout") {
			if($method === "GET") {				
				new UserController("logoutGet");
				//1. [유저컨트롤러]인스턴스 생성>[부모컨트롤러] 생성자 호출
				//2. [부모컨트롤러]__construct("logoutGet")
				//2-1. controllerChkUrl = user/logout
				//2-2. 세션있으므로, if문 실행(X)
				//2-3. chkAuthorization() 메소드 호출
				//2-4. $url = user/logout
				//2-5. if 조건문 2개 판단
				//1)(!isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth))
				//$_SESSION 내 u_pk 값이 있음+함수 in_array 사용하여 user/logout
				//"board/list","board/add","board/detail" 배열 내 값과 비교했을 때 포함(X)
				//조건 불충족>>if문 실행(X)
				//2)(isset($_SESSION["u_pk"]) && $url === "user/login")
				//$_SESSION 내 u_pk 값이 있음+$url = user/logout
				//조건 불충족>>if문 실행(X)
				//3. [보드네임모델]인스턴스 생성>[부모모델]생성자 호출
				//4. [부모모델]생성자 실행하여 DB연결+[보드네임모델]인스턴스를 [부모컨트롤러]$boardNameModel에 저장
				//5. [보드네임모델]의 getBoardNameList() 메소드 호출
				//5-1. [보드네임모델]b_type, b_name 출력 쿼리문 실행하여 해당 값 배열형태로 $result에 저장하여 리턴
				//6. [부모컨트롤러]프로퍼티 arrBoardNameInfo에 리턴 받은 값 저장
				//cf)프로퍼티 arrBoardNameInfo header.php 내 if문 내 foreach문에서 사용
				//if 조건문 판단
				//($this->controllerChkUrl !== "user/login" && $this->controllerChkUrl !== "user/regist")
				//user/login이 아닌 경우+user/regist가 아닌 경우 / user/logout 해당
				//조건 충족>>if문 실행(O)
				//if문 내 foreach 실행(O) / 게시판 타입과 게시판 이름이 기재된 드롭다운 화면 출력
				//6-1. $boardNameModel([부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스) 파기
				//6-2. $action("logoutGet") 메소드 호출
				//7. [유저컨트롤러] 세션 내 변수 삭제, 세션 파기, return "Location: /user/login";
				//8. [부모컨트롤러] $resultAction에 리턴 받은 값 저장
				//8-1. callView("Location: /user/login") 메소드 호출
				//8-2. 함수 strpos 사용하여 "Location: /user/login"에서 첫 문자열이 "Location:"으로 시작되는지 판단
				//조건 충족>>if문 실행(O)
				//8-3. header("Location: /user/login"); 실행
				//8-4. 처리종료
			}
		} else if($url === "user/regist") {
			if($method === "GET") {
				new UserController("registGet");
				//1. [유저컨트롤러]인스턴스 생성>[부모컨트롤러] 생성자 호출
				//2. [부모컨트롤러]__construct("registGet")
				//2-1. controllerChkUrl = user/regist
				//2-2. 세션 없으므로 세션시작 함수 실행
				//2-3. chkAuthorization() 메소드 호출
				//2-4. $url = user/regist
				//2-5. if 조건문 2개 판단
				//1)(!isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth))
				//$_SESSION 내 u_pk 값이 없음+함수 in_array 사용하여 user/regist
				//"board/list","board/add","board/detail" 배열 내 값과 비교했을 때 포함(X)
				//조건 불충족>>if문 실행(X)
				//2)(isset($_SESSION["u_pk"]) && $url === "user/login")
				//$_SESSION 내 u_pk 값이 없음+$url = user/regist
				//조건 불충족>>if문 실행(X)
				//3. [보드네임모델]인스턴스 생성>[부모모델]생성자 호출
				//4. [부모모델]생성자 실행하여 DB연결+[보드네임모델]인스턴스를 [부모컨트롤러]$boardNameModel에 저장
				//5. [보드네임모델]의 getBoardNameList() 메소드 호출
				//5-1. [보드네임모델]b_type, b_name 출력 쿼리문 실행하여 해당 값 배열형태로 $result에 저장하여 리턴
				//6. [부모컨트롤러]프로퍼티 arrBoardNameInfo에 리턴 받은 값 저장
				//cf)프로퍼티 arrBoardNameInfo header.php 내 if문 내 foreach문에서 사용
				//if 조건문 판단
				//($this->controllerChkUrl !== "user/login" && $this->controllerChkUrl !== "user/regist")
				//user/login이 아닌 경우+user/regist가 아닌 경우 / user/regist 해당
				//조건 불충족>>if문 실행(X)
				//if문 내 foreach 실행X
				//6-1. $boardNameModel([부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스) 파기
				//6-2. $action("registGet") 메소드 호출
				//7. [유저컨트롤러] return "view/regist.php";
				//8. [부모컨트롤러] $resultAction에 리턴 받은 값 저장
				//8-1. callView("view/regist.php") 메소드 호출
				//8-2. 함수 strpos 사용하여 "view/regist.php"에서 첫 문자열이 "Location:"으로 시작되는지 판단
				//조건 불충족>>if문 실행(X)
				//8-3. require_once("view/regist.php") 실행
				//8-4. 처리종료
			} else {
				new UserController("registPost");
				//1. [유저컨트롤러]인스턴스 생성>[부모컨트롤러] 생성자 호출
				//2. [부모컨트롤러]__construct("registPost")
				//2-1. controllerChkUrl = user/regist
				//2-2. 세션 없으므로 세션시작 함수 실행
				//2-3. chkAuthorization() 메소드 호출
				//2-4. $url = user/regist
				//2-5. if 조건문 2개 판단
				//1)(!isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth))
				//$_SESSION 내 u_pk 값이 없음+함수 in_array 사용하여 user/regist
				//"board/list","board/add","board/detail" 배열 내 값과 비교했을 때 포함(X)
				//조건 불충족>>if문 실행(X)
				//2)(isset($_SESSION["u_pk"]) && $url === "user/login")
				//$_SESSION 내 u_pk 값이 없음+$url = user/regist
				//조건 불충족>>if문 실행(X)
				//3. [보드네임모델]인스턴스 생성>[부모모델]생성자 호출
				//4. [부모모델]생성자 실행하여 DB연결+[보드네임모델]인스턴스를 [부모컨트롤러]$boardNameModel에 저장
				//5. [보드네임모델]의 getBoardNameList() 메소드 호출
				//5-1. [보드네임모델]b_type, b_name 출력 쿼리문 실행하여 해당 값 배열형태로 $result에 저장하여 리턴
				//6. [부모컨트롤러]프로퍼티 arrBoardNameInfo에 리턴 받은 값 저장
				//cf)프로퍼티 arrBoardNameInfo header.php 내 if문 내 foreach문에서 사용
				//if 조건문 판단
				//($this->controllerChkUrl !== "user/login" && $this->controllerChkUrl !== "user/regist")
				//user/login이 아닌 경우+user/regist가 아닌 경우 / user/regist 해당
				//조건 불충족>>if문 실행(X)
				//if문 내 foreach 실행X
				//6-1. $boardNameModel([부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스) 파기
				//6-2. $action("registPost") 메소드 호출
				//7. [유저컨트롤러]POST 요청받은 u_id, u_pw, u_pw_chk, u_name 값을 배열형태 변수 $inputData에 저장
				//7-1. POST 요청받은 u_id, u_pw, u_name 값을 배열형태 변수$arrAddUserInfo에 저장
				//cf)encryptionPassword($_POST["u_pw"]) 메소드 호출하여 비밀번호 암호화한 값 저장
				//8. [발리데이션]의 userChk($inputData) 메소드 호출
				//8-1. [발리데이션]정규식 패턴을 $pattern에 저장하여 유효성 체크 진행
				//if 조건문 판단(u_pw, u_pw_chk, u_name 동일)
				//(array_key_exists("u_id", $inputData))
				//함수 array_key_exists 사용하여 u_id 키가 $inputData에 존재하는지 판단
				//존재 시 if 조건문 판단
				//(preg_match($patternId, $inputData["u_id"], $match) === 0) 
				//정규식 패턴과 $inputData 배열 내 u_id와 비교해서 $match에 저장하여 
				//매치된 횟수가 0이면 정규식 패턴에 일치하지 않는 것에 해당
				//일치한다면 에러처리 하지 않고, 일치하지 않는다면 프로퍼티 setArrErrorMsg($msg)에 문자열 저장
				//에러메세지가 없다면 return true; 에러메세지가 있다면 return false;
				
				//[에러메세지가 없는 경우] 
				//9. [유저컨트롤러]return true;
				//조건 불충족>>if문 실행(X)
				//10. [유저모델]인스턴스 생성>[부모모델]생성자 호출
				//11. [부모모델]생성자 실행하여 DB연결+[유저모델]인스턴스를 [유저컨트롤러]$userModel에 저장
				//12. [유저컨트롤러]$userModel 트랜잭션 시작
				//13. [유저모델]addUserInfo($arrAddUserInfo) 메소드 호출
				//13-1. user테이블에 $arrAddUserInfo에 저장된 u_id, u_pw, u_name insert 결과를 $result에 저장하여 리턴
				//14. [유저컨트롤러]리턴 받은 값을 if 조건문 판단
				//false-롤백, true-커밋
				//14-1. $userModel([부모모델]생성자 실행하여 DB연결+[유저모델] 인스턴스) 파기
				//14-2. return "Location: /user/login";
				//15. [부모컨트롤러]리턴받은 값 $resultAction에 저장
				//15-1 callView("Location: /user/login") 메소드 호출
				//15-3. 함수 strpos 사용하여 "Location: /user/login"에서 첫 문자열이 "Location:"으로 시작되는지 판단
				//조건 충족>>if문 실행(O)
				//15-4. header("Location: /user/login"); 실행
				//15-5. 처리종료

				//[에러메세지가 있는 경우]
				//9. [유저컨트롤러]return false;
				//9-1. [발리데이션]의 getArrErrorMsg() 메소드 호출
				//9-2. u_id, u_pw 유효성 체크 후 저장한 에러메세지를 [부모컨트롤러]프로퍼티 arrErrorMsg에 저장하여 return "view/regist.php";
				//[부모컨트롤러]리턴받은 값 $resultAction에 저장
				//10. callView("view/regist.php") 메소드 호출
				//10-1. 함수 strpos 사용하여 "view/regist.php"에서 첫 문자열이 "Location:"으로 시작되는지 판단
				//조건 불충족>>if문 실행(X)
				//14-2. require_once("view/regist.php") 실행
				//14-3. login.php 내 php 에러메세지 출력
				//처리종료
			}
		} else if($url === "user/regist_chk"){
			if($method === "POST") {
				new UserController("regist_ChkPost");
				//1. [유저컨트롤러]인스턴스 생성>[부모컨트롤러] 생성자 호출
				//2. [부모컨트롤러]__construct("regist_ChkPost")
				//2-1. controllerChkUrl = user/regist_chk
				//2-2. 세션 없으므로 세션시작 함수 실행
				//2-3. chkAuthorization() 메소드 호출
				//2-4. $url = user/regist_chk
				//2-5. if 조건문 2개 판단
				//1)(!isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth))
				//$_SESSION 내 u_pk 값이 없음+함수 in_array 사용하여 user/regist_chk
				//"board/list","board/add","board/detail" 배열 내 값과 비교했을 때 포함(X)
				//조건 불충족>>if문 실행(X)
				//2)(isset($_SESSION["u_pk"]) && $url === "user/login")
				//$_SESSION 내 u_pk 값이 없음+$url = user/regist_chk
				//조건 불충족>>if문 실행(X)				
				//3. [보드네임모델]인스턴스 생성>[부모모델]생성자 호출
				//4. [부모모델]생성자 실행하여 DB연결+[보드네임모델]인스턴스를 [부모컨트롤러]$boardNameModel에 저장
				//5. [보드네임모델]의 getBoardNameList() 메소드 호출
				//5-1. [보드네임모델]b_type, b_name 출력 쿼리문 실행하여 해당 값 배열형태로 $result에 저장하여 리턴
				//6. [부모컨트롤러]프로퍼티 arrBoardNameInfo에 리턴 받은 값 저장
				//cf)프로퍼티 arrBoardNameInfo header.php 내 if문 내 foreach문에서 사용
				//if 조건문 판단
				//($this->controllerChkUrl !== "user/login" && $this->controllerChkUrl !== "user/regist")
				//user/login이 아닌 경우+user/regist가 아닌 경우 / POST 방식으로 url 노출X
				//조건 불충족>>if문 실행(X)
				//if문 내 foreach 실행X
				//6-1. $boardNameModel([부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스) 파기
				//6-2. $action("regist_ChkPost") 메소드 호출
				//7. [유저컨트롤러] "0"을 변수 $errorFlg에 저장
				//7-1. 변수 $errorMsg에 빈 값으로 세팅
				//7-2. POST 요청받은 u_id 값을 배열형태 변수 $inputData에 저장
				//8. [발리데이션]의 userChk($inputData) 메소드 호출
				//8-1. [발리데이션]정규식 패턴을 $pattern에 저장하여 유효성 체크 진행
				//if 조건문 판단
				//(array_key_exists("u_id", $inputData))
				//함수 array_key_exists 사용하여 u_id 키가 $inputData에 존재하는지 판단
				//존재 시 if 조건문 판단
				//(preg_match($patternId, $inputData["u_id"], $match) === 0) 
				//정규식 패턴과 $inputData 배열 내 u_id와 비교해서 $match에 저장하여 
				//매치된 횟수가 0이면 정규식 패턴에 일치하지 않는 것에 해당
				//일치한다면 에러처리 하지 않고, 일치하지 않는다면 프로퍼티 setArrErrorMsg($msg)에 문자열 저장
				//에러메세지가 없다면 return true; 에러메세지가 있다면 return false;
				
				//[에러메세지가 없는 경우] 
				//9. [유저컨트롤러]return true;
				//조건 불충족>>if문 실행(X)
				//10. [유저모델]인스턴스 생성>[부모모델]생성자 호출
				//11. [부모모델]생성자 실행하여 DB연결+[유저모델]인스턴스를 [유저컨트롤러]$userModel에 저장
				//12. [유저컨트롤러]getUserInfo($inputData) 메소드 호출
				//13. [유저모델]getUserInfo($inputData) 메소드 호출
				//13-1. user테이블에서 POST 요청받은 u_id와 동일한 값의 모든 데이터 출력한 결과를 배열형태로 $result에 저장하여 리턴
				//14. [유저컨트롤러]리턴 받은 값을 $result에 저장
				//14-1. $userModel([부모모델]생성자 실행하여 DB연결+[유저모델] 인스턴스) 파기
				//14-2. [$result의 값이 0 초과일 때] $errorFlg에 1, $errorMsg에 에러메세지 설정
				//14-3. errflg, msg에 $errorFlg, $errorMsg 값 설정 후 배열형태의 변수 $response에 저장
				//14-4. header('Content-type: application/json');
				//echo json_encode($response);
				//exit(); >> 자바스크립트에서 처리	
				//14-2. [$result의 값이 0 일 때] 조건 불충족>>if문 실행(X)		
				//14-3. errflg, msg에 $errorFlg, $errorMsg 값 설정 후 배열형태의 변수 $response에 저장
				//14-4. header('Content-type: application/json');
				//echo json_encode($response);
				//exit(); >> 자바스크립트에서 처리	

				//[에러메세지가 있는 경우]
				//9. [유저컨트롤러]return false;
				//9-1. [발리데이션]의 getArrErrorMsg() 메소드 호출
				//9-2. u_id 유효성 체크 후 저장한 에러메세지를 [부모컨트롤러]프로퍼티 arrErrorMsg에 저장
				//9-3. errflg, msg에 $errorFlg, $errorMsg 값 설정 후 배열형태의 변수 $response에 저장
				//9-4. header('Content-type: application/json');
				//echo json_encode($response);
				//exit(); >> 자바스크립트에서 처리	
			}
		} else if($url === "board/list") {
			if($method === "GET") {
				new BoardController("listGet");
				//1. [보드컨트롤러]인스턴스 생성>[부모컨트롤러] 생성자 호출
				//2. [부모컨트롤러]__construct("listGet")
				//2-1. controllerChkUrl = board/list
				//2-2. 세션있으므로, if문 실행(X)
				//2-3. chkAuthorization() 메소드 호출
				//2-4. $url = board/list
				//2-5. if 조건문 2개 판단
				//1)(!isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth))
				//$_SESSION 내 u_pk 값이 있음+함수 in_array 사용하여 board/list
				//"board/list","board/add","board/detail" 배열 내 값과 비교했을 때 포함(O)
				//조건 불충족>>if문 실행(X)
				//2)(isset($_SESSION["u_pk"]) && $url === "user/login")
				//$_SESSION 내 u_pk 값이 있음+$url = board/list
				//조건 불충족>>if문 실행(X)
				//3. [보드네임모델]인스턴스 생성>[부모모델]생성자 호출
				//4. [부모모델]생성자 실행하여 DB연결+[보드네임모델]인스턴스를 [부모컨트롤러]$boardNameModel에 저장
				//5. [보드네임모델]의 getBoardNameList() 메소드 호출
				//5-1. [보드네임모델]b_type, b_name 출력 쿼리문 실행하여 해당 값 배열형태로 $result에 저장하여 리턴
				//6. [부모컨트롤러]프로퍼티 arrBoardNameInfo에 리턴 받은 값 저장
				//cf)프로퍼티 arrBoardNameInfo header.php 내 if문 내 foreach문에서 사용
				//if 조건문 판단
				//($this->controllerChkUrl !== "user/login" && $this->controllerChkUrl !== "user/regist")
				//user/login이 아닌 경우+user/regist가 아닌 경우 / board/list 해당
				//조건 충족>>if문 실행(O)
				//if문 내 foreach 실행(O) / 게시판 타입과 게시판 이름이 기재된 드롭다운 화면 출력
				//6-1. $boardNameModel([부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스) 파기
				//6-2. $action("listGet") 메소드 호출
				//7. [보드컨트롤러]$b_type = isset($_GET["b_type"]) ? $_GET["b_type"] : "0";
				//7-1. $_GET 내에 b_type 확인하여 true일 시 $_GET["b_type"]을 $b_type에 저장
				//false일 시 "0"으로 저장
				//7-2. $b_type의 값을 $arrBoardInfo에 배열형태로 저장
				//7-3. [부모컨트롤러]b_type, b_name 출력 쿼리문 실행하여 해당 값 배열형태로 $result에 저장하여 리턴받은 값을
				//저장해 둔 프로퍼티 arrBoardNameInfo을 $item에 저장하여 foreach 실행 
				// $item에 저장된 b_type이 $b_type($_GET["b_type"]의 값)과 동일할 때
				// 프로퍼티 $titleBoardName의 값을 $item["b_name"]으로 저장하고
				// 프로퍼티 $boardType의 값을 $item["b_type"]으로 저장하고 break
				//7-4. [보드모델]인스턴스 생성>[부모모델]생성자 호출
				//7-5. [부모모델]생성자 실행하여 DB연결+[보드모델]인스턴스를 [보드컨트롤러]$boardModel에 저장
				//7-6. [보드모델]getBoardList($arrBoardInfo) 메소드 호출
				//8. [보드모델] board테이블에서 $arrBoardInfo에 저장된 $_GET["b_type"]의 값과 동일한 값을 가지는 조건과
				//deleted_at null인 조건을 충족하는 id, u_pk, b_title, b_content, b_img, create_at, updated_at 출력한 결과를
				//배열형태로 $result에 저장하여 리턴
				//9. [보드컨트롤러]프로퍼티 arrBoardInfo에 리턴 받은 값 저장
				//9-1. $boardModel([부모모델]생성자 실행하여 DB연결+[보드모델] 인스턴스) 파기
				//9-2. return "view/list.php";
				//10. [부모컨트롤러] $resultAction에 리턴 받은 값 저장
				//10-1. callView("view/list.php") 메소드 호출
				//10-2. 함수 strpos 사용하여 "view/regist.php"에서 첫 문자열이 "Location:"으로 시작되는지 판단
				//조건 불충족>>if문 실행(X)
				//10-3. require_once("view/list.php") 실행
				//10-4. 처리종료
			}
		} else if($url === "board/add") {
			if($method === "GET") { // 처리 없음
			} else {
				new BoardController("addPost");
				//1. [보드컨트롤러]인스턴스 생성>[부모컨트롤러] 생성자 호출
				//2. [부모컨트롤러]__construct("addPost")
				//2-1. controllerChkUrl = board/list
				//2-2. 세션있으므로, if문 실행(X)
				//2-3. chkAuthorization() 메소드 호출
				//2-4. $url = board/add
				//2-5. if 조건문 2개 판단
				//1)(!isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth))
				//$_SESSION 내 u_pk 값이 있음+함수 in_array 사용하여 board/add
				//"board/list","board/add","board/detail" 배열 내 값과 비교했을 때 포함(O)
				//조건 불충족>>if문 실행(X)
				//2)(isset($_SESSION["u_pk"]) && $url === "user/login")
				//$_SESSION 내 u_pk 값이 있음+$url = board/list
				//조건 불충족>>if문 실행(X)
				//3. [보드네임모델]인스턴스 생성>[부모모델]생성자 호출
				//4. [부모모델]생성자 실행하여 DB연결+[보드네임모델]인스턴스를 [부모컨트롤러]$boardNameModel에 저장
				//5. [보드네임모델]의 getBoardNameList() 메소드 호출
				//5-1. [보드네임모델]b_type, b_name 출력 쿼리문 실행하여 해당 값 배열형태로 $result에 저장하여 리턴
				//6. [부모컨트롤러]프로퍼티 arrBoardNameInfo에 리턴 받은 값 저장
				//cf)프로퍼티 arrBoardNameInfo header.php 내 if문 내 foreach문에서 사용
				//if 조건문 판단
				//($this->controllerChkUrl !== "user/login" && $this->controllerChkUrl !== "user/regist")
				//user/login이 아닌 경우+user/regist가 아닌 경우 / board/add 해당
				//조건 충족>>if문 실행(O)
				//if문 내 foreach 실행(O) / 게시판 타입과 게시판 이름이 기재된 드롭다운 화면 출력
				//6-1. $boardNameModel([부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스) 파기
				//6-2. $action("addPost") 메소드 호출
				//7. [보드컨트롤러]POST 요청받은 b_type, b_title, b_content & $_SESSION에 저장된 u_pk &
				//$_FILES에 저장된 b_img, name 값을 각 변수에 저장
				//7-1. 각 변수에 저장한 값을 배열형태 변수 $arrAddBoardInfo에 저장
				//7-2. 함수 move_uploaded_file 사용하여 POST 요청받은 이미지를 서버에 임시로 저장하고,
				//상수로 설정한 PATH에 저장하고 경로 끝에 파일 이름 추가
				//7-4. [보드모델]인스턴스 생성>[부모모델]생성자 호출
				//7-5. [부모모델]생성자 실행하여 DB연결+[보드모델]인스턴스를 [보드컨트롤러]$boardModel에 저장
				//7-6. [보드컨트롤러]$boardModel 트랜잭션 시작
				//7-7. [보드모델]addBoard($arrAddBoardInfo) 메소드 호출
				//8. [보드모델] board테이블에 $arrAddBoardInfo에 저장된 u_pk, b_title, b_content, b_img
				//insert 결과를 $result에 저장하여 리턴
				//9. [보드컨트롤러]리턴 받은 값을 if 조건문 판단
				//false-롤백, true-커밋
				//14-1. $boardModel([부모모델]생성자 실행하여 DB연결+[유저모델] 인스턴스) 파기
				//14-2. return "Location: /board/list?b_type=".$b_type;	
				//15. [부모컨트롤러]리턴받은 값 $resultAction에 저장
				//15-1. callView("Location: /user/login") 메소드 호출
				//15-2. 함수 strpos 사용하여 "Location: /user/login"에서 첫 문자열이 "Location:"으로 시작되는지 판단
				//조건 충족>>if문 실행(O)
				//15-3. header("Location: /board/list?b_type=".$b_type"); 실행
				//15-4. 처리종료				
			}
		} else if($url === "board/detail") {
			if($method === "GET") {
				new BoardController("detailGet");
				//1. [보드컨트롤러]인스턴스 생성>[부모컨트롤러] 생성자 호출
				//2. [부모컨트롤러]__construct("detailGet")
				//2-1. controllerChkUrl = board/detail
				//2-2. 세션있으므로, if문 실행(X)
				//2-3. chkAuthorization() 메소드 호출
				//2-4. $url = board/add
				//2-5. if 조건문 2개 판단
				//1)(!isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth))
				//$_SESSION 내 u_pk 값이 있음+함수 in_array 사용하여 board/detail
				//"board/list","board/add","board/detail" 배열 내 값과 비교했을 때 포함(O)
				//조건 불충족>>if문 실행(X)
				//2)(isset($_SESSION["u_pk"]) && $url === "user/login")
				//$_SESSION 내 u_pk 값이 있음+$url = board/detail
				//조건 불충족>>if문 실행(X)
				//3. [보드네임모델]인스턴스 생성>[부모모델]생성자 호출
				//4. [부모모델]생성자 실행하여 DB연결+[보드네임모델]인스턴스를 [부모컨트롤러]$boardNameModel에 저장
				//5. [보드네임모델]의 getBoardNameList() 메소드 호출
				//5-1. [보드네임모델]b_type, b_name 출력 쿼리문 실행하여 해당 값 배열형태로 $result에 저장하여 리턴
				//6. [부모컨트롤러]프로퍼티 arrBoardNameInfo에 리턴 받은 값 저장
				//cf)프로퍼티 arrBoardNameInfo header.php 내 if문 내 foreach문에서 사용
				//if 조건문 판단
				//($this->controllerChkUrl !== "user/login" && $this->controllerChkUrl !== "user/regist")
				//user/login이 아닌 경우+user/regist가 아닌 경우 / board/detail 해당
				//조건 충족>>if문 실행(O)
				//if문 내 foreach 실행(O) / 게시판 타입과 게시판 이름이 기재된 드롭다운 화면 출력
				//6-1. $boardNameModel([부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스) 파기
				//6-2. $action("detailGet") 메소드 호출
				//7. [보드컨트롤러] $_GET["id"] 값을 $id에 저장
				//7-1. $id에 저장한 값을 배열형태 변수 $arrAddBoardInfo에 저장
				//7-2. [보드모델]인스턴스 생성>[부모모델]생성자 호출
				//7-3. [부모모델]생성자 실행하여 DB연결+[보드모델]인스턴스를 [보드컨트롤러]$boardModel에 저장
				//7-4. [보드모델]getBoardDetail($arrBoardDetailInfo) 메소드 호출
				//8. [보드모델] board테이블에서 $arrBoardDetailInfo에 저장된 id의 값과 동일한 값을 가지는 조건을
				//충족하는 id, u_pk, b_title, b_content, b_img, 
				//DATE_FORMAT(create_at, '%Y년 %m월 %d일 %h시 %i분 %s초') AS create_at
				//DATE_FORMAT(updated_at, '%Y년 %m월 %d일 %h시 %i분 %s초') AS updated_at 출력한 결과를
				//배열형태로 $result에 저장하여 리턴
				//9. [보드컨트롤러]$result에 리턴 받은 값 저장
				//9-1. /이미지 PATH.$result 인덱스 0에 있는 b_img를 $result 인덱스 0에 있는 b_img에 저장
				//9-2. $result 인덱스 0에 있는 u_pk값이 $_SESSION u_pk가 같으면 1을 반환하고 다르면 0을 반환하여
				//$result 인덱스 0에 있는 uflg에 저장
				//9-3. errflg, msg에 초기화, data에 $result[0] 설정 후 배열형태의 변수 $arrTmp에 저장
				//9-4. $arrTmp를 json_encode 처리한 값을 $response에 저장 
				//9-4. header('Content-type: application/json');
				//echo $response;
				//exit(); >> 자바스크립트에서 처리
			}
		} else if($url === "board/remove") { // 강사님 방법
			if($method === "GET") {
				new BoardController("removeGet");
				//1. [보드컨트롤러]인스턴스 생성>[부모컨트롤러] 생성자 호출
				//2. [부모컨트롤러]__construct("addPost")
				//2-1. controllerChkUrl = board/remove
				//2-2. 세션있으므로, if문 실행(X)
				//2-3. chkAuthorization() 메소드 호출
				//2-4. $url = board/add
				//2-5. if 조건문 2개 판단
				//1)(!isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth))
				//$_SESSION 내 u_pk 값이 있음+함수 in_array 사용하여 board/remove
				//"board/list","board/add","board/detail" 배열 내 값과 비교했을 때 포함(X)
				//조건 불충족>>if문 실행(X)
				//2)(isset($_SESSION["u_pk"]) && $url === "user/login")
				//$_SESSION 내 u_pk 값이 있음+$url = board/remove
				//조건 불충족>>if문 실행(X)
				//3. [보드네임모델]인스턴스 생성>[부모모델]생성자 호출
				//4. [부모모델]생성자 실행하여 DB연결+[보드네임모델]인스턴스를 [부모컨트롤러]$boardNameModel에 저장
				//5. [보드네임모델]의 getBoardNameList() 메소드 호출
				//5-1. [보드네임모델]b_type, b_name 출력 쿼리문 실행하여 해당 값 배열형태로 $result에 저장하여 리턴
				//6. [부모컨트롤러]프로퍼티 arrBoardNameInfo에 리턴 받은 값 저장
				//cf)프로퍼티 arrBoardNameInfo header.php 내 if문 내 foreach문에서 사용
				//if 조건문 판단
				//($this->controllerChkUrl !== "user/login" && $this->controllerChkUrl !== "user/regist")
				//user/login이 아닌 경우+user/regist가 아닌 경우 / board/remove 해당
				//조건 충족>>if문 실행(O)
				//if문 내 foreach 실행(O) / 게시판 타입과 게시판 이름이 기재된 드롭다운 화면 출력
				//6-1. $boardNameModel([부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스) 파기
				//6-2. $action("removeGet") 메소드 호출
				//7. [보드컨트롤러] $errFlg를 "0", $errMsg를 "" 으로 초기화해주고 $_GET["id"], $_SESSION["u_pk"] 값을
				// 배열형태 변수 $arrDeleteBoardInfo에 저장
				//7-1. [보드모델]인스턴스 생성>[부모모델]생성자 호출
				//7-2. [부모모델]생성자 실행하여 DB연결+[보드모델]인스턴스를 [보드컨트롤러]$boardModel에 저장
				//7-3. [보드컨트롤러]$boardModel 트랜잭션 시작
				//7-4. [보드모델]removeBoardCard($arrDeleteBoardInfo) 메소드 호출
				//8. [보드모델] board테이블에서 $arrDeleteBoardInfo에 저장된 id, u_pk의 값과 동일한 값을 가지는 조건을
				//충족하는 데이터의 deleted_at를 현재날짜로 update 처리하고 메소드 rowCount()를 사용하여 
				//쿼리에 영향을 받은 레코드 수를 반환하여 $result에 저장하여 리턴(삭제처리가 얼마나 되었는지 확인 가능)
				//9. [보드컨트롤러]$result의 값이 1이 아니면 $errFlg에 '1', $errMsg에 삭제 에러메세지를 저장하고 롤백
				//$result의 값이 1이면 커밋
				//9-1. $boardModel([부모모델]생성자 실행하여 DB연결+[보드모델] 인스턴스) 파기
				//9-2. errflg에 $errFlg, msg에 $errMsg, id에 $arrDeleteBoardInfo에 저장되어있는 $_GET["id"]값을 설정 후 
				//배열형태의 변수 $arrTmp에 저장
				//9-4. $arrTmp를 json_encode 처리한 값을 $response에 저장 
				//9-4. header('Content-type: application/json');
				//echo $response;
				//exit(); >> 자바스크립트에서 처리
			}
		}
	// 없는 경로일 경우
	echo "이상한 URL : ".$url;
	exit();
	}
}