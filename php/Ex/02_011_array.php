<?php
//인덱스 배열(문자 배치 가능) 동일방법 $arr = [0, "a", 2]
$arr = array(1, 2, 3); //키 = 방번호 


// 인덱스 배열(멀티타입 배열)
$arr = array(0, "a", 2, 6, 10);
$arr2 = [0, 1, 2];
$arr3 = ["배열", $arr[1], $arr2[1]];

var_dump($arr3);
$arr4 = [
    "name" => "홍길동" //0 = name(키) 
    ,"age" => 18
    ,"gender" => "남자"
];
// echo $arr4["name"];

// 다차원 배열(보통 연산배열로 구성)
// $arr5 = [
//     [11, 12, 13]
//     , [
//         [211, 212, 213]
//         ,[221, 222, 223]
//     ]
//     , [31, 32, 33]
// ]; var_dump($arr5[1][0][1]);212
//var_dump($arr5[2][1]); //32
$arr6 = [
    "msg" => "OK"
    ,"info" => [
        "name" => "홍길동"
        ,"age" => 20
    ]
];
//var_dump($arr6["info"], ["age"]); //20
//echo $arr6["info"]["age"];

// var_dump($arr);
// array(3) {
//     [0] =>
//     int(0)
//     [1] =>
//     int(1)
//     [2] =>
//     int(2)
//   }

// unset() : 배열의 원소 삭제
// $arr_week = ["Sun", "Mon", "delete", "Tue", "Wed"];
// unset($arr_week[2]);
// print_r($arr_week);
// Array
// (
//     [0] => Sun
//     [1] => Mon
//     [3] => Tue
//     [4] => Wed
// )

// 배열 정렬 : asort(), arsort(), ksort(), krsort()
// asort() : 배열의 값을 오름차순 정렬
$arr_asort = ["b", "a", "d", "c"];
asort($arr_asort);
print_r($arr_asort);
// Array
// (
//     [1] => a
//     [0] => b
//     [3] => c
//     [2] => d
// )

// arsort() : 배열의 값을 내림차순 정렬
arsort($arr_asort);
print_r($arr_asort);

// ksort() : 배열의 키를 오름차순 정렬
$arr_ksort = [
    "b" => "1"
    ,"d" => "2"
    ,"a" => "3"
    ,"c" => "4"
];
ksort($arr_ksort);
print_r($arr_ksort);
// Array
// (
//     [a] => 3
//     [b] => 1
//     [c] => 4
//     [d] => 2
// )

// krsort() : 배열의 키를 내림차순 정렬
$arr_ksort = [
    "b" => "1"
    ,"d" => "2"
    ,"a" => "3"
    ,"c" => "4"
];
krsort($arr_ksort);
print_r($arr_ksort);
// Array
// (
//     [d] => 2
//     [c] => 4
//     [b] => 1
//     [a] => 3
// )

// count() : 배열 혹은 그 외 것들의 사이즈를 반환하는 함수
echo count($arr_ksort);
// 4

// array_diff() : A배열과 B배열을 비교해서 중복되지 않는 A배열의 원소를 반환
$arr_diff1 = [1, 2, 3];
$arr_diff2 = [1, 4, 5];
$arr_diff = array_diff($arr_diff2, $arr_diff1);
print_r($arr_diff);
// Array
// (
//     [1] => 4
//     [2] => 5
// )

// array_push() : 기존 배열에 값을 추가하는 함수

$arr_push = [1, 2, 3];
array_push($arr_push, 4, 5);
print_r($arr_push);
// Array
// (
//     [0] => 1
//     [1] => 2
//     [2] => 3
//     [3] => 4
//     [4] => 5
// )
// 1개만 추가 할 때 
// $arr_push[] = 4;
// $arr_push[] = 5;
?>