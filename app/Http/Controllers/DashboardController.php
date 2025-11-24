<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function getKomposisiTargetSelisihPendapatan(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer SipandaKatinganGinJdH3mU1dyRJ9lxuX7TpBeoa0FaGdMCEFaaU8R0EuTfYfwADXx9HtNRd3AZNu4A8G'
        ])->get('https://pajakretribusi.katingankab.go.id/api/dashboard/target-selisih');

        return response()->json($response->json());
    }

    public function getKomposisiSumberPendapatan()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer SipandaKatinganGinJdH3mU1dyRJ9lxuX7TpBeoa0FaGdMCEFaaU8R0EuTfYfwADXx9HtNRd3AZNu4A8G'
        ])->get('https://pajakretribusi.katingankab.go.id/api/dashboard/komposisi_sumber_pendapatan');

        return response()->json($response->json());
    }

    public function getKomposisiSumberPendapatanBulanan()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer SipandaKatinganGinJdH3mU1dyRJ9lxuX7TpBeoa0FaGdMCEFaaU8R0EuTfYfwADXx9HtNRd3AZNu4A8G'
        ])->get('https://pajakretribusi.katingankab.go.id/api/dashboard/komposisi_sumber_pendapatan_bulanan');

        return response()->json($response->json());
    }

    public function getKomposisiSumberPendapatanTriwulan()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer SipandaKatinganGinJdH3mU1dyRJ9lxuX7TpBeoa0FaGdMCEFaaU8R0EuTfYfwADXx9HtNRd3AZNu4A8G'
        ])->get('https://pajakretribusi.katingankab.go.id/api/dashboard/komposisi_sumber_pendapatan_triwulan');

        return response()->json($response->json());
    }
}
