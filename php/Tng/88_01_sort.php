<?php
//버블 정렬
$arr = [5, 3, 34, 2, 6, 7, 12];
$last_idx_arr = count($arr) -1 ;
for($cnt = 0; $cnt <= $last_idx_arr; $cnt++) {
    for($idx = 0; $idx <= $last_idx_arr - $cnt -1; $idx++) {
        if( $arr[$idx] > $arr[$idx + 1]) {
            $tmp = $arr[$idx];
            $arr[$idx] = $arr[$idx + 1];
            $arr[$idx + 1] =$tmp;
        }
    }
}



print_r($arr);

// $arr2 = [3, 2, 1];

// $tmp = $arr2[0];
// $arr2[0] = $arr2[1];
// $arr2[1] = $tmp;

// print_r($arr2);