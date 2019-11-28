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
            ->select(
                'kompetensis.*',
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
                    'nilai_minimum' => 0,
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
        for ($i = 0; $i < count($data); $i++) {
            // $data[$i]->level_kompetensi = DB::table('level_kompetensis')->where('kompetensi_id',$data[$i]->id)->orderBy('level')->get();

            DB::table('level_kompetensis')->insert(
                [
                    'level' => $data[$i]['level'],
                    'level_description' => $data[$i]['level_description'],
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'kompetensi_id' => $data[$i]['kompetensi_id'],
                    'index_perilaku' => $data[$i]['index_perilaku'],
                    'nilai_minimum' => 0,
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

    public function deleteLevel($id)
    {
        DB::table('level_kompetensis')
            ->where('kompetensi_id', $id)
            ->delete();

        return response()->json([
            'code' => 200,
            'message' => 'Data Deleted!'
        ]);
    }
}
