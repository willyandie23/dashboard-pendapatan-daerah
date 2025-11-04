<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
    <html lang="en" data-theme="light">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Login - Dashboard Pendapatan Daerah</title>

        <!-- Favicon -->
        <link rel="icon" id="site_favicon" href="" type="image/x-icon">

        <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

        <style>
            html, body {
            height: 100%;
            margin: 0;
            }

            .auth-left {
            height: 100vh;
            }

            .auth-left img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            display: block;
            }
        </style>
    </head>

    <body>
        <section class="auth bg-base d-flex flex-wrap">
            <div class="auth-left d-lg-block d-none">
                <div class="d-flex align-items-center flex-column h-100 justify-content-center">
                    <img src="{{ asset('assets/images/Background Login.png') }}" alt="Login Image" />
                </div>
            </div>

            <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
                <div class="max-w-464-px mx-auto w-100">
                    <div>
                        <a href="{{ url('/') }}" class="mb-40 max-w-290-px">
                            {{-- <img src="{{ asset('assets/images/Logo Bapenda Light.png') }}" alt="Logo" /> --}}
                            <img src="" alt="Login Login" class="site_logo">
                        </a>
                        <h4 class="mb-12">Login</h4>
                        <p class="mb-32 text-secondary-light text-lg">Selamat Datang!</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email input -->
                        <div class="icon-field mb-16 position-relative">
                            <span class="icon top-50 translate-middle-y">
                                <iconify-icon icon="mage:email"></iconify-icon>
                            </span>
                            <input id="email" type="email"
                                class="form-control h-56-px bg-neutral-50 radius-12 @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autofocus placeholder="Email" />
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="position-relative mb-20">
                            <div class="icon-field">
                                <span class="icon top-50 translate-middle-y">
                                    <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                                </span>
                                <input id="password" type="password"
                                    class="form-control h-56-px bg-neutral-50 radius-12 @error('password') is-invalid @enderror"
                                    name="password" required placeholder="Password" />
                            </div>
                            <span
                                class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light"
                                data-toggle="#password"></span>
                            @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Remember me -->
                        <div>
                            <div class="d-flex justify-content-between gap-2">
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input border border-neutral-300" type="checkbox" id="remember"
                                        name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>
                                {{-- @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-primary-600 fw-medium">Forgot
                                        Password?</a>
                                @endif --}}
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32">
                            Sign In
                        </button>

                        {{-- <div class="mt-32 center-border-horizontal text-center">
                            <span class="bg-base z-1 px-4">Or sign in with</span>
                        </div>
                        <div class="mt-32 d-flex align-items-center gap-3">
                            <button type="button"
                                class="fw-semibold text-primary-light py-16 px-24 w-50 border radius-12 text-md d-flex align-items-center justify-content-center gap-12 line-height-1 bg-hover-primary-50">
                                <iconify-icon icon="ic:baseline-facebook"
                                    class="text-primary-600 text-xl line-height-1"></iconify-icon>
                                Facebook
                            </button>
                            <button type="button"
                                class="fw-semibold text-primary-light py-16 px-24 w-50 border radius-12 text-md d-flex align-items-center justify-content-center gap-12 line-height-1 bg-hover-primary-50">
                                <iconify-icon icon="logos:google-icon"
                                    class="text-primary-600 text-xl line-height-1"></iconify-icon>
                                Google
                            </button>
                        </div>
                        <div class="mt-32 text-center text-sm">
                            <p class="mb-0">Don’t have an account? <a href="{{ route('register') }}"
                                    class="text-primary-600 fw-semibold">Sign Up</a></p>
                        </div> --}}
                    </form>
                </div>
            </div>
        </section>

        <script src="{{ asset('assets/js/lib/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/lib/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/lib/iconify-icon.min.js') }}"></script>
        <script>
            function initializePasswordToggle(toggleSelector) {
                $(toggleSelector).on('click', function() {
                    $(this).toggleClass("ri-eye-off-line");
                    var input = $($(this).attr("data-toggle"));
                    if (input.attr("type") === "password") {
                        input.attr("type", "text");
                    } else {
                        input.attr("type", "password");
                    }
                });
            }
            initializePasswordToggle('.toggle-password');
        </script>

        <script>
            $(document).ready(function() {
                $.ajax({
                    url: '/api/identitas',
                    type: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            if (response.data.site_favicon) {
                                $('#site_favicon').attr('href', response.data.site_favicon);
                            }

                            if (response.data.site_logo) {
                                $('.site_logo').attr('src', response.data.site_logo);
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
    </body>

</html>
