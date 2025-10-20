@extends('layouts.app')

@push('styles')
    <style>
        .upload-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            color: #6c757d;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 20px;
            transition: all 0.2s ease;
        }

        .back-link:hover {
            color: #495057;
            text-decoration: none;
        }

        .back-link i {
            margin-right: 6px;
            font-size: 16px;
        }

        /* Current File Display */
        .current-file {
            background: #e7f3ff;
            border: 1px solid #bee5eb;
            border-radius: 6px;
            padding: 15px;
            margin-bottom: 15px;
        }

        .current-file-header {
            font-size: 13px;
            font-weight: 600;
            color: #0c5460;
            margin-bottom: 8px;
        }

        .current-file-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .current-file-icon {
            font-size: 24px;
        }

        .current-file-name {
            flex: 1;
            color: #004085;
            font-weight: 500;
        }

        .change-file-btn {
            font-size: 12px;
            padding: 4px 10px;
        }

        .drop-zone {
            border: 2px dashed #ccc;
            border-radius: 8px;
            padding: 40px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f8f9fa;
            margin-bottom: 20px;
            display: none;
            /* Hidden by default */
        }

        .drop-zone.show {
            display: block;
        }

        .drop-zone:hover {
            border-color: #007bff;
            background: #e7f3ff;
        }

        .drop-zone.drag-over {
            border-color: #28a745;
            background: #d4edda;
            transform: scale(1.02);
        }

        .drop-zone-icon {
            font-size: 48px;
            color: #6c757d;
            margin-bottom: 15px;
        }

        .drop-zone-text {
            font-size: 16px;
            color: #495057;
            margin-bottom: 8px;
        }

        .drop-zone-hint {
            font-size: 13px;
            color: #6c757d;
        }

        #file {
            display: none;
        }

        .file-preview {
            display: none;
            margin-top: 20px;
            padding: 15px;
            background: #fff;
            border: 1px solid #dee2e6;
            border-radius: 6px;
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
            color: #212529;
            margin-bottom: 4px;
        }

        .file-size {
            font-size: 13px;
            color: #6c757d;
        }

        .remove-file {
            cursor: pointer;
            color: #dc3545;
            font-size: 20px;
        }

        .upload-progress {
            display: none;
            margin-top: 15px;
        }

        .upload-progress.show {
            display: block;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
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
