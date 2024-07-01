<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admindami extends Model
{
    use HasFactory;
    protected $table = 'admindami';
    protected $primaryKey = 'id_admin';
    protected $fillable = [
        'nama_admin',
        'email_admin',
        'no_hp',
        'tgl_lahir',
        'password',
    ];
}
