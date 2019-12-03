<?php

namespace App\Http\Controllers\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\KategoriKompotensi;

class KategoriKompotensiController extends Controller
{
    public function index() {
        $kategoriKompetensi = KategoriKompetensi::all();
        //return view kompetensi pegawai
        return "";
    }

    public function save(Request $request) {
        $this->validate($request,[
    		'code'=>'required',
    		'description'=>'required'
        ]);

        $data = new KategoriKompetensi();
        $data->code = $request->code;
        $data->description = $request->description;
        $data->save();
        //redirect kemana yaa?
        return "";
    }
}
