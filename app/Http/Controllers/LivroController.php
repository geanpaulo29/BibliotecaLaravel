<?php

namespace App\Http\Controllers;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
        public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'isbn' => 'required|unique:livros',
            'editora' => 'required',
            'ano_publicacao' => 'required|integer',
        ]);

        Livro::create($request->all());

        return redirect()->route('livros.index')
                        ->with('success', 'Livro cadastrado com sucesso!');
    }

    public function update(Request $request, Livro $livro)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'isbn' => 'required|unique:livros,isbn,' . $livro->id,
            'editora' => 'required',
            'ano_publicacao' => 'required|integer',
        ]);

        $livro->update($request->all());

        return redirect()->route('livros.index')
                        ->with('success', 'Livro atualizado com sucesso!');
    }
    public function index()
    {
        // Buscar todos os livros no banco de dados
        $livros = Livro::all();

        // Retornar a view 'index' com os livros
        return view('livros.index', compact('livros'));
    }
    public function create()
    {
    // Retorna a view do formulário de criação de livros
    return view('livros.create');
    }
    public function destroy($id)
    {
        // Encontra o livro pelo ID
        $livro = Livro::findOrFail($id);
        
        // Exclui o livro
        $livro->delete();
        
        // Redireciona de volta à lista de livros com uma mensagem de sucesso
        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso!');
    }
    public function edit($id)
    {
    // Encontra o livro pelo ID
    $livro = Livro::findOrFail($id);
    
    // Retorna a view de edição com os dados do livro
    return view('livros.edit', compact('livro'));
    }




}
