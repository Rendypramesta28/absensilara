<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    // Gunakan kolom default 'id' sebagai primary key
    protected $fillable = ['nama', 'jabatan', 'waktu_masuk', 'waktu_keluar'];
}
