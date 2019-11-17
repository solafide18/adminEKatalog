<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KompSosialCulturalController extends Controller
{
    public function index()
    {
        return view('kompsosialcultural/index');
    }
}
