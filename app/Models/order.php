<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $table = 'order';
    protected $primaryKey = 'id_pesanan';
    protected $fillable = [
        'id_keranjang',
        'id_user',
        'nama_user',
        'email_user',
        'id_produk',
        'nama_produk',
        'gambar_produk',
        'harga_produk',
        'kuantitas',
        'status',
    ];
}
