<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Login2Controller extends Controller {

    public function index() {
        return view('login');
    }

    public function login(Request $request) {
        // todo call service to hit api login
        // if true return dashboard
        // else return login and add error -> username/password not match
        // return view('login');
        return view('index');
    }

}