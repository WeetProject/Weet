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
        'airport_name',
        'airport_kr_name',
        'airport_iata_code',
        'airport_continent',
        'airport_iso_country',
    ];
}
