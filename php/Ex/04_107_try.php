<?php
require_once("./04_107_fnc_db_connect.php");

$conn = null;
// try-catch : 예외처리를 하기 위한 문법
try {
	// 실행하고 싶은 소스코드 작성
	echo "트라이";
	my_db_conn($conn);
	$sql = " SELECT * FROM EMPLOYEES WHERE emp_no = :emp_no ";

//Prepared Statement 셋팅
$arr_ps = [
	":emp_no" => 10004
];

$stmt = $conn->prepare($sql);
$stmt->execute($arr_ps);
$result = $stmt->fetchAll();

print_r($result);
} catch( Exception $e) {
	// 예외 발생 시 실행되는 소스코드 작성
	echo "예외 발생 : {$e->getMessage()}";
} finally {
	// 정상처리 또는 예외처리에 관계 없이 무조건 실행되는 소스코드 작성
	db_destroy_conn($conn);
	echo "파이널리";
}

// 정상작동 시 트라이 > 파이널리 실행
// 예외 발생 시 catch 실행