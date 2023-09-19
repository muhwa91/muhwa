<?php
try {
	// 예외상황이 발생할만한 소스코드 (처리하고 싶은 소스코드)
	// 보통 커밋은 try
	echo "Try 실행\n";

	throw new Exception("강제 예외 발생"); //7버전 부터는 throwable 사용

	echo "Try 종료\n";
} catch( Exception $e ) {
	// 예외상황 발생 시 실행
	// 보통 롤백은 catch
	echo "Catch 실행\n";
	echo $e->getMessage(),"\n";
} finally {
	// 어느 상황이든 무조건 실행
	echo "Finally 실행\n";
}