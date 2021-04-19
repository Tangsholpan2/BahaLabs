<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\EmailController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('post/add', function () {
    DB::table('posts')->insert([
    'id'=>105,
    'title'=>'Smith',
    'body'=>'boy'
    ]);
});

Route::get('blog/index',[BlogController::class, 'index']);

Route::get('blog/create',function(){
return view('blog.create');
});

Route::post('blog/create',[BlogController::class,'store'])->name('add-post');

Route::get('post/{id}',[BlogController::class,'get_post']);

Route::view('uploadfile','fileupload');
Route::post('/uploadfile',[UploadFileController::class,'index']);


Route::get('/email', [EmailController::class,'create']);
Route::post('/email', [EmailController::class,'sendEmail'])->name('send.email');
