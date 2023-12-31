<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");//웹서버root
define("FILE_HEADER", ROOT."header.php");//헤더 패스
require_once(ROOT."lib/lib_db.php");// DB관련 라이브러리

// post로 request가 있을 때 처리
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 확인
if($http_method === "POST") {
	try {
		$arr_post = $_POST;
		$conn = null; // DB Connection 변수
		
		// DB 접속
		if(!my_db_conn($conn)) {
			// DB Instance 에러
			throw new Exception("DB Error : PDO Instance");		
		}
		$conn->beginTransaction(); // 트랜잭션 시작
		// insert		
		if(!db_insert_boards($conn, $arr_post)) {
			// DB Instance 에러
			throw new Exception("DB Error : Insert Boards");		
		}
		$conn->commit(); // 모든 처리 완료 시 커밋		

		// 리스트 페이지로 이동
		header("Location: list.php");
		exit;
	} catch(Exception $e) {
		$conn->rollback();
		echo $e->getMessage(); // Exception 메세지 출력
		exit;
	} finally {
		db_destroy_conn($conn); // DB파기
	}	
}

?>


<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Orbit&display=swap" rel="stylesheet">
	<title>작성 페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
		?>	
		<br><br>
		<div class="form">
		<form action="/mini_board/src/insert.php" method="post">
			<div class="container">
				<label for="title">제 목</label>
				<input type="text" class = 'textarea1' name="title" id="title" 
				maxlength="35" placeholder="30자 제한">
				<br>
				<label for="content">내 용</label>
				<textarea class = 'textarea2' name="content" id="content" cols="50" rows="10"
				placeholder="내용을 입력해주세요."></textarea>
			</div>
			<button class="w-btn w-btn-gray" type="submit">작 성</button>
			<button class="w-btn w-btn-gray" onclick="location.href=/mini_board/src/list.php">취 소</button>
		</form>
		</div>
</body>
</html>