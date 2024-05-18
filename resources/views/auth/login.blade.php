<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Preskool - Login</title>

        <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">

        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
            rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/plugins/icons/flags/flags.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    </head>

    <body>

        <div class="main-wrapper login-body">
            <div class="login-wrapper">
                <div class="container">
                    <div class="loginbox">
                        <div class="login-left">
                            <img class="img-fluid" src="{{asset('assets/img/login.png')}}" alt="Logo">
                        </div>
                        <div class="login-right">
                            <div class="login-right-wrap">
                                <h1>Bienvenue à Preskool</h1>
                                <p class="account-subtitle">Besoin d’un compte ?<a href="{{ route('register') }}">S’enregistrer</a></p>
                                <h2>Connectez-vous</h2>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email <span class="login-danger">*</span></label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                          
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                      
                                    </div>
                                    <div class="form-group">
                                        <label>Mot de passe <span class="login-danger">*</span></label>                                        
                                        <input id="password" type="password" class="form-control pass-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        <span class="profile-views feather-eye toggle-password"></span>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="forgotpass">
                                        <div class="remember-me">
                                            <label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Souvenez-vous de moi 
                                                <input type="checkbox" name="radio">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block" type="submit">Connectez-vous</button>
                                        
                                    </div>
                                </form>

                              

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <script src="{{ asset('assets/js/feather.min.js') }}"></script>

        <script src="{{ asset('assets/js/script.js') }}"></script>
    </body>

</html>
