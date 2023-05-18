<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/inicio.css')}}" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
        crossorigin="anonymous"
    />
</head>
<body>
<div class="container">
    <div class="row vh-100 d-flex justify-content-center align-items-center">
        <div class="col-sm-6 col-md-4">
            <div class="card d-flex justify-content-center align-items-center bg-white">
                <img src="{{asset('images/logo-login.svg')}}" class="logo" />

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="row">
                @csrf

                    <!-- Email Address -->
                    <div class="col-12 mb-5">
                        <x-input-label for="email" :value="__('Email')"
                           class="form-control"
                           placeholder="Email:"
                           aria-label="Username"/>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="col-12 mb-2">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="Senha:"/>

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                        <a class="mt-1 mb-3 forgot-password" href="{{ route('password.request') }}">
                            {{ __('Esqueci minha senha') }}
                        </a>
                        @endif

                       <x-primary-button id="open" class="btn btn-dark">
                            {{ __('Entrar') }}
                        </x-primary-button>
                    </div>
                    <div class="line m-3">
                        <button type="button" id="new" class="btn btn-dark mt-2">
                            Criar nova conta
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"
></script>
</body>
</html>

