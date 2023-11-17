<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    // 디폴트 설정
    protected $attributes = [
        'completed' => '0'
    ];

    // 화이트 리스트 설정
    protected $fillable = [
        'content'
    ]; 
    
    // date 설정
    protected $dates = [
        'completed_at'
    ];

    // api로 JSON을 파싱할 때 TimeZone 맞추는 설정
    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }
}
