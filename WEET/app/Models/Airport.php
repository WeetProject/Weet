<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Airport extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'airport_id';
    protected $table = 'airports';

    public $timestamps = true;

    protected $fillable =[
        'airport_iata_code',
        'airport_name',
        'airport_kr_name',
        'airport_city_name',
        'airport_kr_city_name',
        'airport_country_name',
        'airport_kr_country_name',
    ];
}
