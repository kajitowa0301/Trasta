<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PostController extends Controller
{
    public function Kankoustore(Request $request){
        $request->validate([
        'prefecture_id'=> 'required',
        'categories_id'=>'required',
        'title'=>'required|string|max:30',
        'src'=>'required',
        'posts_name'=>'required|string|max:30',
        'posts_comment'=>'required|string|max:255',
        'address'=>'required|string|max:100',
        'posts_type'=>'required|string',
        'stratTime'=> 'required',
        'endTime'=> 'required',
        ]);
        // dd($request->file('src'));
        $file_name = $request->file('src')->getClientOriginalName();
        $request->file('src')->storeAs('public/images',$file_name);
        $src = 'images/'.$file_name;
        $post = Posts::create([
            'title' => $request->title,
            'posts_name' => $request->posts_name,
            'posts_comment' => $request->posts_comment,
            'prefecture_id' => $request->prefecture_id,
            'category_id' => $request->categories_id,
            'address' => $request->address,
            'posts_type'=> $request->posts_type,
            'src' =>$src,
            'stratTime'=> $request->stratTime,
            'endTime'=> $request->endTime,
            'user_id' => $request->user_id,
        ]);
        // dd($post);
        return  Inertia::render('Kankou/KankouPost')->with('message','保存しました');
    }
    public function Restranstor(Request $request){
        $request->validate([
            'prefecture_id'=> 'required',
            'categories_id'=>'required',
            'title'=>'required|string|max:30',
            'src'=>'required',
            'posts_name'=>'required|string|max:30',
            'posts_comment'=>'required|string|max:255',
            'address'=>'required|string|max:100',
            'posts_type'=>'required|string',
            'stratTime'=> 'required',
            'endTime'=> 'required',
            ]);
            $file_name = $request->file('src')->getClientOriginalName();
        $request->file('src')->storeAs('public/images',$file_name);
        $src = 'images/'.$file_name;
        $post = Posts::create([
            'title' => $request->title,
            'posts_name' => $request->posts_name,
            'posts_comment' => $request->posts_comment,
            'prefecture_id' => $request->prefecture_id,
            'category_id' => $request->categories_id,
            'address' => $request->address,
            'posts_type'=> $request->posts_type,
            'src' =>$src,
            'stratTime'=> $request->stratTime,
            'endTime'=> $request->endTime,
            'user_id' => $request->user_id,
        ]);
        return  Inertia::render('Restran/RestranPost')->with('message','保存しました');
    }
}
