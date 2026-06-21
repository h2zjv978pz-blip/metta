<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title', 'Metteyya Management Login')</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('_common/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('_common/img/favicon/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('_common/img/favicon/favicon-32x32.png') }}">
    <meta name="theme-color" content="#ffffff">

    <link href="{{ asset('_auth/css/sb.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <link href="{{ asset('_auth/css/style.css') }}" rel="stylesheet" />
</head>
<body class="bg-light" style="background-image: url('{{ asset('_frontend/images/home/home-slide01-sm.jpg') }}'); background-size: cover; background-repeat: no-repeat;">
<div id="layoutAuthentication" style="background-color: #767676bf;">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">

                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg" style="margin-top: 15vh; min-width: 300px !important;">
                            <div class="card-header">
                                <div class="text-center">
                                    <img src="{{ asset('_frontend/images/buddha-logo-long.png') }}" alt="iTracker v3" style="max-height: 55px;">
                                </div>
                            </div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="mb-4 text-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <h6 class="text-center font-weight-bold mt-2 mb-4">Management Login</h6>

                                @if($errors->first('login'))
                                    <div class="text-danger text-center my-3">{{ $errors->first('login') }}</div>
                                @endif

                                <form method="POST" action="{{ route('auth.check') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="small mb-1" for="customer_id">Username</label>
                                        <input class="form-control py-4" id="customer_id" type="text" placeholder="Enter username" name="username" value="{{ old('username') }}" required autofocus />
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputPassword">Password</label>
                                        <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" required autocomplete="current-password"/>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" name="remember" />
                                            <label class="custom-control-label" for="rememberPasswordCheck">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        @if (Route::has('password.request'))
                                            {{--                <a class="small" href="{{ route('password.request') }}">--}}
                                            {{--                    {{ __('Forgot your password?') }}--}}
                                            {{--                </a>--}}
                                        @endif
                                        {{--                    <button class="btn btn-primary">Login</button>--}}
                                        <button class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('_auth/js/scripts.js') }}"></script>
</body>
</html>
