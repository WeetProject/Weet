<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class LoginLog extends Model
{
    use HasFactory, softDeletes;

    protected $primaryKey = 'login_log_id';

    protected $fillable = [
        'user_email',
        'login_at'
    ];

    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d');
    }

    // 자동 updated_at, created_at 생성 막기
    public $timestamps = false;
}
