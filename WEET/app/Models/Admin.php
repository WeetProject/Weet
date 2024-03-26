<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $primaryKey = 'admin_id';
    protected $table = 'admins';

    public $timestamps = true;

    protected $fillable =[
        'admin_flg',
        'admin_number',
        'password',
        'admin_name',
    ];

    // public function notice() {
    //     return $this->hasMany(Notice::class, 'admin_id');
    // }

    // public function report() {
    //     return $this->hasMany(Report::class, 'admin_id');
    // }

	// jwt 토큰
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
