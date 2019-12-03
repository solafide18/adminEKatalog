<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdministratorController extends Controller {

    public function getAdmin(Request $req)
    {
        $data = DB::table('admin_pegawais')->get();
        return response()->json([
            'code' => 200,
            'message' => 'Data Found!',
            'data' => $data
        ]);
    }
    public function addAdmin(Request $request)
    {
        DB::table('admin_pegawais')
        ->insert([
            'pegawai_id' => $request->req['pegawai_id'],
            'is_admin' => true,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        $data = DB::table('admin_pegawais')->where('pegawai_id',$request->req['pegawai_id'])->get();
        return response()->json([
                'code' => 200,
                'message' => 'Data Inserted!',
                'data' => $data
        ]);
    }

    public function deleteAdmin($id) {
        DB::table('admin_pegawais')
            ->where('id', $id)
            ->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Data Deleted!'
            ]);
    }
}