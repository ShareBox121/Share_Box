@extends('layouts.layout')
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <title>File Type Filter</title>
        <style>
            .card-wrapper {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }

            .file-container {
                flex: 0 0 300px;
                margin: 10px;
            }

            .card {
                border: none;
                border-radius: 10px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            }

            .card-title {
                font-size: 1.5rem;
                font-weight: bold;
                margin-bottom: 10px;
                color: #333;
            }

            .card-text {
                margin-bottom: 20px;
                color: #777;
            }

            .card-body img {
                display: block;
                width: 100%;
                height: auto;
                border-radius: 10px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            }

            .card-body embed {
                display: block;
                width: 100%;
                height: auto;
                border-radius: 10px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            }

            .card-body a {
                width: 100%;
                background-color: #333;
                color: #fff;
                border: none;
                border-radius: 5px;
                padding: 10px 15px;
                font-weight: bold;
                text-transform: uppercase;
                text-decoration: none;
                transition: background-color 0.3s ease;
            }

            .card-body a:hover {
                background-color: #555;
            }

            .filter-container {
                flex: 0 0 300px;
                margin: 10px;
            }

            .filter-container select {
                border: none;
                padding: 10px 20px;
                border-radius: 15px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            }
        </style>
    </head>

    <body>
        
        <div class="filter-container mt-2 mr-3">
            <label for="fileType">Filtrar Por:</label>
            <select id="fileType" onchange="filterFiles()">
                <option value="all">Todos</option>
                <option value="image">Imagens</option>
                <option value="document">Documentos</option>
                <option value="video">Videos</option>
            </select>
        </div>
        @foreach ($events as $file)
            <?php
            $fileExtension = pathinfo($file->path, PATHINFO_EXTENSION);
            ?>
            <div class="file-container" data-filetype="{{ $fileExtension }}">
                <div class="container mx-auto mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $file->title }}</h5>
                            <p class="card-text">{{ $file->description }}</p>
                            @if ($fileExtension === 'pdf')
                                <embed src="{{ $file->path }}" type="application/pdf" width="100%" height="250px">
                            @else
                                <img src="{{ $file->path }}" style="width:100%">
                            @endif
                            <a href="{{ $file->path }}" class="btn btn-dark mt-3" download>Baixar</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <script>
            function filterFiles() {
                var selectedType = document.getElementById('fileType').value;
                var fileContainers = document.querySelectorAll('.file-container');

                fileContainers.forEach(function(container) {
                    var fileType = container.getAttribute('data-filetype');

                    if (selectedType === '' || selectedType === 'all' ||
                        (selectedType === 'image' && (fileType === 'jpg' || fileType === 'jpeg' || fileType ===
                            'png')) ||
                        (selectedType === 'document' && (fileType === 'pdf' || fileType === 'txt')) ||
                        (selectedType === 'video' && (fileType === 'mp4'))) {
                        container.style.display = 'block';
                    } else {
                        container.style.display = 'none';
                    }
                });
            }
        </script>


    </body>



    </html>
@endsection
