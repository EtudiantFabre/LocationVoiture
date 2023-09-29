<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorisationController extends Controller
{
    public function admin() {
        return view('middleware.admin');
    }

    public function client() {
        return view('middleware.client');
    }
}
