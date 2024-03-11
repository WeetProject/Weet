<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $primaryKey = 'admin_id';

    public $timestamps = true;

    protected $guarded =[
        'admin_flg',
        'admin_number',
        'admin_password',
        'admin_name',
    ];

    public function notice() {
        return $this->hasMany(Notice::class, 'admin_id');
    }

    public function report() {
        return $this->hasMany(Report::class, 'admin_id');
    }

	// jwt 토큰
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
		// Admin 권한 판별
		$role = '';
		if ($this->admin_flg === '1') {
			$role = 'rootAdmin';
		} elseif ($this->admin_flg === '2') {
			$role = 'subAdmin';
		}

		// Admin 권한, pk, 이름 return
		return [
			'role' => $role,
			'admin_id' => $this->id,
			'admin_name' => $this->name,
		];
    }
}
