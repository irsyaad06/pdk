<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory;

    protected $table = 'pengaturan';

    protected $fillable = [
        'logo',
        'nama_app',
        'fav_icon',
        'email',
        'no_wa',
        'no_telepon',
        'link_instagram',
        'link_tiktok',
        'link_x',
        'link_facebook',
    ];
}
