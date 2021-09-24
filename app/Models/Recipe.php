<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    // テーブル名を指定
    protected $table = "user_recipe";

    // カラム列挙
    protected $fillable = ['name' . 'url', 'descripton', 'user_id'];
}
