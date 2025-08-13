<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'kegiatan_id',
        'peserta_id',
        'jumlah',
        'status',
        'payment_gateway',
        'payment_ref'
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
