<?php
	// print_r($_SERVER);//슈퍼 글로벌 변수는 _대문자로 이루어짐
	print_r($_GET);
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
	<form action="/99_03_edu.php" method="post">
		<label for="id">ID :</label>
		<input type="text" name="id" id="id">
		<br>
		<label for="pw">PW :</label>
		<input type="password" name="pw" id="pw">
		<input type="hidden" name="name" value="미어캣">
		<button type="submit">post</button>
	</form>
<!-- form에는 get post 메소드만 설정가능 -->
</body>
</html>