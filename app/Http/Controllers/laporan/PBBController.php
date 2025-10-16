<?php

namespace App\Http\Controllers\laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PBBController extends Controller
{
    public function index()
    {
        return view('laporan.pbb.index');
    }
}
