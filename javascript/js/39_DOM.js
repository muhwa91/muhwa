// 1. document object model(DOM)
// 웹 문서를 제어하기 위해서 웹 문서를 객체화한 것
// DOM API를 통해서 HTML의 구조나 내용 또는 스타일 등을 동적으로 조작 가능

// 2. 요소 선택
// 2-1. 고유한 ID로 요소 선택

const TITLE = document.getElementById('title');
TITLE.style.color = 'blue';
// > html 인라인으로 폰트 컬러 적용
TITLE.style.fontSize = '3rem';
// > html 인라인으로 폰트 크기 적용
// 개발자 도구로 적용 시에는 카멜기법

const SUBTITLE = document.getElementById('subtitle');

// 2-2. 태그명으로 요소 선택(해당 요소들을 컬렉션 객체로 가져옴)
const H2 = document.getElementsByTagName('h2');
// h2 태그가 많을 시에는 배열처럼 인덱스 차지
H2[0].style.color = 'red'; 
// > 서브서브
H2[1].style.color = 'aqua'; 
// > 서브서브1

// 2-3. 클래스로 요소 선택
const NONE = document.getElementsByClassName('none-li');

// 2-4. CSS 선택자를 사용해 요소 찾는 메소드
// querySelector() : 복수일 때 가장 첫번째 요소만 선택
const S_ID = document.querySelector('#subtitle2');
const S_NONE = document.querySelector('.none-li');
// querySelectorAll() : 복수요소 모두 선택
const S_NONE_ALL = document.querySelectorAll('.none-li');

// 3. 요소 조직
// textContent : 순수한 텍스트 데이터를 전달, 이전의 태그들은 모두 제거
TITLE.textContent = '<p>탕수육</p>';
// const DIV1 = document.querySelector('#div1');
// DIV1
// DIV1.textContent = '탕수육';
// div1 내 모든 태그 제거 후 탕수육 입력
// p태그 입력X

// innerHTML : 태그는 태그로 인식해서 전달, 이전의 태그들은 모두 제거
TITLE.innerHTML = '<p>탕수육</p>';

// setAttribute('', '') : 요소에 속성 추가
const INTXT = document.getElementById('intxt');
INTXT.setAttribute('placeholder', '집가고싶다')
// cf) 몇몇 속성들은 DOM객체에서 바로 설정 가능
// ex) INTXT.placeholder = 바로 접근 가능

// removeAttribute('') : 요소에 속성 제거
INTXT.removeAttribute('placeholder')

// 4. 요소 스타일링
TITLE.style.color = 'red'
// style : 인라인으로 스타일 추가

// classList : 클래스로 스타일 추가 또는 삭제
// TITLE.classList.add('class1', 'class2', 'class3');
// TITLE.classList.remove('class1', 'class2', 'class3');

// 5. 새로운 요소 생성
// 요소 생성
// const LI = document.createElement('li');
// LI.innerHTML = '영어도 못하고 수학도 못하고 ㅠㅠ';

// 삽입할 부모 요소 접근
// const UL = document.querySelector('#ul');

// 부모 요소 가장 마지막 위치 삽입
// UL.appendChild(LI);

// 요소 특정위치 삽입
// const SPACE = document.querySelector('li:nth-child(3)'); // 세번째로 이동
// UL.insertBefore(LI, SPACE); // 위치 조절해줌

// 요소 삭제
// LI.remove(); // 추가했던 '영어도 못하고 수학도 못하고 ㅠㅠ' 삭제

// 1. 사과게임 위에 장기를 넣어주세요 
const LI = document.createElement('li'); // 요소 생성
LI.innerHTML = '장기'; // 요소 생성
const UL = document.querySelector('#ul'); // 삽입할 부모 요소 접근
const SPACE = document.querySelector('li:nth-child(4)'); // 요소 특정위치 삽입
UL.insertBefore(LI, SPACE); // 요소 특정위치 삽입

// 2. 어메이징 브리에 베이지 배경색 넣기
const AMG = document.querySelector('li:nth-child(4)');
AMG.style.backgroundColor = 'beige';

// 3. 리스트에서 짝수는 빨간색 글씨, 홀수는 파랑색 글씨
// const LI1 = document.getElementsByTagName('li');
// const EVEN = document.querySelectorAll('li:nth-child(even)');
// const ODD = document.querySelectorAll('li:nth-child(odd)');
// for(let i=0; i<EVEN.length; i++) {
// 	EVEN[i].style.color = 'red';
// };
// for(let i=0; i<ODD.length; i++) {
// 	ODD[i].style.color = 'blue';
// };

const LISTEVENODD = document.getElementsByTagName('li');
const CNT = LISTEVENODD.length;
for(let i = 1; i <= CNT; i++){
    if ( i % 2 === 1) {
        LISTEVENODD[i-1].style.color = "blue";
    } else if ( i % 2 === 0) {
        LISTEVENODD[i-1].style.color = "red";
    } else {
        LISTEVENODD[i-1].style.color = "black";
    }
}


