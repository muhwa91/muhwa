<?php

// $i = 0;
// while($i <= 2) {
//     echo "{$i}\n";    
//     $i++;
// }
// 0
// 1
// 2

// 구구단 2단 출력

// $a = 2;
// $b = 1;
// echo "{$a}단\n";
// while($b <= 9) {
//     $c = $a*$b;
//     echo "{$a} X {$b} = {$c}\n";
//     $b++;
// }

$i = 1;
echo "2단\n";
while(true) {
    $mul = 2 * $i;
    echo "2 X {$i} = {$mul}\n";
    if($i === 9) {
        break;
    }
    $i++;
}

// do ~ while : 무조건 한번은 실행하고, 그 후부터 조건이 참이면 루프하는 문법
// $i = 0;
// do {
//     echo "ttt";
// }
// while($i < 0);
// 무조건 한번 실행 하여 ttt 한번 출력하고 그 후에 출력X



?>