<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/view/css/common.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title><?php echo $this->titleBoardName ?></title>
</head>
<body class="vh-100">
	<?php require_once("view/inc/header.php"); ?>
	<div class="text-center mt-5 mb-5">
		<h1><?php echo $this->titleBoardName ?></h1>
		<svg xmlns="http://www.w3.org/2000/svg" 
		width="40" height="40" fill="currentColor" 
		class="bi bi-pencil-fill" viewBox="0 0 16 16"
		data-bs-toggle="modal" data-bs-target="#modalInsert">
			<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
		  </svg>		
	</div>



	<!-- 모달 테스트
	<div id="modal" class="displayNone">
		<div id="modalW"></div>
		<button id="btnModalClose">닫기</button>
	</div> -->


	<main>
		<?php
			foreach ($this->arrBoardInfo as $item) {
		?>		
			<div class="card" id="card <?php $item["id"]; ?>">
				<img src="<?php echo isset($item["b_img"]) ? "/"._PATH_USERIMG.$item["b_img"] : ""; ?>" class="card-img-top" alt="사진음슴">
				<div class="card-body">
				<h5 class="card-title"><?php echo $item["b_title"]; ?></h5>
				<p class="card-text"><?php echo mb_substr($item["b_content"], 0, 10)."..."; ?></p>
				<!-- <button id="btnDetail" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button> -->
				<button class="btn btn-primary" onclick="openDetail(<?php echo $item['id'] ?>); return false;">상세</button>
				</div>
			</div>	
		<?php
			}
		?>	
	</main>

	<!-- Button trigger modal -->
	
  
  <!-- 상세 Modal -->
	<div class="modal fade" id="modalDetail" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="b_title">아니 내 연습장 표지 어디갔는데</h5>
					<button type="button" onclick="closeDetailModal(); return false;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p>작성일 : <span id="create_at"></span></p>
					<p>수정일 : <span id="updated_at"></span></p>
					<span id="b_content">이럴거면 a4쓰지 왜 연습장 쓰냐고</span>
					<img id="b_img" src="" alt="">
				</div>
				<div class="modal-footer">
					<button type="button" onclick="closeDetailModal(); return false;" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
				</div>
			</div>
		</div>
	</div>

	  <!-- 작성 Modal -->
	<div class="modal fade" id="modalInsert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="/board/add" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="b_type" value="<?php echo $this->boardType; ?>">
					<div class="modal-header">
						<input type="text" name="b_title" class="form-control" placeholder="제목 적어라ㅡㅡ">
					</div>
					<div class="modal-body">
						<textarea name="b_content" class="form-control" cols="30" rows="10" placeholder="내용 적어라ㅡㅡ"></textarea>
						<br><br>
						<input type="file" name="b_img" accept="image/*">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
						<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">작성</button>
					</div>
				</form>
			</div>
		</div>		
	</div>

	<footer class="fixed-bottom bg-primary text-light text-center p-3">
		저작권
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="/view/js/common.js"></script>
</body>
</html>