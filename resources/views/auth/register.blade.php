<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/register.css')}}" />
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
        <div class="col-sm-6 col-md-5">
            <div class="card d-flex justify-content-center align-items-center bg-white">
                <!-- <img src="{{asset('images/logo-login.svg')}}" class="logo" /> -->

    <form method="POST" action="{{ route('register') }}">
        @csrf 

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome:')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('E-mail:')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha:')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirme a senha:')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <br>

        <p class="pe-2 ps-4">Ao clicar em <span class="fw-bold">Cadastrar-se</span>, você concorda com os nossos
            <span class="fw-bold">Termos, Políticas 
              de Privacidade e Políticas de Cookies.</span> Você pode cancelar quando quiser. </p>

        <div>
            <a href="{{ route('login') }}">
                    {{ __('Already registered?') }}
            </a>

            <x-primary-button class="btn btn-dark mt-5" > <!-- class="btn btn-dark mt-5"  -->
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

</body>
</html>
