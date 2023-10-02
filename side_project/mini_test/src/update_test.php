<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");//웹서버root
define("FILE_HEADER", ROOT."header_test.php");//헤더 패스
define("ERROR_MSG_PARAM", "Parameter Error : %s"); // 파라미터 에러 메세지
require_once(ROOT."lib/lib_db_test.php");// DB관련 라이브러리

$conn = null; // DB 연결용 변수
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 확인
$arr_err_msg = []; // 에러메세지 저장용

try {
    // DB 연결
	if(!mini_test_db_conn($conn)) {
		// DB Instance 에러
		throw new Exception("DB Error : PDO Instance");
	}
	
	if($http_method === "GET") {
		// GET Method의 경우
		
        // 파라미터 획득
        $id = isset($_GET["id"]) ? $_GET["id"] : $_POST["id"]; // id 셋팅(str 형태로 데이터 넘어옴)
        $page = isset($_GET["page"]) ? $_GET["page"] : $_POST["page"]; // page 셋팅
        
        if($id === "") {
			$arr_err_msg[] = sprintf("ERROR_MSG_PARAM", "id");
		}
		if($page === "") {
			$arr_err_msg[] = sprintf("ERROR_MSG_PARAM", "page");
		}
		if(count($arr_err_msg) >= 1) {
			throw new Exception(implode("<br>", $arr_err_msg));
		}

        // 게시글 데이터 조회를 위한 파라미터 셋팅
        $arr_param = [
			"id" => $id
		];

		// 게시글 데이터 조회
		$result = db_select_boards_id($conn, $arr_param);
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
        $id = isset($_POST["id"]) ? $_POST["id"] : ""; // id 셋팅(str 형태로 데이터 넘어옴)
        $page = isset($_POST["page"]) ? $_POST["page"] : ""; // page 셋팅
        $title = isset($_POST["title"]) ? $_POST["title"] : ""; // title 셋팅 
        $content = isset($_POST["content"]) ? $_POST["content"] : ""; // title 셋팅 

        if($id === "") {
			$arr_err_msg[] = sprintf("ERROR_MSG_PARAM", "id");
		}
		if($page === "") {
			$arr_err_msg[] = sprintf("ERROR_MSG_PARAM", "page");
		}
		if($title === "") {
			$arr_err_msg[] = sprintf("ERROR_MSG_PARAM", "title");
		}
		if($content === "") {
			$arr_err_msg[] = sprintf("ERROR_MSG_PARAM", "content");
		}
		if(count($arr_err_msg) >= 1) {
			throw new Exception(implode("<br>", $arr_err_msg));
		}

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
		header("Location: detail_test.php/?id={$id}&page={$page}"); // 디테일 페이지로 이동
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
    <link rel="stylesheet" href="/mini_test/src/css/common_test.css">
    <title>수정 페이지</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Orbit&display=swap" rel="stylesheet">
</head>
<body>
<?php
	require_once(FILE_HEADER);
?>
    <div class="container">
        <form action="/mini_test/src/update_test.php" method="post">
            <div class="container1">
                <div class="update_table">
                    <table>
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="hidden" name="page" value="<?php echo $page ?>">
                        <tr>
                            <th>번호</th>
                            <td><?php echo $item["id"]; ?></td>
                        </tr>
                        <tr>
                            <th>제목</th>
                            <td>
                                <input type="text" class = 'textarea3' name="title" id= "title" maxlength="20" 
                                placeholder="20자 제한" value="<?php echo $item["title"] ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>내용</th>
                            <td>
                            <textarea class = 'textarea4' name="content" id="content" cols="30" rows="10"
                            placeholder="내용을 입력해주세요."><?php echo $item["content"] ?></textarea>
                            </td>
                        </tr>			
                    </table>
                </div>
            </div>
        <div class="container2">
			<button class="w-btn w-btn-gray" type="submit">수 정</button>
			<button class="w-btn w-btn-gray" onclick="location.href='/mini_test/src/detail_test.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>'";>취 소</button>
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









