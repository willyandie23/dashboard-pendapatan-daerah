@extends('layouts.app')

@section('title', 'Admin - Upload Dokumen')

@push('styles')
    <style>
        /* CSS Variables untuk Light dan Dark Mode */
        :root {
            /* Light mode variables */
            --upload-bg: #ffffff;
            --upload-card-bg: #ffffff;
            --upload-text-primary: #212529;
            --upload-text-secondary: #6c757d;
            --upload-text-muted: #495057;
            --upload-border: #dee2e6;
            --upload-input-bg: #ffffff;
            --upload-input-border: #ced4da;
            --upload-dropzone-bg: #f8f9fa;
            --upload-dropzone-border: #ccc;
            --upload-dropzone-hover-bg: #e7f3ff;
            --upload-dropzone-drag-bg: #d4edda;
            --upload-preview-bg: #ffffff;
            --upload-icon-color: #6c757d;
            --upload-card-shadow: rgba(0, 0, 0, 0.1);
        }

        [data-theme="dark"] {
            /* Dark mode variables */
            --upload-bg: #0f172a;
            --upload-card-bg: #1e293b;
            --upload-text-primary: #f1f5f9;
            --upload-text-secondary: #94a3b8;
            --upload-text-muted: #cbd5e1;
            --upload-border: #334155;
            --upload-input-bg: #334155;
            --upload-input-border: #475569;
            --upload-dropzone-bg: #334155;
            --upload-dropzone-border: #64748b;
            --upload-dropzone-hover-bg: #475569;
            --upload-dropzone-drag-bg: #1e3a28;
            --upload-preview-bg: #334155;
            --upload-icon-color: #94a3b8;
            --upload-card-shadow: rgba(0, 0, 0, 0.3);
        }

        .upload-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Card styling */
        .card {
            background: var(--upload-card-bg);
            border: 1px solid var(--upload-border);
            box-shadow: 0 2px 8px var(--upload-card-shadow);
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .card-body {
            color: var(--upload-text-primary);
            transition: color 0.3s ease;
            padding: 2rem;
        }

        .card-title {
            color: var(--upload-text-primary);
            font-weight: 600;
            transition: color 0.3s ease;
            font-size: 1.5rem;
        }

        /* Form elements */
        .form-label {
            color: var(--upload-text-muted);
            font-weight: 600;
            transition: color 0.3s ease;
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-control {
            background: var(--upload-input-bg);
            color: var(--upload-text-primary);
            border: 1.5px solid var(--upload-input-border);
            border-radius: 8px;
            transition: all 0.3s ease;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            width: 100%;
        }

        .form-control:focus {
            background: var(--upload-input-bg);
            color: var(--upload-text-primary);
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
            outline: none;
        }

        .form-control::placeholder {
            color: var(--upload-text-secondary);
        }

        /* Back Button Style */
        .back-link {
            display: inline-flex;
            align-items: center;
            color: var(--upload-text-secondary);
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 20px;
            transition: all 0.2s ease;
        }

        .back-link:hover {
            color: var(--upload-text-primary);
            text-decoration: none;
        }

        .back-link i {
            margin-right: 6px;
            font-size: 16px;
        }

        /* Drop Zone Styling */
        .drop-zone {
            border: 2px dashed var(--upload-dropzone-border);
            border-radius: 12px;
            padding: 40px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: var(--upload-dropzone-bg);
            margin-bottom: 20px;
            min-height: 200px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            touch-action: none;
            /* Better touch support */
        }

        .drop-zone:hover {
            border-color: #007bff;
            background: var(--upload-dropzone-hover-bg);
            transform: translateY(-2px);
        }

        .drop-zone.drag-over {
            border-color: #28a745;
            background: var(--upload-dropzone-drag-bg);
            transform: scale(1.02);
            box-shadow: 0 4px 12px rgba(40, 167, 69, 0.2);
        }

        .drop-zone-icon {
            font-size: 48px;
            color: var(--upload-icon-color);
            margin-bottom: 15px;
            transition: color 0.3s ease;
            line-height: 1;
        }

        .drop-zone-text {
            font-size: 16px;
            color: var(--upload-text-primary);
            margin-bottom: 8px;
            transition: color 0.3s ease;
            line-height: 1.5;
        }

        .drop-zone-hint {
            font-size: 13px;
            color: var(--upload-text-secondary);
            transition: color 0.3s ease;
            line-height: 1.4;
            max-width: 90%;
            margin: 0 auto;
        }

        #file {
            display: none;
        }

        /* File Preview */
        .file-preview {
            display: none;
            margin-top: 20px;
            padding: 15px;
            background: var(--upload-preview-bg);
            border: 1px solid var(--upload-border);
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .file-preview.show {
            display: block;
        }

        .file-info {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 10px;
        }

        .file-icon {
            font-size: 32px;
            flex-shrink: 0;
            line-height: 1;
        }

        .file-details {
            flex: 1;
            min-width: 0;
            /* Important for text overflow */
            overflow: hidden;
        }

        .file-name {
            font-weight: 600;
            color: var(--upload-text-primary);
            margin-bottom: 4px;
            transition: color 0.3s ease;
            overflow: hidden;
            word-wrap: break-word;
            word-break: break-word;
            overflow-wrap: break-word;
            line-height: 1.4;
        }

        .file-size {
            font-size: 13px;
            color: var(--upload-text-secondary);
            transition: color 0.3s ease;
        }

        .remove-file {
            cursor: pointer;
            color: #dc3545;
            font-size: 24px;
            transition: all 0.3s ease;
            flex-shrink: 0;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
            border-radius: 50%;
            background: transparent;
        }

        .remove-file:hover {
            color: #b91c1c;
            background: rgba(220, 53, 69, 0.1);
            transform: scale(1.1);
        }

        /* Upload Progress */
        .upload-progress {
            display: none;
            margin-top: 15px;
        }

        .upload-progress.show {
            display: block;
        }

        .upload-progress .form-label {
            margin-bottom: 8px;
        }

        .progress {
            background-color: var(--upload-dropzone-bg);
            border: 1px solid var(--upload-border);
            border-radius: 8px;
            transition: all 0.3s ease;
            height: 30px;
            overflow: hidden;
        }

        .progress-bar {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            font-weight: 600;
            color: white;
            line-height: 30px;
        }

        /* Button Styling */
        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            align-items: stretch;
        }

        .btn-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.25);
            color: white;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            flex: 1;
            min-height: 48px;
            /* Touch-friendly height */
        }

        .btn-success:hover:not(:disabled) {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.35);
            color: white;
        }

        .btn-success:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .btn-outline-secondary {
            background: transparent;
            color: var(--upload-text-secondary);
            border: 2px solid var(--upload-border);
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            flex: 1;
            min-height: 48px;
            /* Touch-friendly height */
        }

        .btn-outline-secondary:hover {
            background: var(--upload-dropzone-bg);
            color: var(--upload-text-primary);
            border-color: var(--upload-text-secondary);
            transform: translateY(-2px);
        }

        /* Tablet Responsive (768px - 991px) */
        @media (max-width: 991px) {
            .upload-container {
                max-width: 100%;
                padding: 0 1rem;
            }

            .card-body {
                padding: 1.75rem;
            }

            .drop-zone {
                padding: 35px 20px;
                min-height: 180px;
            }

            .drop-zone-icon {
                font-size: 42px;
            }
        }

        /* Mobile Responsive (576px - 767px) */
        @media (max-width: 768px) {
            .upload-container {
                padding: 0.75rem;
            }

            .card {
                border-radius: 10px;
            }

            .card-body {
                padding: 1.5rem;
            }

            .card-title {
                font-size: 1.25rem;
                margin-bottom: 1.25rem;
            }

            .form-control {
                padding: 0.625rem 0.875rem;
                font-size: 0.9375rem;
            }

            .drop-zone {
                padding: 30px 15px;
                min-height: 160px;
            }

            .drop-zone-icon {
                font-size: 40px;
                margin-bottom: 12px;
            }

            .drop-zone-text {
                font-size: 15px;
            }

            .drop-zone-hint {
                font-size: 12px;
                max-width: 95%;
            }

            /* File Preview Mobile Adjustments */
            .file-info {
                gap: 12px;
            }

            .file-icon {
                font-size: 28px;
            }

            .file-name {
                font-size: 14px;
            }

            .file-size {
                font-size: 12px;
            }

            .remove-file {
                font-size: 20px;
                width: 36px;
                height: 36px;
            }

            /* Stack buttons vertically on mobile */
            .form-actions {
                flex-direction: column;
                gap: 12px;
            }

            .form-actions .btn {
                width: 100%;
                flex: none;
            }

            .upload-progress {
                margin-top: 12px;
            }

            .progress {
                height: 28px;
            }

            .progress-bar {
                font-size: 0.8125rem;
                line-height: 28px;
            }
        }

        /* Extra Small Mobile (< 576px) */
        @media (max-width: 576px) {
            .upload-container {
                padding: 0.5rem;
            }

            .card {
                border-radius: 8px;
            }

            .card-body {
                padding: 1.25rem;
            }

            .card-title {
                font-size: 1.125rem;
                margin-bottom: 1rem;
            }

            .form-label {
                font-size: 0.9375rem;
            }

            .form-control {
                padding: 0.625rem 0.75rem;
                font-size: 0.875rem;
            }

            .drop-zone {
                padding: 25px 12px;
                min-height: 150px;
                border-width: 2px;
            }

            .drop-zone-icon {
                font-size: 36px;
                margin-bottom: 10px;
            }

            .drop-zone-text {
                font-size: 14px;
                margin-bottom: 6px;
            }

            .drop-zone-text strong {
                display: block;
                margin-bottom: 4px;
            }

            .drop-zone-hint {
                font-size: 11px;
                max-width: 100%;
                line-height: 1.3;
            }

            .file-preview {
                padding: 12px;
            }

            .file-info {
                gap: 10px;
                flex-wrap: wrap;
            }

            .file-icon {
                font-size: 24px;
            }

            .file-details {
                flex-basis: calc(100% - 50px);
            }

            .file-name {
                font-size: 13px;
                line-height: 1.3;
            }

            .file-size {
                font-size: 11px;
            }

            .remove-file {
                flex-basis: 100%;
                width: 100%;
                height: auto;
                padding: 10px;
                border-radius: 6px;
                background: rgba(220, 53, 69, 0.1);
                font-size: 14px;
            }

            .remove-file::before {
                content: '✕ Hapus File';
            }

            .form-actions {
                gap: 10px;
            }

            .btn-success,
            .btn-outline-secondary {
                padding: 0.625rem 1rem;
                font-size: 0.9375rem;
                min-height: 44px;
            }

            .btn i {
                font-size: 1rem;
            }
        }

        /* Landscape Mobile Orientation */
        @media (max-height: 500px) and (orientation: landscape) {
            .drop-zone {
                min-height: 120px;
                padding: 20px 15px;
            }

            .drop-zone-icon {
                font-size: 32px;
                margin-bottom: 8px;
            }

            .card-body {
                padding: 1rem;
            }
        }

        /* Touch device optimizations */
        @media (hover: none) and (pointer: coarse) {
            .drop-zone {
                user-select: none;
                -webkit-user-select: none;
                -webkit-touch-callout: none;
            }

            .btn-success,
            .btn-outline-secondary {
                min-height: 48px;
                /* Larger touch target */
            }

            .remove-file {
                min-width: 44px;
                min-height: 44px;
            }
        }

        /* Smooth transitions */
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Prevent text selection during drag */
        .drop-zone.dragging * {
            pointer-events: none;
        }
    </style>
