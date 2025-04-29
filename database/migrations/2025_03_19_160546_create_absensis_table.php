<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
public function up()
{
    Schema::create('absensis', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('jabatan');
        $table->dateTime('waktu_masuk');
        $table->dateTime('waktu_keluar')->nullable();
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('absensis');
    }
};
