<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ホーム画面
Route::get('/',[ViewController::class,'index'])->name('index');
// Route::get('/',[ViewController::class,'showDetail'])->name('showDetail');

// 観光関係
Route::get('/Kankou/KankouList',[ViewController::class,'kankouList'])->name('kankouList');
Route::get('/Kankou/KankouDetail/{post}',[ViewController::class,'kankouDetail'])->name('kankouDetail');
Route::get('/Kankou/KankouPost',[ViewController::class,'kankouPost'])->middleware('auth')->name('kankouPost');
Route::get('/Kankou/KankouSerch',[ViewController::class,'kankouSearch'])->name('kankouSearch');
Route::get('/Kankou/KankouResult',[ViewController::class,'kankouResult'])->name('kankouResult');
Route::post('/Kankou/KankouPost',[PostController::class,'Kankoustore'])->name('kankouStore');
Route::post('/Kankou/KankouResult',[SearchController::class,'searchResult'])->name('kankou.result');


//飲食関係 
Route::get('/Restran/RestranList',[ViewController::class,'restranList'])->name('restranList');
Route::get('/Restran/RestranDetail/{post}',[ViewController::class,'restranDetail'])->name('restranDetail');
Route::get('/Restran/RestranPost',[ViewController::class,'restranPost'])->middleware('auth')->name('restranPost');
Route::get('/Restran/RestranSearch',[ViewController::class,'restranSearch'])->name('restranSearch');
Route::get('/Restran/RestranResult',[ViewController::class,'restranResult'])->name('restarnResult');
Route::post('/Restran/RestranPost',[PostController::class,'Restranstor'])->name('restranStore');
Route::post('/Restran/RestranResult',[SearchController::class,'resResult'])->name('restran.result');


// プロフィール関係
Route::get('/Profile/Profile',[ViewController::class,'profile'])->middleware('auth')->name('TrastaProfile');

require __DIR__.'/auth.php';
