<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    use HasFactory;
    protected $table = "keranjang";
    protected $primaryKey = "id_keranjang";

    protected $fillable = [
        'id_user',
        'nama_user',
        'email_user',
        'id_produk',
        'nama_produk',
        'gambar_produk',
        'harga_produk',
        'kuantitas',
        'harga_kuantitas',
    ];
}
