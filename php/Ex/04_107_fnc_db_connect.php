<?php
//-------------------------------------
// 파일명 : 
// 기능 : 디비 연동 관련 함수
// 버전 : v001 new Yeo.jg 230918
// 		  v002 dbconn 설정 변경 Yeo.jg 230918
//-------------------------------------
// 함수명 : my_db_conn
// 기능 : DB Connect
// 파라미터 : PDO  &$conn
// 리턴 : 없음
function my_db_conn( &$conn ) {
	$db_host = "localhost"; //host(127.0.0.1)
	$db_user = "root"; //user
	$db_pw = "php504"; //passward
	$db_name = "employees"; //DB name
	$db_charset = "utf8mb4"; //charset
	$db_dns = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;

	$db_options = [
		PDO::ATTR_EMULATE_PREPARES => false
		//DB의 Prepared Statement 기능 사용하도록 설정
		,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		//PDO Exception을 Throws하도록 설정
		,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		//연상배열로 Fetch를 하도록 설정
	];
	$conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
}
//-------------------------------------
// 함수명 : db_destroy_conn
// 기능 : DB Connect
// 파라미터 : PDO  &$conn
// 리턴 : 없음
function db_destroy_conn(&$conn) {
	$conn = null;
}

//레퍼런스 파라미터

// function test1( $str ) {
// 	$str = "함수 test1";
// 	return $str;
// }
// function test2( &$str ) {
// 	$str = "함수 test2";
// 	return $str;
// }


// $str = "???";
// $result = test2( $str );
// echo $str, "\n";
// echo $result;


