<?php

// trim() : 문자열의 공백을 없애주는 함수 
// ltrim() : 왼쪽 공백 없애기
// rtrim() : 오른쪽 공백 없애기
// echo " sdsd ", "\n", trim(" sdsd ");

// strtoupper, strtolower : 문자열 대/소문자로 변환하는 함수
// echo strtoupper("sdsd"), strtolower("SDSD");
// SDSD, sdsd

// strlen() : 문자열의 길이를 반환
// echo mb_strlen("가나다");
// 3

// str_replace() : 특정문자를 치환해주는 함수
// echo str_replace("a", "/", "sdfsdfsdfafsdfsdf");
// sdfsdfsdf/fsdfsdf

// substr() : 문자열을 자르는 함수
// mb_substr() : 멀티바이트 문자열을 자르는 함수
// echo substr("abcdefg", 1, 4);
// bcde

// strpos() : 문자열에서 특정 문자와 위치를 반환하는 함수
// echo strpos("abcdefg", "d");
// 3
// $str = "abcdefg";
// echo substr($str, strpos($str, "d"));
// defg

// isset() : 변수의 존재를 확인하는 함수
// $str = "";
// var_dump( isset($str) );
// bool(true)
//메모리에 등록이 되어있는지 안되어있는지 확인해서 존재한다면 true, 존재하지 않는다면 false

// empty() : 변수의 값이 비어있는지 확인하는 함수(값이 있다없다로 정의)
// $str = null;
// var_dump( empty($str) );
// bool(true)
// " " false, "" true

// time() : 1970/01/01 기준으로 타임스탬프 시간 확인하는 함수(초단위)
// echo time();

// date() : 원하는 형식으로 시간 표시해주는 함수
// echo date("y-m-d H:i:s", time() );
// 23-09-12 12:20:08
// echo date("Y-m-d H:i:s", time() );
// 2023-09-12 12:20:19

?>