<?php

// 폴더(디렉토리) 만들기
// mkdir("../tng/testdir", 777)
// if(mkdir("../tng/testdir", 777)) {
//     echo "정상";
// } else {
//     echo "실패";
// }

// 폴더(디렉토리) 삭제
// rmdir("../tng/testdir");

// 파일열기
$file = fopen("zz.text", "r");
// 파일 쓰기
// $f_write = fwrite($file, "짜장면\n");
// 파일 읽기
while( $line = fgets($file) ) {
    echo $line;
}

// fclose($file);




?>