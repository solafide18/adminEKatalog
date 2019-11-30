<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KompManajerialController extends Controller
{
    public function index(Request $request)
    {
        $value = $request->session()->get('authenticated', 'default');
        if ($value[0]=='always') {
            return view('kompmanajerial/index');
        } else {
            return redirect()->action('Web\LoginController@index');
        }
    }
}
