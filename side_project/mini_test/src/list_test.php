<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/"); // 웹서버 root 패스 생성
define("FILE_HEADER", ROOT."header_test.php"); // header 패스
define("ERROR_MSG_PARAM", "Parameter Error : %s"); // 파라미터 에러 메세지
require_once(ROOT."lib/lib_db_test.php");

$conn = null; // DB Connection 변수
$list_cnt = 5; // 한 페이지 최대 표시 수
$page_num = 1; // 페이지 번호 초기화
$arr_err_msg = []; // 에러 메세지 저장용

try {
	// DB 접속
	if(!mini_test_db_conn($conn)) {
		// DB Instance 에러
		throw new Exception("DB Error : PDO Instance"); // 강제 예외발생 : DB Instance
	}
	// ---------------
	// 페이징 처리
	// ---------------
	// 파라미터 획득
	$page = isset($_GET["page"]) ? $_GET["page"] : "1"; // page 셋팅
	if($page === "") {
		$arr_err_msg[] = sprintf("ERROR_MSG_PARAM", "page");
	}
	if(count($arr_err_msg) >= 1) {
		throw new Exception(implode("<br>", $arr_err_msg));
	}

	// 총 게시글 수 검색
	$boards_cnt = db_select_boards_cnt($conn);
	if($boards_cnt === false) {
		throw new Exception("DB Error : SELECT Boards Count"); // 강제 예외발생 : SELECT Count
	}

	$max_page_num = ceil($boards_cnt / $list_cnt); // 최대 페이지 수

	if(isset($_GET["page"])) {
		$page_num = $_GET["page"]; //유저가 보내온 페이지 셋팅
	}
	$offset = ($page_num - 1) * $list_cnt; // 오프셋 계산

	// 이전버튼
	$prev_page_num = $page_num - 1 > 0 ? $page_num - 1 : 1;

	// 다음버튼
	$next_page_num = $page_num + 1 > $max_page_num ? $max_page_num : $page_num + 1;

	// DB 조회 시 사용할 데이터 배열
	$arr_param = [
		"list_cnt" => $list_cnt
		,"offset" => $offset
	];

	// 게시글 리스트 조회
	$result = db_select_boards_paging($conn, $arr_param);
	// 게시글 조회 예외처리
	if($result === false) {
		// 게시글 조회 에러
		var_dump($result);
		throw new Exception("DB Error : Select boards Paging");
	}

} catch(Exception $e) {
	// echo $e->getMessage(); // 예외발생 메세지 출력 //v002 del
	header("Location: error_test.php/?err_msg={$e->getMessage()}");	//v002 add
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
	<title>리스트 페이지</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Orbit&display=swap" rel="stylesheet">
</head>
<body>
<?php
	require_once(FILE_HEADER);
?>
	<div class="container">
		<div class="list_table">
			<table>
				<colgroup>
					<col width="10%">
					<col width="55%">
					<col width="35%">
				</colgroup>
				<tr>
					<th>번호</th>
					<th>제목</th>
					<th>등록일</th>
				</tr>
				<?php
					// 리스트 생성
					foreach($result as $item) {
				?>
				<tr>
					<td><?php echo $item["id"]; ?></td>
					<td>
						<a href="/mini_test/src/detail_test.php?id=<?php echo $item["id"]; ?>&page=<?php echo $page_num; ?>">
						<?php echo $item["title"]; ?>
						</a>
					</td>
					<td>
						<?php echo $item["create_at"]; ?>
					</td>
				</tr>
				<?php	
				} 
				?>
			</table>
		</div>
		<br>
		<div class="list_num">
			<a href="http://localhost/mini_test/src/list_test.php/?page=<?php echo $prev_page_num ?>"><<</a>
				<?php
				for($i = 1; $i <= $max_page_num; $i++) {
				// 현재 페이지에 활성화
				$str = (int)$page_num === $i ? "main_num" : "main_num1";
				?>
			<a id="<?php echo $str;?>" href="http://localhost/mini_test/src/list_test.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
				<?php
				}
				?>
				<!-- 다음 페이지 -->
			<a href="http://localhost/mini_test/src/list_test.php/?page=<?php echo $next_page_num ?>">>></a>
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