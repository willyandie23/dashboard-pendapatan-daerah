<?php

namespace App\Http\Controllers\laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenerimaanOpdController extends Controller
{
    public function index()
    {
        return view('laporan.penerimaan_opd.index');
    }
}
