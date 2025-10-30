@extends('layouts.app')

@section('title', 'Log Aktivitas')

@push('styles')
    <style>
        /* CSS Variables untuk Light dan Dark Mode */
        :root {
            /* Light mode variables */
            --log-detail-bg: #ffffff;
            --log-detail-card-bg: #ffffff;
            --log-detail-text-primary: #212529;
            --log-detail-text-secondary: #6c757d;
            --log-detail-text-muted: #95a5a6;
            --log-detail-border: #dee2e6;
            --log-detail-card-shadow: rgba(0, 0, 0, 0.08);
            --log-detail-hr: #e9ecef;
            --log-detail-icon-bg: #f8f9fa;
            --log-detail-icon-color: #4f46e5;
            --log-detail-json-bg: #f8f9fa;
            --log-detail-json-border: #dee2e6;
            --log-detail-json-text: #2c3e50;
            --log-detail-badge-bg: #e7f3ff;
            --log-detail-badge-text: #0c5460;
            --log-detail-label-bg: #f1f3f5;
        }

        [data-theme="dark"] {
            /* Dark mode variables */
            --log-detail-bg: #0f172a;
            --log-detail-card-bg: #1e293b;
            --log-detail-text-primary: #f1f5f9;
            --log-detail-text-secondary: #94a3b8;
            --log-detail-text-muted: #64748b;
            --log-detail-border: #334155;
            --log-detail-card-shadow: rgba(0, 0, 0, 0.3);
            --log-detail-hr: #334155;
            --log-detail-icon-bg: #334155;
            --log-detail-icon-color: #818cf8;
            --log-detail-json-bg: #0f172a;
            --log-detail-json-border: #475569;
            --log-detail-json-text: #e2e8f0;
            --log-detail-badge-bg: #1e3a3f;
            --log-detail-badge-text: #67e8f9;
            --log-detail-label-bg: #334155;
        }

        /* Card styling */
        .card {
            background: var(--log-detail-card-bg);
            border: 1px solid var(--log-detail-border);
            box-shadow: 0 4px 12px var(--log-detail-card-shadow);
            border-radius: 12px;
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .card:hover {
            box-shadow: 0 6px 16px var(--log-detail-card-shadow);
            transform: translateY(-2px);
        }

        .card-body {
            color: var(--log-detail-text-primary);
            transition: color 0.3s ease;
            padding: 1.5rem;
        }

        /* Header styling */
        .card-body h6 {
            color: var(--log-detail-text-secondary);
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: color 0.3s ease;
        }

        .card-body h6 i {
            font-size: 1.2rem;
            color: var(--log-detail-icon-color);
            background: var(--log-detail-icon-bg);
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        /* Horizontal rule */
        hr {
            border-color: var(--log-detail-hr);
            opacity: 1;
            transition: border-color 0.3s ease;
        }

        /* Paragraph styling */
        .card-body p {
            margin-bottom: 0.75rem;
            line-height: 1.6;
            color: var(--log-detail-text-primary);
            transition: color 0.3s ease;
        }

        .card-body p strong {
            color: var(--log-detail-text-secondary);
            font-weight: 600;
            display: inline-block;
            min-width: 120px;
            transition: color 0.3s ease;
        }

        .card-body p span {
            color: var(--log-detail-text-primary);
            padding: 0.25rem 0.75rem;
            background: var(--log-detail-label-bg);
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        /* JSON pre styling */
        pre {
            background-color: var(--log-detail-json-bg);
            color: var(--log-detail-json-text);
            padding: 1.25rem;
            border: 1px solid var(--log-detail-json-border);
            border-radius: 8px;
            white-space: pre-wrap;
            word-wrap: break-word;
            font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', 'Consolas', 'source-code-pro', monospace;
            font-size: 0.875rem;
            line-height: 1.6;
            margin: 0;
            max-height: 400px;
            overflow-y: auto;
            transition: all 0.3s ease;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        /* Custom scrollbar for JSON */
        pre::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        pre::-webkit-scrollbar-track {
            background: var(--log-detail-json-bg);
            border-radius: 4px;
        }

        pre::-webkit-scrollbar-thumb {
            background: var(--log-detail-border);
            border-radius: 4px;
        }

        pre::-webkit-scrollbar-thumb:hover {
            background: var(--log-detail-text-muted);
        }

        /* JSON syntax highlighting */
        [data-theme="dark"] pre {
            --json-string: #ce9178;
            --json-number: #b5cea8;
            --json-boolean: #569cd6;
            --json-null: #569cd6;
            --json-key: #9cdcfe;
        }

        :root pre {
            --json-string: #a31515;
            --json-number: #098658;
            --json-boolean: #0000ff;
            --json-null: #0000ff;
            --json-key: #001080;
        }

        /* Badge for special values */
        .badge-custom {
            background: var(--log-detail-badge-bg);
            color: var(--log-detail-badge-text);
            padding: 0.35rem 0.75rem;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        /* Loading state */
        .loading {
            color: var(--log-detail-text-muted);
            font-style: italic;
            animation: pulse 1.5s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        /* Section divider */
        .section-divider {
            height: 3px;
            background: linear-gradient(90deg, var(--log-detail-icon-color) 0%, transparent 100%);
            border: none;
            margin: 1rem 0;
            border-radius: 2px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card-body {
                padding: 1rem;
            }

            .card-body h6 {
                font-size: 0.9rem;
            }

            .card-body p strong {
                min-width: 100px;
                font-size: 0.875rem;
            }

            pre {
                font-size: 0.8rem;
                padding: 1rem;
                max-height: 300px;
            }
        }

        /* Icon colors by category */
        .ti-info-circle {
            color: #3b82f6;
        }

        .ti-activity {
            color: #10b981;
        }

        .ti-database-export {
            color: #f59e0b;
        }

        .ti-database-import {
            color: #8b5cf6;
        }

        [data-theme="dark"] .ti-info-circle {
            color: #60a5fa;
        }

        [data-theme="dark"] .ti-activity {
            color: #34d399;
        }

        [data-theme="dark"] .ti-database-export {
            color: #fbbf24;
        }

        [data-theme="dark"] .ti-database-import {
            color: #a78bfa;
        }

        /* Empty state styling */
        .empty-data {
            color: var(--log-detail-text-muted);
            font-style: italic;
            text-align: center;
            padding: 2rem;
            background: var(--log-detail-label-bg);
            border-radius: 8px;
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
        <!-- Detail Umum -->
        <div class="col-md-6 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h6>
                        Detail Umum
                    </h6>
                    <hr class="section-divider">

                    <p>
                        <strong>Pengguna:</strong>
                        <span id="user" class="loading">Loading...</span>
                    </p>
                    <hr class="my-2">

                    <p>
                        <strong>Waktu Dibuat:</strong>
                        <span id="created_at" class="loading">Loading...</span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Aktivitas -->
        <div class="col-md-6 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h6>
                        Aktivitas
                    </h6>
                    <hr class="section-divider">

                    <p>
                        <strong>Aktivitas:</strong>
                        <span id="action" class="loading">Loading...</span>
                    </p>
                    <hr class="my-2">

                    <p>
                        <strong>Modul:</strong>
                        <span id="module_name" class="loading">Loading...</span>
                    </p>
                    <hr class="my-2">

                    <p>
                        <strong>Guard:</strong>
                        <span id="guard_name" class="loading">Loading...</span>
                    </p>
                    <hr class="my-2">

                    <p>
                        <strong>IP Address:</strong>
                        <span id="ip_address" class="loading">Loading...</span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Data Lama -->
        <div class="col-md-6 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h6>
                        Data Lama
                    </h6>
                    <hr class="section-divider">

                    <pre id="old_value" class="loading">Loading...</pre>
                </div>
            </div>
        </div>

        <!-- Data Baru -->
        <div class="col-md-6 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h6>
                        Data Baru
                    </h6>
                    <hr class="section-divider">

                    <pre id="new_value" class="loading">Loading...</pre>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/api/app-logs/{{ $id }}')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);

                    // Format tanggal
                    const formatDate = (dateString) => {
                        const options = {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit',
                            second: '2-digit',
                            timeZone: 'Asia/Jakarta',
                            hour12: false
                        };
                        return new Date(dateString).toLocaleString('id-ID', options) + ' WIB';
                    };

                    // Format JSON dengan syntax highlighting
                    const formatJSON = (jsonString) => {
                        try {
                            const obj = JSON.parse(jsonString);
                            return JSON.stringify(obj, null, 2);
                        } catch (e) {
                            return jsonString || 'Tidak ada data';
                        }
                    };

                    // Update user info
                    const userElement = document.getElementById('user');
                    userElement.innerText = data.data.user?.name || 'N/A';
                    userElement.classList.remove('loading');

                    // Update created_at
                    const createdAtElement = document.getElementById('created_at');
                    createdAtElement.innerText = formatDate(data.data.created_at);
                    createdAtElement.classList.remove('loading');

                    // Update action
                    const actionElement = document.getElementById('action');
                    actionElement.innerText = data.data.action || 'N/A';
                    actionElement.classList.remove('loading');

                    // Update module_name
                    const moduleElement = document.getElementById('module_name');
                    moduleElement.innerText = data.data.module_name || 'N/A';
                    moduleElement.classList.remove('loading');

                    // Update guard_name
                    const guardElement = document.getElementById('guard_name');
                    guardElement.innerText = data.data.guard_name || 'N/A';
                    guardElement.classList.remove('loading');

                    // Update IP address
                    const ipElement = document.getElementById('ip_address');
                    ipElement.innerText = data.data.ip_address || 'N/A';
                    ipElement.classList.remove('loading');

                    // Update old_value
                    const oldValueElement = document.getElementById('old_value');
                    const formattedOldValue = formatJSON(data.data.old_value);
                    oldValueElement.innerText = formattedOldValue;
                    oldValueElement.classList.remove('loading');

                    // Update new_value
                    const newValueElement = document.getElementById('new_value');
                    const formattedNewValue = formatJSON(data.data.new_value);
                    newValueElement.innerText = formattedNewValue;
                    newValueElement.classList.remove('loading');
                })
                .catch(error => {
                    console.error('Error fetching data:', error);

                    // Update all loading elements with error message
                    document.querySelectorAll('.loading').forEach(el => {
                        el.innerText = 'Error loading data';
                        el.classList.remove('loading');
                        el.style.color = '#dc3545';
                    });

                    // Show error alert
                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Gagal memuat data log. Silakan refresh halaman.',
                            widthAuto: true,
                            heightAuto: true
                        });
                    }
                });
        });
    </script>
@endpush