@endpush

@section('content')
    <div class="container upload-container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Upload Dokumen</h4>

                        <form id="uploadForm" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-4">
                                <label for="document_name" class="form-label">Nama Dokumen</label>
                                <input type="text" name="document_name" id="document_name" class="form-control"
                                    placeholder="Masukkan nama dokumen" required>
                            </div>

                            <!-- Drag & Drop Zone -->
                            <div class="drop-zone" id="dropZone">
                                <div class="drop-zone-icon">📁</div>
                                <div class="drop-zone-text">
                                    <strong>Seret file ke sini</strong> atau klik untuk memilih
                                </div>
                                <div class="drop-zone-hint">
                                    Format yang didukung: PDF, DOC, DOCX, XLS, XLSX (Maks. 5MB)
                                </div>
                            </div>

                            <input type="file" name="file" id="file" required
                                accept=".pdf,.doc,.docx,.xls,.xlsx">

                            <!-- File Preview -->
                            <div class="file-preview" id="filePreview">
                                <div class="file-info">
                                    <div class="file-icon">📄</div>
                                    <div class="file-details">
                                        <div class="file-name" id="fileName"></div>
                                        <div class="file-size" id="fileSize"></div>
                                    </div>
                                    <div class="remove-file" id="removeFile" title="Hapus file">
                                        ✕
                                    </div>
                                </div>
                            </div>

                            <!-- Upload Progress -->
                            <div class="upload-progress" id="uploadProgress">
                                <label class="form-label">Proses Upload:</label>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                        id="progressBar" style="width: 0%">0%</div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success" id="submitBtn" disabled>
                                    <i class="bi bi-upload"></i> Upload Dokumen
                                </button>
                                <a href="{{ route('document.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-x-circle"></i> Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            const dropZone = $('#dropZone');
            const fileInput = $('#file');
            const filePreview = $('#filePreview');
            const fileName = $('#fileName');
            const fileSize = $('#fileSize');
            const removeFile = $('#removeFile');
            const submitBtn = $('#submitBtn');
            const uploadProgress = $('#uploadProgress');
            const progressBar = $('#progressBar');

            let selectedFile = null;
            const maxFileSize = 5 * 1024 * 1024;

            // Click to select file
            dropZone.on('click', function() {
                fileInput.click();
            });

            // Prevent default drag behaviors
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropZone.on(eventName, function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                });
            });

            // Highlight drop zone when dragging over
            ['dragenter', 'dragover'].forEach(eventName => {
                dropZone.on(eventName, function() {
                    dropZone.addClass('drag-over');
                });
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropZone.on(eventName, function() {
                    dropZone.removeClass('drag-over');
                });
            });

            // Handle dropped files
            dropZone.on('drop', function(e) {
                const files = e.originalEvent.dataTransfer.files;
                if (files.length > 0) {
                    fileInput[0].files = files;
                    handleFileSelect(files[0]);
                }
            });

            // Handle file selection via input
            fileInput.on('change', function() {
                if (this.files.length > 0) {
                    handleFileSelect(this.files[0]);
                }
            });

            // File validation and preview
            function handleFileSelect(file) {
                // Validate file size
                if (file.size > maxFileSize) {
                    Swal.fire({
                        icon: 'error',
                        title: 'File Terlalu Besar',
                        text: 'Ukuran file maksimal adalah 5MB',
                        width: '90%',
                        heightAuto: true
                    });
                    resetFileInput();
                    return;
                }

                // Validate file type
                const allowedTypes = [
                    'application/pdf',
                    'application/msword',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'application/vnd.ms-excel',
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                ];

                if (!allowedTypes.includes(file.type)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Format File Tidak Valid',
                        text: 'Hanya file PDF, DOC, DOCX, XLS, dan XLSX yang diperbolehkan',
                        width: '90%',
                        heightAuto: true
                    });
                    resetFileInput();
                    return;
                }

                // Show file preview
                selectedFile = file;
                fileName.text(file.name);
                fileSize.text(formatFileSize(file.size));
                filePreview.addClass('show');
                submitBtn.prop('disabled', false);
            }

            // Remove selected file
            removeFile.on('click', function(e) {
                e.stopPropagation();
                resetFileInput();
            });

            // Reset file input
            function resetFileInput() {
                fileInput.val('');
                selectedFile = null;
                filePreview.removeClass('show');
                submitBtn.prop('disabled', true);
                uploadProgress.removeClass('show');
                progressBar.css('width', '0%');
                progressBar.text('0%');
            }

            // Format file size
            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
            }

            // Form submission with progress
            $('#uploadForm').submit(function(e) {
                e.preventDefault();

                if (!selectedFile) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Perhatian!',
                        text: 'Silakan pilih file terlebih dahulu',
                        width: '90%',
                        heightAuto: true
                    });
                    return;
                }

                const formData = new FormData(this);
                submitBtn.prop('disabled', true).html(
                    '<i class="bi bi-hourglass-split"></i> Mengupload...');
                uploadProgress.addClass('show');

                $.ajax({
                    url: '{{ route('document.store') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Accept': 'application/json'
                    },
                    xhr: function() {
                        const xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener('progress', function(e) {
                            if (e.lengthComputable) {
                                const percentComplete = Math.round((e.loaded / e
                                    .total) * 100);
                                progressBar.css('width', percentComplete + '%');
                                progressBar.text(percentComplete + '%');
                            }
                        }, false);
                        return xhr;
                    },
                    success: function(response) {
                        progressBar.removeClass('progress-bar-animated');
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: response.message || 'Dokumen berhasil diupload',
                            width: '90%',
                            heightAuto: true,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.href = '{{ route('document.index') }}';
                        });
                    },
                    error: function(xhr) {
                        // Handle validation errors (422)
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            let errorList = '<ul class="text-left mb-0">';

                            $.each(errors, function(key, value) {
                                errorList += '<li>' + value[0] + '</li>';
                            });

                            errorList += '</ul>';

                            Swal.fire({
                                icon: 'error',
                                title: 'Validasi Gagal',
                                html: errorList,
                                width: '90%',
                                heightAuto: true
                            });
                        }
                        // Handle other errors
                        else if (xhr.responseJSON && xhr.responseJSON.message) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: xhr.responseJSON.message,
                                width: '90%',
                                heightAuto: true
                            });
                        }
                        // Generic error
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Terjadi kesalahan saat mengupload file',
                                width: '90%',
                                heightAuto: true
                            });
                        }

                        submitBtn.prop('disabled', false).html(
                            '<i class="bi bi-upload"></i> Upload Dokumen');
                        uploadProgress.removeClass('show');
                        progressBar.css('width', '0%');
                        progressBar.text('0%');
                    }
                });
            });
        });
    </script>
@endpush
