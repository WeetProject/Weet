<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Country extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'country_id';
    protected $table = 'countries';

    public $timestamps = true;

    protected $fillable =[
        'country_name',
        'country_kr_name',
        'country_continent',
        'country_code',
    ];
}
