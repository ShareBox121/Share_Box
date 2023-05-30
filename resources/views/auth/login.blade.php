<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="row vh-100 d-flex justify-content-center align-items-center">
            <div class="card col-md-4 d-flex justify-content-center align-items-center bg-white ">
                <img src="{{asset('images/logo-login.svg')}}" class="logo" />

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="row">
                    @csrf

                    <!-- Email Address -->
                    <div class="col-12 mb-5">
                        <input type="email" class="form-control" placeholder="Email:" aria-label="Username" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="col-12 mb-2">
                        <input id="password" type="password" class="form-control" required autocomplete="current-password" placeholder="Senha:" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="d-flex justify-content-center align-items-center mt-4 mb-4">
                        <x-primary-button id="open" class="btn btn-dark">
                            {{ __('Entrar') }}
                        </x-primary-button>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="mb-4">
                            @if (Route::has('password.request'))
                            <a class="mt-1 mb-3 forgot-password" href="{{ route('password.request') }}">
                                {{ __('Esqueci minha senha') }}
                            </a>
                            @endif


                        </div>

                    </div>
                    <div class="line m-3">
                        <a href="/register">
                            <button type="button" id="new" class="btn btn-dark mt-2">
                                Criar nova conta
                            </button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
