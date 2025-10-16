<?php

namespace App\Http\Controllers\laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendapatanDaerahController extends Controller
{
    public function index()
    {
        return view('laporan.pendapatan_daerah.index');
    }
}
