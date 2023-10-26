<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\Prefectures;


class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'prefecture_id',
        'category_id',
        'title',
        'src',
        'posts_name',
        'posts_comment',
        'address',
        'posts_type',
        'stratTime',
        'endTime',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }public function prefectures(){
        return $this->belongsTo(Prefectures::class,'prefecture_id');
    }
}
