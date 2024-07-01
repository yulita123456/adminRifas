<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class captchaServiceController extends Controller
{

    public function reloadCaptcha()
    {
        $data = [
            'captcha' => captcha_img('mini'),
        ];
    
        return response()->json($data);
    }
    
}
