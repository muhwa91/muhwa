<?php
//post method
// request할 때의 데이터를 외부에서 볼 수 없음
print_r($_POST);



?>


<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action=".04_146_http_post_method.php" method="post">
		<fieldset>
			<label for="ID">ID : </label>
			<input type="text" id="id" name="id"> 
			<!-- name 키, 입력 값이 벨류 -->
			<br>
			<label for="pw">PW : </label>
			<input type="text" id="pw" name="pw">
			<br>
			<button type="submit">전송</button>
		</fieldset>
	</form>
</body>
</html>