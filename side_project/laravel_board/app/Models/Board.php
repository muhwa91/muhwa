<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Board extends Model
{
    use HasFactory, softDeletes;

    protected $primaryKey = 'b_id';
    // pk 정의 (정의 하지 않았다면 'id'컬럼을 pk로 인식)
    protected $fillable = [
        'b_title',
        'b_content',
    ];
    // 대량 할당을 이용한 취약성 대책
    // 1)화이트 리스트 : 수정 가능 컬럼 설정
    // protected $fillable = ['컬럼1', '컬럼2'];
    // 2)블랙 리스트 : 수정 불가능 컬럼 설정
    // protected $guarded = ['컬럼1', '컬럼2'];

    // softDeletes
    // 레코드를 DB에서 완전 제거하지 않고, 삭제 레코드에 대해 표시하여 필요 시 복구 가능
    // DB 테이블 내에 deleted_at 타임스탬프 컬럼 존재 필요
    // delete() 메소드 호출 시 실제 삭제 되지 않고, deleted_at 컬럼에 현재 날짜와 시간 저장

    // 삭제 레코드 확인 방법
    // 1)삭제 레코드 포함 모든 레코드 조회 $records = 모델명::withTrashed()->get();
    // 2)삭제 레코드만 조회 $deletedRecords = 모델명::onlyTrashed()->get();

    // 삭제 레코드 복구
    // 모델명::withTrashed()->where('조건')->restore();
}
