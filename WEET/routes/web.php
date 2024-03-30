<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminSignUpController;
use App\Http\Controllers\AdminIndexController;
use App\Http\Controllers\AdminUserManagementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MyPageController;

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

// reservation 그룹
Route::prefix('reservation')->group(function() {
    Route::get('/', function () {
        return view('welcome');
    });
    // 예약기능
    Route::post('/', [ReservationController::class, 'reservationPost']);
});

// payment 결제기능
Route::post('/payment', [PaymentController::class, 'paymentPost']);

Route::get('/signup', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('welcome');
});





// ### Admin ###
Route::middleware('adminValidation')->prefix('admin')->group(function() {
    // Admin Login
    Route::get('/', function () {
        return view('welcome');
    });
    // Admin Sign Up
    Route::get('/signup', function () {
        return view('welcome');
    });
    // Admin Index
    Route::get('/index', function () {
        return view('welcome');
    });
    // Admin User Management
    Route::get('/user/management', function () {
        return view('welcome');
    });
    // Admin Login 처리
    Route::post('/', [AdminAuthController::class, 'adminLogin'])->name('adminLogin');
    // Admin Logout 처리
    Route::get('/logout', [AdminAuthController::class, 'adminLogout']);
    // Admin Sign Up 처리
    Route::post('/signup', [AdminSignUpController::class, 'adminSignUp'])->name('adminSignUp');
    // Admin Index - Total 데이터 송신
    Route::get('/index/totalData', [AdminIndexController::class, 'totalUserData']);
    // Admin Index - Monthly 데이터 송신
    Route::get('/index/monthlyData', [AdminIndexController::class, 'monthlyData']);
    // Admin User Management 데이터 송신
    Route::get('/user/management/list', [AdminUserManagementController::class, 'userManagementList']);
});














// User
// UserSignUp
// Route::middleware(['UserValidation'])->post('/signup', [UserController::class, 'store']);
// Route::middleware(['UserValidation'])->group(function() {
//     Route::get('/', function () {
//         return view('welcome');
//     });
//     Route::post('/signup', [UserController::class, 'store']);
// });

Route::middleware(['userValidation'])->group(function() {
    Route::post('/signup', [UserController::class, 'store']);
    Route::post('/signupEmailDoubleChk', [UserController::class, 'emailDoubleChk']);
    Route::post('/login', [UserController::class, 'loginPost']);
});

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/getMyPage', [MyPageController::class, 'getMyPageData']);