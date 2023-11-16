<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Board extends Model
{
    use HasFactory, softDeletes;

    protected $primaryKey = 'b_id';
    protected $fillable = [
        'b_title',
        'b_content',
    ];
}
