-- 1 사원의 사원번호, 풀네임, 직책명 출력
SELECT
	emp.emp_no
	,concat(emp.first_name
	,' '
	,emp.last_name) full_name
	,tit.title
FROM employees emp
	INNER JOIN titles tit
		ON emp.emp_no = tit.emp_no;
-- 2 사원의 사원번호, 성별, 현재 월급 출력
SELECT
	emp.emp_no
	,emp.gender
	,sal.salary
FROM employees emp
	INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date >= NOW();	
-- 3 10010 사원의 풀네임, 과거부터 현재까지 월급 이력 출력
SELECT
	CONCAT(emp.first_name
	,' '
	,emp.last_name) full_name
	,sal.salary
FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no = sal.emp_no
WHERE emp.emp_no = 10010;
-- 4 사원의 사원번호, 풀네임, 소속부서명 출력
SELECT
	emp.emp_no
	,CONCAT(emp.first_name
	,' '
	,emp.last_name) full_name
	,dm.dept_name
FROM employees emp	
	INNER JOIN dept_emp dp
	ON emp.emp_no = dp.emp_no
	JOIN departments dm
	ON dp.dept_no = dm.dept_no
WHERE dp.to_date >= NOW();
-- 5 현재 월급의 상위 10위까지 사원의 사번, 풀네임, 월급 출력
SELECT
	emp.emp_no
	,CONCAT(emp.first_name
	,' '
	,emp.last_name) full_name
	,sal.salary
FROM employees emp
	JOIN salaries sal
	ON emp.emp_no = sal.emp_no
	AND sal.to_date >= NOW()
	ORDER BY salary desc
LIMIT 10;		
-- 6 현재 각 부서의 부서장의 부서명, 풀네임, 입사일 출력
SELECT
	ds.dept_name
	,CONCAT(emp.first_name
	,' '
	,emp.last_name) full_name
	,emp.hire_date
FROM employees emp
	JOIN dept_manager dm
	ON emp.emp_no = dm.emp_no
	AND dm.to_date >= NOW()
	JOIN departments ds
	ON dm.dept_no = ds.dept_no;
-- 7 현재 직책이 "Staff"인 사원의 전체 평균월급 출력
SELECT
	AVG(sal.salary)
FROM salaries sal
	JOIN titles tit
	ON sal.emp_no = tit.emp_no
	AND tit.to_date >= NOW()
WHERE tit.title = 'Staff';

-- 8 부서장직을 역임했던 모든 사원의 풀네임, 입사일, 사번, 부서번호 출력
SELECT
	CONCAT(emp.first_name
	,' '
	,emp.last_name) full_name
	,emp.hire_date
	,emp.emp_no
	,dm.dept_no
FROM employees emp
	JOIN dept_manager dm
	ON emp.emp_no = dm.emp_no;
-- 9 현재 각 직급별 평균월급 중 60000이상인 직급의 직급명, 평균월급(정수) 내림차순 출력
SELECT
	tit.title
	,FLOOR (AVG(sal.salary)) avg_sal
FROM titles tit
	JOIN salaries sal
		ON tit.emp_no = sal.emp_no
   	AND tit.to_date >= NOW()
  		AND sal.to_date >= NOW()
GROUP BY tit.title HAVING avg_sal >= 60000
ORDER BY avg_sal desc;
-- 10 성별이 여자인 사원들의 직급별 사원수 출력
SELECT
	tit.title
	,COUNT(emp.emp_no)
FROM employees emp
	JOIN titles tit
	ON tit.emp_no = emp.emp_no
	AND tit.to_date >= NOW()
	WHERE emp.gender = 'F'
	GROUP BY tit.title;
-- 11 퇴사한 여직원의 수 출력
SELECT
	emp.gender
	,COUNT(*)
FROM employees emp
	JOIN (
		SELECT emp_no
		FROM titles t
		GROUP BY t.emp_no HAVING MAX(t.to_date) !=99990101
		) tit
		ON emp.emp_no = tit.emp_no
GROUP BY emp.gender;
-- != 같지않다
		






