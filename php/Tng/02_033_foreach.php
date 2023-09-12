<?php

// ID만 출력
// ID List
// meerkat1
// meerkat2
// meerkat3
$arr = [
    [
        "id" => "meerkat1"
        ,"pw" => "php504"
    ]
    ,[
        "id" => "meerkat2"
        ,"pw" => "php504"
    ]
    ,[
        "id" => "meerkat3"
        ,"pw" => "php504"
    ]
];

echo "ID list\n";

foreach($arr as $item) {
    echo $item["id"]."\n";
}









?>