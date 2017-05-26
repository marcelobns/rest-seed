<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\UserAuth;

class GuestController extends Controller
{
    public function welcome(){        
        return view('guest/welcome');
    }
}
