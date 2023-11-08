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
				//1. [유저컨트롤러]인스턴스 생성>[부모컨트롤러] 생성자 호출
				//2. [부모컨트롤러] __construct("loginGet")
				//2-1 $this->controllerChkUrl = $_GET["url"]; controllerChkUrl = user/login
				//cf)header.php 내에 if 조건문 판단
				//user/login&user/regist가 아닐 때 header.php의 뷰 보임(if문 실행X)+if문 내에 있는 foreach도 실행X
				//2-2 세션 없으므로 세션시작 함수 실행
				//2-3 chkAuthorization() 메소드 호출
				//2-4 $url = user/login
				//2-5 if 조건문 2개 판단
				//1)슈퍼글로벌변수 $_SESSION 내 u_pk 값이 없고, 함수 in_array 사용하여 user/login
				//"board/list","board/add","board/detail" 배열 내 값과 비교하여 포함되지 않았으므로
				//조건 충족 되지 않아 if문 실행X
				//2)슈퍼글로벌변수 $_SESSION 내 u_pk 값이 없고, $url = user/login이지만
				//조건 충족 되지 않아 if문 실행X
				//3. [보드네임모델]인스턴스 생성>[부모모델] 생성자 호출
				//4. [부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스를 [부모컨트롤러]지역변수 $boardNameModel에 저장
				//5. [보드네임모델]의 getBoardNameList() 메소드 호출
				//6. [보드네임모델]b_type, b_name 출력 쿼리문 실행하여 해당 값 배열형태로 $result에 저장하여 리턴
				//7. [부모컨트롤러]프로퍼티 arrBoardNameInfo에 리턴 받은 값 저장
				//7-1 지역변수 $boardNameModel([부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스) 파기
				//7-2 $action("loginGet") 메소드 호출
				//8. [유저컨트롤러] return "view/login.php";
				//9. [부모컨트롤러] 지역변수 $resultAction에 리턴 받은 값 저장
				//9-1 callView("view/login.php") 메소드 호출
				//9-2 함수 strpos 사용하여 "view/login.php"에서 "Location:"으로 시작되는지 판단
				//9-3 조건 충족 되지 않아 if문 실행X
				//9-4 require_once("view/login.php") 실행 
			
			} else {  // POST일 때
				new UserController("loginPost");
			}	//1. [유저컨트롤러]인스턴스 생성>[부모컨트롤러] 생성자 호출
				//2. [부모컨트롤러] __construct("loginPost")
				//2-1 $this->controllerChkUrl = $_GET["url"]; controllerChkUrl = user/login
				//cf)header.php 내에 if 조건문 판단
				//user/login&user/regist가 아닐 때 header.php의 뷰 보임(if문 실행X)+if문 내에 있는 foreach도 실행X
				//2-2 세션 없으므로 세션시작 함수 실행
				//2-3 chkAuthorization() 메소드 호출
				//2-4 $url = user/login
				//2-5 if 조건문 2개 판단
				//1)슈퍼글로벌변수 $_SESSION 내 u_pk 값이 없고, 함수 in_array 사용하여 user/login
				//"board/list","board/add","board/detail" 배열 내 값과 비교하여 포함되지 않았으므로
				//조건 충족 되지 않아 if문 실행X
				//2)슈퍼글로벌변수 $_SESSION 내 u_pk 값이 없고, $url = user/login이지만
				//조건 충족 되지 않아 if문 실행X
				//3. [보드네임모델]인스턴스 생성>[부모모델] 생성자 호출
				//4. [부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스를 [부모컨트롤러]지역변수 $boardNameModel에 저장
				//5. [보드네임모델]의 getBoardNameList() 메소드 호출
				//5-1 [보드네임모델]b_type, b_name 출력 쿼리문 실행하여 해당 값 배열형태로 $result에 저장하여 리턴
				//6. [부모컨트롤러]프로퍼티 arrBoardNameInfo에 리턴 받은 값 저장
				//6-1 지역변수 $boardNameModel([부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스) 파기
				//6-2. $action("loginPost") 메소드 호출	
				//7. [유저컨트롤러] $_POST로 제출받은 u_id, u_pw 값을 $inputData 배열형태로 저장
				//7-1 $inputData에 대한 유효성 체크 if 조건문 판단
				//8. 발리데이션 userChk($inputData) 메소드 호출
				//8-1 [발리데이션] 정규식 패턴을 저장한 변수들을 활용하여 함수 preg_match 사용
				//1) 정규식 패턴과 u_id, u_pw 비교하여 정규식 패턴에 일치하는 부분을 $match에 문자열로 저장
				//일치하는 부분을 찾으면 1 반환, 일치하는 부분이 없으면 0 반환
				//정규식 패턴O : if문 실행X>리턴 true
				//정규식 패턴X : $msg에 에러메세지 저장하고, setArrErrorMsg($msg) 메소드 호출하여 에러메세지 저장>리턴 false
				//9. [유저컨트롤러]지역변수 $arrInput을 빈 배열로 세팅
				//9-1 $_POST로 제출받은 u_id 값을 지역변수 $arrInput에 저장
				//9-2 $_POST로 제출받은 u_pw은 encryptionPassword($_POST["u_pw"]) 메소드 호출하여 비밀번호 암호화 후 리턴하여 저장
				//10. [유저모델]인스턴스 생성>[부모모델] 생성자 호출
				//11. [부모모델]생성자 실행하여 DB연결+[유저모델] 인스턴스를 [유저컨트롤러]지역변수 $modelUser에 저장
				//12. [유저모델]getUserInfo($arrInput, true) 메소드 호출				
				//12-1 user테이블에 저장된 데이터 전체를 출력하고 조건은 DB의 u_id와 파라미터로 전달받은 u_id 일치하는 값 출력
				//12-2 아규먼트 중 $pwflg가 true면 if문 실행
				//12-3 $sql, $prepare에 u_pw 일치하는 값 조건 추가
				//12-4 쿼리문 실행하여 해당 값 배열형태로 $result에 저장하여 리턴
				//13. [유저컨트롤러]지역변수 resultUserInfo에 리턴 받은 값 저장
				//13-1 지역변수 resultUserInfo의 수가 0일 때 if 조건문 판단
				//리턴 받은 값이 없을 때에는 [부모컨트롤러] 프로퍼티 arrErrorMsg[]에 에러메세지에 저장하고 return "view/login.php";
				//리턴 받은 값이 있을 때에는 if문 실행X				
				//1)[if문 실행되었을 때-부모컨트롤러]지역변수 $resultAction에 리턴 받은 값 저장
				//14. callView("view/login.php") 메소드 호출
				//14-1 함수 strpos 사용하여 "view/login.php"에서 "Location:"으로 시작되는지 판단
				//14-2 조건 충족 되지 않아 if문 실행X
				//14-3 require_once("view/login.php) 실행 
				//2)[if문 실행되지 않았을 때-유저컨트롤러]
				//14. 리턴 받은 값을 저장한 지역변수 resultUserInfo 인덱스 0번에 있는 id의 값을 
				//슈퍼글로벌변수 $_SESSION 내에 u_pk 값 저장
				//14-1 return "Location: /board/list?b_type=0";
				//15. [부모컨트롤러]지역변수 $resultAction에 리턴 받은 값 저장
				//15-1 callView("Location: /board/list?b_type=0") 메소드 호출
				//15-2 함수 strpos 사용하여 "Location: /board/list?b_type=0"에서 "Location:"으로 시작되는지 판단
				//if문 실행되어 header("Location: /board/list"); 실행하고 처리종료
			
		} else if($url === "user/logout") { // user/[해당기능]
			if($method === "GET") { // GET 메소드로 로그아웃 했을 때
				new UserController("logoutGet");
				//1. [유저컨트롤러]인스턴스 생성>[부모컨트롤러] 생성자 호출
				//2. [부모컨트롤러] __construct("loginPost")
				//2-1 $this->controllerChkUrl = $_GET["url"]; controllerChkUrl = user/logout
				//cf)header.php 내에 if 조건문 판단
				//user/login&user/regist가 아닐 때 header.php의 뷰 보임(if문 실행) 헤더 뷰 활성화
				//if문 내에 있는 foreach문 실행
				//[부모컨트롤러]지역변수 $boardNameModel 에 저장되어 있는 값을 $item에 저장하여 루프 진행
				//드랍다운 내 b_type, b_name 출력	

				//2-2 로그인 상태로 세션이 있으므로 세션시작 처리 if문 실행X
				//2-3 chkAuthorization() 메소드 호출
				//2-4 $url = user/logout
				//2-5 if 조건문 2개 판단
				//1)슈퍼글로벌변수 $_SESSION 내 u_pk 값이 있으나, 함수 in_array 사용하여 user/logout
				//"board/list","board/add","board/detail" 배열 내 값과 비교하여 포함되지 않았으므로
				//조건 충족 되지 않아 if문 실행X
				//2)슈퍼글로벌변수 $_SESSION 내 u_pk 값이 있으나, $url = user/logout이므로
				//조건 충족 되지 않아 if문 실행X
				//3. [보드네임모델]인스턴스 생성>[부모모델] 생성자 호출
				//4. [부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스를 [부모컨트롤러]지역변수 $boardNameModel에 저장
				//5. [보드네임모델]의 getBoardNameList() 메소드 호출
				//5-1 [보드네임모델]b_type, b_name 출력 쿼리문 실행하여 해당 값 배열형태로 $result에 저장하여 리턴
				//6. [부모컨트롤러]프로퍼티 arrBoardNameInfo에 리턴 받은 값 저장
				//6-1 지역변수 $boardNameModel([부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스) 파기
				//6-2. $action("logoutGet") 메소드 호출	
				//7. [유저컨트롤러] 세션 내에 저장된 데이터 삭제, 세션 파기 후 return "Location: /user/login";
				//8. [부모컨트롤러] 지역변수 $resultAction에 리턴 받은 값 저장
				//8-1 callView("Location: /user/login") 메소드 호출				
				//8-2 함수 strpos 사용하여 "Location: /user/login"에서 "Location:"으로 시작되는지 판단
				//if문 실행되어 header("Location: /user/login"); 실행하고 처리종료
			}
		} else if($url === "user/regist") { // user/[해당기능]
			if($method === "GET") { // GET 메소드로 회원가입 했을 때
				new UserController("registGet");
				//1. [유저컨트롤러]인스턴스 생성>[부모컨트롤러] 생성자 호출
				//2. [부모컨트롤러] __construct("registGet")
				//2-1 $this->controllerChkUrl = $_GET["url"]; controllerChkUrl = user/regist
				//cf)header.php 내에 if 조건문 판단
				//user/login&user/regist가 아닐 때 header.php의 뷰 보임(if문 실행X)+if문 내에 있는 foreach도 실행X
				//2-2 세션 없으므로 세션시작 함수 실행
				//2-3 chkAuthorization() 메소드 호출
				//2-4 $url = user/regist
				//2-5 if 조건문 2개 판단
				//1)슈퍼글로벌변수 $_SESSION 내 u_pk 값이 없고, 함수 in_array 사용하여 user/login
				//"board/list","board/add","board/detail" 배열 내 값과 비교하여 포함되지 않았으므로
				//조건 충족 되지 않아 if문 실행X
				//2)슈퍼글로벌변수 $_SESSION 내 u_pk 값이 없고, $url = user/regist으로 일치하지 않으므로
				//조건 충족 되지 않아 if문 실행X
				//3. [보드네임모델]인스턴스 생성>[부모모델] 생성자 호출
				//4. [부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스를 [부모컨트롤러]지역변수 $boardNameModel에 저장
				//5. [보드네임모델]의 getBoardNameList() 메소드 호출
				//5-1 [보드네임모델]b_type, b_name 출력 쿼리문 실행하여 해당 값 배열형태로 $result에 저장하여 리턴
				//6. [부모컨트롤러]프로퍼티 arrBoardNameInfo에 리턴 받은 값 저장
				//6-1 지역변수 $boardNameModel([부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스) 파기
				//6-2. $action("registGet") 메소드 호출
				//7. [유저컨트롤러] return "view/regist.php";
				//8. [부모컨트롤러] 지역변수 $resultAction에 리턴 받은 값 저장
				//8-1 callView("view/regist.php") 메소드 호출
				//8-2 함수 strpos 사용하여 "view/regist.php"에서 "Location:"으로 시작되는지 판단
				//8-3 조건 충족 되지 않아 if문 실행X
				//8-4 require_once("view/regist.php") 실행

			} else {
				new UserController("registPost");
			}	//1. [유저컨트롤러]인스턴스 생성>[부모컨트롤러] 생성자 호출
				//2. [부모컨트롤러] __construct("registPost")
				//2-1 $this->controllerChkUrl = $_GET["url"]; controllerChkUrl = user/regist
				//cf)header.php 내에 if 조건문 판단
				//user/login&user/regist가 아닐 때 header.php의 뷰 보임(if문 실행X)+if문 내에 있는 foreach도 실행X
				//2-2 세션 없으므로 세션시작 함수 실행
				//2-3 chkAuthorization() 메소드 호출
				//2-4 $url = user/regist
				//2-5 if 조건문 2개 판단
				//1)슈퍼글로벌변수 $_SESSION 내 u_pk 값이 없고, 함수 in_array 사용하여 user/login
				//"board/list","board/add","board/detail" 배열 내 값과 비교하여 포함되지 않았으므로
				//조건 충족 되지 않아 if문 실행X
				//2)슈퍼글로벌변수 $_SESSION 내 u_pk 값이 없고, $url = user/regist으로 일치하지 않으므로
				//조건 충족 되지 않아 if문 실행X
				//3. [보드네임모델]인스턴스 생성>[부모모델] 생성자 호출
				//4. [부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스를 [부모컨트롤러]지역변수 $boardNameModel에 저장
				//5. [보드네임모델]의 getBoardNameList() 메소드 호출
				//5-1 [보드네임모델]b_type, b_name 출력 쿼리문 실행하여 해당 값 배열형태로 $result에 저장하여 리턴
				//6. [부모컨트롤러]프로퍼티 arrBoardNameInfo에 리턴 받은 값 저장
				//6-1 지역변수 $boardNameModel([부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스) 파기
				//6-2 $action("registPost") 메소드 호출
				//7. [유저컨트롤러] 지역변수 $inputData 내에 post로 제출받은 u_id, u_pw, u_pw_chk, u_name을 배열형태로 저장
				//7-1 $_POST로 제출받은 u_id, u_pw은 encryptionPassword($_POST["u_pw"]) 메소드 호출하여 비밀번호 암호화한 리턴 값,
				//u_name을 지역변수 $arrAddUserInfo에 저장
				//8. 발리데이션 userChk($inputData) 메소드 호출
				//8-1 [발리데이션] 정규식 패턴을 저장한 변수들을 활용하여 함수 preg_match 사용
				//1) 정규식 패턴과 u_id, u_pw, u_pw_chk, u_name 비교하여 정규식 패턴에 일치하는 부분을 $match에 문자열로 저장
				//일치하는 부분을 찾으면 1 반환, 일치하는 부분이 없으면 0 반환
				//정규식 패턴O : if문 실행X>리턴 true
				//정규식 패턴X : $msg에 에러메세지 저장하고, setArrErrorMsg($msg) 메소드 호출하여 에러메세지 저장>리턴 false
				//9. [유저컨트롤러]지역변수 $arrInput을 빈 배열로 세팅
				//10. [유저모델]인스턴스 생성>[부모모델] 생성자 호출
				//11. [부모모델]생성자 실행하여 DB연결+[유저모델] 인스턴스를 [유저모델]지역변수 $userModel에 저장
				//12. [유저모델]트랜잭션 시작			
				//12-1 [유저모델]의 addUserInfo($arrAddUserInfo) 메소드 호출
				//12-2 user테이블에 u_id, u_pw, u_name에 $arrAddUserInfo에 배열형태로 저장한 post 제출 받은 값을 insert 처리하는
				//쿼리문 실행하여 해당 값을 $result에 저장하여 리턴
				//13. [유저컨트롤러]지역변수 $result에 리턴 받은 값 저장
				//13-1 if 조건문 판단
				//$result false일 때 롤백처리, true일 때 커밋처리
				//13-2 지역변수 $userModel([부모모델]생성자 실행하여 DB연결+[유저모델] 인스턴스) 파기
				//13-3 return "Location: /user/login";
				//14. [부모컨트롤러] 지역변수 $resultAction에 리턴 받은 값 저장
				//14-1 callView("Location: /user/login") 메소드 호출				
				//14-2 함수 strpos 사용하여 "Location: /user/login"에서 "Location:"으로 시작되는지 판단
				//14-3 if문 실행되어 header("Location: /user/login"); 실행하고 처리종료

		} else if($url === "user/regist_chk") {
			if($method === "GET") { // 아이디 중복체크
				new UserController("regist_ChkGet");
			}	//1. [유저컨트롤러]인스턴스 생성>[부모컨트롤러] 생성자 호출
				//2. [부모컨트롤러] __construct("regist_ChkGet")
				//2-1 $this->controllerChkUrl = $_GET["url"]; controllerChkUrl = user/regist_chk
				//cf)header.php 내에 if 조건문 판단
				//user/login&user/regist가 아닐 때 header.php의 뷰 보임(if문 실행X)+if문 내에 있는 foreach도 실행X
				//2-2 세션 없으므로 세션시작 함수 실행
				//2-3 chkAuthorization() 메소드 호출
				//2-4 $url = user/regist_chk
				//2-5 if 조건문 2개 판단
				//1)슈퍼글로벌변수 $_SESSION 내 u_pk 값이 없고, 함수 in_array 사용하여 user/login
				//"board/list","board/add","board/detail" 배열 내 값과 비교하여 포함되지 않았으므로
				//조건 충족 되지 않아 if문 실행X
				//2)슈퍼글로벌변수 $_SESSION 내 u_pk 값이 없고, $url = user/regist으로 일치하지 않으므로
				//조건 충족 되지 않아 if문 실행X
				//3. [보드네임모델]인스턴스 생성>[부모모델] 생성자 호출
				//4. [부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스를 [부모컨트롤러]지역변수 $boardNameModel에 저장
				//5. [보드네임모델]의 getBoardNameList() 메소드 호출
				//5-1 [보드네임모델]b_type, b_name 출력 쿼리문 실행하여 해당 값 배열형태로 $result에 저장하여 리턴
				//6. [부모컨트롤러]프로퍼티 arrBoardNameInfo에 리턴 받은 값 저장
				//6-1 지역변수 $boardNameModel([부모모델]생성자 실행하여 DB연결+[보드네임모델] 인스턴스) 파기
				//6-2 $action("regist_ChkGet") 메소드 호출
				//7. [유저컨트롤러] GET으로 받은 u_id 값을 지역변수 $u_id에 저장
				//7-1 지역변수 $arrChkUserInfo에 GET으로 받은 u_id 배열형태로 저장
				//8. [유저모델]인스턴스 생성>[부모모델] 생성자 호출
				//8-1 [부모모델]생성자 실행하여 DB연결+[유저모델] 인스턴스를 [유저모델]지역변수 $modelChkUser에 저장
				//8-2 [유저모델]의 getChkUserInfo($arrChkUserInfo) 메소드 호출
				//9. [유저모델]user테이블의 u_id와 $arrChkUserInfo에 저장된 GET으로 받은 u_id 값과 비교하여 일치하는 수를 
				//출력하는 쿼리문 실행하여 해당 값 배열형태로 $result에 저장하여 리턴
				//10. [유저컨트롤러]지역변수 $resultChkUserInfo에 리턴 받은 값 저장
				//10-1 지역변수 $arrTmp에 response 데이터 작성
				//"errflg" => "0", "msg" => "", "data" => $resultChkUserInfo[0] 을 배열형태로 저장
				//10-2 지역변수 $response에 $arrTmp를 json_encode
				//10-3 header('Content-type: application/json'); 로 response 처리
				//10-4 echo $response; 처리 종료
				//11. [자바스크립트]에서 함수선언
				//11-1 함수 내 const선언 및 fetch, then, catch문 사용하여 php response 처리		
		
		} else if($url === "board/list") {
			if($method === "GET") { // GET 메소드로 리스트로 갈 때
				new BoardController("listGet");	
				//1. [보드컨트롤러]인스턴스 생성>[부모컨트롤러] 생성자 호출
				//2. [부모컨트롤러] __construct("listGet")
				//2-1 $this->controllerChkUrl = $_GET["url"]; controllerChkUrl = board/list
				//cf)header.php 내에 if 조건문 판단
				//user/login&user/regist가 아닐 때 header.php의 뷰 보임(if문 실행) 헤더 뷰 활성화
				//if문 내에 있는 foreach문 실행
				//[부모컨트롤러]지역변수 $boardNameModel 에 저장되어 있는 값을 $item에 저장하여 루프 진행
				//드랍다운 내 b_type, b_name 출력
				//2-2 세션 없으므로 세션시작 함수 실행
				//2-3 chkAuthorization() 메소드 호출
				//2-4 $url = board/list
				//2-5 if 조건문 2개 판단
				//1)슈퍼글로벌변수 $_SESSION 내 u_pk 값이 없고, 함수 in_array 사용하여 board/list
				//"board/list","board/add","board/detail" 배열 내 값과 비교하여 포함되었으므로,
				//조건 충족하여 if문 실행
				//2-6 header("Location: /user/login"); 처리종료

		} else if($url === "board/add") {
			if($method === "GET") {
				// 처리 없음
			} else {
				new BoardController("addPost");
				//1. [보드컨트롤러]인스턴스 생성>[부모컨트롤러] 생성자 호출
				//2. [부모컨트롤러] __construct("addPost")
				//2-1 $this->controllerChkUrl = $_GET["url"]; controllerChkUrl = board/add
				//cf)header.php 내에 if 조건문 판단
				//user/login&user/regist가 아닐 때 header.php의 뷰 보임(if문 실행) 헤더 뷰 활성화
				//if문 내에 있는 foreach문 실행
				//[부모컨트롤러]지역변수 $boardNameModel 에 저장되어 있는 값을 $item에 저장하여 루프 진행
				//드랍다운 내 b_type, b_name 출력
				//2-1 로그인 상태로 세션이 있으므로 세션시작 처리 if문 실행X
				//2-2 chkAuthorization() 메소드 호출
				//2-3 $url = board/add				
				//2-4 if 조건문 2개 판단
				//1)슈퍼글로벌변수 $_SESSION 내 u_pk 값이 없고, 함수 in_array 사용하여 user/login
				//"board/list","board/add","board/detail" 배열 내 값과 비교하여 포함되지 않았으므로
				//조건 충족 되지 않아 if문 실행X
				//2)슈퍼글로벌변수 $_SESSION 내 u_pk 값이 없고, $url = user/regist으로 일치하지 않으므로
				//조건 충족 되지 않아 if문 실행X
				//---------------------------------------------





















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
		} else if($url === "board/detail") {
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
		}
		// 없는 경로일 경우
		echo "이상한 URL : ".$url;
		exit();
	
		}
	}