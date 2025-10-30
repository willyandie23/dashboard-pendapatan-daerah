@extends('layouts.app')

@section('title', 'Log Akvifitas')

@push('styles')
    <style>
        /* CSS Variables untuk Light dan Dark Mode */
        :root {
            /* Light mode variables */
            --log-bg: #ffffff;
            --log-card-bg: #ffffff;
            --log-text-primary: #212529;
            --log-text-secondary: #6c757d;
            --log-border: #dee2e6;
            --log-table-bg: #ffffff;
            --log-table-stripe: rgba(0, 0, 0, 0.05);
            --log-table-hover: rgba(0, 0, 0, 0.075);
            --log-table-border: #dee2e6;
            --log-card-shadow: rgba(0, 0, 0, 0.1);
            --log-input-bg: #ffffff;
            --log-input-border: #ced4da;
            --log-input-text: #495057;
        }

        [data-theme="dark"] {
            /* Dark mode variables */
            --log-bg: #0f172a;
            --log-card-bg: #1e293b;
            --log-text-primary: #f1f5f9;
            --log-text-secondary: #94a3b8;
            --log-border: #334155;
            --log-table-bg: #1e293b;
            --log-table-stripe: rgba(255, 255, 255, 0.05);
            --log-table-hover: rgba(255, 255, 255, 0.075);
            --log-table-border: #475569;
            --log-card-shadow: rgba(0, 0, 0, 0.3);
            --log-input-bg: #334155;
            --log-input-border: #475569;
            --log-input-text: #f1f5f9;
        }

        /* Card styling */
        .card {
            background: var(--log-card-bg);
            border: 1px solid var(--log-border);
            box-shadow: 0 2px 8px var(--log-card-shadow);
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .card-body {
            color: var(--log-text-primary);
            transition: color 0.3s ease;
        }

        /* DataTables styling */
        #app-logs-datatables {
            background: var(--log-table-bg);
            color: var(--log-text-primary);
            transition: all 0.3s ease;
        }

        #app-logs-datatables thead th {
            background: var(--log-table-bg);
            color: var(--log-text-primary);
            border-color: var(--log-table-border);
            font-weight: 600;
            transition: all 0.3s ease;
        }

        #app-logs-datatables tbody td {
            background: var(--log-table-bg);
            color: var(--log-text-primary);
            border-color: var(--log-table-border);
            transition: all 0.3s ease;
        }

        #app-logs-datatables tfoot th {
            background: var(--log-table-bg);
            color: var(--log-text-primary);
            border-color: var(--log-table-border);
            font-weight: 600;
            transition: all 0.3s ease;
        }

        #app-logs-datatables tbody tr:hover td {
            background: var(--log-table-hover);
        }

        #app-logs-datatables tbody tr.odd {
            background: var(--log-table-bg);
        }

        #app-logs-datatables tbody tr.even {
            background: var(--log-table-stripe);
        }

        /* DataTables wrapper elements */
        .dataTables_wrapper {
            color: var(--log-text-primary);
            transition: color 0.3s ease;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: var(--log-text-primary);
            transition: color 0.3s ease;
        }

        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            background: var(--log-input-bg);
            color: var(--log-input-text);
            border: 1px solid var(--log-input-border);
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
            color: var(--log-text-primary) !important;
            background: var(--log-table-bg);
            border: 1px solid var(--log-border);
            transition: all 0.3s ease;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: var(--log-table-hover) !important;
            border-color: var(--log-border);
            color: var(--log-text-primary) !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #4f46e5 !important;
            border-color: #4f46e5 !important;
            color: white !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            color: var(--log-text-secondary) !important;
            opacity: 0.5;
        }

        /* Processing indicator */
        .dataTables_processing {
            background: var(--log-card-bg) !important;
            color: var(--log-text-primary) !important;
            border: 1px solid var(--log-border) !important;
            border-radius: 8px;
        }

        /* Button styling */
        .btn-info {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            border: none;
            border-radius: 6px;
            transition: all 0.3s ease;
            color: white;
            font-weight: 600;
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

            table.dataTable {
                font-size: 0.875rem;
            }

            table.dataTable thead th,
            table.dataTable tbody td {
                padding: 0.5rem;
            }

            .btn-info {
                font-size: 0.875rem;
                padding: 0.35rem 0.75rem;
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
    <div class="row">
        <div class="col-md-6 col-xl-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="app-logs-datatables" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Model</th>
                                <th>Pengguna</th>
                                <th>Guard</th>
                                <th>Modul</th>
                                <th>Aktifitas</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Model</th>
                                <th>Pengguna</th>
                                <th>Guard</th>
                                <th>Modul</th>
                                <th>Aktifitas</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#app-logs-datatables').DataTable({
                "processing": true,
                "serverSide": true,
                lengthMenu: [
                    [5, 10, 25, -1],
                    [5, 10, 25, "Semua"]
                ],

                pageLength: 10,
                "ajax": {
                    "url": "/api/app-logs",
                    "type": "GET",
                    "dataSrc": function(json) {
                        console.log(json);
                        return json.data;
                    },
                    "error": function(xhr, error, thrown) {
                        console.error("Error fetching data: ", error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Terjadi kesalahan saat memuat data. Silakan coba lagi.',
                            widthAuto: true,
                            heightAuto: true
                        });
                    }
                },
                "columns": [{
                        "data": null,
                        "render": function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        "data": "system_logable_type"
                    },
                    {
                        "data": "user.name"
                    },
                    {
                        "data": "guard_name"
                    },
                    {
                        "data": "module_name"
                    },
                    {
                        "data": "action"
                    },
                    {
                        "data": "created_at",
                        "render": function(data) {
                            return new Date(data).toLocaleString('id-ID', {
                                year: 'numeric',
                                month: '2-digit',
                                day: '2-digit',
                                hour: '2-digit',
                                minute: '2-digit',
                                hour12: false
                            }) + ' WIB';
                        }
                    },
                    {
                        "data": "id",
                        "render": function(data, type, row) {
                            return '<a href="/app-logs/' + data +
                                '" class="btn btn-sm btn-info">Detail</a>';
                        }
                    }
                ]
            });
        });
    </script>
@endpush
