<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KompetensiPegawaiController extends Controller {

    public function postKompetensiPegawai(Request $request){
        $data = $request;
        error_log($data);
        DB::table('kompetensi_pegawais')
        ->insert([
                'pegawai_id' => $data['pegawai_id'],
                'pegawai_name' => $data['nama'],
                'nip' => $data['nip'],
                'level_kompetensi_id' => $data['level_kompetensi'],
                'nilai' => $data['nilai'],
                'gap' => $data['gap'],
                'created_at' => Carbon::now()->toDateTimeString()
            ]);
        return response()->json([
                'code' => 200,
                'message' => 'Data Inserted!',
                'data' => $data
        ]);
    }

    public function deleteKopetensiPegawai($id) {
        try {
            DB::table('kompetensi_pegawais')
            ->where('id', $id)
            ->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Data Deleted!'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'code' => 200,
                'message' => 'Failed to Delete!'
            ]);
        }
    }

    public function getListKompetensiPegawai() {
        $kompetensiPegawai = DB::table('kompetensi_pegawais')
            ->join('level_kompetensis', 'level_kompetensis.id', '=', 'kompetensi_pegawais.level_kompetensi_id')
            ->join('kompetensis', 'kompetensis.id', '=', 'level_kompetensis.kompetensi_id')
            ->select(
                'kompetensi_pegawais.id',
                'kompetensi_pegawais.pegawai_name',
                'kompetensi_pegawais.pegawai_id',
                'kompetensi_pegawais.nilai',
                'kompetensi_pegawais.gap',
                'level_kompetensis.level',
                'level_kompetensis.nilai_minimum',
                'kompetensis.code',
                'kompetensis.name',
                'kompetensis.description'
            )
            ->get();

            error_log('kenapa kosong');
            error_log($kompetensiPegawai);
            return response()->json([
                    'code' => 200,
                    'data' => $kompetensiPegawai
            ]);
    }


}