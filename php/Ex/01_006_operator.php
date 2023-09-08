<?php
// 1 산술연산자
// echo "더하기 : 1 + 1 = ", 1 + 1, "\n";
// echo "빼기 : 1 - 1 = ", 1 - 1, "\n";
// echo "곱하기 : 2 X 3 = ", 2 * 3, "\n";
// echo "나누기 : 2 / 3 = ", 2 / 3, "\n";
// echo "나머지 : 2 % 3 = ",2 % 3, "\n";
// echo (10 - 5) * 8 / 10;

// 2 증가/감소 연산자(증감연산자) : 사용빈도 높음
$num1 = 8;
// $num1++;
// // 9
// echo $num1, "\n";
// $num1--;
// echo $num1;
// // 8

// echo $num1++;
// // 8
// echo $num1;
// // 9
// echo ++$num1;
// // 10
// echo $num1;
// // 10

// 3 산술 대입 연산자
// $num = 5;
// $num = $num + 2;
// $num += 2;
// $num -= 2;
// $num *= 2;
// $num /= 2;
// $num = 5;
// $num %= 6;

// echo $num;
// 5

// 산술 연산자를 이용해서 계산(각각 과정 출력)
// $tng_num = 10;

// // $tng_num에 10 더하기
// echo $tng_num += 10, "\n";
// // $tng_num에 5로 나누기
// echo $tng_num /= 5, "\n";
// // $tng_num에 4 빼기
// echo $tng_num -= 4, "\n";
// // $tng_num에 7로 나눈 나머지
// echo $tng_num %= 7, "\n";
// // $tng_num에 3 곱하기
// echo $tng_num *= 3;

// 4 비교 연산자
// var_dump ( 1 > 0 );
// // 참 : bool(true) 거짓 : bool(false)
// var_dump ( 1 < 0 );
// var_dump ( 1 >= 0 );
// var_dump ( 1 <= 0 );

$num = 1;
// 숫자
$str = '1';
// 문자

// var_dump ($num == $str); //값의 형태만 비교 true
// var_dump ($num === $str); //값의 데이터 타입까지 완전비교 false(=== 비교하는 습관 가지기)
// var_dump ($num != $str); //값의 형태만 비교 true
// var_dump ($num !== $str); //값의 데이터 타입까지 완전비교 false(!== 비교하는 습관 가지기)

// 5 논리 연산자
// and 연산자
// var_dump( 1 === 1 && 2 === 2);(참, 참 = 참)
// var_dump( 1 === 1 && 2 === 1);(참, 거짓 = 거짓)
// or 연산자(둘 중 하나만 참이면 참)
// var_dump( 1 === 1 || 2 === 2);(참, 참 = 참)
// var_dump( 1 === 1 || 2 === 1);(참, 거짓 = 참)
// var_dump( 1 === 2 || 2 === 1);(거짓, 거짓 = 거짓)
// not 연산자(연산 결과 반대로)
var_dump( !(1 === 1) ); //참이지만 거짓



?>