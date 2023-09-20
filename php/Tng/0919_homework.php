<?php

//INSERT INTO employees
// VALUES (
// 	700000
// 	,20000101
// 	,'first'
// 	,'last'
// 	,'M'
// 	,20230919
// 	,NULL
// );
// COMMIT;


// 주의점 디비에 저장될 것

function db_conn( &$conn ) {
	$db_host = "localhost";
	$db_user = "root";
	$db_pw = "php504";
	$db_name = "employees";
	$db_charset = "utf8mb4";
	$db_dns = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;

	$db_options = [
		PDO::ATTR_EMULATE_PREPARES => false
		,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	];
	$conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
}

$conn = null;

// 1 title테이블에 데이터가 없는 사원을 검색

db_conn($conn);
$sql =
" SELECT " 
."  *  "
." FROM "
." employees emp "
." WHERE "
." emp.emp_no "
." NOT IN " 
." ( "
." SELECT "
." emp_no "
." FROM "
." titles "
." ) "
;
$arr_ps = [
	
];

$stmt = $conn->prepare($sql);
$stmt->execute($arr_ps);
$result = $stmt->fetchAll();
var_dump($result);

// 2 [1]번에 해당하는 사원의 직책 정보 insert
// 2-1 직책 green, 시작일 현재시간, 종료일 99990101
db_conn($conn);
$sql =
" INSERT INTO " 
." titles "
." VALUES "
. " ( "
." :emp_no "
." ,'green' "
." ,NOW() "
." ,99990101 "
." ) "
;
$abc = 0;
foreach($result as $val){
	$abc = $val["emp_no"]; 
$arr_ps = [
	":emp_no" => $abc
];

$stmt = $conn->prepare($sql);
$stmt->execute($arr_ps);
}

$conn->commit();


















