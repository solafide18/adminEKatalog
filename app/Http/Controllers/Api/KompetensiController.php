<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KompetensiController extends Controller
{
    public function get($id)
    {
        $data = DB::table('kompetensis')
            ->join('kategori_kompetensis', 'kategori_kompetensis.id', '=', 'kompetensis.kategori_id')
            // ->join('level_kompetensis','level_kompetensis.kompetensi_id','=','kompetensis.kategori_id')
            // ->leftJoin('gap_configs','gap_configs.kompetensi_id','=','kompetensis.id')
            ->select(
                'kompetensis.*',
                // 'gap_configs.id as gap_id',
                // 'gap_configs.gap',
                // 'gap_configs.jenis_program_pengembangan',
                // 'gap_configs.isi_program_pengembangan',
                'kategori_kompetensis.code',
                'kategori_kompetensis.description as description_kategori'
                // 'level_kompetensis.level',
                // 'level_kompetensis.level_description',
                // 'level_kompetensis.index_perilaku',
                // 'level_kompetensis.nilai_minimum')
            )
            ->where('kategori_id', $id)
            ->orderBy('kompetensis.kategori_id')
            ->get();
        for ($i = 0; $i < $data->count(); $i++) {
            $data[$i]->level_kompetensi = DB::table('level_kompetensis')->where('kompetensi_id', $data[$i]->id)->orderBy('level')->get();
            // dd($data[$i]->level_kompetensi);
            for ($j = 0; $j < $data[$i]->level_kompetensi->count(); $j++) {
                $data[$i]->level_kompetensi[$j]->gap_config = DB::table('gap_configs')->where('level_kompetensi_id', $data[$i]->level_kompetensi[$j]->id)->get();
            }
            // $data[$i]->gap_config = DB::table('gap_configs')->where('level_kompetensi_id', $data[$i]->id)->get();
        }
        
        // $data = $list->toArray();
        // $data[0]->test = [1,2,3];
        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $data
        ]);
    }

    public function post(Request $request)
    {
        $data = $request->req;
        DB::table('kompetensis')->insert(
            [
                'name' => $data['name'],
                'code' => $data['code'],
                'minimum_lvl' => $data['minimum_lvl'],
                'description' => $data['description'],
                'created_at' => Carbon::now()->toDateTimeString(),
                'kategori_id' => $data['kategori_id']
            ]
        );
        return response()->json([
            'code' => 200,
            'message' => 'Data Inserted!',
            'data' => $data
        ]);
    }

    public function addLevel(Request $request,$id)
    {
        $data = $request->req;
        // DB::table('level_kompetensis')
        //     ->where('kompetensi_id', $id)
        //     ->delete();
        for ($i = 0; $i < count($data); $i++) {
            // $data[$i]->level_kompetensi = DB::table('level_kompetensis')->where('kompetensi_id',$data[$i]->id)->orderBy('level')->get();

            DB::table('level_kompetensis')->insert(
                [
                    'level' => $data[$i]['level'],
                    'level_description' => $data[$i]['level_description'],
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'kompetensi_id' => $data[$i]['kompetensi_id'],
                    'index_perilaku' => $data[$i]['index_perilaku'],
                    'nilai_minimum' => $data[$i]['nilai_minimum'],
                ]
            );
        }

        return response()->json([
            'code' => 200,
            'message' => 'Data Inserted!',
            'data' => $data
        ]);
    }

    public function editLevel(Request $request,$id)
    {
        $data = $request->req;
        // DB::table('level_kompetensis')
        //     ->where('kompetensi_id', $id)
        //     ->delete();
        DB::table('level_kompetensis')
            ->where('kompetensi_id', $id)
            ->delete();
        for ($i = 0; $i < count($data); $i++) {
            // $data[$i]->level_kompetensi = DB::table('level_kompetensis')->where('kompetensi_id',$data[$i]->id)->orderBy('level')->get();

            DB::table('level_kompetensis')->insert(
                [
                    'level' => $data[$i]['level'],
                    'level_description' => $data[$i]['level_description'],
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'kompetensi_id' => $data[$i]['kompetensi_id'],
                    'index_perilaku' => $data[$i]['index_perilaku'],
                    'nilai_minimum' => $data[$i]['nilai_minimum'],
                ]
            );
        }

        return response()->json([
            'code' => 200,
            'message' => 'Data Inserted!',
            'data' => $data
        ]);
    }

    public function listKompetensi($id)
    {
        $data = DB::table('kompetensis')
            // ->leftJoin('level_kompetensis','level_kompetensis.kompetensi_id','=','kompetensis.id')
            ->select(
                'kompetensis.id',
                'kompetensis.name'
            )
            ->where('kategori_id', $id)
            // ->whereNull('level_kompetensis.kompetensi_id')
            ->get();

        return response()->json([
            'code' => 200,
            'message' => 'Success!',
            'data' => $data
        ]);
    }

    public function listLevelKompetensi($id)
    {
        $data = DB::table('level_kompetensis')
            ->where('kompetensi_id', $id)
            ->get();

        return response()->json([
            'code' => 200,
            'message' => 'Success!',
            'data' => $data
        ]);
    }

    public function getLevelKompetensiByKompetensiAndEsselon($komId, $ess) {
        if ($ess==4) {
            $essLevel = 2;
        } else if ($ess==3) {
            $essLevel = 3;
        } else if ($ess==2) {
            $essLevel = 4; 
        } else $essLevel = 4;

        error_log($essLevel);
        $data = DB::table('level_kompetensis')
            ->where('kompetensi_id', $komId)
            ->where('level',$essLevel)
            ->get();

        return response()->json([
            'code' => 200,
            'message' => 'Success!',
            'data' => $data
        ]);
    }

    public function getLevelKompetensiByEsselon($esselon) {
        if ($esselon==4) {
            $essLevel = 2;
        } else if ($esselon==3) {
            $essLevel = 3;
        } else if ($esselon==2) {
            $essLevel = 4; 
        } else $essLevel = 4;

        error_log($essLevel);

        $data = DB::table('kompetensis as a')
        ->join('level_kompetensis as b','b.kompetensi_id','=','a.id')
        ->select(
            'b.id',
            'a.name',
            'a.code',
            'b.level',
            'b.level_description',
            'b.nilai_minimum'
        )
        ->where('b.level',$essLevel)
        ->get();

        return response()->json([
            'code' => 200,
            'message' => 'Success!',
            'data' => $data
        ]);
    }

    public function deleteLevel($id,$lvl)
    {
        DB::table('level_kompetensis')
            ->where('kompetensi_id', $id)
            ->where('level',$lvl)
            ->delete();
            // dd($lid);
        return response()->json([
            'code' => 200,
            'message' => 'Data Deleted!'
        ]);
    }

    public function getGapConfig($id) {
        $exist = DB::table('level_kompetensis')->where('id', $id)->get();
        error_log($exist);
        if ($exist->isEmpty()) {
            return response()->json([
                'code' => 404,
                'message' => 'Data Not Found!',
                'data' => null
            ]);
        } else {
            $data = DB::table('gap_configs')->where('level_kompetensi_id', $id)->get();
            return response()->json([
                'code' => 200,
                'message' => 'Kompetensi found !',
                'data' => $data
            ]);
        } 
    }

    public function addGapConfig($id, Request $request) {
        // dd($request->req);
        $exist = DB::table('level_kompetensis')->where('id', $id)->get();
        if ($exist->isEmpty()) {
            return response()->json([
                'code' => 404,
                'message' => 'Data Not Found!',
                'data' => null
            ]);
        }
        else {
            DB::table('gap_configs')
                ->where('level_kompetensi_id',$id)
                ->delete();
            $data = $request->req;
            for ($i = 0; $i < count($data); $i++) {
                DB::table('gap_configs')->insert(
                    [
                        'level_kompetensi_id' => $id,
                        'gap' => $data[$i]['gap'],
                        'jenis_program_pengembangan' => $data[$i]['jenis_program_pengembangan'],
                        'isi_program_pengembangan' => $data[$i]['isi_program_pengembangan'],
                        'created_at' => Carbon::now()->toDateTimeString()
                    ]
                );
            }
            return response()->json([
                'code' => 200,
                'message' => 'Data Inserted!',
                'data' => $data
            ]);
            // if ($existGAP->isEmpty()) {
            //     DB::table('gap_configs')->insert(
            //         [
            //             'kompetensi_id' => $id,
            //             'gap' => $data['gap'],
            //             'jenis_program_pengembangan' => $data['jenis_program_pengembangan'],
            //             'isi_program_pengembangan' => $data['isi_program_pengembangan'],
            //             'created_at' => Carbon::now()->toDateTimeString()
            //         ]
            //     );
                
            // }
            // else{
                
            //     ->update(
            //         [
            //             'gap' => $data['gap'],
            //             'jenis_program_pengembangan' => $data['jenis_program_pengembangan'],
            //             'isi_program_pengembangan' => $data['isi_program_pengembangan'],
            //             'updated_at' => Carbon::now()->toDateTimeString()
            //         ]
            //     );
            //     return response()->json([
            //         'code' => 200,
            //         'message' => 'Data Updated!',
            //         'data' => $data
            //     ]);
            // }
        }
    }

    public function deleteGapConfig($id) {
        try {
            DB::table('gap_configs')
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

    public function getGapByGapAndLevelKompetensi($id, $gap) {
        error_log($gap);
        error_log($id);
        $data = DB::table('gap_configs')
            ->where('gap', $gap)
            ->where('level_kompetensi_id', $id)
            ->get();
        error_log($data);
        if ($data->isEmpty()) {
            return response()->json([
                'code' => 200,
                'message' => 'Gap not found !',
                'data' => null
            ]);
        } else {
            return response()->json([
                'code' => 200,
                'message' => 'Gap found !',
                'data' => $data
            ]);
        }

    }

    public function getGapByLevelKompetensi($id) {
        $data = DB::table('gap_configs')
            ->where('level_kompetensi_id', $id)
            ->get();
        // error_log($data);
        if ($data->isEmpty()) {
            return response()->json([
                'code' => 200,
                'message' => 'Gap not found !',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'code' => 200,
                'message' => 'Gap found !',
                'data' => $data
            ]);
        }

    }
}
