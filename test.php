<?php

// 19단
$file = fopen("test.txt", "w"); // test.txt 파일생성 후 w 쓰기 권한 부여하고 파일 오픈
for($a=19; $a<=19; $a++) {	
	for($b=1; $b<=9; $b++) {
		$c = $a*$b;
		$txt = $a.' X '.$b. " = " .$c."\n";
		fwrite($file, $txt); // 파일 작성	
	}	
}
fclose($file); // 파일 닫기





?>