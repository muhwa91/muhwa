// date
let now = new Date(); // 오늘 date
// Wed Oct 25 2023 12:59:41 GMT+0900 (한국 표준시)
let sDate = new Date('2023-09-30 19:20:30');

// 연도
// getFullyear() : 연도 가져오는 메소드
console.log(now.getFullYear());
let year = now.getFullYear();

// 월
// getMonth() : 월 가져오는 메소드 (+1을 해줘야 현재 월)
console.log(now.getMonth() + 1);
let month = now.getMonth() + 1;

// 일
// getDate() : 일 가져오는 메소드
console.log(now.getDate());
let date = now.getDate();

// year + '년 ' + month + '월 ' + date + '일';
// '2023년 10월 25일'

// 요일
// getDay() : 요일 가져오는 메소드 (0(일)~6(토))
console.log(now.getDay());
let day = now.getDay();
let kDay = '';
switch (day) {
	case 1:
		kDay = '월요일';
		break;
	case 2:
		kDay = '화요일';
		break;	
	case 3:
		kDay = '수요일';
		break;
	case 4:
		kDay = '목요일';
		break;	
	case 5:
		kDay = '금요일';
		break;	
	case 6:
		kDay = '토요일';
		break;		
};
// year + '년 ' + month + '월 ' + date + '일 ' + kDay;
// '2023년 10월 25일 수요일' 

// 시
// getHours() : 시를 가져오는 메소드
console.log(now.getHours());

// 분
// getMinutes() : 분을 가져오는 메소드
console.log(now.getMinutes());

// 초
// getSeconds() : 초를 가져오는 메소드
console.log(now.getSeconds());

// 밀리초
// getMilliSeconds() : 밀리초를 가져오는 메소드
console.log(now.getMilliseconds());

// 
// getTime() : 1970/01/01 기준으로 얼마나 지났는지 밀리초를 가져오는 메소드
console.log(now.getTime());

// 기준일 : 2023-09-30 19:20:10
// 오늘로부터 몇일 전인지 구하기
now = new Date(); // 오늘 date
sDate = new Date('2023-09-30 00:00:00');
now_2 = new Date(year, month-1, date, 0, 0, 0, 0); // 오늘날짜 0시 0분 0초 0밀리초 가져오는 방법

let diff = Math.abs(Math.floor((now_2.getTime() - sDate.getTime()) / (1000 * 60 * 60 * 24)));
let diff1 = Math.abs(Math.floor(( now_2 - sDate ) / (1000 * 60 * 60 * 24)));


