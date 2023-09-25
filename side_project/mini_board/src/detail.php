<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");//웹서버root
define("FILE_HEADER", ROOT."header.php");//헤더 패스
require_once(ROOT."lib/lib_db.php");// DB관련 라이브러리

$id = ""; // 게시글 id
$conn = null; // DB Connect

try {
	//id 확인
	// DB 연결
	if(!my_db_conn($conn)) {
		// DB Instance 에러
		throw new Exception("DB Error : PDO Instance");
	}

	if(!isset($_GET["id"]) || $_GET["id"] ===""){
		throw new Exception("Parameter ERROR : NO id"); // 강제 예외 발생
	}

	$id = $_GET["id"]; // id 셋팅
	$page = (int)$_GET["page"]; // page 셋팅

	// 게시글 데이터 조회
	$result=db_select_boards_id($conn, $id);

	// 게시글 조회 예외처리
	if($result === false) {
		// 게시글 조회 에러
		throw new Exception("DB Error : PDO Select_id, {}");
	} else if(!(count($result) === 1)) {
		// 게시글 조회 count 에러
		throw new Exception("DB Error : PDO Select_id count, ".count($result));
	}
	
	// var_dump($result);
	$item = $result[0];
} catch(Exception $e) {
	echo $e->getMessage(); // 예외 메세지 출력
	exit; // 처리 종료
} finally {
	db_destroy_conn($conn);
}


$input_id = $_GET["id"];


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
	<title>상세 페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>	
	<main>
		<div class="form">
		<table>
			<tr>
				<th>글 번호</th>
				<td><?php echo $item["id"]; ?></td>
			</tr>
			<tr>
				<th>제목</th>
				<td><?php echo $item["title"]; ?></td>
			</tr>
			<tr>
				<th>내용</th>
				<td><?php echo $item["content"]; ?></td>
			</tr>
			<tr>
				<th>작성일자</th>
				<td><?php echo $item["create_at"]; ?></td>
			</tr>
		</table>
		<div class="content">
			<button class="w-btn w-btn-gray" onclick="location.href='/mini_board/src/update.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>'">수정페이지로</button>
			<button class="w-btn w-btn-gray" onclick="location.href='/mini_board/src/list.php/?page=<?php echo $page; ?>'";>취 소</button>
			<button class="w-btn w-btn-gray" type="">삭 제</button>
		</div>
		</div>
	</main>
</body>
</html>



