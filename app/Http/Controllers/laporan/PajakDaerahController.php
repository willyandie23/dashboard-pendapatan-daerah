<?php

namespace App\Http\Controllers\laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PajakDaerahController extends Controller
{
    public function index()
    {
        return view('laporan.pajak_daerah.index');
    }
}
