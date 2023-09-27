<?php

// $a=1;
// $b=5;
// while($a<=$b) {
// 	$c=1;
// 	$d=1;
// 	while($c<=$b-$a) {
// 		echo " ";
// 		$c++;
// 	}
// 	while($d<=$a) {	
// 		echo "*";
// 		$d++;
// 	}	
// 	echo "\n";
// 	$a++;
// }

$num_a=1;
$num_b=5;
while($num_a<=$num_b) {
	$num_c=1;
	while($num_c<=$num_b) {
		if($num_c<=$num_b-$num_a) {
			echo " ";
		} else {
			echo "*";
		}
		$num_c++;
	}
	$num_a++;
	echo "\n";
}


// 메모해서 계산 해보기

// require 에러 상황시 경고를 발생시키고 이후 코드의 실행이 중단
// include 에러 상황시 경고를 발생시킨 후 나머지 코드의 실행을 계속







?>