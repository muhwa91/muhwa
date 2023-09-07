-- 1 index
-- 데이터베이스 테이블에 대한 검색 성능의 속도를 높여주는 기능
-- 인덱스 생성 시 데이터를 오름차순으로 정렬
-- 일반적으로 "B+ Tree 인덱스" 방식 사용

-- 2 index 장점
-- 테이블 조회속도, 성능향상
-- 전반적인 시스템 부하감소

-- 3 index 단점
-- 인덱스 관리위해 DB의 약 10% 해당하는 추가 저장공간 필요
-- 인덱스 관리하기위해 추가 작업 필요
-- 관리 미흡 시, 성능저하

-- 4 index 사용 시 주의점
-- insert, update, delete 빈번한 테이블 주의
-- 검색하고자 하는 데이터가 테이블의 10~15% 이하 일 경우 가장 효율적
-- 속도 향상 위해서는 우선 쿼리를 효율적으로 짜는 방향 고려 -> 인덱스는 최후 수단
-- 인덱스 추가 시 대량 데이터로 해당테이블의 CRUD 테스트
-- 사용하지 않는 인덱스 제거

-- 5 index 사용하기 좋은 상황
-- 규모 작지 않은 테이블
-- insert, update, delete 자주 발생하지 않는 컬럼
-- join이나 where 또는 order by에 자주 사용되는 컬럼
-- 데이터 중복도가 낮은 컬럼

SHOW INDEX FROM employees;

-- 6 index 생성
-- create index 인덱스명 on 테이블(컬럼);
-- create index 인덱스명 on 테이블(컬럼1,컬럼2,~);
CREATE INDEX idx_employees_last_name ON employees(last_name);
DROP INDEX idx_employees_last_name ON employees;
-- drop index 할 때는 테이블을 입력하면 index 값 삭제

