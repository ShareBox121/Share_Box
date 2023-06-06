@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="p-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAdicionarConteudo">
                Adicionar conteúdo
            </button>
        </div>
        <div class="modal fade" id="ModalAdicionarConteudo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="ModalAdicionarConteudoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="upload-form" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalAdicionarConteudoLabel">Adicionar um novo conteúdo</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Titúlo</label>
                                <input class="form-control" name="title">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Descrição</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="document" class="form-label">Documento</label>
                                <input class="form-control" type="file" name="path" id="path">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach ($dados as $dado)
            @if ($dado->user_id == Auth::user()->id)
                @include('add.partials.tabela')

                @include('add.partials.excluir')

                @include('add.partials.alterar')
            @endif
        @endforeach

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src="{{ asset('js/filesAdd.js') }}"></script>
@endsection
