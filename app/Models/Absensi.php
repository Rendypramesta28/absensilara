<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = ['pegawai_id', 'nama', 'jabatan', 'waktu_masuk', 'waktu_keluar'];


    // Tentukan primary key jika bukan 'id'
    protected $primaryKey = 'pegawai_id';

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
}
