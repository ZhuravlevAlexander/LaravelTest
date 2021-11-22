<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ParseController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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
/**
 * Pages routes
 */
Route::get('/parse', [ParseController::class, 'getAllData' ]);
Route::get('/posts', [PostController::class, 'index' ]);

/**
 * Actions routes
 */
Route::get('/getPosts', [PostController::class, 'getAll' ]);
Route::get('/getPostContent', [PostController::class, 'getPostData' ]);
Route::get('/deleteComment', [CommentController::class, 'deleteComment' ]);
