<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KompCoreValueController extends Controller
{
    public function index()
    {
        return view('kompcorevalue/index');
    }
}