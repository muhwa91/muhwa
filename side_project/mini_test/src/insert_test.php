<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");//웹서버root
define("FILE_HEADER", ROOT."header_test.php");//헤더 패스
require_once(ROOT."lib/lib_db_test.php");// DB관련 라이브러리

// post로 request가 있을 때 처리
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 확인
if($http_method === "POST") {
	try {
		$arr_post = $_POST;
		$conn = null; // DB Connection 변수
		
		// DB 접속
		if(!mini_test_db_conn($conn)) {
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
		header("Location: list_test.php");
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
	<link rel="stylesheet" href="/mini_test/src/css/common_test.css">
	<title>작성 페이지</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Orbit&display=swap" rel="stylesheet">
</head>
<body>
<?php
	require_once(FILE_HEADER);
?>	
	<div class="container">
		<form action="" method="post">
			<div class="container1">
				<br>
				<label for="title">제 목</label>
				<input type="text" class = 'textarea1' name="title" id="title" 
					maxlength="20" placeholder="20자 제한">
				<br><br>
				<label for="content">내 용</label>
				<textarea class = 'textarea2' name="content" id="content" cols="25" rows="10"
				placeholder="내용을 입력해주세요."></textarea>
			</div>
			<br>
			<div class="container2">
				<button class="w-btn w-btn-gray" type="submit">작 성</button>
				<button class="w-btn w-btn-gray" onclick="location.href=/mini_test/src/list_test.php">취 소</button>
				<button class="w-btn w-btn-gray" type="reset">초기화</button>
			</div>
		</form>
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