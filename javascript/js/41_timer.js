// 타이머 함수

// 1. setTimeout(콜백함수, 시간(ms)) : 일정시간 흐른 후 콜백함수 실행
// setTimeout(() => console.log('시간'), 3000);

// (1)
// 콘솔에 1초 뒤에 A, 2초 뒤에 B, 3초 뒤에 C가 출력
// setTimeout(console.log('A'), 1000);
// setTimeout(console.log('B'), 2000);
// setTimeout(console.log('C'), 3000);

// (2)
// setTimeout(
// 	() => {
// 		console.log('A');
// 		setTimeout(
// 			() => {
// 				console.log('B');
// 				setTimeout(
// 					() => {
// 						console.log('C');
// 					}, 1000);
// 			}, 1000);
// 		}, 1000);

// (3)
// function Time(chr, ms) {
// 	setTimeout(() => console.log(chr), ms);
// }

// Time('A', 1000);
// Time('B', 2000);
// Time('C', 3000);

// 2. clearTimeout(해당 setTimeout) : 타이머 삭제
let mySet = setTimeout(() => console.log('C'), 5000);
clearTimeout(mySet);

// 3. setinterval(콜백함수, 시간(ms)) : 일정 시간마다 반복
let myInter = setInterval(() => console.log('배고프다'), 1000);

// 4. clearinterval(해당 setinterval) : 반복 삭제
clearInterval(myInter);

// 화면을 로드하고 5초 뒤에 '두둥등장'이라는 매우 큰 글씨가 나타내기

// const H1 = document.createElement('h1');
// H1.innerHTML = '두둥등장';
// // const BODY = document.querySelector('body');
// const H1_1 = document.body;
// H1_1.appendChild(H1);

// 함수만들기 전
// setTimeout(() => {
// 	const H1 = document.createElement('h1');
// 	H1.innerHTML = '두둥등장';
// 	// const BODY = document.querySelector('body');
// 	document.body.appendChild(H1);
// 	H1.style.fontSize = '400px';
// }, 5000);

// 함수만든 후
function txt() {
	const H1 = document.createElement('h1');
	H1.innerHTML = '두둥등장';
	// const BODY = document.querySelector('body');
	document.body.appendChild(H1);
	H1.style.fontSize = '400px';
}

setTimeout(txt, 5000);



