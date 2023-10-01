<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");//웹서버root
define("FILE_HEADER", ROOT."header_test.php");//헤더 패스
require_once(ROOT."lib/lib_db_test.php");// DB관련 라이브러리

$id = ""; // 게시글 id
$conn = null; // DB Connect
$arr_err_msg = []; // 에러 메세지 저장용

try {
    // DB 연결
	if(!mini_test_db_conn($conn)) {
		// DB Instance 에러
		throw new Exception("DB Error : PDO Instance");
	}

    // 파라미터 획득
	$id = isset($_GET["id"]) ? $_GET["id"] : ""; // id 셋팅
	$page = isset($_GET["page"]) ? $_GET["page"] : ""; // page 셋팅    
	if($id === "") {
		$arr_err_msg[] = sprintf("ERROR_MSG_id", "id");
	}
	if($page === "") {
		$arr_err_msg[] = sprintf("ERROR_MSG_page", "page");
	}
	if(count($arr_err_msg) >= 1) {
		throw new Exception(implode("<br>", $arr_err_msg));
	}

	// 게시글 데이터 조회
    $arr_param = [
        "id" => $id
    ];
	$result=db_select_boards_id($conn, $arr_param);

	// 게시글 조회 예외처리
	if($result === false) {
		// 게시글 조회 에러
		throw new Exception("DB Error : PDO Select_id");
	} else if(!(count($result) === 1)) {
		// 게시글 조회 count 에러
		throw new Exception("DB Error : PDO Select_id count");
	}
	$item = $result[0];
} catch(Exception $e) {
	echo $e->getMessage(); // 예외 메세지 출력
	exit; // 처리 종료
} finally {
	db_destroy_conn($conn); // DB 파기
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_test/src/css/common_test.css">
    <title>상세 페이지</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Orbit&display=swap" rel="stylesheet">
</head>
<body>
<?php
	require_once(FILE_HEADER);
?>
    <div class="container">     
        <div class="container1">
			<div class="detail_table">
				<table>
					<tr>
						<th>번호</th>
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
						<th>등록일</th>
						<td><?php echo $item["create_at"]; ?></td>
					</tr>            
				</table>
			</div>
        </div>
        <br>
		<div class="container2">
			<button class="w-btn w-btn-gray" onclick="location.href='/mini_test/src/update_test.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>'">수 정</button>
			<button class="w-btn w-btn-gray" onclick="location.href='/mini_test/src/list_test.php/?page=<?php echo $page; ?>'";>취 소</button>
			<button class="w-btn w-btn-gray" onclick="location.href='/mini_test/src/delete_test.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>'">삭 제</button>
		</div>            
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