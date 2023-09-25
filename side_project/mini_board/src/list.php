<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");//웹서버root
define("FILE_HEADER", ROOT."header.php");//헤더 패스
require_once(ROOT."lib/lib_db.php");// DB관련 라이브러리
// var_dump($_SERVER);

$conn = null;
// DB접속
if(!my_db_conn($conn)) {
	echo "DB Error : PDO Instance";
	exit;
}


// 페이징 처리
$list_cnt = 5; // 한 페이지 최대 표시 수 
$page_num = 1; //페이지 번호 초기화
// 총 게시글 수 검색
// $boards_cnt = db_select_boards_cnt($conn);
// if($boards_cnt === false) {
// 	echo "DB Error : SELECT Count";
// 	exit;
// }
$max_page_num = ceil(db_select_boards_cnt($conn) / $list_cnt); // 최대 페이지 수 (ceil 반올림)

//GET method 확인
if(isset($_GET["page"])) {
	$page_num = $_GET["page"]; //유저가 보내온 페이지 셋팅
}
$offset = ($page_num - 1) * $list_cnt; // 오프셋 계산

//이전버튼 
$prev_page_num = $page_num - 1;
if($prev_page_num === 0) {
	$prev_page_num = 1;
}

//다음버튼
$next_page_num = $page_num + 1;
if($next_page_num > $max_page_num) {
	$next_page_num = $max_page_num;
}


//DB 조회시 사용할 데이터 배열
$arr_param = [
	"list_cnt" => $list_cnt
	,"offset" => $offset
];




// echo db_select_boards_cnt($conn);

//게시글 리스트 조회
$result = db_select_boards_paging($conn, $arr_param);
if(!$result) {
	echo "DB Error : SELECT boards";
	exit;
}


db_destroy_conn($conn); // db파기

// var_dump($result);
?>


<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
	<title>리스트 페이지</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Orbit&display=swap" rel="stylesheet">
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>	
	<main>
		<div class="post">
        	<a href="/mini_board/src/insert.php">
          	<span class="thin">Create</span>
			<span class="thick">Post</span></a>
      	</div>
		<div class="form">		
		<table>
			<colgroup>
				<col width="20%">
				<col width="50%">
				<col width="30%">
			</colgroup>
			<tr class="table-title">
				<th>번호</th>
				<th>제목</th>
				<th>작성일자</th>
			</tr>
			<?php
				// 리스트 생성
				foreach($result as $item) {
			?>
				<tr>
					<td><?php echo $item["id"]; ?></td>
					<td>
						<a href="/mini_board/src/detail.php?id=<?php echo $item["id"]; ?>&page=<?php echo $page_num; ?>">
							<?php echo $item["title"]; ?>
						</a>
					</td>
					<td><?php echo $item["create_at"]; ?></td>
				</tr>
			<?php	
				} 
			?>		
		</table>
		</div>
		<section>
			<div class="main_page">
				<a href="http://localhost/mini_board/src/list.php/?page=<?php echo $prev_page_num ?>"><</a>
				<?php
					for($i = 1; $i <= $max_page_num; $i++) {
					// 현재 페이지에 활성화
					$str = (int)$page_num === $i ? "main_num" : "main_num1";
					?>
					<a class="<?php echo $str;?>" href="http://localhost/mini_board/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
					<?php
					}
					?>
					<!-- 다음 페이지 -->
				<a href="http://localhost/mini_board/src/list.php/?page=<?php echo $next_page_num ?>">></a>
			</div>
		</section>		
	</main>
</body>
</html>