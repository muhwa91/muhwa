<?php

// 1 db_conn 함수 만들기 
// 1-1 기능 db설정 및 pdo객체 생성
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

// 2 현재 급여가 80,000이상인 사원 조회하기
db_conn($conn);
$sql =
" SELECT "
." emp_no "
." ,salary "
." FROM "
." salaries "
." WHERE to_date >= NOW()"
."AND salary >= :salary"
;
$arr_ps = [
	":salary" => 80000
];

$stmt = $conn->prepare($sql);
$stmt->execute($arr_ps);
$result = $stmt->fetchAll();//연산배열로 나타내줌
// var_dump($result);

// 3 조회한 데이터를 루프하면서 100,000이상이면 사원번호 출력
$a=0;
foreach($result as $val){
	if($val["salary"] >= 100000){
		echo $val["emp_no"], " ", $val["salary"], "\n";
		$a++;
	}	
}
echo $a;

