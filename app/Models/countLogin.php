<?php
// app/Models/countLogin.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class countLogin extends Model
{
    protected $table = 'countLogin'; // Nama tabel yang sesuai dengan yang sudah Anda tentukan

    protected $fillable = [
        'id_user', 'countLogin'
    ];

    // Relasi ke tabel users
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
