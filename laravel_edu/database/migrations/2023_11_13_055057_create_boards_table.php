<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            // 컬럼세팅 부분
            $table->id(); 
            // default : big_int, pk, auto_increment / id('컬럼명') 변경 가능
            $table->string('title', 50); 
            // var_char(50) 생성 / default : not null / null 허용하고 싶을 때 ->nullable();
            // char로 작성시 : char('title')
            $table->string('content', 1000);
            // var_char(50) 생성 / default : not null
            $table->timestamps();
            // default('CURRENT_TIMESTAMP'); 현재날짜 설정
            // $table->timestamps(); / 자동으로 created_at, updated_at 라라벨 내부 설정 값으로 생성해줌
            // created_at, updated_at / default : null(라라벨 내부 설정 값)
            // cf) 설정하고 싶은 값과 다를 경우 라라벨 내부 설정 값 timestamps()보다 직접 생성하는게 좋음
            $table->softDeletes(); 
            // deleted_at / default : nullable
        }); 
    }    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
};
