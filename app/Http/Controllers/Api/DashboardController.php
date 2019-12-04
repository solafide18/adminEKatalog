<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller {

    public function getChart($id)
    {
        $kompetensiPegawai = DB::table('kompetensi_pegawais')
            ->join('level_kompetensis', 'level_kompetensis.id', '=', 'kompetensi_pegawais.level_kompetensi_id')
            ->join('kompetensis', 'kompetensis.id', '=', 'level_kompetensis.kompetensi_id')
            ->select(
                // 'kompetensi_pegawais.id',
                // 'kompetensi_pegawais.pegawai_name',
                // 'kompetensi_pegawais.pegawai_id',
                'kompetensi_pegawais.nilai',
                // 'kompetensi_pegawais.gap',
                // 'level_kompetensis.level',
                'level_kompetensis.nilai_minimum',
                'kompetensis.name'
            )
            ->where('kompetensi_pegawais.pegawai_id',$id)
            ->get();

        // error_log('kenapa kosong');
        // error_log($kompetensiPegawai);
        return response()->json([
                'code' => 200,
                'data' => $kompetensiPegawai
        ]);
    }
}