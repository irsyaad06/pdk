<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class KegiatanFoto extends Model
{
    protected $fillable = [
        'kegiatan_id',
        'path',
        'keterangan',
    ];

    protected $appends = ['url'];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function getUrlAttribute()
    {
        if (!$this->path) {
            return null;
        }

        return Storage::disk('public')->url($this->path);
    }
}
