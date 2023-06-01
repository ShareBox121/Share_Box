@extends('layouts.layout')

@section('content')
    <form action="{{ route('add.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input name="title">
        <input type="file" name="path" id="path">
        <button type="submit">
            Subir
        </button>
    </form>
@endsection