-- view : 가상의 테이블
-- 보안과 함께 사용자의 편의성을 높이기 위해 사용
-- 여러테이블을 조인할 시에 view 생성
-- 장점 : 복잡한 sql을 편리하게 조회할 수 있음
-- 단점 : index를 사용하지 못하기때문에 조회속도가 느림, view 자체에서 참고하는 테이블의 데이터 수정 불가

-- CREATE [OR REPLACE] VIEW 
-- AS
-- SELECT 문
-- ;
-- [or replace] : 기존의 뷰가 있을 경우 덮어쓰기

CREATE VIEW view_employed_emp
AS
	SELECT 
	emp.*
	,tit.title
	FROM employees emp
		JOIN titles tit
		ON emp.emp_no = tit.emp_no
		AND tit.to_date >= NOW()
;
SELECT * FROM view_employed_emp;
-- 현재 재직 중인 사원의 모든 정보