<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Board;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        /* del 231116 미들웨어로 이관
        // if(!Auth::check()) { // 로그인 체크
        //     return redirect()->route('user.login.get');
        } (권한 없을 때는 board 주소 입력했을 때 리다이렉트)
        */

        // 게시글 획득
        $result = Board::get(); // DB에 있는 데이터 저장
        
        return view('list')->with('data', $result); // list 페이지에서 DB에서 받아온 데이터를 저장한 $result를 data에 저장하여 사용
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // 작성처리 
        $data = $request->only('b_title', 'b_content'); // 배열로 only 내 데이터 확인가능        
        // var_dump($data);
        
        $result = Board::create($data); // 게시판 작성 제목,내용 DB 저장(엘로퀀트)
        // create 메소드 호출>제목, 내용 DB insert 처리
        // create는 insert처리만 가능
        // var_dump($result);

        return redirect()->route('board.index');
        // cf)try catch문 사용하지 않아도 라라벨 내부에서 자동으로 잡아줌

        // 강사님 방법 1)
        // $arrInputData = $request->only('b_title', 'b_content');
        // $result = Board::create($arrInputData);
        // return redirect()->route('board.index');

        // 강사님 방법 2)
        // $model = new Board($arrInputDate);
        // $model->save();
        // return redirect()->route('board.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* del 231116 미들웨어로 이관
        // if(!Auth::check()) { // 로그인 체크(권한 없을 때는 board 주소 입력했을 때 리다이렉트)
        //     return redirect()->route('user.login.get');
        // }
        */

        $result = Board::find($id); // 게시글 데이터 획득
        // Board::where('b_id', '=', $id)->get(); 
        // cf) '=' 생략가능

        // 조회수 올리기
        $result->b_hits++; // 조회수 1 증가
        $result->timestamps = false; 
        // timestamps 현재 시간 기준으로 처리되기 때문에 false 변경

        // 업데이트 처리
        $result->save(); // save 메소드 사용 시 변경 값 업데이트

        return view('detail')->with('data', $result);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Log::debug("*****삭제처리 시작*****");
        try {
            DB::beginTransaction();
            Log::debug("*****트랜잭션 시작*****");
            Board::destroy($id);
            Log::debug("*****삭제 완료*****");
            DB::commit();
            Log::debug("*****커밋 완료*****");
            return redirect()->route('board.index');     
        } catch(Exception $e) {
            DB::rollback();
            Log::debug("*****예외 발생 : 롤백 완료*****");
            return redirect()->route('error')->withError($e->getMessage());
        } finally {
        Log::debug("*****삭제처리 종료*****");
        }
    }
    // softDeletes : 보드모델에서도 설정해줘야함
    // deleted_at 설정되어있을 때 소프트딜리트로 삭제된 날짜 데이터 입력가능
    // find($id)+delete() = destroy($id)
    // use Illuminate\Database\Eloquent\softDeletes;
    // use HasFactory, softDeletes;
}