<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class MyUserValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {  
        //미들웨어가 작동할 때 어떠한 처리 할지 정해야함

        Log::debug("*****유저 유효성 체크 시작*****");

        // 항목리스트
        $arrBaseKey = [ // DB 컬럼명
            'email'
            ,'name'
            ,'password'
            ,'passwordchk'            
        ];

        // 유효성 체크리스트
        $arrBaseValidation = [
            'email' => 'required|email|max:50' // 필수입력, email, 최대입력
            , 'name' => 'required|regex:/^[a-zA-Z가-힣]+$/|min:2|max:50' // 필수입력, 정규식, 최소입력, 최대입력
            , 'password' => 'required' 
            , 'passwordchk' => 'same:passwordchk' // 앞 비밀번호와 동일한지 비교
        ];

        // request 파라미터(유저가 제출한 값)
        $arrRequestParam = [];

        foreach($arrBaseKey as $val) { // 리퀘스트에 해당 키를 가져오기 위해서 루프
            if($request->has($val)) {
                $arrRequestParam[$val] = $request->$val;
            } else {
                unset($arrBaseValidation[$val]); 
                // 루프 진행하면서 리퀘스트 값이 없을 때에는 unset 메소드 사용하여
                // 리퀘스트 값이 없는 유효성 체크리스트 값을 지우는 역할
                // ex) name 리퀘스트 값이 없으면 유효성 체크리스트 name의 값도 삭제
            }
        }

        Log::debug("리퀘스트 파라미터 획득", $arrRequestParam);
        Log::debug("유효성 체크 리스트 획득", $arrBaseValidation);

        // 유효성 검사
        $validator = Validator::make($arrRequestParam, $arrBaseValidation); 
           
        if($validator->fails()) { // 유효성 검사 실패 시 처리
            return redirect('/'.$request->path())->withErrors($validator->errors());
        }

        Log::debug("*****유저 유효성 체크 종료*****");
        return $next($request);
    }
}
