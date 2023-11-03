1. MVC 패턴
   Model, View, Controller 소프트웨어 디자인패턴 중 하나
   Model : DATA, 정보들의 가공을 책임지는 컴포넌트
   View : 사용자 인터페이스 요소, 데이터를 기반으로 유저가 볼 수 있는 화면
   Controller : 모델과 뷰를 연결해주는 다리 역할

2. DataBase
   1)user(유저) Table

- pk, 아이디, 비밀번호, 이름, 가입일자, 탈퇴일자, 수정일자
  2)board(게시판) Table
- pk, 유저pk, 게시판타입, 제목, 내용, 이미지파일, 작성일자, 수정일자, 삭제일자
  3)boardname(게시판 기본 정보) Table
- pk, 게시판타입, 게시판이름

not null : 필수입력사항
default : insert할 때 현재 시각 저장목적
사용하지않으면 create_at까지 모두 insert해줘야 함

char : 고정문자 타입
varchar : 가변문자 타입

이미지는 웹서버에 저장하고, DB에는 파일 명만 저장함
이미지 경로는 config파일에 경로 저장

비밀번호 코드 변경
base64_encode('');
비밀번호 코드 해석
base64_decode('');
