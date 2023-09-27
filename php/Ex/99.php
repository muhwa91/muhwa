<?php

$a=1;
$b=5;
while($a<=$b) {
	$c=1;
	$d=1;
	while($c<=$b-$a) {
		echo " ";
		$c++;
	}
	while($d<=$a) {	
		echo "*";
		$d++;
	}	
	echo "\n";
	$a++;
}

$x=1;
$max=5;
while($x<=$max) {
	$y=1;
	while($y<=$max) {
		if($y<=$max-$x) {
			echo " ";
		} else {
			echo "*";
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