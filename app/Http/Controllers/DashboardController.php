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
            'Authorization' => 'Bearer SipandaKatinganGinYwurdK4qzkiaJxMtVX0UQzBe8ZVrdhCM2NzVeb69CGfVM6l8Ix4WvX6a7lUQQWvZ'
        ])->get('https://pajakretribusi.katingankab.go.id/api/dashboard/target-selisih');

        return response()->json($response->json());
    }

    public function getKomposisiSumberPendapatan()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer SipandaKatinganGinYwurdK4qzkiaJxMtVX0UQzBe8ZVrdhCM2NzVeb69CGfVM6l8Ix4WvX6a7lUQQWvZ'
        ])->get('https://pajakretribusi.katingankab.go.id/api/dashboard/komposisi_sumber_pendapatan');

        return response()->json($response->json());
    }

    public function getKomposisiSumberPendapatanBulanan()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer SipandaKatinganGinYwurdK4qzkiaJxMtVX0UQzBe8ZVrdhCM2NzVeb69CGfVM6l8Ix4WvX6a7lUQQWvZ'
        ])->get('https://pajakretribusi.katingankab.go.id/api/dashboard/komposisi_sumber_pendapatan_bulanan');

        return response()->json($response->json());
    }

    public function getKomposisiSumberPendapatanTriwulan()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer SipandaKatinganGinYwurdK4qzkiaJxMtVX0UQzBe8ZVrdhCM2NzVeb69CGfVM6l8Ix4WvX6a7lUQQWvZ'
        ])->get('https://pajakretribusi.katingankab.go.id/api/dashboard/komposisi_sumber_pendapatan_triwulan');

        return response()->json($response->json());
    }
}
