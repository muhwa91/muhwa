<?php

require_once("../ex/04_107_fnc_db_connect.php");
$conn = null;
my_db_conn($conn);

//1 자신의 사원 정보를 employees테이블에 등록
// $sql = 
// " INSERT INTO employees ( "
// ." emp_no "
// ." ,birth_date "
// ." ,first_name "
// ." ,last_name "
// ." ,gender "
// ." ,hire_date "
// ." ) "
// ." VALUES( "
// ." :emp_no "
// ." ,:birth_date "
// ." ,:first_name "
// ." ,:last_name "
// ." ,:gender "
// ." ,:hire_date "
// ." ) ";
// $arr_ps = [
// 	":emp_no" => "5000111"
// 	,":birth_date" => "1991-10-02"
// 	,":first_name" => "Junggi"
// 	,":last_name" => "Yeo"
// 	,":gender" => "M"
// 	,":hire_date" => "2023-09-18"
// ];

// $stmt = $conn->prepare($sql);
// $stmt->execute($arr_ps); 
// // $result = $stmt->fetchAll();
// // print_r($result);
// $conn->commit();

$sql =
" delete from employees "
." where "
." emp_no = :emp_no "
." or "
." emp_no = :emp_no2; "
;
$arr_ps = [
	":emp_no" => "500001"
	,":emp_no2" => "500011"	
];
$stmt = $conn->prepare($sql);
$result = $stmt->execute($arr_ps);
$res_cnt = $stmt->rowCount();
var_dump($res_cnt);
$conn->commit();


// $sql =
// "UPDATE employees"
// ."SET"
// ." first_name = '둘리' "
// ."WHERE emp_no = 999999"
// ;

//2 자신의 이름을 "둘리", 성을 "호이"로 변경
//3 자신의 정보를 출력
//4 자신의 정보를 삭제
//5 PDO클래스 사용법 숙지