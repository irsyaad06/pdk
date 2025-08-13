<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KegiatanFoto extends Model
{

    protected $fillable = [
        'path',
        'keterangan',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
