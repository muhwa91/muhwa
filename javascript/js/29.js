Math.ceil(3.5); // 올림
Math.round(3.5); // 반올림
Math.floor(3.5); // 버림




// random(); : 0 이상 1 미만의 랜덤한 수 반환
let ran = Math.ceil((Math.random() *10));

// 루프 100만번 얼마 안걸림
console.log('루프시작');
for(i = 0; i < 1000000; i++) {
	let rannum = Math.ceil((Math.random() * 10));
	if( rannum < 1 || rannum > 10){
		console.log('이상함');
	}
}
console.log('루프끝');

// min(), max() : 파라미터 중 가장 작은 값, 가장 큰 값을 리턴
let arr = [1, 2, 3];
Math.min(...arr); // 1
Math.max(...arr); // 3

