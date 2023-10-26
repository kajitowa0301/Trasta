<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Posts;
use App\Models\Category;
use App\Models\Prefectures;
use Illuminate\Http\Request;
use Inertia\Inertia;
class SearchController extends Controller
{
    public function searchResult(Request $request){
        $keyword = $request->input('keyword');
        $categories = $request->input('categories');
        $kankous = Posts::where(function ($query) use ($keyword) {
            if ($keyword) {
                $query->where([
                    ['address', 'like', '%' . $keyword . '%'],
                    ['posts_type',0],
                ]);
            }
        })->where(function ($query) use ($categories) {
            if ($categories) {
                $query->whereIn('category_id', $categories);
            }
        })->with('user')->with('prefectures')->with('category')->get();
        // dd($kankous);
        return Inertia::render('Kankou/KankouResult',compact('kankous'));
    }

    public function resResult(Request $request){
        $keyword = $request->input('keyword');
        $categories = $request->input('categories');
        $restran = Posts::where(function ($query) use ($keyword) {
            if ($keyword) {
                $query->where([
                    ['address', 'like', '%' . $keyword . '%'],
                    ['posts_type',1],
                ]);
            }
        })->where(function ($query) use ($categories) {
            if ($categories) {
                $query->whereIn('category_id', $categories);
            }
        })->with('user')->with('prefectures')->with('category')->get();
        return Inertia::render('Restran/RestranResult',compact('restran'));
    }
}
