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
// 	":emp_no" => "500000"
// 	,":birth_date" => "1991-10-02"
// 	,":first_name" => "Junggi"
// 	,":last_name" => "Yeo"
// 	,":gender" => "M"
// 	,":hire_date" => "2023-09-18"
// ];

// $stmt = $conn->prepare($sql);
// $result = $stmt->execute($arr_ps);
// $conn->commit();

//2 자신의 이름을 "둘리", 성을 "호이"로 변경

// $sql =
// " UPDATE employees "
// ." SET "
// ." first_name = '둘리' "
// ." WHERE "
// ." emp_no = :emp_no "
// ;

// $arr_ps = [
// 	":emp_no" => 500000
// ];

// $stmt = $conn->prepare($sql);
// $result = $stmt->execute($arr_ps);
// $conn->commit();

// $sql =
// " UPDATE employees "
// ." SET "
// ." last_name = '호이' "
// ." WHERE "
// ." emp_no = :emp_no "
// ;

// $arr_ps = [
// 	":emp_no" => 500000
// ];

// $stmt = $conn->prepare($sql);
// $result = $stmt->execute($arr_ps);
// $conn->commit();


// $sql = 
//     " UPDATE "
//     ." employees "
//     ." SET "
//     ." first_name = :first_name "
//     ." , "
//     ." last_name = :last_name "
//     ." WHERE emp_no = :emp_no; ";
// $arr_ps = [
// 	":first_name" => "둘리"
// 	,":last_name" => "호이"
// 	,":emp_no" => 500000
// ];
	
// $stmt = $conn->prepare($sql);
// $result = $stmt->execute($arr_ps);


//3 자신의 정보를 출력
// $sql =
// " SELECT "
// ." * "
// ." FROM "
// ." EMPLOYEES "
// ." where "
// ." emp_no = 500000 "
// ;
// $arr_ps = [
// ];
// $stmt = $conn->prepare($sql);
// $stmt->execute($arr_ps);
// $result = $stmt->fetchAll();
// print_r($result);

//4 자신의 정보를 삭제
// $sql =
// 	"DELETE FROM employees "
// 	." WHERE " 
// 	."emp_no = :emp_no; "
// ;

// $arr_ps = [
// 	":emp_no" => 500000
// ];

// $stmt = $conn->prepare($sql);
// $result = $stmt->execute($arr_ps);
// $res_cnt = $stmt->rowCount();
// var_dump($res_cnt);

//5 PDO클래스 사용법 숙지