<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller {

    public function user(Request $request) {
        return $request->user();
    }
    public function register(Request $request) {
        return $this->notImplemented();
    }
}
