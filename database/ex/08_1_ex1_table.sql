-- 1 테이블 생성
-- 쇼핑몰/회원정보 저장(회원정보 테이블),주문리스트 저장(주문리스트 테이블)

-- 회원정보 테이블
-- 회원번호, id, 이름, 주소

-- 주문리스트 테이블
-- 회원번호, 주문번호, 상품번호, 수량, 결제금액

-- 상품리스트 테이블
-- 상품번호, 상품명, 상품 가격

-- 포인트 테이블
-- 회원번호, 포인트

-- CREATE DATABASE MEMBER;
-- USE MEMBER;


CREATE TABLE members (
	mem_no INT PRIMARY KEY AUTO_INCREMENT
	,id VARCHAR(30) UNIQUE NOT NULL
	,mem_name VARCHAR(30) NOT NULL  
	,addr VARCHAR(100) NOT NULL
);
CREATE TABLE points (
	mem_no INT PRIMARY KEY
	,pt INT NOT NULL DEFAULT 0
	,CONSTRAINT fk_points_mem_no FOREIGN KEY(mem_no)
		REFERENCES members(mem_no) ON DELETE CASCADE
);
CREATE TABLE products (
	product_no INT PRIMARY KEY
	,product_name VARCHAR(50) NOT NULL
	,product_price INT NOT NULL
);   
CREATE TABLE orders (
	order_no INT PRIMARY KEY
	,mem_no INT NOT NULL
	,product_no INT NOT NULL
	,product_cnt INT NOT NULL
	,total_pay INT NOT NULL
	,CONSTRAINT fk_orders_mem_no FOREIGN KEY(mem_no)
		REFERENCES members(mem_no) ON DELETE CASCADE  
	,CONSTRAINT fk_orders_product_no FOREIGN KEY(product_no)
		REFERENCES products(product_no) ON DELETE NO ACTION 
);
-- constraint 참조

INSERT INTO members(id, mem_name, addr)
VALUES('admin', 'meerkat', 'korea daegu');
INSERT INTO points(mem_no)
VALUES(1);


-- 2 테이블 변경
ALTER TABLE members ADD COLUMN age INT NOT NULL;
-- 컬럼 추가
ALTER TABLE members MODIFY COLUMN mem_name VARCHAR(50) NOT NULL;
-- 컬럼 데이터타입 변경
ALTER TABLE members DROP COLUMN age;
-- 컬럼 삭제

-- 3 테이블 삭제
-- drop table 테이블명;

-- 4 테이블 데이터 삭제
-- truncate table 테이블명;(롤백 안됨)

















