<?php

// *****
//  ****
//   ***
//    **
//     *

// $num_a = 1;
// $num_b = 5;

// while ($num_a <= $num_b) {
// 	$num_c = 1;
// 	while ($num_c < $num_a) {
// 		echo " ";
// 		$num_c++;
// 	}
// 	$num_d = $num_b;
// 	while ($num_a<=$num_d) {
// 		echo "*";
// 		$num_d--;
// 	}
// 	echo "\n";
// 	$num_a++;
// }

// *****
// ****
// ***
// **
// *
// 5줄, *5, 공백0

// $num_a = 1;
// $num_b = 5;

// while ($num_a <= $num_b) {
// 	$num_c = 1;
// 	while ($num_c < $num_a)
// 		echo " ";
// 		$num_c++;
// 	$num_d = $num_b;
// 	while ($num_a<=$num_d)
// 		echo "*";
// 		$num_d++;
// 	echo "\n";
// 	$num_a++;
// }

$x=1;
    $max=6;

    while($x<$max) {
        $y=1;
        $z=1;
        while($y<=$max-$x) {
            echo "*";
            $y++;
        }
        while($z<$x) {
            echo " ";
            $z++;
        }
        $x++;
        echo "\n";
    }

	$x=1;
    $max=6;
    while($x<$max) {
        $y=1;
        while($y<=$max) {
            if($y<=$max-$x) {
                echo "*";
            } else {
                echo " ";
            }
            $y++;
        }
        $x++;
        echo "\n";
    }











// 메모해서 계산 해보기

// require 에러 상황시 경고를 발생시키고 이후 코드의 실행이 중단
// include 에러 상황시 경고를 발생시킨 후 나머지 코드의 실행을 계속



?>