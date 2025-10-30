@extends('layouts.app')

@section('title', 'Dokumen')

@push('styles')
    <style>
        /* CSS Variables untuk Light dan Dark Mode */
        :root {
            /* Light mode variables */
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
            /* Dark mode variables */
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

        /* Card styling */
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

        /* DataTables styling */
        #documents-table {
            background: var(--public-doc-table-bg);
            color: var(--public-doc-text-primary);
            transition: all 0.3s ease;
        }

        #documents-table thead th {
            background: var(--public-doc-table-bg);
            color: var(--public-doc-text-primary);
            border-color: var(--public-doc-table-border);
            transition: all 0.3s ease;
        }

        #documents-table tbody td {
            background: var(--public-doc-table-bg);
            color: var(--public-doc-text-primary);
            border-color: var(--public-doc-table-border);
            transition: all 0.3s ease;
        }

        #documents-table tbody tr:hover td {
            background: var(--public-doc-table-hover);
        }

        #documents-table tbody tr.odd {
            background: var(--public-doc-table-bg);
        }

        #documents-table tbody tr.even {
            background: var(--public-doc-table-stripe);
        }

        /* DataTables wrapper elements */
        .dataTables_wrapper {
            color: var(--public-doc-text-primary);
            transition: color 0.3s ease;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: var(--public-doc-text-primary);
            transition: color 0.3s ease;
        }

        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            background: var(--public-doc-input-bg);
            color: var(--public-doc-input-text);
            border: 1px solid var(--public-doc-input-border);
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
            color: var(--public-doc-text-primary) !important;
            background: var(--public-doc-table-bg);
            border: 1px solid var(--public-doc-border);
            transition: all 0.3s ease;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: var(--public-doc-table-hover) !important;
            border-color: var(--public-doc-border);
            color: var(--public-doc-text-primary) !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #4f46e5 !important;
            border-color: #4f46e5 !important;
            color: white !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            color: var(--public-doc-text-secondary) !important;
            opacity: 0.5;
        }

        /* Button styling */
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

        /* Responsive adjustments */
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
                        data: null,
                        render: function(data, type, row) {
                            return `
                                <a href="${row.document_path}" class="btn btn-info btn-sm me-1 download-btn" data-id="${row.id}" target="_blank">
                                    <i class="bi bi-download"></i> Download
                                </a>
                            `;
                        }
                    }
                ],
                drawCallback: function() {
                    $('.download-btn').on('click', function() {
                        const fileId = $(this).data('id');

                        $.ajax({
                            url: `/dokumen/{id}/download`.replace('{id}', fileId),
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
