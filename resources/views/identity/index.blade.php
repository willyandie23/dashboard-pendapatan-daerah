@extends('layouts.app')

@section('title', 'Admin - Identitas Website')

@push('styles')
    <style>
        /* CSS Variables untuk Light dan Dark Mode */
        :root {
            /* Light mode variables */
            --identity-bg: #ffffff;
            --identity-card-bg: #ffffff;
            --identity-text-primary: #1e293b;
            --identity-text-secondary: #64748b;
            --identity-text-label: #334155;
            --identity-text-muted: #94a3b8;
            --identity-border: #e8ecf1;
            --identity-border-light: #e2e8f0;
            --identity-border-hover: #cbd5e0;
            --identity-input-bg: #ffffff;
            --identity-input-hover-bg: #f8fafc;
            --identity-input-focus-bg: #ffffff;
            --identity-contact-bg-start: #f8fafc;
            --identity-contact-bg-end: #f1f5f9;
            --identity-upload-bg: #fafbfc;
            --identity-upload-hover-bg: #f8fafc;
            --identity-preview-bg: #ffffff;
            --identity-card-shadow: rgba(0, 0, 0, 0.08);
            --identity-upload-shadow: rgba(79, 70, 229, 0.1);
            --identity-img-shadow: rgba(0, 0, 0, 0.08);
        }

        [data-theme="dark"] {
            /* Dark mode variables */
            --identity-bg: #0f172a;
            --identity-card-bg: #1e293b;
            --identity-text-primary: #f1f5f9;
            --identity-text-secondary: #94a3b8;
            --identity-text-label: #cbd5e1;
            --identity-text-muted: #64748b;
            --identity-border: #334155;
            --identity-border-light: #475569;
            --identity-border-hover: #64748b;
            --identity-input-bg: #334155;
            --identity-input-hover-bg: #475569;
            --identity-input-focus-bg: #334155;
            --identity-contact-bg-start: #1e293b;
            --identity-contact-bg-end: #334155;
            --identity-upload-bg: #1e293b;
            --identity-upload-hover-bg: #334155;
            --identity-preview-bg: #334155;
            --identity-card-shadow: rgba(0, 0, 0, 0.3);
            --identity-upload-shadow: rgba(79, 70, 229, 0.2);
            --identity-img-shadow: rgba(0, 0, 0, 0.3);
        }

        .identity-container {
            max-width: 950px;
            margin: 0 auto;
        }

        .identity-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 24px var(--identity-card-shadow);
            background: var(--identity-card-bg);
            overflow: hidden;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .identity-card .card-body {
            padding: 2.75rem;
        }

        .identity-header {
            margin-bottom: 1.4rem;
            border-bottom: 1px solid var(--identity-border);
            position: relative;
            transition: border-color 0.3s ease;
        }

        .identity-header::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #4f46e5 0%, #7c3aed 100%);
            border-radius: 2px;
        }

        .identity-header h4 {
            font-size: 1.65rem;
            font-weight: 600;
            color: var(--identity-text-primary);
            margin: 0 0 0.5rem 0;
            letter-spacing: -0.03em;
            transition: color 0.3s ease;
        }

        .identity-header p {
            color: var(--identity-text-secondary);
            font-size: 0.9rem;
            margin: 0;
            transition: color 0.3s ease;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: 600;
            color: var(--identity-text-label);
            margin-bottom: 0.6rem;
            font-size: 0.9rem;
            display: block;
            letter-spacing: -0.01em;
            transition: color 0.3s ease;
        }

        .form-control {
            border: 1.5px solid var(--identity-border-light);
            border-radius: 10px;
            padding: 0.75rem 1.1rem;
            font-size: 0.95rem;
            transition: all 0.25s ease;
            background: var(--identity-input-bg);
            color: var(--identity-text-primary);
        }

        .form-control:hover {
            border-color: var(--identity-border-hover);
            background: var(--identity-input-hover-bg);
        }

        .form-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.08);
            outline: none;
            background: var(--identity-input-focus-bg);
            color: var(--identity-text-primary);
        }

        .form-control::placeholder {
            color: var(--identity-text-muted);
        }

        .contact-row {
            background: linear-gradient(135deg, var(--identity-contact-bg-start) 0%, var(--identity-contact-bg-end) 100%);
            padding: 1.75rem;
            border-radius: 12px;
            margin: 2rem 0;
            border: 1px solid var(--identity-border-light);
            transition: background 0.3s ease, border-color 0.3s ease;
        }

        .section-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--identity-text-secondary);
            margin-bottom: 1.5rem;
            padding-left: 0.75rem;
            border-left: 3px solid #4f46e5;
            transition: color 0.3s ease;
        }

        .upload-wrapper {
            margin-bottom: 1.5rem;
        }

        .upload-box {
            border: 2px dashed var(--identity-border-hover);
            border-radius: 12px;
            padding: 1.5rem;
            background: var(--identity-upload-bg);
            transition: all 0.3s ease;
            position: relative;
        }

        .upload-box:hover {
            background: var(--identity-upload-hover-bg);
            border-color: #4f46e5;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px var(--identity-upload-shadow);
        }

        .upload-box label {
            margin-bottom: 0.75rem;
        }

        .form-control[type="file"] {
            padding: 0.6rem 1rem;
            font-size: 0.875rem;
            background: var(--identity-input-bg);
            border: 1px solid var(--identity-border-light);
            color: var(--identity-text-primary);
            transition: all 0.3s ease;
        }

        .form-control[type="file"]::file-selector-button {
            padding: 0.5rem 1.25rem;
            margin-right: 1rem;
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: white;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .form-control[type="file"]::file-selector-button:hover {
            background: linear-gradient(135deg, #4338ca 0%, #6d28d9 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        }

        .preview-container {
            margin-top: 1.25rem;
            padding: 1.25rem;
            background: var(--identity-preview-bg);
            border-radius: 10px;
            border: 1px solid var(--identity-border-light);
            text-align: center;
            display: none;
            transition: all 0.3s ease;
        }

        .preview-container.show {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .preview-label {
            font-size: 0.8rem;
            color: var(--identity-text-secondary);
            margin-bottom: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            transition: color 0.3s ease;
        }

        .preview-container img {
            border-radius: 8px;
            box-shadow: 0 2px 8px var(--identity-img-shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .preview-container img:hover {
            transform: scale(1.03);
        }

        #site_logo_preview {
            max-width: 220px;
            max-height: 130px;
        }

        #site_favicon_preview {
            max-width: 70px;
            max-height: 70px;
        }

        .btn-primary {
            padding: 0.875rem 2.5rem;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 10px;
            border: none;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: white;
            transition: all 0.3s ease;
            margin-top: 1.5rem;
            box-shadow: 0 4px 14px rgba(79, 70, 229, 0.25);
            letter-spacing: 0.01em;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #4338ca 0%, #6d28d9 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.35);
        }

        .btn-primary:active {
            transform: translateY(0);
            box-shadow: 0 2px 8px rgba(79, 70, 229, 0.3);
        }

        @media (max-width: 768px) {
            .identity-card .card-body {
                padding: 1.75rem;
            }

            .identity-header h4 {
                font-size: 1.45rem;
            }

            .contact-row {
                padding: 1.25rem;
            }

            .btn-primary {
                width: 100%;
            }

            .upload-box {
                padding: 1.25rem;
            }
        }

        /* Smooth transitions untuk semua elemen */
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>
@endpush

@section('content')
    <div class="identity-container">
        <div class="row">
            <div class="col-12">
                <div class="card identity-card">
                    <div class="card-body">
                        <form id="identityForm" method="POST" action="{{ route('identity.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="identity-header">
                                <h4>Identitas Website</h4>
                            </div>

                            <div class="form-group">
                                <label for="site_heading">Judul Website</label>
                                <input type="text" class="form-control" id="site_heading" name="site_heading"
                                    placeholder="Masukkan judul website Anda" required>
                            </div>

                            <div class="contact-row">
                                <div class="section-title">Informasi Kontak</div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 mb-md-0">
                                            <label for="helpdesk">Helpdesk</label>
                                            <input type="text" class="form-control" id="helpdesk" name="helpdesk"
                                                placeholder="helpdesk@example.com">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-0">
                                            <label for="call_center">Call Center</label>
                                            <input type="text" class="form-control" id="call_center" name="call_center"
                                                placeholder="021-12345678">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="section-title">Media Visual</div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="upload-wrapper">
                                        <div class="upload-box">
                                            <label for="site_logo_input">Logo Website Mode Terang</label>
                                            <input type="file" class="form-control" id="site_logo_input" name="site_logo"
                                                accept="image/jpeg,image/png,image/gif,image/svg+xml">
                                            <div class="preview-container" id="logo_preview_container">
                                                <div class="preview-label">Preview Logo Mode Terang</div>
                                                <img id="site_logo_preview" src="" alt="Logo Preview" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="upload-wrapper">
                                        <div class="upload-box">
                                            <label for="site_logo_input_dark">Logo Website Mode Gelap</label>
                                            <input type="file" class="form-control" id="site_logo_input_dark"
                                                name="site_logo_dark" accept="image/jpeg,image/png,image/gif,image/svg+xml">
                                            <div class="preview-container" id="logo_dark_preview_container">
                                                <div class="preview-label">Preview Logo Mode Gelap</div>
                                                <img id="site_logo_dark_preview" src="" alt="Logo Dark Preview" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="upload-wrapper">
                                        <div class="upload-box">
                                            <label for="site_favicon_input">Favicon Website</label>
                                            <input type="file" class="form-control" id="site_favicon_input"
                                                name="site_favicon" accept="image/jpeg,image/png,image/gif,image/svg+xml">
                                            <div class="preview-container" id="favicon_preview_container">
                                                <div class="preview-label">Preview Favicon</div>
                                                <img id="site_favicon_preview" src="" alt="Favicon Preview" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Simpan Perubahan
                            </button>
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
            const form = $('#identityForm');
            const siteHeadingInput = $('#site_heading');
            const siteLogoInput = $('#site_logo_input');
            const siteLogoDarkInput = $('#site_logo_input_dark');
            const siteLogoPreview = $('#site_logo_preview');
            const siteLogoDarkPreview = $('#site_logo_dark_preview');
            const logoPreviewContainer = $('#logo_preview_container');
            const logoDarkPreviewContainer = $('#logo_dark_preview_container');
            const siteFaviconInput = $('#site_favicon_input');
            const siteFaviconPreview = $('#site_favicon_preview');
            const faviconPreviewContainer = $('#favicon_preview_container');
            const helpdeskInput = $('#helpdesk');
            const callCenterInput = $('#call_center');

            if (siteLogoInput.length === 0) {
                Swal.fire('Error!', 'Input file for logo light not found.', 'error');
                return;
            }

            if (siteLogoDarkInput.length === 0) {
                Swal.fire('Error!', 'Input file for logo dark not found.', 'error');
                return;
            }

            if (siteFaviconInput.length === 0) {
                Swal.fire('Error!', 'Input file for favicon not found.', 'error');
                return;
            }

            // Preview gambar logo
            siteLogoInput.on('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        siteLogoPreview.attr('src', e.target.result);
                        logoPreviewContainer.addClass('show');
                    };
                    reader.readAsDataURL(file);

                    // Validasi ukuran file (max 2MB)
                    if (file.size > 2 * 1024 * 1024) {
                        Swal.fire('Error!', 'File size exceeds 2MB.', 'error');
                        this.value = '';
                        logoPreviewContainer.removeClass('show');
                    }
                } else {
                    logoPreviewContainer.removeClass('show');
                }
            });

            // Preview gambar logo dark
            siteLogoDarkInput.on('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        siteLogoDarkPreview.attr('src', e.target.result);
                        logoDarkPreviewContainer.addClass('show');
                    };
                    reader.readAsDataURL(file);

                    // Validasi ukuran file (max 2MB)
                    if (file.size > 2 * 1024 * 1024) {
                        Swal.fire('Error!', 'File size exceeds 2MB.', 'error');
                        this.value = '';
                        logoDarkPreviewContainer.removeClass('show');
                    }
                } else {
                    logoDarkPreviewContainer.removeClass('show');
                }
            });

            // Preview gambar favicon
            siteFaviconInput.on('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        siteFaviconPreview.attr('src', e.target.result);
                        faviconPreviewContainer.addClass('show');
                    };
                    reader.readAsDataURL(file);

                    // Validasi ukuran file (max 2MB)
                    if (file.size > 2 * 1024 * 1024) {
                        Swal.fire('Error!', 'File size exceeds 2MB.', 'error');
                        this.value = '';
                        faviconPreviewContainer.removeClass('show');
                    }
                } else {
                    faviconPreviewContainer.removeClass('show');
                }
            });

            $.ajax({
                url: '/api/identitas',
                type: 'GET',
                success: function(response) {
                    if (response.success && response.data) {
                        siteHeadingInput.val(response.data.site_heading || '');
                        if (response.data.site_logo) {
                            siteLogoPreview.attr('src', response.data.site_logo);
                            logoPreviewContainer.addClass('show');
                        }
                        if (response.data.site_logo_dark) {
                            siteLogoDarkPreview.attr('src', response.data.site_logo_dark);
                            logoDarkPreviewContainer.addClass('show');
                        }
                        if (response.data.site_favicon) {
                            siteFaviconPreview.attr('src', response.data.site_favicon);
                            faviconPreviewContainer.addClass('show');
                        }
                        helpdeskInput.val(response.data.helpdesk || '');
                        callCenterInput.val(response.data.call_center || '');
                    }
                },
                error: function(xhr) {
                    console.error('Error fetching identity data:', xhr.responseText);
                    Swal.fire('Error!', 'Failed to load identity data.', 'error');
                }
            });

            // Handle form submission
            form.on('submit', function(event) {
                event.preventDefault();

                if (!siteHeadingInput.val()) {
                    Swal.fire('Error!', 'Website title is required.', 'error');
                    return;
                }

                const formData = new FormData();
                formData.append('site_heading', siteHeadingInput.val());
                formData.append('helpdesk', helpdeskInput.val());
                formData.append('call_center', callCenterInput.val());

                const fileInput = siteLogoInput[0];
                if (fileInput && fileInput.files && fileInput.files[0]) {
                    formData.append('site_logo', fileInput.files[0]);
                } else {
                    console.log('No file selected for site_logo');
                }

                const fileInput2 = siteFaviconInput[0];
                if (fileInput2 && fileInput2.files && fileInput2.files[0]) {
                    formData.append('site_favicon', fileInput2.files[0]);
                } else {
                    console.log('No file selected for site_favicon');
                }

                const fileInput3 = siteLogoDarkInput[0];
                if (fileInput3 && fileInput3.files && fileInput3.files[0]) {
                    formData.append('site_logo_dark', fileInput3.files[0]);
                } else {
                    console.log('No file selected for site_logo_dark');
                }

                $.ajax({
                    url: '/api/identitas',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'Authorization': `Bearer ${token}`
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Identitas Website Berhasil Disimpan',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.reload();
                        });
                    },
                    error: function(xhr) {
                        console.error('Error saving identity data:', xhr.responseText);
                        Swal.fire('Error!', 'Failed to save identity data.', 'error');
                    }
                });
            });
        });
    </script>
@endpush
