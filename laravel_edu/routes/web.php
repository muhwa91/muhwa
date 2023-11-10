<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// 라우트 정의


//문자열 리턴
Route::get('/hi', function () {
    return '하이'; // 하이 문자열만 출력
});
// Route::get('localhost 다음 url 설정', function () {
//     return '하이';
// });

//없는 뷰파일 리턴
Route::get('/myview', function () {
    return view('myview'); // 없는 뷰파일 리턴 값으로 받으면 에러페이지 출력
});
//실제서비스 env app debug=false 변경 / true = 에러페이지 출력

//HTTP 메소드 대응하는 라우터
//여러 라우트에 해당될 경우 가장 마지막에 정의 된 것이 실행
//get메소드 localhost/home으로 접속했을 때 home 뷰파일 리턴

//get, post, put, delete
//GET 요청
Route::get('/home', function () {
    return view('home'); //라라벨에서는 콜백함수가 아니라 클로저라고 명명
});
//view 파일 없을 때에는 view파일이름.blade.php 로 생성

//POST 요청
Route::post('/home', function () {
    return '메소드 : POST';
});

//PUT 요청
//view form내에 @method('PUT')를 기재해주면 put 메소드로 처리함
Route::put('/home', function () {
    return '메소드 : PUT';
});

//DELETE 요청
Route::delete('/home', function () {
    return '메소드 : delete';
});


//라우트에서 파라미터 제어


//쿼리 스트링에 파라미터가 세팅되어서 요청이 올 때 파라미터 획득
Route::get('/query', function (Request $request) {
    return $request->id.", ".$request->name;
}); //클로저 파라미터로 받으면 어떤 메소드로 오던지 다 받을 수 있음

//URL 세그먼트로 지정 파라미터 획득
Route::get('/segment/{id}', function ($id) { //세그먼트 파라미터 url 주소 설정해 줄 때에는 {} 적어줘야함
    return '세그먼트 파라미터: '.$id;
});

//2개 이상의 URL 세그먼트로 지정 파라미터 획득
Route::get('/segment/{id}/{name}', function ($id, $name) {
    return '세그먼트 파라미터 2개 이상: '.$id.', '.$name;
}); 

//세그먼트 파라미터 id, name을 Request $request, $id 받아서 id값을 두번 받아올 수도 있음
Route::get('/segment/{id}/{name}', function (Request $request, $id) {
    // return '세그먼트 파라미터 22222: '.$request->id.', '.$id;
    return '세그먼트 파라미터 22222: '.$request->id.', '.$request->name; // 주의 : $request 내에서 id, name 데이터 추출할 때에는 $붙이지 않음
}); 

//URL 세그먼트로 지정 파라미터 획득 : 기본값 설정
Route::get('segment3/{id?}', function ($id = 'base') {
    return 'segment3 : '.$id;
});

//라우트 매칭 실패시 대체 라우트 정의
Route::fallback(function () {
    return '잘못된 경로를 입력하셨습니다.';
}); // 멀티보드 라우터에서 이상한 url 입니다 echo 출력한 처리와 동일하게 처리 할 수 있는 방법

//라우트의 이름 지정
Route::get('/name', function () {
    return view('name');
});
Route::get('/name/home/php504/root', function () {
    return '이름 없는 라우트';
});

Route::get('/name/home/php504/user', function () {
    return '이름 있는 라우트';
})->name('name.user'); // . 기능을 구분해주는 역할




//컨트롤러
//커멘드로 컨트롤러 생성 : php artisan make:controller 컨트롤러명
use App\Http\Controllers\TestController;
Route::get('/test', [TestController::class, 'index'])->name('test.index'); //라우터의 이름(해당기능명, 액션명)
// ('/test', [TestController::class, 'index']) url에 컨트롤러의 해당 메소드로 연결 시켜주는 문법
// 체이닝 메소드 -> 사용하여 변수 name를 만들어서 해당 값 출력


//커멘드로 컨트롤러 생성 : php artisan make:controller 컨트롤러명 --resource

//GET|HEAD        task .................... task.index › TaskController@index  
//POST            task .................... task.store › TaskController@store  
//GET|HEAD        task/create ............. task.create › TaskController@create  
//GET|HEAD        task/{task} ............. task.show › TaskController@show  
//PUT|PATCH       task/{task} ............. task.update › TaskController@update  
//DELETE          task/{task} ............. task.destroy › TaskController@destroy  
//GET|HEAD        task/{task}/edit ........ task.edit › TaskController@edit

