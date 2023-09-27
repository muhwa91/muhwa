SELECT [DISTINCT] [컬럼명]
FROM [테이블명]
 JOIN [테이블명] ON [조인조건]
WHERE [쿼리조건]
GROUP BY [컬럼명] HAVING [집계함수 조건]
ORDER BY [컬럼명 ASC || 컬럼명 DESC]
LIMIT 출력수 [OFFSET 시작번호]
;

-- 인덱스 : 데이터베이스 분야에 있어서 테이블에 대한 동작의 속도를 높여주는 자료 구조

-- 인덱스 장점
-- 테이블을 검색하는 속도와 성능이 향상

-- 인덱스 단점
-- 인덱스를 관리하기 위한 추가 작업이 필요(insert, update, delete)
-- 추가 저장 공간 필요
-- 잘못 사용하는 경우 오히려 검색 성능 저하