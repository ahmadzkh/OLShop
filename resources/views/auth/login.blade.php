<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Farel Shop | Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('/assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container overflow-hidden align-items-center">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9 align-self-center">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 text-center align-self-center">
                                <img src="{{ asset('assets/img/undraw_shopping_app_flsj.svg') }}" alt="" srcset="" width="250">
                            </div>
                            <div class="col-lg-6 shadow-sm">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Shop Now</h1>
                                    </div>
                                    <form class="user py-5" method="POST" action="{{ route('login.post') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                                                id="exampleInputEmail" autocomplete="on"
                                                placeholder="Username or Email" value="{{ old('username') ?: old('email') }}" name="login">
                                            @if ($errors->has('username') || $errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                id="exampleInputPassword" placeholder="Password" value="{{ old('password') }}" name="password">
                                                @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    @if (session()->has('login'))
                                        <p class="stong text-danger text-center">{{ session('login') }}</p>
                                    @endif
                                    @if (session()->has('error'))
                                        <p class="stong text-danger text-center">{{ session('error') }}</p>
                                    @endif
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/assets/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
