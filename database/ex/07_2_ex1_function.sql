-- date_add 현재날짜에서 하루 추가
SELECT DATE_ADD(NOW(),INTERVAL 1 DAY);

-- 1 데이터 타입 변환 함수
SELECT CAST(1234 AS CHAR(4));
SELECT CONVERT(1234, CHAR(4));
-- 둘다 동일 기능
-- cast(값, as 데이터형식)
-- convert(값, 데이터형식)

-- 2 제어흐름 함수
SELECT e.emp_no, if(e.gender = 'M', '남자', '여자') AS gender
FROM employees e;
-- if(수식, 참일 때, 거짓일 때) : 수식이 참 또는 거짓에 따라 결과를 분기하는 함수

SELECT IFNULL('1', '수식2');
SELECT emp_no
	,title
	,ifnull(to_date, date(NOW())) AS to_date 
FROM titles 
order BY emp_no DESC;
-- ifnull(수식1, 수식2) : 수식1이 null이면 수식2를 반환하고, null이 아니면 수식1을 반환
UPDATE titles SET to_date = NULL WHERE emp_no = 500000;

SELECT NULLIF(1, 1);

SELECT NULLIF(1, 2);

SELECT emp_no
	,title
	,to_date
	,nullif(to_date, 99990101) AS to_date2
FROM titles 
order BY emp_no DESC;
-- nullif(수식1, 수식2) : 수식1과 2가 같으면 null을 반환하고, 다르면 수식 1을 반환


























