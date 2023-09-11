<?php
// IF 만들기
// 성적
// 범위 :
// 이상~미만
// 100 : A+
// 90~99 : A
// 80~89 : B
// 70~79 : C
// 60~69 : D
// 60미만 : F

// 출력 문구 : "당신의 점수는 XXX점 입니다. <등급>"

// 0~100 입력 받았을 때, "당신의 점수는 XXX점 입니다. <등급>" 라고 출력 하고,
// 그 외의 값일 경우 "잘못된 값을 입력 했습니다." 라고 출력

$num = 1000;
$grade = "";
$answer = "당신의 점수는 %u점 입니다. <%s>";

if( $num >= 0 && $num >= 100 ) {
    echo "잘못된 값을 입력 했습니다.";
}
else {
    if( $num === 100) {
    // echo "당신의 점수는 {$num}점 입니다. <A+>";
    $grade = "A+";
}
    else if( $num >= 90 ) {
    // echo "당신의 점수는 {$num}점 입니다. <A>";
    $grade = "A";
}
    else if( $num >= 80 ) {
    // echo "당신의 점수는 {$num}점 입니다. <B>";
    $grade = "B";
}
    else if( $num >= 70 ) {
    // echo "당신의 점수는 {$num}점 입니다. <C>";
    $grade = "C";
}
    else if( $num >= 60 ) {
    // echo "당신의 점수는 {$num}점 입니다. <D>";
    $grade = "D";
}
    else {
    // echo "당신의 점수는 {$num}점 입니다. <D>";
    $grade = "F";
}
$str = sprintf($answer, $num, $grade);
    echo $str;
}





// 문구를 수정할 때 변수 값 grade 설정하여 수정 한번에 해서 출력 가능


?>