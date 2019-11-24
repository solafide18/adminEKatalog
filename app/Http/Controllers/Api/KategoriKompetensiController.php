<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriKompetensiController extends Controller
{
    public function get()
    {
        // $data = 
        // [
        //     [
        //         'No'=>1,
        //         'Kompetensi'=>'test kompetensi',
        //         'Level'=>'LEVEL 2 - Melaksanakan pekerjaan sebatas tuntutan tugas dan tanggungjawabnya',
        //         'Indikator'=> '2.1. Tidak berpartisipasi untuk membantu rekan kerja'
        //     ],
        //     [
        //         'No'=>2,
        //         'Kompetensi'=>'KOMITMEN TERHADAP ORGANISASI',
        //         'Level'=>'LEVEL 2 - Melaksanakan pekerjaan sebatas tuntutan tugas dan tanggungjawabnya',
        //         'Indikator'=> '2.1. Tidak berpartisipasi untuk membantu rekan kerja'
        //     ]
        // ];
        $data = DB::table('kompetensis')->where('kategori_id',1)->get();
        return response()->json(['data'=>$data,'status'=>true]);
    }
}
