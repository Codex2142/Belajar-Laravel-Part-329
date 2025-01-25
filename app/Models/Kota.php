<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';
    protected $fillable = [
        'nama_kota',
        'provinsi',
    ];

    public function ortu(){
        return $this->hasMany(Ortu::class, 'kota_id', 'id');
    }
}
