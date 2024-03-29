<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\softDeletes;

class User extends Authenticatable
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
        'user_password',
        'user_name',
        'user_gender',
        'user_birthdate',
        'user_tel',
        'user_postcode',
        'user_basic_address',
        'user_detail_address'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'user_password',
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
}
