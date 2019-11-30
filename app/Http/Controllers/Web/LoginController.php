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
        $data['data'] = "";
        $data['errorLogin'] = false;

        return view('login/index', $data);
    }

    public function login(Request $request) {
        $pin = $request->input('pin');
        $pass = $request->input('pass');
        $request->session()->flush('authenticated', 'always');

        error_log($pin);
        error_log($pass);
        $client = new Client;
        $res = $client->get('https://sadewa.bekraf.go.id/api/login?token=7va9dfnf9v7df9av8sd7f9',
        [
            'query' => [
                'token'=> '7va9dfnf9v7df9av8sd7f9',
                'username' => $pin,
                'password' => $pass
                ]
        ]);

        $jsonResponse = json_decode($res->getBody(), true);
        error_log('login?');
        error_log($jsonResponse['data']['login']);
        $data['data'] = $jsonResponse['data'];
        $data['errorLogin'] = false;
        //$errorLogin = '<script>alert("User Name or Password invalid")</script>';

        if ($jsonResponse['data']['login'] == 1) {
            $request->session()->push('authenticated', 'always');
            return redirect()->action('Web\HomeController@index');
        }   
        else {
            
            $data['errorLogin'] = true;
            return View('login/index', $data->toJson());
        } 
        
    }


}
