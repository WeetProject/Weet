<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'region_id';
    protected $table = 'regions';

    public $timestamps = true;

    protected $fillable =[
        'region_name',
        'region_kr_name',
        'region_continent',
        'region_iso_country',
    ];
}
