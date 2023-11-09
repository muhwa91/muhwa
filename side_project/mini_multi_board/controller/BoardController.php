<?php

// <고유 식별자 제공>
namespace controller;
// namespace : 클래스 간 이름 충돌 방지

use model\BoardModel;
// use : namespace에 속하는 클래스 참조가능 
// 부모모델 클래스에게 상속받는 보드모델 클래스는 일차적으로 보드모델 클래스에서 정의된 실행할 처리가
// 실행되고, 보드모델 클래스에서 실행할 처리가 없으면 부모모델 클래스에 정의된 실행할 처리가 처리됨
// 일반적으로 부모클래스에 실행할 처리를 정의해줌

class BoardController extends ParentsController { // 부모 컨트롤러 클래스에게 상속받는 보드컨트롤러 클래스
	protected $arrBoardInfo;
	protected $titleBoardName;
	protected $boardType;

	protected function listGet() { // 게시판 리스트 페이지
		$b_type = isset($_GET["b_type"]) ? $_GET["b_type"] : "0"; // 파라미터 세팅
		// GET 메소드 b_type 값 판단
		$arrBoardInfo = [ // GET 메소드 b_type 값 배열형태로 저장
			"b_type" => $b_type
		];
		
		foreach($this->arrBoardNameInfo as $item) { // 페이지 제목 세팅
		// 배열형태의 프로퍼티 $arrBoardNameInfo를 루프시키기 위하여 foreach문 실행
		// <부모컨트롤러>리턴 받은 값으로 변경해두었던 프로퍼티 $arrBoardNameInfo(boardname에서 b_type, b_name 출력한 값의 배열형태)의 값을 $item에 저장
			if($item["b_type"] === $b_type) {
				$this->titleBoardName = $item["b_name"];
				$this->boardType = $item["b_type"];
				break;
			}
			// $item에 저장된 b_type이 $b_type($_GET["b_type"]의 값)과 동일할 때
			// 프로퍼티 protected $titleBoardName의 값을 $item["b_name"]으로 변경하고
			// 프로퍼티 protected $boardType의 값을 $item["b_type"]으로 변경하고 break
		} 
		$boardModel = new BoardModel();
		// <부모모델>DB연결 후 보드모델 클래스를 $boardModel에 인스턴스 저장
		$this->arrBoardInfo = $boardModel->getBoardList($arrBoardInfo); // 보드리스트 획득
		// 지역변수 $arrBoardInfo에 저장되어 있는 ["b_type"]과 일치하는 결과를 배열로 변환하여 $result에 저장 후 리턴
		// <보드컨트롤러>리턴 받은 값을 프로퍼티 $arrBoardInfo에 저장
		$boardModel->destroy(); 
		// DB연결 후 보드모델 클래스 인스턴스 저장한 $boardModel 파기
		return "view/list.php";
		// <부모컨트롤러>리턴 값 전달
	}

	protected function addPost() { // 글 작성
		// 작성 데이터 생성
		$b_type = $_POST["b_type"];
		$b_title = $_POST["b_title"];
		$b_content = $_POST["b_content"];
		$u_pk = $_SESSION["u_pk"];
		$b_img = $_FILES["b_img"]["name"];
		// var_dump($_FILES)

		$arrAddBoardInfo = [
			"b_type" => $b_type
			,"b_title" => $b_title
			,"b_content" => $b_content
			,"u_pk" => $u_pk
			,"b_img" => $b_img
		];
		// POST로 받아온 데이터 배열형태로 저장
		
		move_uploaded_file($_FILES["b_img"]["tmp_name"], _PATH_USERIMG.$b_img);
		// 이미지 파일 저장
		
		// insert 처리
		$boardModel = new BoardModel();
		// <부모모델>DB연결 후 보드모델 클래스를 $boardModel에 인스턴스 저장
		$boardModel->beginTransaction();
		// 트랜잭션 시작
		$result = $boardModel->addBoard($arrAddBoardInfo);
		// <보드모델>addBoard($arrAddBoardInfo) 메소드 호출
		// (지역변수 $arrAddBoardInfo에는 $_POST["b_type"]...$_FILES["b_img"]["name"]의 값이 저장되어있음)
		// 지역변수 $arrAddBoardInfo에 저장되어 있는 u_pk...b_img 변경하여 insert 처리한 결과를 배열 변환하여 $result에 저장 후 리턴
		// <보드컨트롤러>리턴 받은 값을 $result에 저장

		if($result !== true) { // insert처리여부 if문 조건 판단
			$boardModel->rollBack();
			// $result가 true아닐 시 트랜잭션 시작한 곳으로 롤백
		} else {
			$boardModel->commit();
			// $result가 true일 시 커밋
		}

		$boardModel-> destroy();
		// 모델 파기

		return "Location: /board/list?b_type=".$b_type;	
	}

	protected function detailGet() { // 상세정보 API
		$id = $_GET["id"];

		$arrBoardDetailInfo = [
			"id" => $id	
		];
		
		$boardModel = new BoardModel();
		$result = $boardModel->getBoardDetail($arrBoardDetailInfo);
		// 이미지 패스 재설정
		$result[0]["b_img"] = "/"._PATH_USERIMG.$result[0]["b_img"]; 
		// 작성 유저 플래그 설정
		$result[0]["uflg"] = $result[0]["u_pk"] === $_SESSION["u_pk"] ? "1" : "0";		

		$arrTmp = [ // response 데이터 작성
			"errflg" => "0"
			,"msg" => ""
			,"data" => $result[0]
			
		];
		$response = json_encode($arrTmp);

		//response 처리
		header('Content-type: application/json');
		echo $response;
		exit();
	}

	protected function removeGet() { // 강사님 방법
		$errFlg = "0";
		$errMsg = "";
		$arrDeleteBoardInfo = [
			"id" => $_GET["id"]
			,"u_pk" => $_SESSION["u_pk"]
		];
		
		$boardModel = new BoardModel(); // 삭제 처리
		$boardModel->begintransaction();
		$result = $boardModel->removeBoardCard($arrDeleteBoardInfo);

		if($result !== 1) {
			$errFlg = "1";
			$errMsg = "삭제 처리 이상";
			$boardModel->rollBack();
		} else {
			$boardModel->commit();
		}
		$boardModel->destroy();
	 
		$arrTmp = [ // response 데이터 작성
			"errflg" => $errFlg
			,"msg" => $errMsg
			,"id" => $arrDeleteBoardInfo["id"]
			];
		$response = json_encode($arrTmp); 
	 
		header('Content-type: application/json'); // response 처리
		echo $response;
		exit();
	 }

	// protected function deletePost() { // 성찬이 방법
	// 	$id = $_POST["id"];
	// 	$u_pk = $_SESSION["u_pk"];

	// 	$arrBoardDeleteInfo = [
	// 		"id" => $id
	// 		,"u_pk" => $u_pk
	// 	];

	// 	$boardModel = new BoardModel();
	// 	$boardModel->begintransaction();
	// 	$result = $boardModel->postBoardDelete($arrBoardDeleteInfo);

	// 	if($result !== true) {
	// 		$boardModel->rollBack();
	// 	} else {
	// 		$boardModel->commit();
	// 	}

	// 	$boardModel->destroy();
	// 	return "Location: /board/list?b_type=0";
	// }

	
}