<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Item;


class ItemController extends Controller
{
    public function index() {

        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => []
        ];

        $result = Item::orderBy('created_at', 'desc')->get();

        if($result->count() < 1) {
            $responseData['code'] = 'E01';
            $responseData['msg'] = 'No Data.';            
        } else {
            $responseData['data'] = $result;
        }

        return $responseData;
    }
    // 게시글 작성
    public function store(Request $request) {
        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => []
        ];
        $result = Item::create($request->data); 

        $responseData['data'] = $result;

        return $responseData;
        // 라라벨이 제이슨으로 변환해줌
    }
    // {
    //     "data": {
    //         "content" : "뽀삐뽀삐뽀삐뽀삐뽀삐뽀삐뽀삐뽀"
    //     }
    // } 포스트맨 입력(body>raw>json)

    
    // 게시글 수정
    public function update(Request $request, $id) {
        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => []
        ];

        $result = Item::find($id);

        if(!$result) {
            // 데이터 0건 
            $responseDate['code'] = 'E01';
            $responseDate['msg'] = 'No Data.';
        } else {
            // 정상 처리
            $result->completed = $request->data['completed'];
            $result->completed_at = $request->data['completed'] === '1' ? Carbon::now() : null;
            $result->save();
            $responseData['data'] = $result;
        }
        return $responseData;
    }
    // { 
    //     "data" : {
    //         "completed" : "1"
    //     }
    // } 포스트맨 입력(body>raw>json)

    //게시글 삭제
    public function destroy($id) {
        $responseData = [
            'code' => '0'
            ,'msg' => ''
        ];

        $result = Item::find($id);

        if(!$result) {
            // 데이터 0건 
            $responseDate['code'] = 'E01';
            $responseDate['msg'] = 'No Data.';
        } else {
            // 정상 처리           
            $result->delete();
        }
        return $responseData;
    }
}

// http://localhost:8000/api/item 
// 수정, 삭제 파라미터 설정 필요
