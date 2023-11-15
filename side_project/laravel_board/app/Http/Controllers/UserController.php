<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class UserController extends Controller
{
    public function loginget() {
        // 로그인 유저 board.list 이동
        if(Auth::check()) {
            return redirect()->route('board.index');
        }
        return view('login');
    }
    
    public function loginpost(Request $request) {
            $validator = Validator::make( // 유효성 검사
            $request->only('email', 'password') // 이메일, 비밀번호
            , [
                'email' => 'required|email|max:50' // 필수입력, email, 최대입력                
                , 'password' => 'required' // 필수입력
            ]
        );

        if($validator->fails()) { // 유효성 검사 실패 시 처리
            return view('login')->withErrors($validator->errors());
        }

        // 유저정보 획득
        $result = User::where('email', $request->email)->first();
        if(!$result || !(Hash::check($request->password, $result->password))) {
            // 유저의 입력 비밀번호와 DB의 비밀번호 비교
            $errorMsg = '이메일과 비밀번호 다시 확인해주세요.';
            return view('login')->withErrors($errorMsg);
        }

        // 유저 인증
        Auth::login($result);
        if(Auth::check()) {
            session($result->only('id'));
        } else {
            $errorMsg = '인증 에러가 발생했습니다.';
            return view('login')->withErrors($errorMsg);
        }
        return redirect()->route('board.index');
    }

    public function registrationget() {
        return view('registration');
    }

    public function registrationpost(Request $request) {
        // 회원가입시 리퀘스트 객체로 받아야함
        // var_dump($request); 파라미터 확인 가능

        $validator = Validator::make( // 유효성 검사
            $request->only('email', 'password', 'passwordchk', 'name') // 이메일, 비밀번호, 비밀번호확인, 이름
            , [
                'email' => 'required|email|max:50' // 필수입력, email, 최대입력
                , 'name' => 'required|regex:/^[a-zA-Z가-힣]+$/|min:2|max:50' // 필수입력, 정규식, 최소입력, 최대입력
                , 'password' => 'required|same:passwordchk' // 앞 비밀번호와 동일한지 비교
            ]
        );
        // var_dump($validator->errors()); 유효성 검사 에러 체크(배열 리턴)
        
        if($validator->fails()) { // 유효성 검사 실패 시 처리
            return view('registration')->withErrors($validator->errors());
        }

        $data = $request->only('email', 'password', 'name'); // 배열로 only 내 데이터 확인가능        
        // var_dump($data);

        $data['password'] = Hash::make($data['password']); // 비밀번호 암호화        
        // var_dump($data);
        
        $result = User::create($data); // 회원정보 DB 저장
        // create 메소드 호출>이메일, 비밀번호, 이름 DB insert 처리
        // var_dump($result);       

        return redirect()->route('user.login.get');
        // cf)try catch문 사용하지 않아도 라라벨 내부에서 자동으로 잡아줌 
    }

    public function logoutget() {
        Session::flush(); // 세션파기
        Auth::logout(); // 로그아웃
        return redirect()->route('user.login.get');
    }
}
