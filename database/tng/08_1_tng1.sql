-- 1사원 정보테이블에 각자 정보 삽입
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500001
	,19991002
	,'중기'
	,'여'
	,'M'
	,99990101
);
SELECT * FROM employees WHERE emp_no = 500001;
-- 2월급, 직책, 소속부서 테이블에 각자 정보 삽입
INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500001
	,10000000
	,20230906
	,20230907
);
INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500001
	,'Senior Engineer'
	,20230906
	,20230907
);
INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500001
	,'d001'
	,20230906
	,20230907
);
SELECT * FROM salaries WHERE emp_no = 500001;
SELECT * FROM titles WHERE emp_no = 500001;
SELECT * FROM dept_emp WHERE emp_no = 500001;

-- 3짝궁의 1, 2 삽입
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500002
	,19930510
	,'다윗'
	,'홍'
	,'F'
	,99990101
);
INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500002
	,10000000
	,20230906
	,20230907
);
INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500002
	,'Senior Engineer'
	,20230906
	,20230907
);
INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500002
	,'d001'
	,20230906
	,20230907
);

SELECT * FROM employees WHERE emp_no = 500002;
SELECT * FROM titles WHERE emp_no = 500002;
SELECT * FROM dept_emp WHERE emp_no = 500002;

INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500003
	,19920510
	,'건'
	,'정'
	,'F'
	,99990101
);
INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500003
	,10000000
	,20230906
	,20230907
);
INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500003
	,'Senior Engineer'
	,20230906
	,20230907
);
INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500003
	,'d001'
	,20230906
	,20230907
);

SELECT * FROM employees WHERE emp_no = 500003;
SELECT * FROM titles WHERE emp_no = 500003;
SELECT * FROM dept_emp WHERE emp_no = 500003;

-- 4나와 짝궁의 소속 부서 d009 변경
UPDATE dept_emp
SET 
	dept_no = 'd009'
WHERE emp_no >= 500001
  AND emp_no <= 500003;
  
SELECT * 
FROM dept_emp 
WHERE emp_no >= 500001
  AND emp_no <= 500003;
  
-- UPDATE dept_emp
-- SET to_date = NOW()
-- WHERE emp_no = 500001 AND dept_no = 'd001';
-- 
-- INSERT INTO dept_emp(
-- 	emp_no
-- 	,dept_no
-- 	,from_date
-- 	,to_date
-- )
-- VALUES (
-- 	500001
-- 	,'d009'
-- 	,NOW()
-- 	,99990101
-- 기존의 데이터는 살려두고, 새로운 데이터만 입력

-- 5짝궁의 모든 정보 삭제
DELETE FROM 
employees
WHERE emp_no = 500002;
DELETE FROM 
salaries
WHERE emp_no = 500002;
DELETE FROM 
titles
WHERE emp_no = 500002;
DELETE FROM 
dept_emp
WHERE emp_no = 500002;

SELECT * FROM employees WHERE emp_no = 500002;
SELECT * FROM salaries WHERE emp_no = 500002;
SELECT * FROM titles WHERE emp_no = 500002;
SELECT * FROM dept_emp WHERE emp_no = 500002;

DELETE FROM 
employees
WHERE emp_no = 500003;
DELETE FROM 
salaries
WHERE emp_no = 500003;
DELETE FROM 
titles
WHERE emp_no = 500003;
DELETE FROM 
dept_emp
WHERE emp_no = 500003;

SELECT * FROM employees WHERE emp_no = 500003;
SELECT * FROM salaries WHERE emp_no = 500003;
SELECT * FROM titles WHERE emp_no = 500003;
SELECT * FROM dept_emp WHERE emp_no = 500003;
-- 6d009부서의 관리자를 나로 변경
UPDATE dept_manager
SET 
	dept_no = 'd001'
	AND emp_no = 500001
WHERE emp_no = 500001;

SELECT * FROM dept_manager WHERE emp_no = 500001;


-- 7오늘 날짜부로 나의 직책을 'Senior Engineer'로 변경
UPDATE titles
SET 
	title = 'Senior Engeneer'
WHERE emp_no = 500001;

UPDATE titles
SET 
	to_date = 20230907
WHERE emp_no = 500001;

SELECT * FROM titles WHERE emp_no = 500001;
-- 8최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력
SELECT 	
	emp.emp_no
	,CONCAT(emp.first_name,' ',emp.last_name)
	, sal.salary
FROM employees emp
	JOIN salaries sal
	ON emp.emp_no = sal.emp_no	
WHERE 
	sal.salary = 
	(SELECT MAX(salary)
	from salaries)
	or 
	sal.salary = 
	(SELECT Min(salary)
	from salaries);
CREATE INDEX idx_test ON salaries(salary);

JOIN
ON
AND (
	sal.salary = (SELECT salary FROM salaries ORDER BY salary LIMIT 1)
	or
	sal.salary = (SELECT salary FROM salaries ORDER BY salary DESC	LIMIT 1)
	);

-- 9전체 사원의 평균 연봉 출력
SELECT 
	AVG(salary)
FROM salaries;

-- 10사번 499975 사원의 지금까지 평균 연봉 출력
SELECT * FROM salaries WHERE emp_no = 499975;

SELECT AVG(salary) FROM salaries WHERE emp_no = 499975; 
	