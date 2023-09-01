-- SELECT [컬럼명] FROM [테이블명];
SELECT * FROM employees;
-- employees 에서 전체 검색
SELECT * FROM dept_emp;
SELECT first_name, last_name fROM employees;
SELECT emp_no, title FROM titles;

-- 컨트롤+스페이스 검색기능

-- SELECT [컬럼명] FROM [테이블명] where [쿼리 조건]; : 해당하는 조건만 테이블명>컬럼명 내에서 결과값 도출

-- [쿼리 조건]; : 컬럼명 [기호] 조건값
SELECT * from employees WHERE emp_no = 10009;
-- <=크거나 같음/>=작거나 같음/=같음 
SELECT * FROM employees WHERE first_name = 'Mary';
-- ex)마리 이름만 검색하려면 'mary'로 검색
SELECT * FROM employees WHERE birth_date < 19600101;
-- 생년월일 숫자 값으로 검색이 가능한 것은 mysql, maria db 만 가능함

-- and 연산자
SELECT * 
FROM employees 
WHERE birth_date <= 19700101 
  AND birth_date >= 19650101;
--   조건값 기준으로 19700101 이하, 19650101 이상
SELECT * 
FROM employees 
WHERE first_name = 'Mary'
  AND last_name = 'piazza';
--   대소문자 구분도 하고, 문장끝에는 ;를 꼭 붙이자

SELECT * 
FROM employees 
WHERE first_name = 'Mary'
  or last_name = 'piazza';

SELECT * 
FROM employees 
WHERE emp_no >=10005
  AND emp_no <= 10010;
--   10005이상 10010이하
SELECT * 
FROM employees 
WHERE emp_no BETWEEN 10005 AND 10010;
-- 10005이상 10010이하 동일 값/between은 결과값 도출이 느림. 연산자를 이용하자

SELECT * 
FROM employees 
WHERE emp_no = 10005 or emp_no = 10010;
-- 10005나 10010만
SELECT * 
FROM employees 
WHERE emp_no IN(10005, 10010);
-- 10005나 10010만/in은 결과값 도출이 느림.
SELECT * 
FROM employees
WHERE first_name LIKE('Ge%');
-- 이름이 Ge로 시작하는 사람만 검색
SELECT * 
FROM employees
WHERE first_name LIKE('%Ge');
-- 이름이 Ge로 끝나는 사람만 검색/like=%기준
SELECT * 
FROM employees
WHERE first_name LIKE('%Ge%');
-- 이름가운데 Ge가　들어가는　사람만　검색
SELECT *
FROM titles
WHERE title LIKE('%staff%');
-- title 테이블에서 title에 staff가 포함되어 있는 사람 검색
SELECT * 
FROM employees
WHERE first_name LIKE('___Ge');
-- _ge _개수만큼 ge가 포함되어 있는 사람 검색 ex)age


SELECT * FROM employees ORDER BY birth_date DESC;
-- order by 오름차순으로 정렬시켜줌
-- birth_date 오름차순으로 정렬
-- asc 생략(오름차순이 기본값으로 설정되어있음.)
-- birth_date asc 오름차순으로 정렬
-- birth_date desc 내림차순으로 정렬

SELECT * FROM employees ORDER BY birth_date, first_name;
-- birth_date 1 오름차순으로 정렬되고, first_name 2 birth_date 기준으로 다시 알파벳 오름차순으로 정렬됨
SELECT * FROM employees ORDER BY last_name DESC, first_name, birth_date;
-- 성 내림차순 정렬, 이름 오름차순 정렬, 생일 오름차순 정렬


SELECT distinct emp_no, salary FROM salaries;
-- distinct 중복된 레코드(row하나 전체) 없이 조회.
-- emp_no, salary로 조회시 emp_no+salary 1개의 묶음으로 조회함.
-- 결론 : emp_no 중복안되고 salary 중복안되는 결과로 조회하는게 아니라,
-- emp_no+salary 1개의 묶음으로써 중복안되는 값을 조회해줌.

-- <집계 함수>
SELECT SUM(salary)  FROM salaries;

-- 현재 받고 있는 급여만 조회
SELECT * FROM salaries
WHERE to_date >= '20230901';
-- 현재 받고 있는 급여의 총액
-- sum(컬럼명) : 합계
SELECT SUM(salary) FROM salaries
WHERE to_date >= '20230901';
-- 현재 받고 있는 급여 중 가장 높은 급여 조회
-- max(컬럼명) : 최대값
SELECT max(salary) FROM salaries
WHERE to_date >= '20230901';
-- 현재 받고 있는 급여 중 가장 낮은 급여 조회
-- min(컬럼명) : 최소값
SELECT min(salary) FROM salaries
WHERE to_date >= '20230901';
-- 현재 받고 있는 급여평균
-- avg(컬럼명) : 평균
SELECT avg(salary) FROM salaries
WHERE to_date >= '20230901';

