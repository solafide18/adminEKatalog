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
            ->join('kategori_kompetensis','kategori_kompetensis.id','=','kompetensis.kategori_id')
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
            ->where('kategori_id',$id)
            ->orderBy('kompetensis.kategori_id')
            ->get();
        for ($i=0; $i < $data->count(); $i++) { 
            $data[$i]->level_kompetensi = DB::table('level_kompetensis')->where('kompetensi_id',$data[$i]->id)->orderBy('level')->get();
        }
        // $data = $list->toArray();
        // $data[0]->test = [1,2,3];
        return response()->json([
            'code'=>200,
            'message'=>'Success',
            'data'=>$data
        ]);
    }

    public function post(Request $request)
    {
        $data=$request->req;
        DB::table('kompetensis')->insert(
            [
                'name'=>$data['name'],
                'code'=>$data['code'],
                'minimum_lvl'=>$data['minimum_lvl'],
                'description'=>$data['description'],
                'created_at'=>Carbon::now()->toDateTimeString(),
                'kategori_id'=>$data['kategori_id']
            ]
        );
        return response()->json([
            'code'=>200,
            'message'=>'Data Inserted!',
            'data'=>$data
        ]);
    }
}
