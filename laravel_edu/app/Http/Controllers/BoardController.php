<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    public function index() {

        // 쿼리 빌더

        $result = DB::select('select * from boards limit 10');
        // 1)
        $result = DB::select('select * from boards limit :no offset :no2', ['no' => 1, 'no2' => 10]);
        // 2)
        $result = DB::select('select * from boards limit ? offset ?', [2, 10]);

        // 카테고리가 4, 7, 8인 게시글 수 출력
        $arr = [4, 7, 8];
        $result = DB::select('select count(id) from boards where categories_no=? or categories_no=? or categories_no=?', $arr);
        // $result = DB::select('select count(id) from boards where categories_no=4 or categories_no=7 or categories_no=8');

        // 카테고리별 게시글 갯수 출력
        $result = DB::select('select count(id) cnt from boards group by categories_no');

        // 카테고리별 게시글 갯수 + 카테고리 명 출력
        $result = DB::select('select count(boa.categories_no), cat.name 
                                from boards boa
                                JOIN categories cat
                                ON boa.categories_no = cat.no
                                GROUP BY boa.categories_no, cat.name');

        $result = DB::select(
            'SELECT
                ca.no
                ,ca.name
                ,COUNT(ca.no) cnt
             FROM boards bo
                JOIN categories ca
                    ON bo.categories_no = ca.no
                 GROUP BY ca.no, ca.name' // 그룹바이로 묶어준 컬럼명만 셀렉트에서 사용 가능
        );

        // insert
        // $sql =
        //     'INSERT INTO boards(
        //         title
        //         , content
        //         , created_at
        //         , updated_at
        //         , categories_no
        //     )
        //     VALUES(?, ?, ?, ?, ?)';
            
        // $arr = [
        //     '제목1'
        //     , '내용1'
        //     , now()
        //     , now()
        //     , '0'
        // ]; 

        // DB::beginTransaction();
        // DB::insert($sql, $arr);
        // DB::commit();

        $result = DB::select('SELECT * FROM boards ORDER BY id DESC LIMIT 1');

        // update
        
        // DB::beginTransaction();
        // DB::update(
        //         'UPDATE boards SET title = ?, content = ? WHERE id = ?'
        //             , ['업데이트', '업', $result[0]->id]
        //         );
        // DB::commit();

        // delete
        // DB::beginTransaction();
        // DB::delete('DELETE FROM boards WHERE id = ?', [$result[0]->id]);
        // DB::commit();
        
        
        // 쿼리 빌더 체이닝
        // select * from boards where id = 300;
        $result = 
            DB::table('boards')
            ->where('id', '=', 300)
            ->get();
        
        
        // select * from boards where id = 300 or id = 400;
        
        $result = 
            DB::table('boards')
            ->where('id', '=', 300)
            ->orWhere('id', '=', 400)
            ->get();

        // select * from categories where no in (?, ?, ?);
        $result = 
            DB::table('categories')
            ->whereIn('no', [1, 2, 3])
            ->get();

        // select * from categories where no not in (?, ?, ?);
        $result = 
            DB::table('categories')
            ->whereNotIn('no', [1, 2, 3])
            ->get();
        
        // first() : limit1과 유사
        $result = DB::table('boards')->orderBy('id', 'desc')->first();

        // count() : 결과의 레코드 수 반환
        $result = DB::table('boards')->count();

        // max() : 해당 컬럼의 최대값
        $result = DB::table('categories')->max('no');

        // 타이틀, 내용, 카테고리명 까지 출력 100개
        $result = DB::table('boards')
        ->select('boards.title', 'boards.content', 'categories.name')
        ->join('categories', 'categories.no', 'boards.categories_no')
        ->limit(100)
        ->get();
        
        // 카테고리별 게시글 갯수와 카테고리명 출력
        $result = DB::table('boards')
        ->select('categories.name', 'categories.no', DB::raw('count(categories.no) as cnt'))
        ->join('categories', 'categories.no', 'boards.categories_no')
        ->groupBy('categories.no', 'categories.name')
        ->get();
        



        return var_dump($result);
    }
}