-- 직원의 수
-- count(컬럼명) : 개수
SELECT COUNT(*) FROM employees;
-- Mary라는 이름을 가진 직원의 수
SELECT COUNT(*) FROM employees WHERE first_name = 'Mary';

-- group by 컬럼명 : having  집계함수 조건(그룹으로 묶어서 조회)
-- HAVING 그룹에 대한 조건으로, 그룹을 어떻게 묶을지 설정
-- ex)group by title having title like('%staff%') : staff가 포함된 직급

-- 현재 재직중인 직원들 중 staff가 포함된 직원의 수
SELECT title, COUNT(title)
FROM titles
WHERE to_date >= 20230901
GROUP BY title having title like('%staff%');

SELECT title, COUNT(title) AS cnt
FROM titles
WHERE to_date >= 20230901
GROUP BY title having title like('%staff%');
-- 컬럼 뒤에 as ~ 적으면 이름 변경됨
-- ex) count(title)이 cnt로 표기됨

-- concat() : 문자열을 합쳐 주는 함수
SELECT CONCAT(first_name, ' ', last_name) AS full_name
FROM employees;
-- ' '를 주면 중간에 공백 가능.

-- 여자사원의 사번, 생일, 풀네임 오름차순
SELECT 
	emp_no as 사번
	, birth_date as 생일
	, CONCAT(first_name, ' ', last_name) AS 풀네임
FROM employees 
WHERE gender = 'f'
ORDER BY 풀네임 ASC;

SELECT * 
FROM employees 
ORDER BY emp_no
LIMIT 10 OFFSET 10;
-- limit 10 : 검색 상위 10개만 나타냄
-- offset 10 : 10개 제외하고 나머지 부터 10개만 표현

-- 재직중인 사원들 중 급여가 상위 5위까지 출력
SELECT *
FROM salaries
WHERE to_date >= 20230901
ORDER BY salary desc
LIMIT 5;

-- 서브쿼리 : 쿼리 안에 또다른 쿼리가 있는 형태

-- d002부서의 현재 매니저의 정보를 가져오고 싶을 때(서브쿼리)
SELECT *
FROM employees
WHERE emp_no = (
	SELECT emp_no 
	FROM dept_manager 
	WHERE to_date >=20230901 
  		AND dept_no = 'd002');

SELECT emp_no 
FROM dept_manager 
WHERE to_date >=20230901 
  AND dept_no = 'd002';
  

-- 현재 급여가 가장 높은 사원의 사번과 풀네임 출력
SELECT 
	emp_no
	, CONCAT(first_name, ' ', last_name) AS full_name
FROM employees
WHERE emp_no = (
	SELECT emp_no
	FROM salaries
	WHERE to_date >=20230901
	ORDER BY salary DESC
	LIMIT 1
);
-- d001부서에 속한 적이 있는 사원의 사번과 풀네임을 출력 (서브쿼리의 결과가 복수일 때 사용방법)
SELECT 
	emp_no
	, CONCAT(first_name, ' ', last_name) AS full_name
FROM employees
WHERE emp_no in (
	SELECT emp_no
	FROM dept_manager
	WHERE dept_no = 'd001'
);

-- 현재 직책이 Senior Engineer인 사원의 사번과 생일을 출력
SELECT
	emp_no AS 사번
	, birth_date AS 생일
FROM employees
WHERE emp_no in (
	SELECT emp_no
	FROM titles
	WHERE to_date >=20230901 
		and title = 'Senior Engineer' 
);

-- 다중열 서브쿼리

-- 현재 부서장인 사람의 소속부서 테이블의 모든 정보를 출력

SELECT *
FROM dept_emp
WHERE (dept_no, emp_no) IN (
	SELECT dept_no, emp_no
	FROM dept_manager
	WHERE to_date >= NOW()
);

-- select절에 사용하는 서브쿼리
-- 사원의 현재 급여, 현재 급여를 받기 시작한 일자, 풀네임 출력
SELECT 
	sal.salary
	, sal.from_date
	, (
		SELECT CONCAT(emp.first_name, ' ', emp.last_name) 
		FROM employees AS emp
		WHERE sal.emp_no = emp.emp_no
	) AS full_name
FROM salaries AS sal
WHERE to_date >= NOW();

-- from절에 사용하는 서브쿼리
SELECT emp.*
FROM (
	SELECT *
	FROM employees
	WHERE gender = 'M'
) AS emp;












