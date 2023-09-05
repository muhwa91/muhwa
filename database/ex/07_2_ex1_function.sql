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
-- ifnull(수식1, 수식2) : 수식1이 null이면 수식2를 반환하고, null이 아니면 수식1을 반환(☆자주사용)
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

-- case ~ when ~ else ~ end : 다중 분기를 위해 사용(☆자주 사용)
-- ex)case 체크하려는 수식1
-- 		when 분기수식1 then 결과1
-- 		when 분기수식2 then 결과2
-- 		when 분기수식3 then 결과3
-- 		else 결과4
-- 	end

SELECT e.emp_no
	,e.gender
	,CASE e.gender
		WHEN 'M' Then '남 자'
		ELSE '여 자'
	END AS ko_gender
FROM employees AS e;
-- 케이스에서 체크할 부분 적고, gender를 M일때 남자로 출력하고 그 외는 여자로 출력

SELECT * FROM titles ORDER BY emp_no DESC;

-- 직책 테이블의 모든 정보를 출력
-- 단, to_date가 null // 9999-01-01인 경우는 '현재직책'
-- 그 외는 '지금은 아님'
SELECT 
	*
	,CASE DATE(IFNULL(to_date, 99990101))
		WHEN 99990101 THEN '현재직책'
		ELSE '지금은 아님'
	END AS ko_to_date
FROM titles
ORDER BY emp_no DESC;

SELECT *
FROM titles
WHERE to_date IS not NULL
ORDER BY emp_no DESC;

-- 3 문자열 함수
SELECT CONCAT('안녕','하세요');
-- concat(문자열1,문자열2,~) : 문자열 이어줌
SELECT CONCAT_WS('/','딸기','바나나','토마토','수박');
-- concat_ws(구분자,문자열1,문자열2,~) : 문자열 사이에 구분자 넣어줌
-- 딸기/바나나/토마토/수박 출력
SELECT FORMAT(123456,6);
-- format(숫자,소숫점 자릿수) : 숫자에 ','를 넣어주고, 소숫점 자릿수 출력
-- 123,456.000000 출력
SELECT LEFT('123456',3);
-- left(문자열,길이) : 문자열을 왼쪽부터 길이만큼 잘라 반환
-- 123 출력
SELECT RIGHT('123456',3);
-- right(문자열,길이) : 문자열을 오른쪽부터 길이만큼 잘라 반환
-- 456 출력
SELECT UPPER('abcd');
-- upper(문자열) : 소문자를 대문자로 변경
-- ABCD 출력
SELECT LOWER('ABCD');
-- lower(문자열) : 대문자를 소문자로 변경
-- abcd 출력
SELECT LPAD('123456',10,'0');
-- lpad(문자열,길이,채울 문자열) : 문자열을 포함해 길이만큼 채울 문자열을 왼쪽에 넣어줌
-- 0000123456 출력
SELECT RPAD('123456',10,'0');
-- rpad(문자열,길이,채울 문자열) : 문자열을 포함해 길이만큼 채울 문자열을 오른쪽에 넣어줌
-- 1234560000 출력
SELECT ' 1234 ', TRIM(' 1234 ');
-- trim(문자열) : 좌우 공백 제거
--  1234 ,1234 출력
SELECT LTRIM(' 1234 ');
-- ltrim(문자열) : 왼쪽 공백 제거
-- 1234  출력
SELECT RTRIM(' 1234 ');
-- rtrim(문자열) : 오른쪽 공백 제거
--  1234 출력
SELECT TRIM(LEADING 'abc' FROM 'abcdefg');
-- trim(방향 문자열1 from 문자열2) : 방향을 지정해 문자열2에서 문자열1 제거
-- 방향 : leading(좌), both(좌,우), trailing(우)
-- defg 출력
SELECT SUBSTRING('abcdef',3,2);
-- substring(문자열,시작위치,길이) : 문자열을 시작위치에서 길이만큼 잘라서 반환
-- cd 출력
SELECT SUBSTRING_INDEX('ab.cd.ef.gh','.',2);
-- substring_index(문자열, 구분자, 횟수) : 왼쪽부터 구분자가 횟수 번째가 나오면 그 이하는 잘라서 반환
-- ab.cd 출력

-- 4 수학함수
SELECT CEILING(1.4);
-- ceiling(숫자) : 올림
-- ceil=ceiling
-- 2 출력
SELECT FLOOR(1.9);
-- floor(숫자) : 버림
-- 1 출력
SELECT ROUND(1.5);
-- round(숫자) : 반올림
-- 2 출력
SELECT TRUNCATE (1.11, 1);
-- truncate(숫자,정수) : 소수점 기준으로 정수위치까지 구하고 나머지는 버림(쓰지말자)
-- 1.1 출력

-- 5 날짜 및 시간함수
SELECT NOW(),DATE(NOW()),DATE(99990101);
-- now() : 현재 날짜/시간 구함 (YYYY-MM-DD HH:MM:DD)
SELECT ADDDATE(99990101, INTERVAL 1 day);
-- adddate(날짜1,interval,날짜2) : 날짜1에서 날짜2를 더한 날짜 구함(1 띄우고 day)
-- 9999-01-02 출력
SELECT SUBDATE(99990101, INTERVAL 1 DAY);
-- subdate(날짜1,interval,날짜2) : 날짜1에서 날짜2를 뺀 날짜 구함(1 띄우고 day)
-- 9998-12-31 출력
SELECT ADDTIME(20230101000000, '-01:00:00');
-- addtime(날짜/시간,시간) : 날짜/시간에서 시간을 더한 날짜/시간 구함
-- 2022-12-31 23:00:00 출력
SELECT SUBTIME(20230101000000, '-01:00:00');
-- subtime(날짜/시간,시간) : 날짜/시간에서 시간을 뺀 날짜/시간 구함
-- 2023-01-01 01:00:00 출력

-- 6 순위함수
SELECT emp_no, salary, RANK() OVER(ORDER BY salary desc) AS RANK
FROM salaries
LIMIT 10;
-- rank() over(order by 속성명 desc/asc) : 순위 매김
-- 급여 10위까지 내림차순 정렬

SELECT emp_no, salary, ROW_NUMBER() OVER(ORDER BY salary desc) AS num
FROM salaries
LIMIT 10;
-- row_number() over(order by 속성명 desc/asc) : 레코드에 순위 매김




