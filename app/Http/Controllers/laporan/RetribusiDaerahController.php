<?php

namespace App\Http\Controllers\laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RetribusiDaerahController extends Controller
{
    public function index()
    {
        return view('laporan.retribusi_daerah.index');
    }
}
