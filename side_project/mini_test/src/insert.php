<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>작성 페이지</title>
</head>
<body>
	
	<main>
		<form action="" method="post">
			<label for="title">제 목</label>
			<input type="text" class = 'textarea1' name="title" id="title" 
				maxlength="20" placeholder="20자 제한">
			<br>
			<label for="content">내 용</label>
			<textarea class = 'textarea2' name="content" id="content" cols="30" rows="10"
			placeholder="내용을 입력해주세요."></textarea>
			<button class="w-btn w-btn-gray" type="submit">작 성</button>
			<button class="w-btn w-btn-gray" type="">취 소</button>
			<button class="w-btn w-btn-gray" type="">재작성</button>
		</form>
	</main>
</body>
</html>