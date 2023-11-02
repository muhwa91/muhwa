<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/view/css/common.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>자유게시판 페이지</title>
</head>
<body class="vh-100">
	<?php require_once("view/inc/header.php"); ?>
	<div class="text-center mt-5 mb-5">
		<h1>자유게시판</h1>
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
		<div class="card">
			<img src="/view/img/20171224_182048.png" class="card-img-top" alt="img">
			<div class="card-body">
			  <h5 class="card-title">나는야 꼬부기</h5>
			  <p class="card-text">꼬북꼬북</p>
			  <button id="btnDetail" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>
			</div>
		</div>
		<div class="card">
			<img src="/view/img/20171224_182048.png" class="card-img-top" alt="img">
			<div class="card-body">
			  <h5 class="card-title">배고파요</h5>
			  <p class="card-text">밥밥밥</p>
			  <button id="btnDetail" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>
			</div>
		</div>
		<div class="card">
			<img src="/view/img/20171224_182048.png" class="card-img-top" alt="img">
			<div class="card-body">
			  <h5 class="card-title">추워요</h5>
			  <p class="card-text">덜덜덜</p>
			  <button id="btnDetail" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>
			</div>
		</div>
		<div class="card">
			<img src="/view/img/20171224_182048.png" class="card-img-top" alt="img">
			<div class="card-body">
			  <h5 class="card-title">더워요</h5>
			  <p class="card-text">땀땀땀</p>
			  <button id="btnDetail" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>
			</div>
		</div>
		<div class="card">
			<img src="/view/img/20171224_182048.png" class="card-img-top" alt="img">
			<div class="card-body">
			  <h5 class="card-title">잠와요</h5>
			  <p class="card-text">쿨쿨쿨</p>
			  <button id="btnDetail" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>
			</div>
		</div>		
	</main>

	<!-- Button trigger modal -->
	
  
  <!-- 상세 Modal -->
	<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">아니 내 연습장 표지 어디갔는데</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<span>이럴거면 a4쓰지 왜 연습장 쓰냐고</span>
					<img src="/view/img/20171224_182048.png" alt="">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
				</div>
			</div>
		</div>
	</div>

	  <!-- 작성 Modal -->
	<div class="modal fade" id="modalInsert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="">
					<div class="modal-header">
						<input type="text" class="form-control" placeholder="제목 적어라ㅡㅡ">
					</div>
					<div class="modal-body">
						<textarea class="form-control" cols="30" rows="10" placeholder="내용 적어라ㅡㅡ"></textarea>
						<br><br>
						<input type="file" accept="image/*">
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