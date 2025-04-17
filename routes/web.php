<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FirstController;

// ルートディレクトリにアクセスされたらviewディレクトリのwelcomeファイルを開く

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello',function (){
    return 'Hello Laravel';
});

// function()　無名なにが入るかわからないけどなにか引数を入れたい
//controllerクラスを呼び出します。呼び出す処理を｛｝で囲んでgroup化します　
// Route::controller(FirstController::class)->group(function(){  
//     Route::get('first','index');  //firstにアクセスされたらindexにアクセスしてください
// });

Route::get('first',[FirstController::class,'index']);
// getは引数が２個って決まってるから2個めは配列の形

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get('/blogs','App\Http\Controllers\BlogController@index')->name('blogs.index');

Route::get('/blogs/create','App\Http\Controller\BlogController@create')->name('blog.create')->middleware('auth');
Route::post('/blogs/store/', 'App\Http\Controllers\BlogController@store')->name('blog.store')->middleware('auth');

Route::get('/blogs/edit/{blog}', 'App\Http\Controllers\BlogController@edit')->name('blog.edit')->middleware('auth');
Route::put('/blogs/edit/{blog}','App\Http\Controllers\BlogController@update')->name('blog.update')->middleware('auth');

Route::delete('/blogs/{blog}','App\Http\Controllers\blogController@destroy')->name('blog.destroy')->middleware('auth');
