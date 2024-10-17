@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h2>Adicionar Novo Livro</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('livros.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" name="titulo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="autor" class="form-label">Autor:</label>
                <input type="text" name="autor" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN:</label>
                <input type="text" name="isbn" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="editora" class="form-label">Editora:</label>
                <input type="text" name="editora" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="ano_publicacao" class="form-label">Ano de Publicação:</label>
                <input type="number" name="ano_publicacao" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>

        <a href="{{ route('livros.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</div>
@endsection
