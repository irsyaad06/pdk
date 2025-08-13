<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sertifikat extends Model
{
    use HasFactory;

    protected $fillable = [
        'kegiatan_id',
        'peserta_id',
        'file_path',
        'tanggal_terbit'
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
