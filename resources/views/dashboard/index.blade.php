@extends('layouts.app')

@section('title', 'Dashboard')

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
            font-size: 0.9rem;
        }

        .custom-body {
            font-weight: bold;
            font-size: 1.1rem;
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 10px;
        }

        .custom-body p {
            margin-bottom: 0;
        }

        .chart-container {
            margin-top: 0px;
        }

        /* Responsive adjustments */
        @media (max-width: 767.98px) {
            .custom-header {
                font-size: 0.85rem;
                padding-top: 8px;
            }

            .custom-body {
                font-size: 1rem;
                padding-bottom: 8px;
            }

            .card-header h6 {
                font-size: 0.95rem !important;
            }

            .btn-sm {
                font-size: 0.75rem;
                padding: 0.25rem 0.5rem;
            }

            .chart-container {
                margin-top: 5px;
            }
        }

        @media (max-width: 575.98px) {
            .custom-body {
                font-size: 0.95rem;
            }
        }
    </style>
@endpush

@section('content')

    <div class="container-fluid px-3 px-md-4">
        <!-- Statistics Cards -->
        <div class="row g-3 g-md-4">
            <div class="col-6 col-md-3">
                <div class="card">
                    <div class="custom-header">Target</div>
                    <div class="custom-body">
                        <p class="text-truncate">Rp 5.000.000</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card">
                    <div class="custom-header">Realisasi</div>
                    <div class="custom-body">
                        <p class="text-truncate">Rp 3.200.000</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card">
                    <div class="custom-header">Persentase</div>
                    <div class="custom-body">
                        <p>64.0%</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card">
                    <div class="custom-header">Selisih</div>
                    <div class="custom-body">
                        <p class="text-truncate">Rp 1.800.000</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row chart-container g-3 g-md-4">
            <div class="col-12 col-lg-6">
                <div class="card h-100 p-0">
                    <div class="card-header bg-base py-3 py-md-4 px-3 px-md-4">
                        <h6 class="text-lg fw-semibold mb-0">Komposisi Sumber Pendapatan</h6>
                    </div>
                    <div class="card-body p-3 p-md-4 text-center">
                        <div id="pieChart" class="d-flex justify-content-center apexcharts-tooltip-z-none"></div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="card h-100 p-0">
                    <div class="card-header bg-base py-3 py-md-4 px-3 px-md-4">
                        <h6 class="text-lg fw-semibold mb-0">Target vs Realisasi</h6>
                    </div>
                    <div class="card-body p-3 p-md-4">
                        <div id="columnChart"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trend Chart -->
        <div class="row chart-container g-3 g-md-4">
            <div class="col-12">
                <div class="card h-100 p-0">
                    <div
                        class="card-header bg-base py-3 py-md-4 px-3 px-md-4 d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-2">
                        <h6 class="text-lg fw-semibold mb-0">Tren Realisasi vs Target</h6>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-info btn-sm" id="monthlyButton">Bulanan</button>
                            <button class="btn btn-outline-info btn-sm" id="quarterlyButton">Triwulan</button>
                        </div>
                    </div>
                    <div class="card-body p-3 p-md-4">
                        <div id="doubleLineChart"></div>
                    </div>
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
