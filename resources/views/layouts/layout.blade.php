<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Share Box</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <link rel="shortcut icon" href="{{ asset('img/logo_v2.svg') }}" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ps-5 pe-1">
    <a class="navbar-brand pe-3" href="{{ route('site.home') }}"><img src="{{ asset('img/logo_v2.svg') }}" width=200></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <div>
        <ul class="navbar-nav mr-auto text-aling-center">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('site.home') }}">Início</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('add.index') }}">Conteúdos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Biblioteca</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('add.create') }}">Adicionar</a>
          </li>
        </ul>
      </div>
    </div>
    <input class="search mr-sm-2" type="search" id="usr" placeholder="Buscar">
    <button class="btn btn-dark my-2 my-sm-0 ms-3" type="submit">Login</button>
    </div>
    </div>
  </nav>

  <main>
    @yield('content')
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>