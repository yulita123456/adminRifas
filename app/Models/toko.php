<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class toko extends Model
{
    use HasFactory;
    protected $table = 'toko';
    protected $primaryKey = 'id_toko';
    protected $fillable = [
        'logo_toko',
        'baner1',
        'baner2',
        'baner3',
        'foto_ba',
        'email_toko',
        'alamat_toko',
        'tentang_toko',
    ];
}
