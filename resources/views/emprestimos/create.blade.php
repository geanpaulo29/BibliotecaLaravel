<!-- resources/views/alunos/create.blade.php -->

@extends('layouts.app')

@section('slot')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Adicionar Emprestimo</h1>

                    <form action="{{ route('emprestimos.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="aluno_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Aluno:</label>
                            <select name="aluno" id="aluno_id" required>
                                @foreach($alunos as $aluno)
                                <option value="{{$aluno->id}}"> {{$aluno->name}} </option>
                                @endforeach
                        </div>
                        <div class="mb-4">
                            <label for="livro_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Livro:</label> 
                            <select name="livro_id" id="livro_id" required>
                                @foreach($livros as $livro)
                                <option value="{{ $livro->id}}">{{$livro->titulo}}</option>
                                @endforeach
                        </div>
                        <div class="mb-4">
                            <label for="matricula" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Matrícula:</label>
                            <input type="text" name="matricula" id="matricula" class="form-input mt-1 block w-full" required>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
