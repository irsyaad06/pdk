<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi',
        'kuota',
        'ada_presensi',
        'ada_tugas',
        'donasi_minimum',
        'status'
    ];

    public function pesertas()
    {
        return $this->hasMany(Peserta::class);
    }

    public function presensis()
    {
        return $this->hasMany(Presensi::class);
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function sertifikats()
    {
        return $this->hasMany(Sertifikat::class);
    }
}
