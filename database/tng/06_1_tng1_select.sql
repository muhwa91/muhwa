-- 1직책테이블의 모든 정보 조회
SELECT * 
FROM titles;

-- 2급여가 60000 이하인 사원의 사번 조회
SELECT emp_no
FROM salaries
WHERE salary <= 60000;

-- 3급여가 60000에서 70000인 사원의 사번 조회
SELECT emp_no
FROM salaries
WHERE salary >= 60000
  AND salary <= 70000;

-- 4사원번호가 10001, 10005인 사원의 사원테이블의 모든 정보 조회
SELECT *
FROM employees
WHERE emp_no = 10001 
   or emp_no = 10005;

-- 5직급명에 "Engineer"가 포함된 사원의 사번과 직급을 조회
SELECT emp_no, title
FROM titles
WHERE title 
LIKE('%Engineer%');

-- 6사원 이름을 오름차순으로 정렬해서 조회
SELECT first_name AS 사원이름
FROM employees
ORDER BY first_name asc;

-- 7사원별 급여의 평균을 조회
SELECT emp_no, avg(salary) AS avg_sal
FROM salaries
GROUP BY emp_no;
-- group by로 묶은 그룹은 select에도 적어주기

-- 8사원별 급여의 평균이 30000~50000인, 사원번호와 평균급여를 조회
SELECT emp_no AS 사원번호, avg(salary) AS avg_sal
FROM salaries
GROUP BY emp_no 
	HAVING avg_sal >= 30000 AND avg_sal <= 50000;
-- group의 조건은 having에 적어야함

-- 9사원별 급여 평균이 70000이상인 사원의 사번, 이름, 성, 성별 조회
SELECT emp.emp_no
	  ,emp.first_name
	  ,emp.last_name
	  ,emp.gender
FROM employees AS emp
WHERE emp_no in (
	SELECT sal.emp_no
	FROM salaries AS sal
	group by sal.emp_no 
		HAVING AVG(sal.salary) >=70000
);
-- ~별 : group, as 생략가능

-- 10현재 직책이 "Senior Engineer"인 사원의 사원번호와 성 조회
SELECT emp.emp_no AS 사원번호
	,emp.last_name AS 성
FROM employees AS emp
WHERE emp.emp_no IN (
	SELECT tit.emp_no
	FROM titles AS tit
	WHERE tit.to_date >= NOW()
	  AND tit.title = 'Senior Engineer'
);
-- 현재 >= now(), >= 20230904




