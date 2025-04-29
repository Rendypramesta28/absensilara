<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'jabatan'];

    // Relasi ke Absensi
    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}
