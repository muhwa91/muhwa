// const NOW = new Date();
// let l1 = new Date();
// while(l1 - NOW <= 2000){
// 	l1 = new Date();
// }
// console.log('A');

// 동기 처리 : 하나씩 처리
// console.log('a');
// console.log('a');
// console.log('a');


// 비동기 처리 : 동시에 처리
// function my_setTimeout(callback, ms) {
// 	const NOW = new Date();
// 	let l1 = new Date();

// 	while(l1 - NOW <= ms){
// 		l1 = new Date();
// 	}
// 	callback();
// }

// my_setTimeout(() => console.log('a'), 1000);
// my_setTimeout(() => console.log('a'), 1000);
// my_setTimeout(() => console.log('a'), 1000);


// console.log('a');
// setTimeout(() => {
// 	console.log('b');
// }, 1000);
// console.log('c');

// a c b 처리
// console a, c는 callstack에서 처리
// console b는 web api에 저장해두고 Qstack에서 루프후에 callstack으로 이동하여 처리

// cba 출력
// a는 3초, b는 2초, c는 1초
// setTimeout(() => {
// 	console.log('a')
// }, 3000);
// setTimeout(() => {
// 	console.log('b')
// }, 2000);
// setTimeout(() => {
// 	console.log('c')
// }, 1000);



// abc순서대로 출력
// 콜백지옥(비동기처리를 동기처리로 하고싶을 때)
// 콜백지옥 : 콜백함수를 이용하여 비동기 처리를 동기처리하도록 만들 때 나타나는 소스코드의 난잡한 현상
setTimeout(() => {
	console.log('a');
	setTimeout( () => {
		console.log('b');
		setTimeout(() => {
			console.log('c')
		}, 1000);
	}, 2000);
}, 3000);

// <비동기 처리/setTtimeout>
// 1. 콜스택 전체 진입
// 2. web api 진입하여 setTimeout 처리
// 3. Qstack console.log('a') 전체 진입
// 4. 콜스택 빈 공간으로 console.log('a') 이하 진입 후 처리
// 5. web api 진입하여 setTimeout 처리
// 6. Qstack colsole.log('b') 전체 진입
// 7. 콜스택 빈 공간으로 console.log('b') 이하 진입 후 처리
// 8. web api 진입하여 setTimeout 처리
// 9. Qstack colsole.log('c') 전체 진입
// 10. 콜스택 빈 공간으로 console.log('c') 이하 진입 후 처리