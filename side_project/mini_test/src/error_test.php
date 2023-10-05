<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");//웹서버root
define("FILE_HEADER", ROOT."header_test.php");//헤더 패스
require_once(ROOT."lib/lib_db_test.php");// DB관련 라이브러리

$err_msg = isset($_GET["err_msg"]) ? $_GET["err_msg"] : "";

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_test/src/css/common_test.css">
	<title>에러 페이지</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Orbit&display=swap" rel="stylesheet">
</head>
<body>
<?php
	require_once(FILE_HEADER);
?>	
	<div class="container3">
		<br>
		<p>죄송합니다.</p>
		<p>요청하신 주소를 찾을 수 없습니다.</p>
		<p><?php echo $err_msg ?></p>
		<button class="w-btn w-btn-gray" type="button" onclick="location.href='/mini_test/src/list_test.php'">메인</button>
	</div>
	<footer>
		<div class="footer">
			<a href="#">시간이 있었는데</a> |
			<a href="#">없었습니다.</a>
		</div>
        <p>제작자 : 나<br>
			제작시간 : 12시간<br>
			권리 없음
		</p>
	</footer>
</body>
</html>