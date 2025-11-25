@extends('layouts.app')

@section('title', 'Dashboard Pendapatan Daerah Kab. Katingan')

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

        /* === OVERLAY LOADING BESAR (seperti modal) === */
        #globalDashboardLoader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(5px);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.4s ease, visibility 0.4s ease;
        }

        #globalDashboardLoader.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .loader-spinner {
            width: 60px;
            height: 60px;
            border: 6px solid #f3f3f3;
            border-top: 6px solid #e74c3c;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }

        .loader-text {
            font-size: 1.1rem;
            color: #2c3e50;
            font-weight: 500;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
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

            .loader-text {
                font-size: 1rem;
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

    <!-- Overlay Loading Besar (muncul saat pertama load & refresh) -->
    <div id="globalDashboardLoader">
        <div class="loader-spinner"></div>
        <div class="loader-text">Memuat Dashboard...</div>
    </div>

    <div class="container-fluid px-3 px-md-4">
        <!-- Statistics Cards -->
        <div class="row g-3 g-md-4">
            <div class="col-6 col-md-3">
                <div class="card card-target">
                    <div class="custom-header">Target</div>
                    <div class="custom-body">
                        <p class="text-truncate">Memuat...</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card card-realisasi">
                    <div class="custom-header">Realisasi</div>
                    <div class="custom-body">
                        <p class="text-truncate">Memuat...</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card card-persentase">
                    <div class="custom-header">Persentase</div>
                    <div class="custom-body">
                        <p>Memuat...</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card card-selisih">
                    <div class="custom-header">Selisih</div>
                    <div class="custom-body">
                        <p class="text-truncate">Memuat...</p>
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
                            <button class="btn btn-outline-danger btn-sm" id="monthlyButton">Bulanan</button>
                            <button class="btn btn-outline-danger btn-sm" id="quarterlyButton">Triwulan</button>
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
    <script src="{{ asset('assets/js/dashboardCards.js') }}"></script>
    <script src="{{ asset('assets/js/pieChartPageChart.js') }}"></script>
    <script src="{{ asset('assets/js/columnChartPageChart.js') }}"></script>
    <script src="{{ asset('assets/js/lineChartPageChart.js') }}"></script>

    <script>
        // Fungsi untuk menyembunyikan overlay loading
        function hideGlobalLoader() {
            const loader = document.getElementById('globalDashboardLoader');
            if (loader) {
                loader.classList.add('hidden');
                setTimeout(() => {
                    loader.style.display = 'none';
                }, 400);
            }
        }

        // Fungsi untuk menampilkan kembali loader (saat refresh)
        function showGlobalLoader() {
            const loader = document.getElementById('globalDashboardLoader');
            if (loader) {
                loader.style.display = 'flex';
                setTimeout(() => loader.classList.remove('hidden'), 10);
            }
        }

        // Refresh semua data
        window.refreshCharts = function(year = new Date().getFullYear()) {
            console.log('Refreshing charts for year: ' + year);

            // Tampilkan loader lagi kalau user ganti tahun
            showGlobalLoader();

            Promise.allSettled([
                renderDashboardCards(year),
                renderPieChart(year),
                renderColumnChart(year),
                renderLineChart(year)
            ]).then(() => {
                hideGlobalLoader();
            }).catch(err => {
                console.error('Error loading dashboard:', err);
                hideGlobalLoader();
            });
        };

        // Jalankan otomatis saat halaman pertama kali load
        document.addEventListener('DOMContentLoaded', () => {
            refreshCharts();
        });
    </script>
@endpush
