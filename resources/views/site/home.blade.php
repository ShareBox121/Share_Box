@extends('layouts.layout')
@section('content')
<div class="container p-5">
    <div class="row">
        <div class="col-md-6"><img src="{{ asset('img/logo_v2.svg') }}" id="box"></div>
        <div class="col-md-6">
            <div data-aos="fade-left" data-aos-duration="2000">
                <h1 class="title">
                    Bem vindo</h1>
                <br>
                <p class="description">Compartilhe sem limites e sem preocupações, nosso site é o seu arquivo digital ilimitado</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid p-5 suggestions">
    <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="3000">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col col-md-4">
                <div class="card d-flex justify-content-center">
                    <img src="{{ asset('img/🦆 icon _people_.svg') }}" />
                    <p>Armazenamento e
                        compartilhamento
                        de forma fácil e
                        rápida</p>
                </div>
            </div>
            <div class="col col-md-4">
                <div class="card">
                    <img src="{{ asset('img/🦆 icon _globe_.svg') }}" />
                    <p>Acesso a arquivos em qualquer lugar, a qualquer momento</p>
                </div>
            </div>
            <div class="col col-md-4">
                <div class="card">
                    <img src="{{ asset('img/🦆 icon _dollar_.svg') }}" />
                    <p>Redução dos custos de armazenamento </p>
                </div>
            </div>
        </div>
    </div>
    <div data-aos="flip-right" data-aos-easing="ease-out-cubic" data-aos-duration="3000">
        <div class="row">
            <div class=" col col-md-4 mt-3">
                <div class="card">
                    <img src="{{ asset('img/🦆 icon _key_.svg') }}" />
                    <p>Compartilhe seus arquivos de forma segura</p>
                </div>
            </div>
            <div class="col col-md-4 mt-3">
                <div class="card">
                    <img src="{{ asset('img/🦆 icon _signal_.svg') }}" />
                    <p>Armazene<br>
                        sem<br>
                        preocupações</p>
                </div>
            </div>
            <div class="col col-md-4">
                <div class="card">
                    <img src="{{ asset('img/🦆 icon _info_.svg') }}" />
                    <p>Central de informações em caso de dúvidas</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container p-5">
    <div class="row">
        <div class="col col-md-6">
            <div data-aos="fade-right" data-aos-duration="2000">
                <h2>Nossa plataforma de armazenamento de arquivos é a escolha mais inteligente que você pode fazer.</h2>
            </div>
        </div>
        <div class="col col-md-6"><img src="{{ asset('img/clever.svg') }}" id="box"></div>
    </div>
    <div class="row">
        <div class="col col-md-6"><img src="{{ asset('img/click.svg') }}" id="box"></div>
        <div class="col col-md-6">
            <div data-aos="fade-left" data-aos-duration="2000">
                <h2>Nossa plataforma é fácil de usar e permite compartilhar arquivos com facilidade, proporcionando flexibilidade e colaboração para sua equipe. </h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-6">
            <div data-aos="fade-right" data-aos-duration="2000">
                <h2>Além disso, nos preocupamos com a satisfação do cliente e buscamos sempre superar as expectativas.
                    Escolha-nos e tenha a certeza de estar investindo em uma plataforma confiável e eficaz para o seu negócio.
                    Entre em contato conosco agora para saber mais.</h2>
            </div>
        </div>
        <div class="col col-md-6"><img src="{{ asset('img/like.svg') }}"></div>
    </div>
</div>
<div class="container-fluid" style="background: #F7F7F7;">
    <div data-aos="zoom-in-up">
        <div class="col col-md-12"><img src="{{ asset('img/network.svg') }}"></div>
    </div>
</div>

<div class="container-fluid footer">
    <div class="row">
        <div class="col-md-2 d-flex align-items-center flex-column">
            <img src="{{ asset('img/logo-navbar.svg') }}">
        </div>
        <div class="col-md-6 d-flex flex-column align-items-center">
            <div class="d-flex mb-3">
                <img src="{{ asset('img/🦆 icon _envelope closed_.svg') }}" class="icon">
                <p>gabriel.ferreira68@fatec.sp.gov.br</p>
            </div>
            <div class="d-flex">
                <img src="{{ asset('img/🦆 icon _phone_.svg') }}" class="icon">
                <p>(18) 3916-7887 / &nbsp;</p>
                <p>(18) 99686-7331</p>
            </div>
        </div>
        <div class="col-md-4"><img src="{{ asset('img/🦆 icon _map_.svg') }}" class="icon">R. Teresina, 75 - Vila Paulo Roberto, Pres. Prudente - SP, 19046-230</div>
        <div class="col-md-12 mt-5">
            <p class="text-center">Copyright © Fatec Presidente Prudente 2023</p>
        </div>
    </div>
</div>
@endsection