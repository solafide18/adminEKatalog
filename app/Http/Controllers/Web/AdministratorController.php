<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministratorController extends Controller {

    public function index(Request $request)
    {
        $value = $request->session()->get('authenticated', 'default');
        $isAdmin = $request->session()->get('isAdmin', 'default')[0];

        // $listAdmin = DB::table('admin_pegawais')->get();

        if ($value[0]=='always') {
            return view('administrator/index',['isAdmin'=>$isAdmin]);
        } else {
            return redirect()->action('Web\LoginController@index');
        }
    }
}