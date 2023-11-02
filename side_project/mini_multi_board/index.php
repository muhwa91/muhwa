<?php
// php 오픈태그만 사용하고, 클로즈태그 사용X

require_once("config.php"); // 설정파일 불러오기
require_once("autoload.php"); // 오토로드 파일 불러오기 



// 라우터 호출
new router\Router();