<?php
// *****
//  ****
//   ***
//    **
//     *

// $num_a=1;
// $num_b=5;
// while($num_a<=$num_b) {
//     $num_c=1;
//     $num_d=0;    
//     while($num_c-$num_d<=$num_b) {
//         echo "*"; 
//         $num_c++;       
//     }
//     while($num_d<$num_a) {
//         echo " ";
//         $num_d++;
//     }
//     echo "\n";
//     $num_a++;
// }

$num_a = 1;
$num_b = 5;

while ($num_a <= $num_b) {
    $num_c = 1;
    while ($num_c < $num_a) {
        echo " ";
        $num_c++;
    }
    $num_d = $num_b;
    while ($num_a <= $num_d) {
        echo "*";
        $num_d--;
    }
    echo "\n";
    $num_a++;
}





?>