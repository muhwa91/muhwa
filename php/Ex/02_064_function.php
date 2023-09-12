<?php
// 두 숫자를 받아서 더해주는 함수 만들기
// 리턴 없는 함수
// function my_sum($a, $b) {
//     echo $a + $b;
// }

// my_sum(5, 4);
// 9

// 리턴 있는 함수
// function my_sum2($a, $b) {
//     return $a + $b;
// }
// $reslt = my_sum2(2,2);
// echo $reslt;
// 3

// 두 숫자를 받아서 - * / %를 리턴하는 함수 만들기
// function my_min($a, $b) {
//     return $a - $b;
// }
// $reslt = my_minus(4,2);
// // 2
// function my_mul($a, $b) {
//     return $a * $b;
// }
// $reslt = my_mul(4,2);
// // 8
// function my_div($a, $b) {
//     return $a / $b;
// }
// $reslt = my_div(4,2);
// // 2
// function my_per($a, $b) {
//     return $a % $b;
// }
// $reslt = my_per(4,2);
// // 0

// 파라미터의 기본값이 설정되어 있는 함수
// function my_sum3($a, $b = 5, $c =2) {
//     return $a + $b + $c;
// }

// echo my_sum3(3, 1);
// 8

// 가변 파라미터
// php 5.6 이상 
// function my_args_param(...$items) {
//     // echo $items[1]; // b
//     print_r($items);    
// }

// function my_args_param() {
//     $items = func_get_args();  
//     print_r($items);    
// }

// my_args_param("a", "b", "c");

// 재귀 함수

// function my_ap($i) {
//     $sum = 0;
//     for($i; $i > 0; $i--) {
//         $sum += $i;
//     }
//     return $sum;
// }

// echo my_ap(1000);

// function my_recursion($i) {
//     if( $i === 1) {
//         return 1;
//     }
//     return $i + my_recursion($i - 1);
// }

// echo my_recursion(3);

//숫자로 이루어진 문자열을 하나 받음
// 이 문자열의 모든 숫자를 더하기
// ex) "3421"일 경우, 3+4+2+1해서 10이 리턴 되는 함수





?>