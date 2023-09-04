-- delete의 기본구조
-- delete from 테이블명
-- where 조건
-- where 조건을 적지 않을 경우 모든 레코드삭제
-- 실수 방지위해 where절 먼저 작성하고 delete from절 작성

-- INSERT INTO departments (
-- 	dept_no
-- 	,dept_name
-- )
-- VALUES (
-- 	'd010'
-- 	,'new'
-- );


DELETE FROM departments
WHERE dept_no = 'd010';


SELECT * FROM departments;

-- 사원정보 테이블에서 사원번호 500001이상인 사원의 데이터 모두 삭제
DELETE FROM employees
WHERE emp_no >= 500001;

SELECT * FROM employees ORDER BY emp_no DESC LIMIT 5;









