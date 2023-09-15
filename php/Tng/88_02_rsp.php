<?php

// $in_str = fgets(STDIN);

// echo "입력값 : {$in_str}";


// $rsp_arr = [0, 1, 2];
// $arr = [rand(0, 2)];

// if( $com === 0) { //컴퓨터 바위
//     if( $user === 0) { //유저 바위
//         echo "무승부";
//     }
//     else if( $user === 1) { //유저 가위
//         echo "패배";
//     }
//     else {
//         echo "승리"; //유저 보
//     }
// }
// else if( $com === 1) { //컴퓨터 가위
//     if( $user === 0) { //유저 바위
//         echo "승리";
//     }
//     else if( $user === 1) { //유저 가위
//         echo "무승부";
//     }
//     else {
//         echo "패배"; //유저 보
//     }
// }
// else if( $com === 2) { //컴퓨터 보
    
//     if( $user === 0) { //유저 바위
//         echo "패배";
//     }
//     else if( $user === 1) { //유저 가위
//         echo "승리";
//     }
//     else {
//         echo "무승부"; //유저 보
//     }
// }


for ($a = 1; $a <= 9; $a++){
    echo "{$a} 단 \n";
    for ($b = 1; $b <= 9; $b++){
    $mul = $a * $b;
    echo "$a X $b = {$mul} \n";
    }
}



