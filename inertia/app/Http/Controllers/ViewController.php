<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Posts;
use App\Models\Category;
use App\Models\Prefectures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ViewController extends Controller
{
        // ホーム画面
    public function index(Posts $posts){
        // 観光名所表示
        $posts = Posts::where('posts_type', 0)->orderBy('posts_id','desc')->
        take(5)->with('user')->with('prefectures')->with('category')->get();
        // 飲食店表示
        $restran = Posts::where('posts_type', 1)->orderBy('posts_id','desc')->
        take(5)->with('user')->with('prefectures')->with('category')->get();

       return Inertia::render('Index',compact('posts','restran'));
    }
    // 観光名所関係
    public function kankouList(Posts $posts){
        $posts = Posts::where('posts_type', 0)->latest('posts_id')->with('user')->with('prefectures')->with('category')->get();
        return Inertia::render('Kankou/KankouList',compact('posts'));
        
    }
    public function kankouDetail(Request $request, $post_id){
        $post = Posts::where('posts_id',$post_id)->with('user')->with('category')->first();
        return Inertia::render('Kankou/KankouDetail',compact('post'));
    }
    public function kankouPost(){
        return Inertia::render('Kankou/KankouPost');
    }
    public function kankouSearch(){
        return Inertia::render('Kankou/KankouSearch');
    }
    public function kankouResult(){
        return Inertia::render('Kankou/KankouResult');
    }
    // 飲食店関係
    public function restranList(Posts $restran){
        $restran = Posts::where('posts_type', 1)->orderBy('posts_id','desc')
        ->with('user')->with('prefectures')->with('category')->get();
        return Inertia::render('Restran/RestranList',compact('restran'));
    }
    public function restranDetail(Request $request, $post_id){
        $restran = Posts::where('posts_id',$post_id)->with('user')->with('category')->first();
        return Inertia::render('Restran/RestranDetail',compact('restran'));
    }
    public function restranPost(){
        return Inertia::render('Restran/RestranPost');
    }
    public function restranSearch(){
        return Inertia::render('Restran/RestranSearch');
    }
    public function restranResult(){
        return Inertia::render('Restran/RestranResult');
    }
    // プロフィール関係
    public function profile(){
        // ユーザの総投稿数カウント
        $count = Posts::where('user_id',auth()->id())->count();
        $kankou_count = Posts::where([
            ['user_id',auth()->id()],
            ['posts_type',0]])->count();
        $restran_count = Posts::where([
            ['user_id',auth()->id()],
            ['posts_type',1]])->count();

        // ログインしているユーザーの最新観光名所投稿
        $kankou = Posts::where([
            ['user_id',auth()->id()],
            ['posts_type',0]
        ])->orderBy('posts_id','desc')->first();

        // 最新飲食店投稿
        $restran = Posts::where([
            ['user_id',auth()->id()],
            ['posts_type',1]
        ])->orderBy('posts_id','desc')->first();

        return Inertia::render('Profile/Profile', compact('count','kankou_count','restran_count','kankou','restran'));
    }
}
