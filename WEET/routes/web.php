<?php

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminSignUpController;
use App\Http\Controllers\AdminIndexController;
use App\Http\Controllers\AdminUserManagementController;
use App\Http\Controllers\AdminManagementController;
use App\Http\Controllers\AdminUpdateController;
use App\Http\Controllers\AdminWithdrawalController;
use App\Http\Controllers\AdminRegistrationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationAirController;
use App\Http\Controllers\ReservationHotelController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\KakaoSocialLoginController;
use App\Http\Controllers\AlgoliaSearchController;
use App\Http\Controllers\AmadeusTokenController;
use App\Http\Controllers\GoogleSocialLoginController;

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
Route::post('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('welcome');
});

// 컨트롤러를 사용하는 라우트
// Route::group(['prefix' => 'test'], function () {
//     Route::get('/', [UserController::class, 'redirectToKakao']);
//     Route::get('/callback', [UserController::class, 'handleKakaoCallback']);
// });

Route::get('/mypage', function () {
    return view('welcome');
});

// reservation 그룹
Route::prefix('reservation')->group(function() {
    Route::get('/', function () {
        return view('welcome');
    });
    // 예약기능
    Route::post('/', [ReservationAirController::class, 'reservationAirPost']);
});

// payment 결제기능
Route::post('/payment', [PaymentController::class, 'paymentPost']);

// Route::get('/signup', function () {
//     return view('welcome');
// });

// Route::get('/login', function () {
//     return view('welcome');
// });





// ### Admin ###
Route::middleware('adminValidation')->prefix('admin')->group(function() {
    // Admin Login
    Route::get('/', function () {
        return view('welcome');
    });
    // Admin Login 처리
    Route::post('/', 
        [AdminAuthController::class, 'adminLogin'])
        ->name('adminLogin');

    // Admin Sign Up
    Route::get('/signup', function () {
        return view('welcome');
    });
    // Admin Sign Up 처리
    Route::post('/signup', 
        [AdminSignUpController::class, 'adminSignUp'])
        ->name('adminSignUp');
});

Route::prefix('admin/dashboard')->group(function() {
    // Admin Logout 처리
    Route::post('/logout', 
        [AdminAuthController::class, 'adminLogout']);

    // Admin Index
    Route::get('/', function () {
        return view('welcome');
    });
    // Admin Index - Total 데이터 송신
    Route::get('/totalData', 
        [AdminIndexController::class, 'totalUserData']);
    // Admin Index - Monthly 데이터 송신
    Route::get('/monthlyData', 
        [AdminIndexController::class, 'monthlyData']);

    // Admin User Management
    Route::get('/user/management', function () {
        return view('welcome');
    });
    // Admin User Management List 데이터 송신
    Route::get('/user/management/userManagementList', 
        [AdminUserManagementController::class, 'userManagementList']);
    // Admin User Management Payment List  데이터 송신
    Route::get('/user/management/userManagementPaymentList', 
        [AdminUserManagementController::class, 'userManagementPaymentList']);

    // Admin Management
    Route::get('/management', function () {
        return view('welcome');
    });
    // Admin Management List 데이터 송신
    Route::get('/management/adminManagementList', 
        [AdminManagementController::class, 'adminManagementList']);
    // Admin Management Flg List 데이터 송신
    Route::get('/management/adminManagementFlgList', 
        [AdminManagementController::class, 'adminManagementFlgList']);
    // Admin Management Update 처리
    Route::post('/management/update', 
        [AdminUpdateController::class, 'adminManagementUpdate'])
        ->name('adminManagementUpdate');
    // Admin Management Withdrawal 처리
    Route::post('/management/withdrawal', 
        [AdminWithdrawalController::class, 'adminManagementWithdrawal'])
        ->name('adminManagementWithdrawal');
    
    // Admin Registration
    Route::get('/registration', function () {
        return view('welcome');
    });
    // Admin Registration 데이터 송신
    Route::get('/registration/adminList', 
        [AdminRegistrationController::class, 'adminRegistrationList']);
    // Admin Registration Update 처리
    Route::post('/registration/update', 
        [AdminUpdateController::class, 'adminRegistrationUpdate'])
        ->name('adminRegistrationUpdate');
    // Admin Registration Withdrawal 처리
    Route::post('/registration/withdrawal', 
        [AdminWithdrawalController::class, 'adminRegistrationWithdrawal'])
        ->name('adminRegistrationWithdrawal');
});

// ### Algolia 검색 ###
Route::get('/search-origin', 
        [AlgoliaSearchController::class, 'originSuggestion']);
Route::get('/search-destination', 
        [AlgoliaSearchController::class, 'destinationSuggestion']);

// ### Amadeus ###
Route::post('/amadeus',
        [AmadeusTokenController::class, 'amadeusToken']);











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

    Route::get('/sendEmail', function () {
        return view('welcome');
    });
    Route::post('/sendVerificationEmail', [UserController::class, 'emailVerification']);
    Route::post('/emailCodeChk', [UserController::class, 'emailVerificationDel']);

    Route::post('/userInfoChange', [UserController::class, 'userInfoChange']);
    // Route::post('/userInfoChange', [UserController::class, 'userAddressChange']);

    Route::delete('/userWithdrawal', [UserController::class, 'deleteWithdrawal']);
    Route::match(['get'], '/login', function () {
        abort(405, 'Method Not Allowed');
    });
});

// social login : 이렇게도 가능하다.. 로직에 따라 컨트롤러 분리 유연하게
// Route::get('/social/{domain}', [SocialLoginController::class, 'sociaLogin']);

// 참고 컨트롤러는 아래처럼
// public function sociaLogin(string $domain) {
//     return Sociallite::driver($domain)->redirect();
// }

// 카카오로그인
Route::get('/kakao', [KakaoSocialLoginController::class, 'kakaoLogin']);

Route::get('/login/kakao/callback', [KakaoSocialLoginController::class, 'handleKakaoCallback']);

Route::get('/kakaoLogin', function () {
    return view('welcome');
});

Route::post('/kakaoLoginData', [KakaoSocialLoginController::class, 'kakaoUserLoginData']);
Route::post('/logout/kakao', [KakaoSocialLoginController::class, 'kakaoLogout']);

// 구글로그인
Route::get('/google', [GoogleSocialLoginController::class, 'googleLogin']);

Route::get('/login/google/callback', [GoogleSocialLoginController::class, 'handleGoogleCallback']);

Route::get('/googleLogin', function () {
    return view('welcome');
});

Route::post('/googleLoginData', [GoogleSocialLoginController::class, 'googleUserLoginData']);
Route::post('/logout/google', [GoogleSocialLoginController::class, 'googleLogout']);


Route::get('/signup', function () {
    return view('welcome');
});

Route::get('/logout', [UserController::class, 'logout']);
Route::post('/logout', function () {
    abort(404);
});
// Route::middleware(['userValidation'])->get('/getMyPage', [MyPageController::class, 'getMyPageData']);
// Route::get('/mypage', [MyPageController::class, 'getMyPageData']);




// Search
Route::prefix('search')->group(function() {
    Route::get('/', function () {
        return view('welcome');
    });
});