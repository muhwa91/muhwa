<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Board;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        if(!Auth::check()) { // 로그인 체크(권한 없을 때는 board 주소 입력했을 때 리다이렉트)
            return redirect()->route('user.login.get');
        }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Auth::check()) { // 로그인 체크(권한 없을 때는 board 주소 입력했을 때 리다이렉트)
            return redirect()->route('user.login.get');
        }

        $result = 
        // Board::where('b_id', '=', $id)
        //     ->get();
        Board::find($id);
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
        //
    }
}
