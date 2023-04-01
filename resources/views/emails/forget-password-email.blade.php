<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>forget password</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-6 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="../../images/logo.svg" alt="logo">
                            </div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card">
                                            {{-- <div class="">{{ __('Reset Password') }}</div> --}}
                                            <label>Masukan Kata Sandi Baru</label>

                                            <div class="card-body">
                                                @if (session('status'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{ session('status') }}
                                                    </div>
                                                @endif
                                                <form method="POST" action="{{ route('password.update') }}">
                                                    @csrf

                                                    <input type="hidden" name="token" value="{{ $token }}">

                                                    <div class="form-group row">
                                                        <label for="email"
                                                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail
                                                                        Address') }}</label>

                                                        <div class="col-md-8">
                                                            <input id="email" type="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email" value="{{ $email ?? old('email') }}"
                                                                required autocomplete="email" autofocus>

                                                            @if ($errors->has('email'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('email') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="password"
                                                            class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                        <div class="col-md-8">
                                                            <input id="password" type="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                name="password" required autocomplete="new-password"
                                                                autofocus>

                                                            @if ($errors->has('password'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('password') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="password-confirm"
                                                            class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Password') }}</label>

                                                        <div class="col-md-8">
                                                            <input id="password-confirm" type="password"
                                                                class="form-control" name="password_confirmation"
                                                                required autocomplete="new-password" autofocus>
                                                            @if ($errors->has('password_confirmation'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-0">
                                                        <div class="col-md-6 offset-md-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                {{ __('Reset Kata Sandi') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
