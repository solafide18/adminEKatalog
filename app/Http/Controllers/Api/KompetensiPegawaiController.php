<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class KompetensiPegawaiController extends Controller {

    public function postKompetensiPegawai(Request $request){
        $data = $request->req;
        error_log("masuk sini ==============================");
        // error_log($data);
        DB::table('kompetensi_pegawais')
        ->insert([
                'pegawai_id' => $data['pegawai_id'],
                'pegawai_name' => $data['pegawai_name'],
                'nip' => $data['nip'],
                'level_kompetensi_id' => $data['level_kompetensi_id'],
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
                'level_kompetensis.level_description as description'
            )
            ->get();

            error_log('kenapa kosong');
            error_log($kompetensiPegawai);
            return response()->json([
                    'code' => 200,
                    'data' => $kompetensiPegawai
            ]);
    }

    public function getListPegawai()
    {
        $client = new Client;
        $res = $client->get('https://sadewa.bekraf.go.id/api/pegawai?',
        [
            'query' => [
                'token'=> '7va9dfnf9v7df9av8sd7f9'
                ]
        ]);
        $jsonResponse = json_decode($res->getBody(), true);
        if ($jsonResponse['code'] == 200) {
            $data = $jsonResponse['data']['pegawai'];
            return response()->json([
                'code' => 200,
                'message' => $jsonResponse['message'],
                'data' => $data
            ]);
        }
        else{
            return response()->json([
                'code' => $jsonResponse['code'],
                'message' => $jsonResponse['message'],
                'data' => []
            ]);
        }
    }

    public function getListKompetensiLevel()
    {
        $data = DB::table('kompetensis as a')
                ->join('level_kompetensis as b','b.kompetensi_id','=','a.id')
                ->select(
                    'a.id',
                    'a.name',
                    'a.code',
                    'b.level',
                    'b.level_description',
                    'b.nilai_minimum'
                )
                ->get();
        return response()->json([
            'code' => 200,
            'message' => "Data Found",
            'data' => $data
        ]);
    }

}