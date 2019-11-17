<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \GuzzleHttp\Client;

class LoginController extends Controller
{
    public function index() {
        error_log('Do login here');
        return view('login/index');
    }

    public function login(Request $request) {
        $pin = $request->input('pin');
        $pass = $request->input('pass');
        print_r($pin);
        print_r($pass);

        //$client = new GuzzleHttp\Client();
        //$res = $client->get('https://api.github.com/user', ['auth' =>  ['user', 'pass']]);
        //echo $res->getStatusCode(); // 200
        //echo $res->getBody();

        return view('home/index');
    }


}
