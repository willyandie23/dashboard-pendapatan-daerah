@extends('layouts.app')

@section('title', 'Admin - Dokumen')

@push('styles')
    <style>
        /* CSS Variables untuk Light dan Dark Mode */
        :root {
            /* Light mode variables */
            --document-bg: #ffffff;
            --document-card-bg: #ffffff;
            --document-text-primary: #212529;
            --document-text-secondary: #6c757d;
            --document-border: #dee2e6;
            --document-table-bg: #ffffff;
            --document-table-stripe: rgba(0, 0, 0, 0.05);
            --document-table-hover: rgba(0, 0, 0, 0.075);
            --document-table-border: #dee2e6;
            --document-card-shadow: rgba(0, 0, 0, 0.1);
            --document-input-bg: #ffffff;
            --document-input-border: #ced4da;
            --document-input-text: #495057;
        }

        [data-theme="dark"] {
            /* Dark mode variables */
            --document-bg: #0f172a;
            --document-card-bg: #1e293b;
            --document-text-primary: #f1f5f9;
            --document-text-secondary: #94a3b8;
            --document-border: #334155;
            --document-table-bg: #1e293b;
            --document-table-stripe: rgba(255, 255, 255, 0.05);
            --document-table-hover: rgba(255, 255, 255, 0.075);
            --document-table-border: #475569;
            --document-card-shadow: rgba(0, 0, 0, 0.3);
            --document-input-bg: #334155;
            --document-input-border: #475569;
            --document-input-text: #f1f5f9;
        }

        /* Container styling */
        .container {
            transition: background-color 0.3s ease;
        }

        /* Card styling */
        .card {
            background: var(--document-card-bg);
            border: 1px solid var(--document-border);
            box-shadow: 0 2px 8px var(--document-card-shadow);
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .card-body {
            color: var(--document-text-primary);
            transition: color 0.3s ease;
        }

        /* DataTables styling */
        #documents-table {
            background: var(--document-table-bg);
            color: var(--document-text-primary);
            transition: all 0.3s ease;
        }

        #documents-table thead th {
            background: var(--document-table-bg);
            color: var(--document-text-primary);
            border-color: var(--document-table-border);
            transition: all 0.3s ease;
        }

        #documents-table tbody td {
            background: var(--document-table-bg);
            color: var(--document-text-primary);
            border-color: var(--document-table-border);
            transition: all 0.3s ease;
        }

        #documents-table tbody tr:hover td {
            background: var(--document-table-hover);
        }

        #documents-table tbody tr.odd {
            background: var(--document-table-bg);
        }

        #documents-table tbody tr.even {
            background: var(--document-table-stripe);
        }

        /* DataTables wrapper elements */
        .dataTables_wrapper {
            color: var(--document-text-primary);
            transition: color 0.3s ease;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: var(--document-text-primary);
            transition: color 0.3s ease;
        }

        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            background: var(--document-input-bg);
            color: var(--document-input-text);
            border: 1px solid var(--document-input-border);
            border-radius: 6px;
            padding: 0.375rem 0.75rem;
            transition: all 0.3s ease;
        }

        .dataTables_wrapper .dataTables_length select:focus,
        .dataTables_wrapper .dataTables_filter input:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        /* Pagination styling */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            color: var(--document-text-primary) !important;
            background: var(--document-table-bg);
            border: 1px solid var(--document-border);
            transition: all 0.3s ease;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: var(--document-table-hover) !important;
            border-color: var(--document-border);
            color: var(--document-text-primary) !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #4f46e5 !important;
            border-color: #4f46e5 !important;
            color: white !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            color: var(--document-text-secondary) !important;
            opacity: 0.5;
        }

        /* Button styling */
        .btn-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border: none;
            border-radius: 8px;
            padding: 0.625rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.25);
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.35);
        }

        .btn-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            border: none;
            border-radius: 6px;
            transition: all 0.3s ease;
            color: white;
        }

        .btn-warning:hover {
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
            transform: translateY(-1px);
            color: white;
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

        .btn-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            border: none;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            transform: translateY(-1px);
        }

        /* Status Display Badge Styling */
        .status-badge {
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.875rem;
            font-weight: 500;
            text-align: center;
        }

        .status-public {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status-private {
            background-color: #fee2e2;
            color: #991b1b;
        }

        [data-theme="dark"] .status-public {
            background-color: #064e3b;
            color: #d1fae5;
        }

        [data-theme="dark"] .status-private {
            background-color: #7f1d1d;
            color: #fee2e2;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card-body {
                padding: 1rem;
            }

            .btn-success {
                width: 100%;
                margin-bottom: 1rem;
            }

            table.dataTable tbody td {
                font-size: 0.875rem;
            }

            .status-badge {
                font-size: 0.75rem;
                padding: 0.2rem 0.4rem;
            }
        }

        /* Smooth transitions */
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('document.create') }}" class="btn btn-success mb-3">
                            <i class="fas fa-plus"></i> Tambah Dokumen
                        </a>
                        <div class="table-responsive">
                            <table id="documents-table" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Dokumen</th>
                                        <th>Total Download</th>
                                        <th>Status</th>
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
        $(document).ready(function() {
            const table = $('#documents-table').DataTable({
                processing: true,
                serverSide: false,

                lengthMenu: [
                    [5, 10, 25, -1],
                    [5, 10, 25, "Semua"]
                ],

                pageLength: 10,

                ajax: {
                    url: '/api/dokumen',
                    type: 'GET',
                    dataSrc: "data",
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', xhr.responseText);
                        Swal.fire('Error!', 'Gagal memuat data.', 'error');
                    }
                },
                columns: [{
                        data: null,
                        render: (data, type, row, meta) => meta.row + 1
                    },
                    {
                        data: 'document_name'
                    },
                    {
                        data: 'total_download'
                    },
                    {
                        data: 'display',
                        render: function(data, type, row) {
                            if (data === true || data === 1) {
                                return '<span class="status-badge status-public">Publik</span>';
                            } else {
                                return '<span class="status-badge status-private">Tidak Publik</span>';
                            }
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                                <a href="/dokumen/${row.id}/edit" class="btn btn-warning btn-sm me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="${row.document_path}" class="btn btn-info btn-sm me-1 download-btn" data-id="${row.id}" target="_blank">
                                    <i class="bi bi-download"></i> Download
                                </a>
                                <button class="btn btn-danger btn-sm delete-file" data-id="${row.id}">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            `;
                        }
                    }
                ],
                drawCallback: function() {
                    $('.delete-file').off('click').on('click', function() {
                        const fileId = $(this).data('id');
                        const apiUrl = `/api/dokumen/${fileId}`;

                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: "File ini akan dihapus permanen!",
                            icon: 'warning',
                            width: 700,
                            heightAuto: true,
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Ya, hapus!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                fetch(apiUrl, {
                                        method: 'DELETE',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'Authorization': `Bearer ${token}`
                                        }
                                    })
                                    .then(response => {
                                        if (!response.ok) {
                                            return response.json().then(err => {
                                                throw new Error(err
                                                    .message ||
                                                    'Network response was not ok'
                                                );
                                            });
                                        }
                                        return response.json();
                                    })
                                    .then(data => {
                                        if (data.message ===
                                            'Document deleted successfully') {
                                            Swal.fire(
                                                'File!',
                                                'File telah dihapus.',
                                                'success'
                                            ).then(() => {
                                                table.ajax.reload();
                                            });
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error deleting File:',
                                            error);
                                        Swal.fire(
                                            'Gagal!',
                                            'Gagal menghapus File: ' +
                                            error
                                            .message,
                                            'error'
                                        );
                                    });
                            }
                        });
                    });
                    $('.download-btn').on('click', function() {
                        const fileId = $(this).data('id');

                        $.ajax({
                            url: `/dokumen/${fileId}/download`,
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content'),
                                'Authorization': `Bearer ${token}`
                            },
                            success: function(response) {
                                table.ajax.reload();
                            },
                            error: function(xhr, status, error) {
                                Swal.fire('Error!',
                                    'Gagal memperbarui jumlah download.',
                                    'error');
                            }
                        });
                    });
                }
            });
        });
    </script>
@endpush