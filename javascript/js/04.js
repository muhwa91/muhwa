// console.log("반갑습니다. js파일입니다.");



// < 변수 >
// ex) var, let, const
// 1. var : (중복 선언 가능), (재할당 가능), 함수레벨 스코프

// 1) (중복 선언 가능)

// var u_name = "홍길동";
// console.log(u_name);
// var u_name = "갑순이";
// console.log(u_name);

// 2) (재할당 가능) 

// 결과는 (중복 선언 가능)과 동일
// var u_name = "홍길동";
// console.log(u_name);
// u_name = "갑순이";
// console.log(u_name);

// 2. let : (중복 선언 불가능), (재할당 가능), 블록레벨 스코프

// 1) (중복 선언 불가능)
// ex)u_name 빨간줄

// let u_name = "홍길동";
// console.log(u_name);
// let u_name = "갑순이";
// console.log(u_name);
 
// 2) (재할당 가능)
// let을 주로 사용하자

// let u_name = "홍길동";
// console.log(u_name);
// u_name = "갑순이";
// console.log(u_name);

// 3. const : (중복 선언 불가능), (재할당 불가능), 블록레벨 스코프

// 상수는 대문자로 표기
const AGE = 19;
// AGE = 20;
console.log(AGE);
