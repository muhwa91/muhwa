-- join : 두개 이상의 테이블을 묶어서 하나의 결과 집합으로 출력하는 것

-- 1 inner join 구조(테이블1 교집합 테이블2)
-- select 컬럼1, 컬럼2
-- from 테이블1 inner join 테이블2
-- 	on join 조건
-- [where 검색조건]

SELECT 
	emp.emp_no
	,emp.first_name
	,emp.last_name
	,dp.dept_no
FROM employees emp
	INNER JOIN dept_emp dp
		ON emp.emp_no = dp.emp_no
		AND dp.to_date >= NOW();
-- 합쳐줄 테이블 : inner join
-- join의 조건 : on
-- where : join을 하고 난 결과의 조건
-- employees와 dept_emp 교집합 부분만 출력
-- inner join = join/inner 생략가능

-- 2 outer join 구조 : 기준 테이블의 레코드는 join의 조건에 만족되지 않아도 출력
-- select 컬럼1, 컬럼2
-- from 테이블1 
-- 	[left/right] outer join 테이블2
-- 	on join 조건
-- where 검색조건;

SELECT 
	emp.emp_no
	,emp.first_name
	,dm.dept_no
FROM employees emp
	LEFT OUTER JOIN dept_manager dm
		ON emp.emp_no = dm.emp_no
		AND dm.to_date >= NOW()
WHERE emp.emp_no >= 110000;
-- left는 employees테이블 기준
-- employees와 dept_manager 모두 출력하고 교집합 부분은 데이터가 출력, employees 교집합이 아닌 employess 부분은 null로 출력

-- 4 union / union all : 두 쿼리의 결과를 합침
-- union : 중복 값을 제거하고 출력
-- union : 중복 값도 출력
SELECT *
FROM employees
WHERE emp_no = 10001
	OR emp_no = 10005
UNION
SELECT *
FROM employees
WHERE emp_no = 10005; 

-- 4 self join : 자기 자신을 join
-- selset 컬럼1, 컬럼2, ~
-- from 테이블1
-- 	inner join 테이블1
-- where 검색조건;

-- 슈퍼바이저인 사원의 모든 정보를 출력
SELECT emp2.*
FROM employees emp1
	INNER JOIN employees emp2
		ON emp1.sup_no = emp2.emp_no;
		
		
		inner join 구조(테이블1 교집합 테이블2)
-- select 컬럼1, 컬럼2
-- from 테이블1 inner join 테이블2
-- 	on join 조건
-- [where 검색조건]
		
		
SELECT 
	emp.emp_no
	,emp.first_name
	,emp.last_name
	,dp.dept_no
FROM employees emp
	INNER JOIN dept_emp dp
		ON emp.emp_no = dp.emp_no
		AND dp.to_date >= NOW();		

























