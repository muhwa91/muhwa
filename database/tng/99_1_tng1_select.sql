-- 1 직책테이블의 모든 정보 조회
SELECT *
FROM titles;

-- 2 급여가 60000 이하인 사원의 사번 조회
SELECT emp_no, salary
FROM salaries
WHERE salary <= 60000 
order by salary DESC; -- desc 사용할 때에는 order by 사용

-- 3 급여가 60000에서 70000인 사원의 사번 조회
SELECT emp_no, salary
FROM salaries
WHERE salary >= 60000
AND salary <= 70000;

-- 4 사원번호가 10001, 10005인 사원의 모든 정보 조회
-- SELECT *
-- FROM employees
-- WHERE emp_no = 10001
-- or emp_no = 10005;

SELECT 
	emp.*
	,dmp.dept_no
	,tit.title
	,sal.salary
FROM employees emp
	JOIN dept_emp dmp
		ON emp.emp_no = dmp.emp_no
		AND dmp.to_date >= NOW()
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
		AND tit.to_date >= NOW()
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date >= NOW()
	JOIN departments dept
		ON dmp.dept_no = dept.dept_no
WHERE 
	emp.emp_no = 10001
	OR emp.emp_no = 10005
;

-- 5 직급명에 "Engineer"가 포함된 사원의 사번과 직급 조회
-- SELECT emp_no, title
-- FROM titles
-- WHERE title LIKE('%Engineer%');

SELECT
	emp.emp_no
	,tit.title
FROM employees emp
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
		AND tit.title LIKE('%Engineer%')
		AND tit.to_date >= NOW();

-- 6 사원 이름을 오름차순으로 정렬해서 조회
SELECT first_name
FROM employees
ORDER BY first_name ASC;

-- 7 사원별 급여 평균 조회
SELECT sal.emp_no, ceil(avg(salary)) avgsal
FROM salaries sal
GROUP BY sal.emp_no;

-- 8 사원별 급여의 평균이 30000~50000인 사원번호와 평균급여 조회
SELECT emp_no, AVG(salary)
FROM salaries
GROUP BY emp_no
	HAVING AVG(salary) >= 30000 AND AVG(salary) <= 50000;

-- 9 사원별 급여 평균이 70000 이상인 사원의 사번, 이름, 성, 성별 조회
SELECT emp.emp_no
	, emp.first_name
	, emp.last_name
	, emp.gender
FROM employees emp
JOIN salaries sal
	ON emp.emp_no = sal.emp_no
GROUP BY sal.emp_no
	HAVING AVG(sal.salary) >= 70000;

-- 10 현재 직책이 "Senior Engineer"인 사원의 사원번호와 성 조회
SELECT emp.emp_no, emp.last_name
FROM employees emp
JOIN titles tit
	ON emp.emp_no = tit.emp_no
	AND tit.to_date >= NOW()
	AND tit.title LIKE('%Senior Engineer%');













