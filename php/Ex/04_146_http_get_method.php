<?php
// GET Method
// https://www.google.com/search?q=%EC%97%90%EC%BD%94%ED%94%84%EB%A1%9C&sca_esv=567110025


// URL의 구조
// http://localhost/mini_board/src/list.php/?page=2&num=10
// https:// : 프로토콜-통신을 하기 위한 규약, 약속, 규칙
// localhost : 도메인-접속하고자 하는 서버의 ip 또는 별칭
// mini~php : 패스(path)-실행 시키고자 하는 처리의 주소
// ?page~10 : 쿼리스트림 or 파라미터-Get Method로 통신할 때 유저가 보내주는 데이터

print_r($_GET);

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<a href="04_146_http_get_method.php/?page=1&num=10">test</a>
</body>
</html>







