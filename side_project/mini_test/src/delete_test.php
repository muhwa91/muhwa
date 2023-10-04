<?php
// 1 설정 정보
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");//웹서버root
define("FILE_HEADER", ROOT."header_test.php");//헤더 패스
require_once(ROOT."lib/lib_db_test.php");// DB관련 라이브러리

$arr_err_msg = []; // 에러 메세지 저장용

try {
	// 2 DB Connect
	// 2-1 connetion 함수 호출
    $conn = null; // PDO 객체 변수

	if(!mini_test_db_conn($conn)) {
		// 2-2 예외 처리
		throw new Exception("DB Error : PDO Instance");
	}

	// Method 획득
	$http_method = $_SERVER["REQUEST_METHOD"];

	if($http_method === "GET") {
		// 3-1 GET일 경우(상세페이지 삭제 버튼 클릭)
		// 3-1-1 파라미터에서 id, page 획득
		$id = isset($_GET["id"]) ? $_GET["id"] : "";
		$page = isset($_GET["page"]) ? $_GET["page"] : "";

		if($id === "") {
			$arr_err_msg[] = "Parameter Error : id";
		}
		if($page === "") {
			$arr_err_msg[] = "Parameter Error : page";
		}
		if(count($arr_err_msg) >= 1) {
			throw new Exception(implode("<br>", $arr_err_msg));
		}
		// implode 배열을 문자열로 바꿔주는 함수
		// 3-1-2 게시글 정보 획득

        $arr_param = [
            "id" => $id
        ];
        $result=db_select_boards_id($conn, $arr_param);

		// 3-1-3 예외 처리
		if($result === false) {
			throw new Exception("DB Error : Select id");
		} else if(!(count($result) === 1)) {
			throw new Exception("DB Error : Select id Count");
		}
		$item = $result[0];

	} else {
		// 3-2 POST일 경우(상세페이지 동의 버튼 클릭)
		// 3-2-1 파라미터에서 id 획득
		$id = isset($_POST["id"]) ? $_POST["id"] : "";		
		if($id === "") {
			$arr_err_msg[] = "Parameter Error : id";
		}		
		if(count($arr_err_msg) >= 1) {
			throw new Exception(implode("<br>", $arr_err_msg));
		}

		// 3-2-2 Transaction 시작
		$conn->beginTransaction();

		// 3-2-3 게시글 정보 삭제
		$arr_param = [
			"id" => $id
		];

		// 3-2-3 예외 처리
		if(!db_delete_boards_id($conn, $arr_param)) {
			throw new Exception("DB Error : Delete Boards id");
		}

		$conn->commit(); // commit
		header("Location: list_test.php"); //리스트 페이지로 이동
		exit; // 처리종료
	}
} catch(Exception $e) {
	// POST일 경우에만 rollback
	if($http_method === "POST") {
		$conn->rollBack();
	}
	echo $e->getMessage(); // 에러 메세지 출력
	exit; // 처리종료
} finally {
	db_destroy_conn($conn);
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_test/src/css/common_test.css">
	<title>삭제 페이지</title>
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
			<div class="delete_table">
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
				<caption>
				삭제하면 복구가 불가능합니다.
				<br>
				정말 삭제 하시겠습니까?
			</caption>	
			</div>
		</div>
		<br>			
		<div class="container2">
			<form action="/mini_test/src/delete_test.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<button class="w-btn w-btn-gray" type="submit">삭 제</button>
				<button class="w-btn w-btn-gray" onclick="location.href='/mini_test/src/detail_test.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>'">취 소</button>
			</form>
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