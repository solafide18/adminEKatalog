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
        $data = $request->session()->get('data', 'default');

        $base_url = url('/');
        error_log($base_url);
        error_log( print_r( $value, true ) );
        error_log( print_r( $data, true ) );

        $idPegawai = $request->session()->get('id', '');
        
        $kompetensiPegawai = DB::table('kompetensi_pegawais')
            ->join('level_kompetensis', 'level_kompetensis.id', '=', 'kompetensi_pegawais.level_kompetensi_id')
            ->join('kompetensis', 'kompetensis.id', '=', 'level_kompetensis.kompetensi_id')
            ->select(
                'kompetensi_pegawais.id',
                'kompetensi_pegawais.pegawai_id',
                'kompetensi_pegawais.nilai',
                'kompetensi_pegawais.gap',
                'kompetensi_pegawais.information',
                'level_kompetensis.level',
                'level_kompetensis.nilai_minimum',
                'kompetensis.code',
                'kompetensis.name',
                'kompetensis.description'
            )
            ->where('kompetensi_pegawais.pegawai_id',$idPegawai)
            ->get();

        if ($value[0]=='always') {
            return view('home/index',[
                'tableKompetensi'=>$kompetensiPegawai
            ]);
        } else {
            return redirect()->action('Web\LoginController@index');
        }
    }
    
}
