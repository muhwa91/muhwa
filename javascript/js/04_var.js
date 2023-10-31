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
AGE = 20;
console.log(AGE);


// < 스코프 >
// 1. 전역 스코프(전역 변수 개념)
let gender = "M";

// 2. 함수레벨 스코프
function test() {
	let test1 = "test1";
	if(true) {
		test1 = "test2";
	}
	console.log(test1);
}
// test1 출력
// if문 안에서 출력 시 test2 출력


// 호이스팅 (hoisting)
// 인터프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당하는 것
// cf)인터프리터 : 프로그래밍 언어의 소스 코드를 바로 실행하는 컴퓨터 프로그램 또는 환경
// 코드가 실행되기 전에 변수와 함수를 최상단에 끌어 올려지는 것

// console.log(htest1());

// console.log(hvar);
// 아래에 선언해두어서 호이스팅으로 인해 undefined
// var는 undefined 표기 되어서 요즘 지양하는 중

// console.log(hlet);
// let은 에러 표기 됨
// 제일 처음 실행 될 때 바로 에러 표기 되어서 아래 실행X

function htest1() {
	return "htest1 함수입니다.";
}

// var hvar = "var로 선언";
let hlet = "let으로 선언";


// console.log(hvar);
// console.log(hlet);





















