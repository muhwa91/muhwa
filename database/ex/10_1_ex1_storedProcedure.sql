-- 1 스토어드 프로시저(stored Procedure)
-- 일련의 쿼리를 모아 마치 하나의 함수처럼 실행하기 위한 쿼리의 집합

-- 2 스토어드 프로시저 장점
-- 하나의 요청으로 여러 sql문을 실행하여, 네트워크에 대한 부하 감소
-- 미리 구문 분석 및 내부 중간 코드로 변환을 끝내야 하므로 처리 시간 감소
-- 데이터베이트 트리거와 결합하여 복잡한 규칙에 의한 데이터의 참조무결성 유지가능

-- 3 스토어드 프로시저 단점
-- 사양 변경 시 외부 응용 프로그램과 함께 프로시저의 정의 변경 필요

-- 
-- DELIMITER $$
-- CREATE PROCEDURE test()
-- BEGIN 
-- 		SELECT emp.*
-- 		,tit.title
-- 		FROM employees emp
-- 		JOIN titles tit
-- 			ON emp.emp_no = tit.emp_no
-- 		AND tit.to_date >= NOW();
-- END $$
-- DELIMITER;

-- CALL test();
-- 
SHOW procedure STATUS;

DROP PROCEDURE test;