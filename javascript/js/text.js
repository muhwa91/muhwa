// 두 수를 받아서 더한 값을 리턴해주는 함수 만들기
function mySum(a, b) {
	return a + b;
}

mySum(2, 5);


function test() {
	console.log('A');
	mySum(2, 5);
}


setTimeout(function() {
	console.log('A');
}, 1000);
// setTimeout(익명함수, 1000); >> 1초 뒤 익명함수 실행


function myCallBack(fnc) {
	fnc();
}


myCallBack(function() {
	console.log('123');
});
// fnc 파라미터에 myCallBack 내 함수를 저장해서
// fnc 자리에 console.log('123'); 실행하는 것을 넣어서 
// mycallBack을 호출하면 fnc에 저장된 콜백함수를 호출하여 console.log('123'); 실행
// 콜백함수는 바로 실행시키는 것이 아닌 나중에 실행시키는 것을 목적으로 사용
// 파라미터로 넘겨주는 것은 모두 콜백함수

// 화살표 함수로 바꾸기
myCallBack(() => console.log('123'));
// function 제외, ((함수명) => 함수 실행내용);


[1, 2, 3].filter(function(num){
	return num === 3;
});
// filter : 배열 객체에서 사용하여 해당하는 값을 리턴해주는데, 리턴 값은 배열 객체로 배열 내에 넣어서 리턴


function myPrint() {
	console.log('123');
}

setTimeout(myPrint, 1000);
// 나중에 실행하는 목적으로 콜백함수를 파라미터로 설정하지만, myPrint()를 파라미터로 설정하면 실행


// 함수 만들기
// php 출력하는 함수(3초 뒤 출력)
// 504 출력하는 함수(5초 뒤 출력)
// 풀스택을 출력하는 함수(바로 출력)

let tt = function printPht() {
	console.log('php');
}

let rr = function print504() {
	console.log('504')
}

let ww = function printFullstack() {
	console.log('풀스택')
}

setTimeout(tt, 3000);
setTimeout(rr, 5000);
ww();

// let now = new Date(); // 오늘 date
// let year = now.getFullYear();
// let month = ('0' + (now.getMonth() + 1).slice(-2));


// 현재시간 출력하기
let now = new Date();
// 현재시간
let year = now.getFullYear();
// 년
let month = now.getMonth()+1;
// 월은 0~11로 반환되어서 +1 해줘야함
let date = now.getDate();
// 일
let hour = now.getHours();
// 시
let min = now.getMinutes();
// 분
let sec = now.getSeconds();
// 초

console.log(year + '-' + month + '-' + date + ' ' + hour + ':' + min + ':' +  sec);
// +사용할 때는 의미 두개 있으니까 주의하기 



// const BTNNAVER = document.getElementById('naver');
// BTNNAVER.onclick = function() {
// 	location.href = 'http:\/\/naver.com';
// }
// onclick 버튼 네이버로 이동

// const BTNNAVER2 = document.getElementById('naver');
// BTNNAVER1.addEventListener('click', function(){;
// 	location.href = 'http:\/\/www.naver.com';
// });
// onclick 버튼 네이버로 이동

// const BTNNAVER3 = document.getElementById('naver');
// BTNNAVER3.onclick = function() {
// 	location.href = 'http:\/\/www.naver.com';
// }
// onclick 버튼 네이버로 이동 


// 팝업으로 열기
// const BTNNAVER3 = document.getElementById('naver');
// let winOpen;
// BTNNAVER1.addEventListener('click', popOpen);

// function popOpen() {	
// 	winOpen = open('http:\/\/www.naver.com', '', 'width=1000 height=1000');
// }











