<?php
// session : 데이터를 웹서버에 저장, 쿠키보다 보안성과 속도 빠름
// ***주의사항***
// 개인정보, 민감한 정보는 되도록 저장하지 말아야 함


// session 시작
// session_name("login"); // 특정 세션명으로 시작하는 방법
// session_start();

// $_SESSION["green"] = "PHP";
// $_SESSION["green1"] = "JAVA";

// // 특정 세션 삭제
// unset($_SESSION["green"]);

// // 모든 세션 삭제
// session_destroy();


// print_r($_SESSION);



$arr = [
	[
		"emp_no" => 10001
		,"gender" => "F"
	]
	,[
		"emp_no" => 10002
		,"gender" => "M"
	]
];



// 남자인 경우에만 사원번호 출력
foreach($arr as $key => $item) {
	if($item["gender"]==="M"){
		echo $item["emp_no"];
	}
}
// 10002