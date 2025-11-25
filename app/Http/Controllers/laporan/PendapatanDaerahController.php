<?php

namespace App\Http\Controllers\laporan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class PendapatanDaerahController extends Controller
{
    public function index()
    {
        $url = 'https://pajakretribusi.katingankab.go.id/api/dashboard/rekap_pendapatan';
        $token = 'SipandaKatinganGinJdH3mU1dyRJ9lxuX7TpBeoa0FaGdMCEFaaU8R0EuTfYfwADXx9HtNRd3AZNu4A8G';

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->get($url);

            if ($response->successful()) {
                $rawApiData = $response->json()['data'] ?? [];
            } else {
                $rawApiData = [];
            }
        } catch (\Exception $e) {
            $rawApiData = [];
        }

        return view('laporan.pendapatan_daerah.index', compact('rawApiData'));
    }
}