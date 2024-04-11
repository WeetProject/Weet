<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\softDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, softDeletes;

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_flg',
        'user_email',
        'password',
        'user_name',
        'user_gender',
        'user_birthdate',
        'user_tel',
        'user_postcode',
        'user_basic_address',
        'user_detail_address',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $rules = [
        'user_email' => 'required|email', // 이메일은 필수이고 이메일 형식이어야 함
        // 다른 필드에 대한 유효성 검사 규칙도 추가할 수 있음
    ];

    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d');
    }

    // jwt 토큰
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [
            // 'user_flg',
            // 'user_email',
            // 'password',
            // 'user_name',
            // 'user_gender',
            // 'user_birthdate',
            // 'user_tel',
            // 'user_postcode',
            // 'user_basic_address',
            // 'user_detail_address'
        ];
    }

    // public function socialAccounts() {
    //     return $this->hasMany();
    // }

    // protected $listen = [
    //     \SocialiteProviders\Manager\SocialiteWasCalled::class => [
    //         'SocialiteProviders\\Kakao\\KakaoExtendSocialite@handle',
    //     ],
    // ];
}
