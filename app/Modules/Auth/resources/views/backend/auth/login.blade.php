<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta password="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Login Page</title>

    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('backends/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backends/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backends/assets/css/authentication/form-2.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backends/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backends/assets/css/forms/switches.css') }}">

</head>
<body class="form">
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        <h1 class="">Sign In</h1>
                        <p class="">Log in to your account to continue.</p>

                        <form class="text-left" action = "{{route('backend.login')}}" method = "POST">
                            <div class="form">
                                 @csrf

                                <div id="email-field" class="field-wrapper input">
                                    <label for="email">E-mail</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="email" name="email" type="text" class="form-control" placeholder="e.g jhon_doe@something.com">
                                    @error('email')
                                    <div class="has-error">
                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                    </div>
                                    @enderror
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">PASSWORD</label>
                                        <a href="auth_pass_recovery_boxed.html" class="forgot-pass-link">Forgot Password?</a>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    @error('password')
                                    <div class="has-error">
                                        <span class="text-danger">{{$errors->first('password')}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Log In</button>
                                    </div>
                                </div>
                                {{-- <p class="signup-link">Not registered ? <a href="auth_register_boxed.html">Create an account</a></p> --}}

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('backends.partials.scripts')
    <script src="{{ asset('backends/assets/js/authentication/form-2.js') }}"></script>
</body>
</html>
