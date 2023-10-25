let arr = [1, 2, 3, 4, 5];

// push() 메소드 : 배열에 값을 추가
// arr.push(6);
// push하면 배열 가장 뒤에 값이 들어감

// splice() : 배열의 요소를 삭제 또는 교체
// arr.splice(2, 1);
// 2번 방에서 시작하여 1개의 값 삭제(인덱스 x에서 n개를 삭제)
// 방 번호 재 정렬해줌
// [1, 2, 4, 5, 6]

// arr.splice(4, 1);
// [1, 2, 3, 4]

// arr.splice(2, 0, 10); 
// [1, 2, 10, 3, 4, 5]
// 인덱스 2에서 0개 삭제하고 10 삽입

// arr.splice(2, 1, 10);
// [1, 2, 10, 4, 5]
// 인덱스 2에서 1개 삭제하고 10 삽입

// arr.splice(2, 1, 'aaa');
// [1, 2, 'aaa', 4, 5]

// arr.splice(2, 0, 10, 11, 12, 13);
// [1, 2, 10, 11, 12, 13, 3, 4, 5]
// 인덱스 2에서 0개 삭제하고 10, 11, 12, 13 삽입
// 세번째 아규먼트부터는 가변파라미터로써 모든 값 추가

// indexOf() : 배열에서 특정 요소를 찾는데 사용
// arr.indexOf(4);
// 3 / 4가 인덱스 3에 위치

// lastIndexOf() : 배열에서 특정 요소 중 가장 마지막에 위치한 요소를 찾는데 사용
// arr = [1, 1, 1, 3, 4, 5, 6, 6, 6, 10];
// arr.lastIndexOf(6);
// 8 / 인덱스 8이 6 마지막 위치

// pop() : 배열의 가장 마지막 요소 삭제하고 삭제한 요소 값 리턴
arr.pop();
let i_pop = arr.pop();

// sort() : 배열을 정렬
arr = [5, 4, 6, 7, 3, 2];
// 오름차순 정렬
// let arr_sort = arr.sort((a,b) => a - b);
let arr_sort = arr.sort( function(a, b) {
	return a - b;
});

// 내림차순 정렬
arr_sort = arr.sort((a, b) => b - a);
// let arr_sort = arr.sort (function(a, b) {
// 	return b - a;
// });

// 원본데이터와 별도로 새로 배열을 만드는 방법(value copy 방식)
let arr1 = arr;
let arr2 = Array.from(arr);

// includes() : 배열의 특정요소를 포함하고 있는지 판별
arr = ['치킨', '육회비빔밥', '비엔나'];
let boo_includes = arr.includes('짜장면');
// arr.includes('치킨'); > true
// arr.includes('짜장면'); > false
// return boolean

// join() : 배열의 모든 요소를 연결해서 하나의 문자열 리턴
// arr.join();
// '치킨,육회비빔밥,비엔나' > , 디폴트
// arr.join('/'); 
// '치킨/육회비빔밥/비엔나'

// map() : 배열의 모든 요소에 대해서 주어진 함수의 결과를 모아서 새 배열을 리턴
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
// 모든 요소의 값 * 2 결과 배열로 획득
let arr_map = arr.map(num => num * 2);
// [2, 4, 6, 8, 10, 12, 14, 16, 18] 

// 3의 배수는 '짝'
arr_map = arr.map( num => {
	if( num % 3 === 0) {
		return '짝';
	} else {
		return num;
	}
});

// some() : 주어진 함수를 만족하는 요소가 있는지 판별해서 하나라도 있으면 true (return = boolean)
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
// let boo_some = arr.some(num => num === 9);
// true
// let boo_some = arr.some(num => num > 10);
// false

// every() : 배열의 모든 요소가 주어진 함수에 만족하면 true, 하나라도 만족 안하면 false (return = boolean)
// let boo_every = arr.every(num => num === 9);

// filter() : 배열의 요소 중에 주어진 함수에 만족한 요소만 모아서 새로운 배열을 리턴
let boo_filter = arr.filter(num => num === 9);
















