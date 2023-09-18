<?php
// php.ini 주석해제
// 938 extension=mysqli
// 944 extension=pdo_mysql
// 946 extension=pdo_odbc

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

// PDO Class로 DB 연동
$obj_conn = new PDO($db_dns, $db_user, $db_pw, $db_options);

// 10004번 사원테이블의 사원정보 출력(sql 작성)
// $sql = " SELECT " //SQL 입력 시 앞뒤 공백넣어주기
// 	." * "
// 	." FROM "
// 	." EMPLOYEES "
// 	." WHERE "
// 	." emp_no = :emp_no "
	; //php 입력시 세미콜론 마지막에 꼭 넣기

// Prepared Statement 셋팅
// $arr_ps = [
// 	":emp_no" => 10004
// ];

// Prepared Statement 생성
// $stmt = $obj_conn->prepare($sql);
// $stmt->execute($arr_ps); // 쿼리실행
// $result = $stmt->fetchAll(); // 쿼리 결과 fetch
// print_r($result);

// 사번 10001, 10002의 현재 연봉과 사번, 생일을 가져오는 쿼리 작성 후 출력

// $sql = " SELECT " 
// 	." sal.salary, emp.emp_no, emp.birth_date "
// 	." FROM "
// 	." EMPLOYEES emp "
// 	." JOIN "
// 	." SALARIES sal "
// 	." ON "
// 	." emp.emp_no = sal.emp_no "
// 	." AND "
// 	." sal.to_date >= NOW() "
// 	." WHERE "
// 	." emp.emp_no = :emp_no "
// 	." OR "
// 	." emp.emp_no = :emp_no2 "
// ;
// // 쿼리 내에 작성하는 것은 데이터베이스에서 실행하는 것

// //프리페어드 스테이트먼트
// $arr_ps = [
// 	":emp_no" => 10001
// 	,":emp_no2" => 10002
// ];
// //프리페어드 스텔먼 설정(적용)
// $stmt = $obj_conn->prepare($sql);
// $stmt->execute($arr_ps); 
// $result = $stmt->fetchAll();
// print_r($result);

// insert
// 부서번호 'd010', 부서명 'php504 데이터 insert

// $sql = 
// 	" INSERT INTO departments ( "
// 	." dept_no "
// 	." ,dept_name "	
// 	." ) "
// 	." VALUES( "
// 	." :dept_no "
// 	." ,:dept_name "	
// 	." ) ";
// $arr_ps = [
// 	":dept_no" => "d010"
// 	,":dept_name" => "php504"
// ];

// $stmt = $obj_conn->prepare($sql);
// $result = $stmt->execute($arr_ps);
// $obj_conn->commit(); //커밋

// var_dump($result);


// delete 
// 부서번호 'd010' 삭제
$sql =
	"DELETE FROM departments "
	." WHERE " 
	."dept_no = :dept_no; "
;

$arr_ps = [
	":dept_no" => "d010"
];

//실행 
$stmt = $obj_conn->prepare($sql);
$result = $stmt->execute($arr_ps);
$res_cnt = $stmt->rowCount();
var_dump($res_cnt);
if($res_cnt >= 2) {
	$obj_conn->rollBack(); //롤백
	echo "rollback";
}	else {
	$obj_conn->commit(); //커밋
	echo "commit";
}
// $obj_conn->commit(); //커밋
// $obj_conn = null; //DB 파기














$obj_conn = null; // DB 파기




