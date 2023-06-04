@extends('layouts.layout')

@section('content')
    <form id="upload-form" enctype="multipart/form-data">
        @csrf
        <input name="title">
        <input type="file" name="path" id="path">
        <button type="submit">Subir</button>
    </form>

    @include('add.partials.tabela')

    @include('add.partials.excluir')

    @include('add.partials.alterar')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src="{{ asset('js/filesAdd.js') }}"></script>
@endsection