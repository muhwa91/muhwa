// 함수

// 함수 생성

// 함수 선언식 : 호이스팅 영향(O)
function fnc_sum(a, b) {
	return a + b;
}
// 선언 상단에 fnc_sum(3, 2); 사용(O)

// 함수 표현식 : 호이스팅 영향(X)
let fnc1 = function(a, b) { 
	return a + b;
}
// fnc1(3, 2); 결과 = 5
// 선언 상단에 fnc1(1, 2); 사용(X)

// function() : 익명함수(이름 없는 함수)
function fnc_sum(a, b) {
	return a + b;
}

// 콜백함수 : 다시 호출 되는 함수, 
function fnc_callBack( call ) {
	call();
}

fnc_callBack(function() {
	console.log('익명함수')
});

// 배열객체의 sort의 경우 예시
// sort_arr.sort( function(a, b) {
// 	return a - b
// });

// function sort(call) {
// 	let num = call();
// 	if(num < 0) {
// 		// 처리
// 	} else {
// 		// 처리
// 	}
// }

// function 생성자 함수
let tt = Function('a', 'b', 'return a + b;');

// 화살표 함수(Arrow Function)
// 파라미터 없는 경우
let f1 = function() {
	return "f1";
}

let f2 = () => "f2";

// 파라미터 1개인 경우
let f3 = function(a) {
	return a + '입니다.';
}

let f4 = a => a;
// 동일 let f4 = (a) => a;

// 파라미터 2개 이상인 경우
let f5 = function(a, b) {
	return a + b;
}

let f6 = (a, b) => a + b;


// 함수의 처리가 많을 경우
let f7 = function(a, b) {
	if(a > b) {
		return 'a가 크다';
	} else {
		return 'b가 크다';
	}
}

let f8 = (a, b) => {
	if(a > b) {
		return 'a가 크다';
	} else {
		return 'b가 크다';
	}
}






















