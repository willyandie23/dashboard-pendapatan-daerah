<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>@yield('title', 'Loading...')</title>

    <!-- Favicon -->
    <link rel="icon" id="site_favicon" href="" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- remix icon font css  -->
    <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">
    <!-- BootStrap css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap.min.css') }}">
    <!-- Apex Chart css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/apexcharts.css') }}">
    <!-- Data Table css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/dataTables.min.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> --}}
    <!-- Text Editor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/editor-katex.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.atom-one-dark.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.quill.snow.css') }}">
    <!-- Date picker css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/flatpickr.min.css') }}">
    <!-- Calendar css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/full-calendar.css') }}">
    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/jquery-jvectormap-2.0.5.css') }}">
    <!-- Popup css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/magnific-popup.css') }}">
    <!-- Slick Slider css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/slick.css') }}">
    <!-- prism css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/prism.css') }}">
    <!-- file upload css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/file-upload.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/lib/audioplayer.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body>

    <!-- Theme Customization Structure Start -->
    <!-- <div class="theme-customization"> -->
    <div class="body-overlay"></div>

    @include('layouts.sidebar')

    <main class="dashboard-main">

        @include('layouts.headbar')

        <div class="dashboard-main-body">

            <div class="container-fluid px-3 px-md-4">
                {{ Breadcrumbs::render() }}
            </div>

            @yield('content')

        </div>

        @include('layouts.footer')

    </main>

    <!-- jQuery library js -->
    <script src="{{ asset('assets/js/lib/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap js -->
    <script src="{{ asset('assets/js/lib/bootstrap.bundle.min.js') }}"></script>

    <!-- Apex Chart js -->
    {{-- <script src="{{ asset('assets/js/lib/apexcharts.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Data Table js -->
    <script src="{{ asset('assets/js/lib/dataTables.min.js') }}"></script>
    {{-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> --}}

    <!-- Iconify Font js -->
    <script src="{{ asset('assets/js/lib/iconify-icon.min.js') }}"></script>

    <!-- jQuery UI js -->
    <script src="{{ asset('assets/js/lib/jquery-ui.min.js') }}"></script>

    <!-- Vector Map js -->
    <script src="{{ asset('assets/js/lib/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- Popup js -->
    <script src="{{ asset('assets/js/lib/magnifc-popup.min.js') }}"></script>

    <!-- Slick Slider js -->
    <script src="{{ asset('assets/js/lib/slick.min.js') }}"></script>

    <!-- prism js -->
    <script src="{{ asset('assets/js/lib/prism.js') }}"></script>

    <!-- file upload js -->
    <script src="{{ asset('assets/js/lib/file-upload.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- main js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script>
        const csrf_token = '{{ csrf_token() }}';
        const token = "{{ session('api_token') }}";

        // console.log('API Token : ', token);
        // console.log('CSRF : ', csrf_token);
    </script>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/api/identitas',
                type: 'GET',
                success: function(response) {
                    if (response.success && response.data) {
                        // const routeTitle = $('#dynamic-title').text();
                        if (response.data.site_heading) {
                            $('#dynamic-title').text(response.data.site_heading);
                        }

                        if (response.data.site_favicon) {
                            $('#site_favicon').attr('href', response.data.site_favicon);
                        }

                        if (response.data.site_logo) {
                            $('.site_logo').attr('src', response.data.site_logo);
                        }

                        if (response.data.site_logo_dark) {
                            $('.site_logo_dark').attr('src', response.data.site_logo_dark);
                        }

                        if (response.data.helpdesk && response.data.call_center) {
                            $('#footer-info').text(
                                `Helpdesk: ${response.data.helpdesk} | Call Center: ${response.data.call_center}`
                            );
                        }

                    } else {
                        console.log('Invalid response format:', response);
                    }
                },
                error: function(xhr) {
                    console.error('Error fetching Identities data:', xhr.responseText);
                    Swal.fire('Error!', 'Failed to load Identities data.', 'error');
                }
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
