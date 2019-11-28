<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    public function index() {
        error_log('Do login here');
        return view('login/index');
    }

    public function login(Request $request) {
        $pin = $request->input('pin');
        $pass = $request->input('pass');

        $client = new Client;
        $res = $client->get('http://sadewa.bekraf.go.id/api/login?',
        [
            'form_params' => [
                'token' => '7va9dfnf9v7df9av8sd7f9',
                'username' => $pin,
                'password' => $pass
                ]
        ]);

        $jsonResponse = json_decode($res->getBody(), true);
        error_log('login?');
        error_log($jsonResponse['data']['login']);

        if ($jsonResponse['data']['login'] == 1) {
            return view('home/index');
        }    
        
    }


}
