<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>home</title>
</head>
<body>
	<h1>집임</h1>
	<br><br>
	<form action="/home" method="POST">
		@csrf
		<!-- form 내에 최상단에 보통은 기재 -->
		<button type="submit">POST</button>
	</form>
	<br><br>
	<form action="/home" method="POST">
		@csrf
		@method('PUT')
		<!-- form get, post 처리를 하는데, 라라벨에서 @method('PUT')를 기재해주면 put 메소드로 처리함 -->
		<button type="submit">PUT</button>
	</form>
	<br><br>
	<form action="/home" method="POST">
		@csrf
		@method('DELETE')
		<!-- form get, post 처리를 하는데, 라라벨에서 @method('PUT')를 기재해주면 put 메소드로 처리함 -->
		<button type="submit">DELETE</button>
	</form>

</body>
</html>