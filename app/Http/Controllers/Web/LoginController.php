<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    public function index(Request $request) {
        $request->session()->flush('authenticated');
        return view('login/index');
    }

    public function login(Request $request) {
        $pin = $request->input('pin');
        $pass = $request->input('pass');
        $request->session()->flush('authenticated');
        $client = new Client;
        $res = $client->get('https://sadewa.bekraf.go.id/api/login?',
        [
            'query' => [
                'token'=> '7va9dfnf9v7df9av8sd7f9',
                'username' => $pin,
                'password' => $pass
                ]
        ]);

        $jsonResponse = json_decode($res->getBody(), true);
        $data['data'] = $jsonResponse['data'];
        $data['errorLogin'] = false;

        if ($jsonResponse['data']['login'] == 1) {
            $request->session()->push('authenticated', 'always');
            $request->session()->push('token', '7va9dfnf9v7df9av8sd7f9');
            $request->session()->push('id', $jsonResponse['data']['pegawai']['pin']);
            $menu = DB::table('kategori_kompetensis')
            ->select(
                'id',
                'description',
                'link_url'
            )
            ->orderBy('id')
            ->get();
            $request->session()->push('menu', $menu);
            $request->session()->push('nama', $jsonResponse['data']['pegawai']['nama']);
            $request->session()->push('email', $jsonResponse['data']['pegawai']['email_kantor']);
            
            $isAdmin = DB::table('admin_pegawais')
            ->where('pegawai_id', $pin)
            ->get();
            error_log(count($isAdmin));
            if (count($isAdmin) > 0){
                $request->session()->push('isAdmin', 'admin');
            } else {
                $request->session()->push('isAdmin', 'user');
            }

            $request->session()->push('test_session', 'okk');
            return redirect()->action('Web\HomeController@index');
        }   
        else {
            $request->session()->flush('authenticated');
            $msg = "username or password invalid";
            return view('login/index',['msg'=>$msg]);
        } 
    }
    public function logout(Request $request) {
        $request->session()->flush();

        return redirect()->action('Web\LoginController@index');
    }

    private function getListKamusKompetensi(Request $request) {
        $data = DB::table('level_kompetensis')
            ->select(
                'id',
                'description',
                'link_url'
            )
            ->orderBy('kompetensis.kategori_id')
            ->get();
            $request->session('data', $data);
    }
}
