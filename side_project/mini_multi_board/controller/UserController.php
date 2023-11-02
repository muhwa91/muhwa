<?php

namespace controller;

class UserController extends ParentsController{
	// 로그인 페이지 이동
	protected function loginGet() {
		return "view/login.php";
	}

	// 회원가입 페이지 이동
	protected function registGet() {
		return "view/regist.php"._EXTENSION_PHP;
	}
}

// 부모클래스인 ParentsController를 상속받아 echo "ParentsController임".$action; 실행