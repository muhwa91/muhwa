<?php
// 몇개일지 모르는 숫자를 다 더해주는 함수 만들기

function my_add(...$item) {
    $total=0;
    foreach ($item as $val) {
        $total = $total + $val;
    }
    return $total;
}
    

echo my_add(1, 2, 3, 4, 5);


?>