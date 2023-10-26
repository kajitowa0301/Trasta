<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Posts;


class Prefectures extends Model
{
    use HasFactory;

    public function posts(){
        return $this->hasMany(Posts::class,'prefecture_id');
    }
}
