<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $value = $request->session()->get('authenticated', 'default');
        if ($value[0]=='always') {
            $idPegawai = $request->session()->get('id', '')[0];
            $client = new Client;
            $res = $client->get('https://sadewa.bekraf.go.id/api/pegawai?',
            [
                'query' => [
                    'token'=> $request->session()->get('token', '7va9dfnf9v7df9av8sd7f9')[0],
                    'pin' => $idPegawai
                    ]
            ]);
    
            $jsonResponse = json_decode($res->getBody(), true);
            $namaPegawai = $jsonResponse['data']['pegawai']['nama'];
            $unitKerja = $jsonResponse['data']['pegawai']['unit_kerja'];
            $nip = $jsonResponse['data']['pegawai']['nip'];
            $namaJabatan = $jsonResponse['data']['pegawai']['nama_jabatan'];
            $pendidikanTerakhir = $jsonResponse['data']['pegawai']['jenjang_pendidikan'];
            //error_log($namaPegawai);

            $kompetensiPegawai = DB::table('kompetensi_pegawais')
            ->join('level_kompetensis', 'level_kompetensis.id', '=', 'kompetensi_pegawais.level_kompetensi_id')
            ->join('kompetensis', 'kompetensis.id', '=', 'level_kompetensis.kompetensi_id')
            ->select(
                'kompetensi_pegawais.id',
                'kompetensi_pegawais.pegawai_id',
                'kompetensi_pegawais.nilai',
                'kompetensi_pegawais.gap',
                'level_kompetensis.level',
                'level_kompetensis.nilai_minimum',
                'kompetensis.code',
                'kompetensis.name',
                'kompetensis.description'
            )
            ->where('kompetensi_pegawais.pegawai_id',$idPegawai)
            ->get();

            error_log($kompetensiPegawai);

            return view('profile/index', [
                'nama'=>$namaPegawai,
                'unitKerja'=>$unitKerja,
                'nip'=>$nip,
                'namaJabatan'=>$namaJabatan,
                'pendidikan'=>$pendidikanTerakhir,
                'tableKompetensi'=>$kompetensiPegawai
                ]);
        } else {
            return redirect()->action('Web\LoginController@index');
        }
    
    }
}
