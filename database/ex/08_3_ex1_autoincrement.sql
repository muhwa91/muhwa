-- 1 auto_increment
-- 자동 증가 값을 가지는 컬럼으로 값을 직접 대입할 수 없음
-- 중간에 값을 삭제한다고 해서 삭제된 값을 재사용 하지 않으며 
-- 레코드가 적재될 때마다 1씩 증가하게 됨
-- pk에만 적용할 수 있음

-- 2 auto_increment 생성
-- CREATE TABLE 테이블명 (
-- 	mem_no INT(11) PRIMARY KEY AUTO_INCREMENT
-- 	,mem_ NAME VARCHAR(50)
-- );

-- 3 auto_increment 수정
-- 이미 생성한 테이블의 컬럼에 추가할 때
-- ALTER TABLE 테이블명 MODIFY 컬럼명 INT(11) AUTO_INCREMENT;
-- insert into 테이블명 (mem_name) values ('tt');

-- 4 auto_increment 특정 값으로 설정(현재 pk 최대값 이하로는 설정 불가)
-- ALTER TABLE 테이블명 AUTO_INCREMENT=10;


