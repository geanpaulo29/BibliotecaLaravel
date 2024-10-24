<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::paginate(10);
        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        return view('livros.create');
    }

    public function store(Request $request)
    {
        // Validação e criação do livro
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'isbn' => 'required|unique:livros',
            'editora' => 'required',
            'ano_publicacao' => 'required|integer',
        ]);

        Livro::create($request->all());
        return redirect()->route('livros.index')->with('success', 'Livro adicionado com sucesso!');
    }

    public function edit($id)
    {
        $livro = Livro::findOrFail($id);
        return view('livros.edit', compact('livro'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'isbn' => 'required|unique:livros,isbn,' . $id,
            'editora' => 'required',
            'ano_publicacao' => 'required|integer',
        ]);

        $livro = Livro::findOrFail($id);
        $livro->update($request->all());
        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();
        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso!');
    }
}
