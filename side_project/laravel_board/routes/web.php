<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BoardController;

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
    return view('login');
});

// 유저관련
Route::get('/user/login', [UserController::class, 'loginget'])->name('user.login.get'); // 로그인 화면 이동
Route::middleware('my.user.validation')->post('/user/login', [UserController::class, 'loginpost'])->name('user.login.post'); // 로그인 처리
Route::get('/user/registration', [UserController::class, 'registrationget'])->name('user.registration.get'); // 회원가입 화면이동
Route::middleware('my.user.validation')->post('/user/registration', [UserController::class, 'registrationpost'])->name('user.registration.post'); // 회원가입 화면이동
Route::get('/user/logout', [UserController::class, 'logoutget'])->name('user.logout.get'); // 로그아웃 처리

// 보드관련
Route::middleware('auth')->resource('/board', BoardController::class);
// 공통된 처리가 있을 때 미들웨어로 처리 가능 ex)로그인 체크, 로그인 화면에서 board url 입력 시 접속불가
// 미들웨어 인증을 앞에 두면 http처리 전 체크, 뒤에 두면 처리 후에 체크

//   GET|HEAD        user ............................ user.index › UserController@index  로그인 화면이동
//   GET|HEAD        user/{user}/edit .................. user.edit › UserController@edit  로그인 처리
//   GET|HEAD        user/create ................... user.create › UserController@create  회원가입 화면이동
//   POST            user ............................ user.store › UserController@store  회원가입 처리
//   GET|HEAD        user/{user} ....................... user.show › UserController@show  회원정보 화면이동
//   PUT|PATCH       user/{user} ................... user.update › UserController@update  회원정보 update 처리
//   DELETE          user/{user} ................. user.destroy › UserController@destroy  회원 탈퇴 처리

//   GET|HEAD        board ...................................... board.index › BoardController@index  게시판 화면이동
//   POST            board ...................................... board.store › BoardController@store  게시글 insert 처리
//   GET|HEAD        board/create ............................. board.create › BoardController@create  게시글 create 화면이동
//   GET|HEAD        board/{board} ................................ board.show › BoardController@show  게시글 detail 화면이동
//   PUT|PATCH       board/{board} ............................ board.update › BoardController@update  게시글 update 처리
//   DELETE          board/{board} .......................... board.destroy › BoardController@destroy  게시글 delete 처리
//   GET|HEAD        board/{board}/edit ........................... board.edit › BoardController@edit  게시글 update 화면이동

// <생성 명령어>
// 모델 생성 : php artisan make:model 모델명 -mfs
// cf)-mfs 옵션으로 migration, factory, seeder 한번에 생성
// 컨트롤러 생성 : php artisan make:controller 컨트롤러명 --resource
// 시더 생성 : php artisan make:seeder
// 테이블 생성 : php artisan migrate
// 팩토리 생성 : php artisan make:factory 팩토리명 --model=모델명
// 미들웨어 생성 : php artisan make:middleware 미들웨어명