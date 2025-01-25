<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Login extends Authenticatable
{
    use Notifiable;

    protected $table = 'login';  // Pastikan nama tabel sesuai dengan yang Anda inginkan

    protected $fillable = [
        'email',
        'level', // Optional: Bisa digunakan jika level ada
        'password',
    ];

    // Jika level digunakan untuk otentikasi, Anda bisa menambahkan metode untuk mendapatkan level pengguna
    public function getAuthLevel()
    {
        return $this->level;
    }
}
