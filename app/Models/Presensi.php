<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kegiatan_id',
        'peserta_id',
        'tanggal',
        'hadir'
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }
}
