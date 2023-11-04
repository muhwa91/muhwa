<?php

// <고유 식별자 제공>
namespace controller;
// namespace : 클래스 간 이름 충돌 방지

class BoardController extends ParentsController { // 부모 컨트롤러 클래스에게 상속받는 보드컨트롤러 클래스
	
	protected function listGet() { // 게시판 리스트 페이지
		return "view/list.php";
	}
}