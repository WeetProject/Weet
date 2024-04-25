<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Airport extends Model
{
    use HasFactory, SoftDeletes, Searchable;

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

    // ### algolia 설정 ###
    // algolia index명 설정
    public function searchableAs() {
        return 'Weet_airport_index';
    }

    // 검색 가능 데이터 구성
    public function toSearchableArray()
    {
        return [
            // iata_code
            'airport_iata_code' => $this->airport_iata_code,
            // 공항 한글명
            'airport_kr_name' => $this->airport_kr_name,
            // 도시 영문명
            'airport_city_name' => $this->airport_city_name,
            // 도시 한글명
            'airport_kr_city_name' => $this->airport_kr_city_name,
            // 나라 한글명
            'airport_kr_country_name' => $this->airport_kr_country_name,
        ];
    }
}
