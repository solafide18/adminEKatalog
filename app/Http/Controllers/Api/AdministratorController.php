<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdministratorController extends Controller {

    public function addAdmin(Request $data)
    {
        $data = DB::table('admin_pegawais')
        ->insert([
            'pegawai_id' => $data['pegawai_id'],
            'is_admin' => true,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
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