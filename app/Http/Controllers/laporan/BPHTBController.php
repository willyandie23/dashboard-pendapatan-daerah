<?php

namespace App\Http\Controllers\laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BPHTBController extends Controller
{
    public function index()
    {
        return view('laporan.bphtb.index');
    }
}
