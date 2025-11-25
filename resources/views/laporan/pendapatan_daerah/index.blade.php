@extends('layouts.app')

@section('title', 'Laporan - Pendapatan Daerah')

@push('styles')
    <style>
        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
            margin: 10px 0;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .chart-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        .chart-controls {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .filter-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-label {
            font-weight: 500;
            font-size: 14px;
            color: #333;
            white-space: nowrap;
        }

        .filter-group select {
            min-width: 180px;
        }

        .accordion-body {
            padding: 1.5rem 1rem;
        }

        .export-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .export-buttons .btn {
            padding: 6px 12px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .export-buttons .btn i {
            font-size: 16px;
        }

        /* === OVERLAY LOADING BESAR (Modal Style) === */
        #globalPageLoader {
            position: fixed;
            inset: 0;
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(8px);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        #globalPageLoader.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .loader-spinner {
            width: 70px;
            height: 70px;
            border: 7px solid #f0f0f0;
            border-top: 7px solid #c0392b;
            border-radius: 50%;
            animation: spin 1.2s linear infinite;
            margin-bottom: 24px;
        }

        .loader-text {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2c3e50;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Dark mode styling */
        [data-theme="dark"] .chart-title {
            color: #fff;
        }

        [data-theme="dark"] .accordion-button {
            color: #fff;
        }

        [data-theme="dark"] .filter-label {
            color: #fff;
        }

        /* Tablet (768px - 991px) */
        @media (max-width: 991px) {
            .chart-header {
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
            }

            .chart-title {
                font-size: 16px;
            }

            .chart-controls {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }

            .filter-group {
                width: 100%;
            }

            .filter-group select {
                flex: 1;
                min-width: unset;
            }

            .export-buttons {
                width: 100%;
                justify-content: stretch;
            }

            .export-buttons .btn {
                flex: 1;
                justify-content: center;
                min-width: 80px;
            }

            .accordion-body {
                padding: 1rem 0.75rem;
            }
        }

        /* Mobile (576px - 767px) */
        @media (max-width: 767px) {
            .container {
                padding-left: 12px;
                padding-right: 12px;
            }

            .card {
                margin-bottom: 1rem;
            }

            .card-body {
                padding: 1rem;
            }

            .chart-container {
                height: 250px;
                margin: 5px 0;
            }

            .chart-title {
                font-size: 15px;
                margin-bottom: 0;
            }

            .filter-label {
                font-size: 13px;
            }

            .filter-group select {
                font-size: 13px;
            }

            .export-buttons .btn {
                font-size: 12px;
                padding: 5px 10px;
            }

            .export-buttons .btn i {
                font-size: 14px;
            }

            .accordion-body {
                padding: 1rem 0.5rem;
            }

            /* Table responsive adjustments */
            .table {
                font-size: 13px;
            }

            .table thead th {
                font-size: 12px;
                padding: 8px 6px;
            }

            .table tbody td {
                padding: 8px 6px;
            }

            .ps-4 {
                padding-left: 1rem !important;
            }

            .loader-spinner {
                width: 60px;
                height: 60px;
                border-width: 6px;
            }

            .loader-text {
                font-size: 1.1rem;
            }
        }

        /* Small Mobile (< 576px) */
        @media (max-width: 575px) {
            .chart-header {
                gap: 10px;
            }

            .chart-title {
                font-size: 14px;
            }

            .chart-container {
                height: 220px;
            }

            .filter-label {
                font-size: 12px;
            }

            .filter-group select {
                font-size: 12px;
                padding: 4px 8px;
            }

            .export-buttons {
                gap: 6px;
            }

            .export-buttons .btn {
                font-size: 11px;
                padding: 4px 8px;
                gap: 3px;
            }

            .export-buttons .btn i {
                font-size: 13px;
            }

            /* Hide text on very small screens, show icon only */
            .export-buttons .btn span.btn-text {
                display: none;
            }

            .table {
                font-size: 12px;
            }

            .table thead th {
                font-size: 11px;
                padding: 6px 4px;
            }

            .table tbody td {
                padding: 6px 4px;
            }

            .accordion-body {
                padding: 0.75rem 0.25rem;
            }

            .ps-4 {
                padding-left: 0.75rem !important;
            }

            .loader-spinner {
                width: 55px;
                height: 55px;
            }

            .loader-text {
                font-size: 1rem;
            }
        }

        /* Extra Small Mobile (< 400px) */
        @media (max-width: 399px) {
            .chart-container {
                height: 200px;
            }

            .export-buttons .btn {
                font-size: 10px;
                padding: 4px 6px;
            }

            .table {
                font-size: 11px;
            }

            .table thead th,
            .table tbody td {
                padding: 5px 3px;
            }

            .loader-spinner {
                width: 50px;
                height: 50px;
            }

            .loader-text {
                font-size: 0.9rem;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Overlay Loading Besar (Modal Style) -->
    <div id="globalPageLoader">
        <div class="loader-spinner"></div>
        <div class="loader-text">Memuat Laporan Pendapatan Daerah...</div>
    </div>

    <div class="container">
        <!-- Chart Card -->
        <div class="card mb-24">
            <div class="card-body">
                <div class="chart-header">
                    <p class="chart-title">Diagram Pendapatan Daerah</p>
                    <div class="chart-controls">
                        <div class="filter-group">
                            <label class="filter-label">Filter:</label>
                            <select class="form-select form-select-sm" id="sourceFilter" onchange="filterData()">
                                <option value="all">Semua Sumber</option>
                                <option value="PAD">PAD</option>
                                <option value="Transfer">Transfer</option>
                                <option value="Lain-lain">Lain-lain</option>
                            </select>
                        </div>
                        <div class="export-buttons">
                            <button class="btn btn-success" onclick="exportToExcel()">
                                <i class="ri-file-excel-2-line"></i> <span class="btn-text">Excel</span>
                            </button>
                            <button class="btn btn-danger" onclick="exportToPDF()">
                                <i class="ri-file-pdf-line"></i> <span class="btn-text">PDF</span>
                            </button>
                            <button class="btn btn-info" onclick="exportToPNG()">
                                <i class="ri-image-line"></i> <span class="btn-text">PNG</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Accordion Card -->
        <div class="card">
            <div class="">
                <div class="accordion" id="revenueAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <span class="fw-semibold">Detail Pendapatan Daerah</span>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#revenueAccordion">
                            <div class="accordion-body mt-3">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0" id="revenueTable">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="fw-semibold">Sumber</th>
                                                <th scope="col" class="text-end fw-semibold">Target</th>
                                                <th scope="col" class="text-end fw-semibold">Realisasi</th>
                                                <th scope="col" class="text-end fw-semibold">Persentase</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody">
                                            <!-- Data will be populated by JavaScript -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/exceljs@4.3.0/dist/exceljs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>

    <script>
        // Data mentah dari API (semua tahun)
        window.rawApiData = @json($rawApiData);

        // Fungsi proses data (sama seperti di dashboard kamu)
        function processRevenueData(year) {
            const dataThisYear = window.rawApiData.filter(d => d.tahun == year);

            const result = {
                PAD: {
                    target: 0,
                    realisasi: 0,
                    details: []
                },
                Transfer: {
                    target: 0,
                    realisasi: 0,
                    details: []
                },
                'Lain-lain': {
                    target: 0,
                    realisasi: 0,
                    details: []
                }
            };

            dataThisYear.forEach(item => {
                let group;
                if (item.kodekelompok === 1) group = 'PAD';
                else if (item.kodekelompok === 2) group = 'Transfer';
                else if (item.kodekelompok === 3) group = 'Lain-lain';
                else return;

                if (item.kodejenis === null) {
                    // Baris total kelompok
                    result[group].target = item.target;
                    result[group].realisasi = item.realisasi;
                } else {
                    // Detail
                    result[group].details.push({
                        name: '- ' + item.urai.trim(),
                        target: item.target,
                        realisasi: item.realisasi,
                        percentage: item.persentase ? parseFloat(item.persentase).toFixed(2) : '0.00'
                    });
                }
            });

            return result;
        }

        // Loader functions
        function showLoader() {
            const loader = document.getElementById('globalPageLoader');
            loader.style.display = 'flex';
            setTimeout(() => loader.classList.remove('hidden'), 10);
        }

        function hideLoader() {
            const loader = document.getElementById('globalPageLoader');
            loader.classList.add('hidden');
            setTimeout(() => loader.style.display = 'none', 500);
        }

        // Update global data + refresh chart & tabel
        window.refreshCharts = function(year) {
            year = year || localStorage.getItem('selectedYear') || new Date().getFullYear();

            // Update judul
            const titleEl = document.querySelector('.chart-title');
            if (titleEl) {
                titleEl.innerHTML = `Diagram Pendapatan Daerah Tahun <strong>${year}</strong>`;
            }

            showLoader();

            // Proses data tahun ini
            window.revenueData = processRevenueData(year);

            // Refresh chart & tabel
            setTimeout(() => {
                window.revenueData = processRevenueData(year);
                if (typeof filterData === 'function') filterData();
                hideLoader();
            }, 5000);
            // if (typeof filterData === 'function') {
            //     filterData();
            // }
        };

        // Jalankan saat load
        document.addEventListener('DOMContentLoaded', () => {
            const year = localStorage.getItem('selectedYear') || new Date().getFullYear();
            window.refreshCharts(year);
        });
    </script>

    <!-- JS Eksternal (hanya chart & tabel) -->
    <script src="{{ asset('assets/js/laporan-pendapatan-daerah.js') }}?v={{ time() }}"></script>
@endpush
