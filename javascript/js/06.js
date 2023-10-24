// 기본 데이터 타입

// 1. 숫자(number)
let num = 1;

// 2. 문자열(string)
let str = "string";

// 3. 불리언(boolean)
let boo = true;

// 4. null
let nu = null;

// 5. undefined
let und;
// 선언만 해두고 할당X

// 6. symbol
// 고유한 ID를 가진 데이터 타입
let symbol_1 = Symbol("symbol");
let symbol_2 = Symbol("symbol");


// 객체 타입 : 그 외에 기본 데이터 타입을 제외한 모든 것

// 1. Array
let arr = [1, 2, 3];
// php는 기본 타입이지만, js는 객체 타입

// 2. Date

// 3. Math

// 4. Object
let obj = {
	food1: "탕수육"
	,food2: "짜장면"
	,food3: "라조기"
	,eat: function() {
		console.log("먹자");
	}
	,list: {
		list1: "리스트1"
		,list2: "리스트2"
	}
};
// 객체는 모든 것 다 담을 수 있음 ex)함수, 객체 내에 객체

// 자기 자신의 회원정보를 객체로 만들기

let my = {
	name: "여중기"
	,age: "33"
	,gender: "m"
	,pn: "01058471671"
};
