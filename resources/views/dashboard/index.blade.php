@extends('layouts.app')

@push('styles')
    <style>
        .card {
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border: none;
        }

        .custom-header {
            padding-top: 10px;
            padding-left: 10px;
            padding-right: 10px;
            font-size: 1rem;
        }
        
        .custom-body {
            font-weight: bold;
            font-size: 1.2rem;
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 10px;
        }

        .chart-container {
            margin-top: 20px;
        }
    </style>
@endpush

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="custom-header">Target</div>
                    <div class="custom-body">
                        <p>Rp 5.000.000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="custom-header">Realisasi</div>
                    <div class="custom-body">
                        <p>Rp 3.200.000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="custom-header">Persentase</div>
                    <div class="custom-body">
                        <p>64.0%</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="custom-header">Selisih</div>
                    <div class="custom-body">
                        <p>Rp 1.800.000</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row chart-container">
            <div class="col-md-6">
                <div class="card h-100 p-0">
                    <div class="card-header bg-base py-16 px-24">
                        <h6 class="text-lg fw-semibold mb-0">Komposisi Sumber Pendapatan</h6>
                    </div>
                    <div class="card-body p-24 text-center">
                        <div id="pieChart" class="d-flex justify-content-center apexcharts-tooltip-z-none"></div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card h-100 p-0">
                    <div class="card-header bg-base py-16 px-24">
                        <h6 class="text-lg fw-semibold mb-0">Target vs Realisasi</h6>
                    </div>
                    <div class="card-body p-24">
                        <div id="columnChart" class=""></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 chart-container">
        <div class="card h-100 p-0">
            <div class="card-header bg-base py-16 px-24 d-flex justify-content-between align-items-center">
                <h6 class="text-lg fw-semibold mb-0">Tren Realisasi vs Target</h6>
                <div>
                    <button class="btn btn-outline-info btn-sm me-2" id="monthlyButton">Bulanan</button>
                    <button class="btn btn-outline-info btn-sm" id="quarterlyButton">Triwulan</button>
                </div>
            </div>
            <div class="card-body p-24">
                <div id="doubleLineChart"></div>
            </div>
        </div>
    </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/pieChartPageChart.js') }}"></script>
    <script src="{{ asset('assets/js/lineChartPageChart.js') }}"></script>
    <script src="{{ asset('assets/js/columnChartPageChart.js') }}"></script>
@endpush