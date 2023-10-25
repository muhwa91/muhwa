// 원본을 보존하면서 오름차순 정렬
const ARR1 = [6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40];

// const ARR2 = Array.from(ARR1);
// const arr_sort = ARR2.sort((a, b) => a - b);

// 짝수와 홀수를 분리해서 각각 새로운 배열 생성(함수로도 생성)
const ARR2 = [5, 7, 3, 4, 5, 1, 2];

// let arr_filter = ARR2.filter(num => num % 2 === 0); 짝수
// let arr_filter = ARR2.filter(num => num % 2 === 1); 홀수
function test(arr, flg) {
	if(flg === 0) {
		return arr.filter(num => num % 2 === 0);
	} else {
		return arr.filter(num => num % 2 === 1);
	}
}
// 전역변수는 함수내에서 쓰지말자

// 다음 문자열에서 구분문자를 '.'에서 ' '(공백)으로 변경
const STR1 = 'php504.meer.kat';
const STR2 = STR1.split('.'); // 배열로 변경
const STR3 = STR2.join(' '); // join으로 공백으로 변경
// STR1.split('.').join( );
// STR1.replaceAll('.', ' ');
// STR1.replace(/\./g, ' ');

