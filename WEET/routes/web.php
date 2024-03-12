<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminTokenAuthMiddleware;
use App\Http\Controllers\AdminAuthController;

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

Route::get('/test', function () {
    return view('welcome');
});

Route::get('/mypage', function () {
    return view('welcome');
});

Route::get('/reservation', function () {
    return view('welcome');
});

Route::get('/regist', function () {
    return view('welcome');
});





// Admin
// Admin Login 화면 이동
Route::get('/admin', function () {
    return view('welcome');
});

// 로그인 후 Admin Index 화면 이동
Route::get('/admin/index', function () {
    return view('welcome');
});

// 로그인 처리
Route::middleware(['adminTokenAuthMiddleware'])->group(function () {
    // 로그인 처리
    Route::post('/admin', [AdminAuthController::class, 'adminPostLogin'])->name('adminPostLogin');
});
