@extends('layouts.app')

@section('title', 'Dokumen Publik')

@push('styles')
    <style>
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

        [data-theme="dark"] #globalPageLoader {
            background: rgba(15, 23, 42, 0.98);
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
            color: #1e293b;
            letter-spacing: 0.5px;
        }

        [data-theme="dark"] .loader-text {
            color: #e2e8f0;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Responsive loader */
        @media (max-width: 768px) {
            .loader-spinner {
                width: 60px;
                height: 60px;
                border-width: 6px;
            }

            .loader-text {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            .loader-text {
                font-size: 1rem;
            }
        }

        /* === SEMUA CSS ASLI KAMU TETAP 100% UTUH === */
        :root {
            --public-doc-bg: #ffffff;
            --public-doc-card-bg: #ffffff;
            --public-doc-text-primary: #212529;
            --public-doc-text-secondary: #6c757d;
            --public-doc-border: #dee2e6;
            --public-doc-table-bg: #ffffff;
            --public-doc-table-stripe: rgba(0, 0, 0, 0.05);
            --public-doc-table-hover: rgba(0, 0, 0, 0.075);
            --public-doc-table-border: #dee2e6;
            --public-doc-card-shadow: rgba(0, 0, 0, 0.1);
            --public-doc-input-bg: #ffffff;
            --public-doc-input-border: #ced4da;
            --public-doc-input-text: #495057;
        }

        [data-theme="dark"] {
            --public-doc-bg: #0f172a;
            --public-doc-card-bg: #1e293b;
            --public-doc-text-primary: #f1f5f9;
            --public-doc-text-secondary: #94a3b8;
            --public-doc-border: #334155;
            --public-doc-table-bg: #1e293b;
            --public-doc-table-stripe: rgba(255, 255, 255, 0.05);
            --public-doc-table-hover: rgba(255, 255, 255, 0.075);
            --public-doc-table-border: #475569;
            --public-doc-card-shadow: rgba(0, 0, 0, 0.3);
            --public-doc-input-bg: #334155;
            --public-doc-input-border: #475569;
            --public-doc-input-text: #f1f5f9;
        }

        .card {
            background: var(--public-doc-card-bg);
            border: 1px solid var(--public-doc-border);
            box-shadow: 0 2px 8px var(--public-doc-card-shadow);
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .card-body {
            color: var(--public-doc-text-primary);
            transition: color 0.3s ease;
        }

        #documents-table,
        .dataTables_wrapper * {
            background: var(--public-doc-table-bg) !important;
            color: var(--public-doc-text-primary) !important;
            border-color: var(--public-doc-table-border) !important;
            transition: all 0.3s ease;
        }

        #documents-table tbody tr:hover td {
            background: var(--public-doc-table-hover) !important;
        }

        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            background: var(--public-doc-input-bg);
            color: var(--public-doc-input-text);
            border: 1px solid var(--public-doc-input-border);
            border-radius: 6px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            color: var(--public-doc-text-primary) !important;
            background: var(--public-doc-table-bg);
            border: 1px solid var(--public-doc-border);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: var(--public-doc-table-hover) !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #4f46e5 !important;
            border-color: #4f46e5 !important;
            color: white !important;
        }

        .btn-info {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            border: none;
            border-radius: 6px;
            transition: all 0.3s ease;
            color: white;
        }

        .btn-info:hover {
            background: linear-gradient(135deg, #0891b2 0%, #0e7490 100%);
            transform: translateY(-1px);
            color: white;
        }

        @media (max-width: 768px) {
            .card-body {
                padding: 1rem;
            }

            table.dataTable tbody td {
                font-size: 0.875rem;
            }

            .btn-info {
                font-size: 0.875rem;
                padding: 0.4rem 0.8rem;
            }
        }
    </style>
@endpush

@section('content')

    <!-- Overlay Loading Besar (Modal Style) -->
    <div id="globalPageLoader">
        <div class="loader-spinner"></div>
        <div class="loader-text">Memuat Daftar Dokumen Publik...</div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="documents-table" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Dokumen</th>
                                        <th>Total Download</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
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

        $(document).ready(function() {
            // Tampilkan loader saat halaman pertama load
            showLoader();

            const table = $('#documents-table').DataTable({
                processing: true,
                serverSide: false,
                lengthMenu: [
                    [5, 10, 25, -1],
                    [5, 10, 25, "Semua"]
                ],
                pageLength: 10,
                language: {
                    emptyTable: "Tidak ada dokumen yang ditampilkan saat ini."
                },
                ajax: {
                    url: '/api/dokumen',  // Fetch semua data dari endpoint yang sama
                    type: 'GET',
                    dataSrc: function(json) {
                        // Filter hanya dokumen dengan display = true (client-side)
                        // Support response shapes: an array, or { success:..., data: [...] }, or { data: [...] }
                        var items = [];
                        if (Array.isArray(json)) {
                            items = json;
                        } else if (json && Array.isArray(json.data)) {
                            items = json.data;
                        } else {
                            return [];
                        }

                        return items.filter(function(doc) {
                            if (!doc) return false;
                            // accept boolean true, numeric 1, string '1' or 'true'
                            return doc.display === true || doc.display === 1 || doc.display === '1' || doc.display === 'true';
                        });
                    },
                    error: function(xhr) {
                        hideLoader();
                        console.error('Error:', xhr.responseText);
                        Swal.fire('Error!', 'Gagal memuat dokumen.', 'error');
                    }
                },
                columns: [{
                        data: null,
                        render: (data, type, row, meta) => meta.row + meta.settings._iDisplayStart + 1
                    },
                    {
                        data: 'document_name'
                    },
                    {
                        data: 'total_download'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                                <a href="${row.document_path}" 
                                    class="btn btn-info btn-sm download-btn" 
                                    data-id="${row.id}" 
                                    target="_blank">
                                    <i class="bi bi-download"></i> Download
                                </a>
                            `;
                        }
                    }
                ],
                // Sembunyikan loader setelah tabel selesai render pertama kali
                initComplete: function() {
                    hideLoader();
                },
                // Tampilkan loader saat reload tabel
                preDrawCallback: function() {
                    showLoader();
                },
                drawCallback: function() {
                    hideLoader();

                    // Update jumlah download saat klik tombol
                    $('.download-btn').off('click').on('click', function(e) {
                        const fileId = $(this).data('id');

                        // Biarkan link tetap buka file, tapi kirim request update download
                        $.ajax({
                            url: `/dokumen/${fileId}/download`,
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function() {
                                // Reload tabel untuk update total_download
                                table.ajax.reload(null, false); 
                            },
                            error: function() {
                                Swal.fire('Error!', 'Gagal mencatat download.', 'error');
                            }
                        });
                    });
                }
            });
        });
    </script>
@endpush