-- update의 기본구조
-- update 테이블명
-- set(컬럼1=값1, 컬럼2=값2)
-- where 조건
-- **추가설명 : 조건을 적지않을 경우 모든 레코드 수정
-- 실수를 방지하기 위해 where절을 먼저 작성하고 set절을 작성

UPDATE titles
SET 
	title = 'CEO'
WHERE emp_no = 500000;

SELECT * FROM titles WHERE emp_no = 500000;

-- commit 하고나면 rollback을 해도 돌아가지 않음
-- set에서 where절 꼭 쓰기 (where절 부터 먼저 적는 습관)
-- where절 안적으면 모든 직급 CEO로 적용됨

-- 500000번 사원의 직급을 'staff', 연봉을 '25000'

UPDATE titles
SET 
	title = 'Staff'
WHERE emp_no = 500000;


UPDATE salaries
SET 
	salary = '25000'
WHERE emp_no = 500000;

SELECT * FROM titles WHERE emp_no = 500000;
SELECT * FROM salaries WHERE emp_no = 500000;