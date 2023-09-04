-- insert
-- insert into 테이블명 [(속성1, 속성2)]
-- [] 생략가능
-- values (속성값1, 속성값2)
-- ex) 500000 신규회원
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500000
	,19991002
	,'Meerkat'
	,'Green'
	,'M'
	,99990101
);

-- insert와 values 값은 동일한 형태로 넣고, values 값은 ''넣기

-- 500000번 사원의 급여 데이터 삽입
INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500000
	,10000
	,NOW()
	,99990101
);

-- 500000번 사원의 소속 부서 데이터 삽입
INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500000
	,'d005'
	,NOW()
	,99990101	
);

-- 500000번 사원의 직책 데이터 삽입

INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500000
	,'Senior Engineer'
	,NOW()
	,99990101	
);

SELECT * FROM employees WHERE emp_no >= 500000 ORDER BY emp_no desc;
SELECT * FROM salaries WHERE emp_no = 500000;
SELECT * FROM dept_emp WHERE emp_no = 500000;
SELECT * FROM titles WHERE emp_no = 500000;











