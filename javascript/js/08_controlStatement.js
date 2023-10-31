// 조건문 ( if, switch )
// if(조건) {
// 	//처리	
// } else if(조건) {
// 	//처리
// } else {
// 	//처리
// }


// switch(검증할값) {
// 	case 비교값1:
// 		//처리
// 		break;
// 	case 비교값2:
// 		//처리
// 		break;
// 	default:
// 		//처리
// 		break;
// }

let age = 30;
switch(age) {
	case 20:
		console.log("20대");
		break;
	case 30:
		console.log("30대");
		break;
	default:
		console.log("모름");
		break;
}


// 반복문 ( while, do_while, for, foreach, for...in, for...of )
// 1. foreach : arr 객체만 가능
let arr = [1, 2, 3, 4];
// arr.forEach( function( val, key) {
// 	console.log(`${key} : ${val}`);
// });

// 2. for...in : 모든 객체를 루프 가능, key에만 접근 가능(value 불가)
let obj = {
	key1: 'val1'
	,key2: 'val2'
};

for( let key in obj ) {
	console.log(obj[key]);
}
// key1, key2 출력

// 3. for...of : 모든 iterable객체를 루프 가능, value에만 접근 가능(key 불가)
// iterable객체 : string, array, map, set, typearray 등 순서 정해져 있는 객체

for( let val of arr) {
	console.log(val);
}


// 정렬하기(버블 정렬)
let sort_arr = [3, 5, 2, 7, 10];
sort_arr.sort(function(a, b) {
	return a - b;
});

sort_arr.sort((a, b) => a - b);
console.log(sort_arr);
// 3.5 > 정렬해서 5 3 위치변경
// 3.2 > 정렬 X
// 양수면 정렬해서 바꿈
// 음수면 정렬 X

for( let i = 0; i < sort_arr.length; i ++) {
	for(let z = 0; z < sort_arr.length - i - 1; z++) {
		if(sort_arr[z] > sort_arr[z+1]) {
			let tamp = sort_arr[z];
			sort_arr[z] = sort_arr[z+1];
			sort_arr[z+1] = tamp;
		}
	}
}
console.log(sort_arr);




































