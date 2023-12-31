1. MVC 패턴
   Model, View, Controller 소프트웨어 디자인패턴 중 하나
   Model : DATA, 정보들의 가공을 책임지는 컴포넌트
   View : 사용자 인터페이스 요소, 데이터를 기반으로 유저가 볼 수 있는 화면
   Controller : 모델과 뷰를 연결해주는 다리 역할

2. Apache - httpd.conf 파일 수정

   - 주석 해제  
     LoadModule rewrite_module modules/mod_rewrite.so

   - <Directory "${SRVROOT}/htdocs">내 AllowOverride 설정 변경
     AllowOverride None -> AllowOverride All

3. root에 .htaccess 파일 생성 후 아래 내용 삽입
   Options -MultiViews
   RewriteEngine On
   Options -Indexes
   RewriteCond %{REQUEST_FILENAME} !-d
   RewriteCond %{REQUEST_FILENAME} !-f
   RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]

   2-1. 참조 - .htaccess 파일은 디렉토리에 대한 설정 옵션을 제공하는 파일입니다. - Options -MultiViews
   localhost로 요청 시, index.php 또는 index.html를 자동으로 찾지 않습니다. - RewriteEngine On
   url을 재구성 하는 방식으로 직접 페이지를 탐색하는 것이 아니라 하나의 데이터로 받아드리는 설정입니다. - Options -Indexes
   index.php가 없을 경우 디렉토리를 보여주지 않는 설정 입니다. - RewriteCond
   RewriteRule의 url재설정을 위한 필터
   %{REQUEST_FILENAME} !-d || !-f : 요청된 주소에 해당하는 디렉토리 || 파일이 있는지 확인 - RewriteRule
   RewriteCond가 true인 요청이면 설정한 요청으로 룰을 변경합니다.

4. DataBase
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

<mvc 패턴>
https://github.com/greenmeerkat/2308_php/assets/142575026/a44021dd-a660-4957-8861-3389766f1a86

유저(브라우저) <-> 웹서버 > index.php, Router > Controller <-> model > View > 웹서버
컨트롤러는 모델과 뷰에 대해서 작용
컨트롤러는 모델과 상호작용하고, 모델과 뷰는 작용하지 않음


1. Git에서 소스코드 내려받기
2. 터미널에서 위치를 vendor를 내려받을 라라벨 프로젝트 위치로 이동
3. 커맨드로 composer install 입력 -> vendor를 다운로드받음
4. .env 파일을 생성 -> .env.example를 복사해서 .env로 바꾸면된다.
5. 커맨드로 :php artisan key:generate -> .env 파일에 APPKEY를 생성
6. 그 외 설정 세팅 ex) .env의 DB세팅