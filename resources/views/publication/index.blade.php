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
      <option value="">All</option>
      <option value="jpg">JPEG</option>
      <option value="pdf">PDF</option>
      <!-- Add more file types as needed -->
    </select>
  </div>

  @foreach($events as $file)
    <?php
      $fileExtension = pathinfo($file->path, PATHINFO_EXTENSION);
    ?>
    <div class="file-container" data-filetype="{{$fileExtension}}">
      <div class="container p-5">
        <div class="row">
          <div class="col-md-6">
            <img src="{{ asset('img/logo_v2.svg') }}" id="box">
          </div>
          <div class="col-md-6">
            <div data-aos="fade-left" data-aos-duration="2000">
              <h1 class="title">{{$file->title }}</h1>
              <br>
              <img src="{{$file->path}}">
              <p class="description">Compartilhe sem limites e sem preocupações, nosso site é o seu arquivo digital ilimitado</p>
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

        if (selectedType === '' || selectedType === fileType) {
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