@extends('layouts.layout')
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <title>File Type Filter</title>
        <style>
            .file-container {
                display: none;
            }
        </style>
    </head>

    <body>
        <div>
            <label for="fileType">Filter by File Type:</label>
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
            <div class="file-container" data-filetype="{{ $fileExtension }}" style="display: block;">
                <div class="container p-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div data-aos="fade-left" data-aos-duration="2000">
                                <h1 class="title">{{ $file->title }}</h1>
                                <br>
                                @if ($fileExtension === 'pdf')
                                    <embed src="{{ $file->path }}" type="application/pdf" width="500px" height="500px">
                                @else
                                    <img src="{{ $file->path }}" style="width:500px">
                                @endif
                            </div>
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
