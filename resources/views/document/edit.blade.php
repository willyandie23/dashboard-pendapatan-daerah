@extends('layouts.app')

@section('title', 'Admin - Edit Dokumen')

@push('styles')
    <style>
        /* CSS Variables untuk Light dan Dark Mode */
        :root {
            /* Light mode variables */
            --edit-bg: #ffffff;
            --edit-card-bg: #ffffff;
            --edit-text-primary: #212529;
            --edit-text-secondary: #6c757d;
            --edit-text-muted: #495057;
            --edit-border: #dee2e6;
            --edit-input-bg: #ffffff;
            --edit-input-border: #ced4da;
            --edit-dropzone-bg: #f8f9fa;
            --edit-dropzone-border: #ccc;
            --edit-dropzone-hover-bg: #e7f3ff;
            --edit-dropzone-drag-bg: #d4edda;
            --edit-preview-bg: #ffffff;
            --edit-current-file-bg: #e7f3ff;
            --edit-current-file-border: #bee5eb;
            --edit-current-file-header: #0c5460;
            --edit-current-file-text: #004085;
            --edit-icon-color: #6c757d;
            --edit-card-shadow: rgba(0, 0, 0, 0.1);
        }

        [data-theme="dark"] {
            /* Dark mode variables */
            --edit-bg: #0f172a;
            --edit-card-bg: #1e293b;
            --edit-text-primary: #f1f5f9;
            --edit-text-secondary: #94a3b8;
            --edit-text-muted: #cbd5e1;
            --edit-border: #334155;
            --edit-input-bg: #334155;
            --edit-input-border: #475569;
            --edit-dropzone-bg: #334155;
            --edit-dropzone-border: #64748b;
            --edit-dropzone-hover-bg: #475569;
            --edit-dropzone-drag-bg: #1e3a28;
            --edit-preview-bg: #334155;
            --edit-current-file-bg: #1e3a3f;
            --edit-current-file-border: #2d5a5f;
            --edit-current-file-header: #67e8f9;
            --edit-current-file-text: #a5f3fc;
            --edit-icon-color: #94a3b8;
            --edit-card-shadow: rgba(0, 0, 0, 0.3);
        }

        .upload-container {
            max-width: 800px;
            margin: 0 auto;
        }

        /* Card styling */
        .card {
            background: var(--edit-card-bg);
            border: 1px solid var(--edit-border);
            box-shadow: 0 2px 8px var(--edit-card-shadow);
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .card-body {
            color: var(--edit-text-primary);
            transition: color 0.3s ease;
        }

        .card-title {
            color: var(--edit-text-primary);
            font-weight: 600;
            transition: color 0.3s ease;
        }

        /* Form elements */
        .form-label {
            color: var(--edit-text-muted);
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .form-control {
            background: var(--edit-input-bg);
            color: var(--edit-text-primary);
            border: 1.5px solid var(--edit-input-border);
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: var(--edit-input-bg);
            color: var(--edit-text-primary);
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .form-control::placeholder {
            color: var(--edit-text-secondary);
        }

        /* Back Link */
        .back-link {
            display: inline-flex;
            align-items: center;
            color: var(--edit-text-secondary);
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 20px;
            transition: all 0.2s ease;
        }

        .back-link:hover {
            color: var(--edit-text-primary);
            text-decoration: none;
        }

        .back-link i {
            margin-right: 6px;
            font-size: 16px;
        }

        /* Current File Display */
        .current-file {
            background: var(--edit-current-file-bg);
            border: 1px solid var(--edit-current-file-border);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .current-file-header {
            font-size: 13px;
            font-weight: 600;
            color: var(--edit-current-file-header);
            margin-bottom: 8px;
            transition: color 0.3s ease;
        }

        .current-file-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .current-file-icon {
            font-size: 24px;
            flex-shrink: 0;
            /* Prevent icon from shrinking */
        }

        .current-file-name {
            flex: 1;
            color: var(--edit-current-file-text);
            font-weight: 500;
            transition: color 0.3s ease;
            /* Prevent text overflow */
            overflow: hidden;
            word-wrap: break-word;
            word-break: break-word;
            overflow-wrap: break-word;
            hyphens: auto;
            min-width: 0;
            /* Important for flex items */
        }

        .change-file-btn {
            font-size: 12px;
            padding: 4px 10px;
            border-radius: 6px;
            transition: all 0.3s ease;
            flex-shrink: 0;
            /* Prevent button from shrinking */
            white-space: nowrap;
            /* Keep button text on one line */
        }

        /* Drop Zone Styling */
        .drop-zone {
            border: 2px dashed var(--edit-dropzone-border);
            border-radius: 12px;
            padding: 40px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: var(--edit-dropzone-bg);
            margin-bottom: 20px;
            display: none;
        }

        .drop-zone.show {
            display: block;
        }

        .drop-zone:hover {
            border-color: #007bff;
            background: var(--edit-dropzone-hover-bg);
            transform: translateY(-2px);
        }

        .drop-zone.drag-over {
            border-color: #28a745;
            background: var(--edit-dropzone-drag-bg);
            transform: scale(1.02);
            box-shadow: 0 4px 12px rgba(40, 167, 69, 0.2);
        }

        .drop-zone-icon {
            font-size: 48px;
            color: var(--edit-icon-color);
            margin-bottom: 15px;
            transition: color 0.3s ease;
        }

        .drop-zone-text {
            font-size: 16px;
            color: var(--edit-text-primary);
            margin-bottom: 8px;
            transition: color 0.3s ease;
        }

        .drop-zone-hint {
            font-size: 13px;
            color: var(--edit-text-secondary);
            transition: color 0.3s ease;
        }

        #file {
            display: none;
        }

        /* File Preview */
        .file-preview {
            display: none;
            margin-top: 20px;
            padding: 15px;
            background: var(--edit-preview-bg);
            border: 1px solid var(--edit-border);
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
        }

        .file-details {
            flex: 1;
        }

        .file-name {
            font-weight: 600;
            color: var(--edit-text-primary);
            margin-bottom: 4px;
            transition: color 0.3s ease;
        }

        .file-size {
            font-size: 13px;
            color: var(--edit-text-secondary);
            transition: color 0.3s ease;
        }

        .remove-file {
            cursor: pointer;
            color: #dc3545;
            font-size: 20px;
            transition: all 0.3s ease;
        }

        .remove-file:hover {
            color: #b91c1c;
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
            background-color: var(--edit-dropzone-bg);
            border: 1px solid var(--edit-border);
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        /* Button Styling */
        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border: none;
            border-radius: 8px;
            padding: 0.625rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.25);
            color: white;
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
            color: var(--edit-text-secondary);
            border: 2px solid var(--edit-border);
            border-radius: 8px;
            padding: 0.625rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-secondary:hover {
            background: var(--edit-dropzone-bg);
            color: var(--edit-text-primary);
            border-color: var(--edit-text-secondary);
            transform: translateY(-2px);
        }

        .btn-outline-primary {
            background: transparent;
            color: #007bff;
            border: 1px solid #007bff;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: #007bff;
            color: white;
            border-color: #007bff;
        }

        [data-theme="dark"] .btn-outline-primary {
            color: #60a5fa;
            border-color: #60a5fa;
        }

        [data-theme="dark"] .btn-outline-primary:hover {
            background: #60a5fa;
            color: #0f172a;
            border-color: #60a5fa;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .upload-container {
                padding: 1rem;
            }

            .card-body {
                padding: 1.5rem;
            }

            .drop-zone {
                padding: 30px 15px;
            }

            .form-actions {
                flex-direction: column;
            }

            .form-actions .btn {
                width: 100%;
            }

            /* Improved current file info for mobile */
            .current-file-info {
                flex-wrap: wrap;
                gap: 8px;
            }

            .current-file-name {
                /* Allow filename to take full width */
                flex-basis: 100%;
                max-width: 100%;
                font-size: 14px;
                line-height: 1.4;
            }

            .change-file-btn {
                width: 100%;
                margin-top: 8px;
                flex-basis: 100%;
            }

            .file-info {
                flex-wrap: wrap;
                gap: 10px;
            }

            .file-icon {
                font-size: 28px;
            }

            .file-details {
                flex-basis: calc(100% - 50px);
            }

            .remove-file {
                flex-basis: 100%;
                text-align: center;
                padding: 8px;
                background: rgba(220, 53, 69, 0.1);
                border-radius: 6px;
            }
        }

        @media (max-width: 576px) {
            .card-body {
                padding: 1rem;
            }

            .current-file {
                padding: 12px;
            }

            .current-file-name {
                font-size: 13px;
            }

            .current-file-icon {
                font-size: 20px;
            }
        }

        /* File Preview - Apply same responsive treatment */
        .file-info {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 10px;
        }

        .file-icon {
            font-size: 32px;
            flex-shrink: 0;
        }

        .file-details {
            flex: 1;
            min-width: 0;
            /* Important for flex items */
            overflow: hidden;
        }

        .file-name {
            font-weight: 600;
            color: var(--edit-text-primary);
            margin-bottom: 4px;
            transition: color 0.3s ease;
            /* Prevent text overflow */
            overflow: hidden;
            word-wrap: break-word;
            word-break: break-word;
            overflow-wrap: break-word;
        }

        .file-size {
            font-size: 13px;
            color: var(--edit-text-secondary);
            transition: color 0.3s ease;
        }

        .remove-file {
            cursor: pointer;
            color: #dc3545;
            font-size: 20px;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .remove-file:hover {
            color: #b91c1c;
            transform: scale(1.1);
        }

        /* Smooth transitions */
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>
@endpush

@section('content')
    <div class="container upload-container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Edit Dokumen</h4>

                        <form id="updateForm" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-4">
                                <label for="document_name" class="form-label">Nama Dokumen</label>
                                <input type="text" name="document_name" id="document_name" class="form-control"
                                    placeholder="Masukkan nama dokumen" value="{{ $document->document_name }}" required>
                            </div>

                            <!-- Current File Display -->
                            <div class="current-file" id="currentFile">
                                <div class="current-file-header">
                                    <i class="bi bi-file-earmark"></i> File Saat Ini
                                </div>
                                <div class="current-file-info">
                                    <div class="current-file-icon">📄</div>
                                    <div class="current-file-name" id="currentFileName">
                                        {{ basename($document->document_path) }}
                                    </div>
                                    <button type="button" class="btn btn-sm btn-outline-primary change-file-btn"
                                        id="changeFileBtn">
                                        <i class="bi bi-arrow-repeat"></i> Ganti File
                                    </button>
                                </div>
                            </div>

                            <!-- Drag & Drop Zone (Hidden initially) -->
                            <div class="drop-zone" id="dropZone">
                                <div class="drop-zone-icon">📁</div>
                                <div class="drop-zone-text">
                                    <strong>Seret file ke sini</strong> atau klik untuk memilih
                                </div>
                                <div class="drop-zone-hint">
                                    Format yang didukung: PDF, DOC, DOCX, XLS, XLSX (Maks. 5MB)
                                </div>
                            </div>

                            <input type="file" name="file" id="file" accept=".pdf,.doc,.docx,.xls,.xlsx">

                            <!-- New File Preview -->
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
                                <label class="form-label">Proses Update:</label>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                        id="progressBar" style="width: 0%"></div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success" id="submitBtn">
                                    <i class="bi bi-check-circle"></i> Update Dokumen
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
            const currentFile = $('#currentFile');
            const changeFileBtn = $('#changeFileBtn');
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
            let isChangingFile = false;
            const maxFileSize = 5 * 1024 * 1024; // 5MB

            // Show drop zone when change file is clicked
            changeFileBtn.on('click', function() {
                currentFile.hide();
                dropZone.addClass('show');
                isChangingFile = true;
            });

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
                        widthAuto: true,
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
                        widthAuto: true,
                        heightAuto: true
                    });
                    resetFileInput();
                    return;
                }

                // Show file preview
                selectedFile = file;
                fileName.text(file.name);
                fileSize.text(formatFileSize(file.size));
                dropZone.removeClass('show');
                filePreview.addClass('show');
            }

            // Remove selected file
            removeFile.on('click', function(e) {
                e.stopPropagation();
                resetFileInput();
                currentFile.show();
            });

            // Reset file input
            function resetFileInput() {
                fileInput.val('');
                selectedFile = null;
                filePreview.removeClass('show');
                dropZone.removeClass('show');
                isChangingFile = false;
                uploadProgress.removeClass('show');
                progressBar.css('width', '0%');
                progressBar.text('');
            }

            // Format file size
            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
            }

            $('#updateForm').submit(function(e) {
                e.preventDefault();

                const formData = new FormData(this);

                // Tambahkan _method untuk Laravel method spoofing
                formData.append('_method', 'PUT');

                // Jika tidak ada file baru yang dipilih, hapus field file dari FormData
                if (!selectedFile) {
                    formData.delete('file');
                }

                submitBtn.prop('disabled', true).html(
                    '<i class="bi bi-hourglass-split"></i> Memperbarui...');
                uploadProgress.addClass('show');

                $.ajax({
                    url: '/api/dokumen/' + {{ $document->id }},
                    type: 'POST', // Tetap POST, tapi dengan _method=PUT
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Authorization': `Bearer ${token}`,
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
                            text: response.message || 'Dokumen berhasil diperbarui',
                            widthAuto: true,
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
                                widthAuto: true,
                                heightAuto: true
                            });
                        } else if (xhr.responseJSON && xhr.responseJSON.message) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: xhr.responseJSON.message,
                                widthAuto: true,
                                heightAuto: true
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Terjadi kesalahan saat memperbarui dokumen',
                                widthAuto: true,
                                heightAuto: true
                            });
                        }

                        submitBtn.prop('disabled', false).html(
                            '<i class="bi bi-check-circle"></i> Update Dokumen');
                        uploadProgress.removeClass('show');
                        progressBar.css('width', '0%');
                        progressBar.text('');
                    }
                });
            });
        });
    </script>
@endpush
