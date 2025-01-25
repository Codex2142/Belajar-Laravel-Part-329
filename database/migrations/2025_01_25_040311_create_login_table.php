<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginTable extends Migration
{
    public function up()
    {
        Schema::create('login', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('level')->default('user'); // Opsional: level pengguna
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('login');
    }
}

