<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");//웹서버root
define("FILE_HEADER", ROOT."header.php");//헤더 패스
require_once(ROOT."lib/lib_db.php");// DB관련 라이브러리


$conn = null; // DB 연결용 변수
$page = isset($_GET["page"]) ? $_GET["page"] : $_POST["page"]; // page 셋팅
$id = isset($_GET["id"]) ? $_GET["id"] : $_POST["id"]; // id 셋팅(str 형태로 데이터 넘어옴)
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 확인
try {
	if(!my_db_conn($conn)) {
		// DB Instance 에러
		throw new Exception("DB Error : PDO Instance");
	}

	
	if($http_method === "GET") {
		// GET Method의 경우
		// 게시글 데이터 조회를 위한 파라미터 셋팅
		// $arr_param = [
		// 	"id" => $id
		// ];

		// 게시글 데이터 조회
		$result = db_select_boards_id($conn, $id);
		// 게시글 조회 예외처리
		if($result === false) {
			throw new Exception("DB Error : PDO Select_id");
		} else if(!(count($result) === 1)) {
			// 게시글 조회 count 에러
			throw new Exception("DB Error : PDO Select_id Count, ".count($result));
		}
		$item =$result[0];

	} else {
		// POST Method의 경우
		// 게시글 수정을 위해 파라미터 셋팅

		$arr_param = [
			"id" => $id
			,"title" => $_POST["title"]
			,"content" => $_POST["content"]
		];

		// 게시글 수정 처리
		$conn->beginTransaction(); // 트랜잭션 시작

		if(!db_update_boards_id($conn, $arr_param)) {
			throw new Exception("DB Error : Update_Boards_id");
		}
		$conn->commit(); // commit
		header("Location: detail.php/?id={$id}&page={$page}"); // 디테일 페이지로 이동
		exit;
	}
} catch(Exception $e){
	if($http_method === "POST") {
		$conn->rollBack(); // rollback
	}
	echo $e->getMessage(); // 예외 메세지 출력
	exit; // 처리 종료
} finally {
	db_destroy_conn($conn);
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
	<title>수정 페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
	<main>
	<form action="/mini_board/src/update.php" method="post">
		<table>
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<input type="hidden" name="page" value="<?php echo $page ?>">
			<tr>
				<th>글 번호</th>
				<td><?php echo $item["id"]; ?></td>
			</tr>
			<tr>
				<th>제목</th>
				<td>
					<input type="text" name="title" value="<?php echo $item["title"] ?>">
				</td>
			</tr>
			<tr>
				<th>내용</th>
				<td>
					<textarea name="content" id="content" cols="30" rows="10"><?php echo $item["content"] ?></textarea>
				</td>
			</tr>			
		</table>
		<div class="content">
			<button class="w-btn w-btn-gray" type="submit">수정확인</button>
			<button class="w-btn w-btn-gray" onclick="location.href='/mini_board/src/detail.php/?id=<?php echo $id;?>&page=<?php echo $page;?>'";>수정취소</button>
		</div>
	</form>		
	</main>
</body>
</html>