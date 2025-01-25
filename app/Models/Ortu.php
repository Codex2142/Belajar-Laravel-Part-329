<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
    protected $table = 'ortu';
    protected $fillable = [
        'nama_ortu',
        'kota_id',
    ];

    public function kota(){
        return $this->belongsTo(Kota::class, 'kota_id', 'id');
    }
}
