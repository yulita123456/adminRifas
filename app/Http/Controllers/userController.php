<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\keranjangController;

class userController extends keranjangController
{

    public function profilUser(){

        return view('user.profil-user');
    }

    public function alamatUser(){
        return view('user.alamat-user');
    }

}
