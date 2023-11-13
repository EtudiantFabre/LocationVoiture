<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorisationController extends Controller
{

    public function admin(Request $request) {
        return view('middleware.admin');
    }

    public function client(Request $request) {
        return view('middleware.client');
    }
}
