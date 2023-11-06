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

		$arrBoardInfo = [
			"b_type" => $b_type
		];
		
		foreach($this->arrBoardNameInfo as $item) { // 페이지 제목 세팅
			if($item["b_type"] === $b_type) {
				$this->titleBoardName = $item["b_name"];
				$this->boardType = $item["b_type"];
				break;
			} 
		}

		$boardModel = new BoardModel(); // 보드모델 인스턴스화
		$this->arrBoardInfo = $boardModel->getBoardList($arrBoardInfo); // 보드리스트 획득
		
		$boardModel->destroy(); // 사용 모델 파기

		return "view/list.php";
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
		
		move_uploaded_file($_FILES["b_img"]["tmp_name"], _PATH_USERIMG.$b_img);
		// 이미지 파일 저장
		
		// insert 처리
		$boardModel = new BoardModel();
		$boardModel->beginTransaction();
		$result = $boardModel->addBoard($arrAddBoardInfo);
		if($result !== true) {
			$boardModel->rollBack();
		} else {
			$boardModel->commit();
		}

		// 모델 파기
		$boardModel-> destroy();

		return "Location: /board/list?b_type=".$b_type;	
	}
}