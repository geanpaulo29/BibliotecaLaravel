@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h2>Editar Livro</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('livros.update', $livro->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" name="titulo" class="form-control" value="{{ $livro->titulo }}" required>
            </div>

            <div class="mb-3">
                <label for="autor" class="form-label">Autor:</label>
                <input type="text" name="autor" class="form-control" value="{{ $livro->autor }}" required>
            </div>

            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN:</label>
                <input type="text" name="isbn" class="form-control" value="{{ $livro->isbn }}" required>
            </div>

            <div class="mb-3">
                <label for="editora" class="form-label">Editora:</label>
                <input type="text" name="editora" class="form-control" value="{{ $livro->editora }}" required>
            </div>

            <div class="mb-3">
                <label for="ano_publicacao" class="form-label">Ano de Publicação:</label>
                <input type="number" name="ano_publicacao" class="form-control" value="{{ $livro->ano_publicacao }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>

        <a href="{{ route('livros.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</div>
@endsection
