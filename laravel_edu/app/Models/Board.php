<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
}
// 모델 생성 : php artisan make:model 모델명 -mfs
// [-mfs] 옵션으로 migration, factory, seeder 한번에 생성
// 컨트롤러 생성 : php artisan make:controller 컨트롤러명 --resource
// 시더 생성 : php artisan make:seeder
// 테이블 생성 : php artisan migrate 