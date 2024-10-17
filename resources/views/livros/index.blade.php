@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h2>Lista de Livros</h2>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead class="bg-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>ISBN</th>
                    <th>Editora</th>
                    <th>Ano de Publicação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($livros as $livro)
                <tr>
                    <td>{{ $livro->id }}</td>
                    <td>{{ $livro->titulo }}</td>
                    <td>{{ $livro->autor }}</td>
                    <td>{{ $livro->isbn }}</td>
                    <td>{{ $livro->editora }}</td>
                    <td>{{ $livro->ano_publicacao }}</td>
                    <td>
                        <a href="{{ route('livros.edit', $livro->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este livro?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('livros.create') }}" class="btn btn-primary">Adicionar Novo Livro</a>
    </div>
</div>
@endsection
