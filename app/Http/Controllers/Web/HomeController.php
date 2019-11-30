<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        error_log("this is home");
        $value = $request->session()->get('authenticated', 'default');
        error_log( print_r( $value, true ) );
        if ($value[0]=='always') {
            return view('home/index');
        } else {
            return redirect()->action('Web\LoginController@index');
        }
    }
    
}
